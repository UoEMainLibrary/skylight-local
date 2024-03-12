var pageNum = 1;  // Start with page 1
var pageRendering = false;
var pageNumPending = null;
var scale = 1;
var pdf = null;



function loadPdf(url){
        
    let loadingTask = pdfjsLib.getDocument(url);
    loadingTask.promise.then(function(pdfr) {
        pdf = pdfr;
        renderPage(pageNum, pdf);
        document.getElementById('page_count').textContent = pdf.numPages;
                    
    }).then(function() {
      document.getElementById("loadingbox").style = "display:none;"
    });
}

function renderPage(pageNum) {
  pageRendering = true;
    document.getElementById("textlayer").innerHTML = ""
    this.pdf.getPage(pageNum).then(function(page) {
      
      // Get original viewport
      let originalViewport = page.getViewport({ scale: this.scale });

      let adjustedScale = this.scale;
      const MAX_WIDTH = 695;
      const MAX_HEIGHT = 865;

      if (originalViewport.width > MAX_WIDTH) {
        adjustedScale = Math.min(adjustedScale, MAX_WIDTH / originalViewport.width);
      }

      if (originalViewport.height > MAX_HEIGHT) {
        adjustedScale = Math.min(adjustedScale, MAX_HEIGHT / originalViewport.height);
      }
      
      let viewport = page.getViewport({ scale: adjustedScale });

        let canvas = document.getElementById('pdfCanvas');
        let context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        let renderTask = page.render({
            canvasContext: context,
            viewport: viewport
        });

        renderTask.promise.then(function() {
          pageRendering = false;
          if (pageNumPending !== null) {
            renderPage(pageNumPending);
            pageNumPending = null;
          }
        }).then(function() {
          return page.getTextContent();
        }).then(function(textContent) {
                
            var textLayer = document.querySelector(".textLayer");
                
            textLayer.style.left = canvas.offsetLeft + 'px';
            textLayer.style.top = canvas.offsetTop + 'px';
            textLayer.style.height = canvas.offsetHeight + 'px';
            textLayer.style.width = canvas.offsetWidth + 'px';

            textLayer.style.setProperty('--scale-factor', scale);
                
            // Pass the data to the method for rendering of text over the pdf canvas.
            pdfjsLib.renderTextLayer({
                textContentSource: textContent,
                container: textLayer,
                viewport: viewport,
                textDivs: []
                });
        });
    });
    document.getElementById('page_num').textContent = pageNum;
    document.getElementById('pageDescription').textContent = "page " + pageNum + " of the pdf.";
    //document.getElementById('canvasdiv').focus();
}

/**
* If another page rendering in progress, waits until the rendering is
* finised. Otherwise, executes rendering immediately.
*/
function queueRenderPage(num) {
    if (pageRendering) {
    pageNumPending = num;
    } else {
      renderPage(num, pdf)
    }
}
/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdf.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);