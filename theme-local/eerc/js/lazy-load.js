document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // LAZY LOAD IMAGES (with Intersection Observer)
    // ============================================
    
    const skeletonImages = document.querySelectorAll('.skeleton-image');
    
    // Create Intersection Observer for images
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const skeleton = entry.target;
                const proxyUrl = skeleton.getAttribute('data-proxy-url');
                const title = skeleton.getAttribute('data-title');
                const linkUrl = skeleton.getAttribute('data-link-url');
                
                // Create a temporary image to test loading
                const tempImg = new Image();
                
                tempImg.onload = function() {
                    // Image loaded successfully - replace skeleton with actual image
                    const link = document.createElement('a');
                    link.href = linkUrl;
                    link.title = title;
                    
                    const img = document.createElement('img');
                    img.src = proxyUrl;
                    img.alt = title;
                    img.className = 'photos';
                    img.style.cssText = 'width: 300px; padding: 8px;';
                    
                    link.appendChild(img);
                    
                    // Replace skeleton with loaded image
                    skeleton.parentElement.replaceChild(link, skeleton);
                };
                
                tempImg.onerror = function() {
                    // Image failed to load - show error state
                    skeleton.className = 'image-load-error';
                    skeleton.style.animation = 'none';
                    skeleton.innerHTML = '<span>⚠️<br>Image unavailable</span>';
                    console.error('Failed to load image:', proxyUrl);
                };
                
                // Start loading the image
                tempImg.src = proxyUrl;
                
                // Stop observing this element
                observer.unobserve(skeleton);
            }
        });
    }, {
        rootMargin: '50px', // Start loading 50px before entering viewport
        threshold: 0.01     // Trigger when even 1% is visible
    });
    
    // Observe all skeleton images
    skeletonImages.forEach(skeleton => {
        imageObserver.observe(skeleton);
    });
    
    
    // ============================================
    // LAZY LOAD AUDIO (with Intersection Observer)
    // ============================================
    
    const skeletonAudios = document.querySelectorAll('.skeleton-audio');
    
    const audioObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const skeleton = entry.target;
                const proxyUrl = skeleton.getAttribute('data-proxy-url');
                const title = skeleton.getAttribute('data-title');
                
                // Create audio element
                const audio = document.createElement('audio');
                audio.controls = true;
                audio.title = title;
                audio.preload = 'metadata'; // Only load metadata initially
                
                const source = document.createElement('source');
                source.src = proxyUrl;
                audio.appendChild(source);
                
                // Add fallback text
                audio.innerHTML += 'Your browser does not support the <code>audio</code> element.';
                
                // Replace skeleton with audio player
                skeleton.parentElement.replaceChild(audio, skeleton);
                
                // Stop observing this element
                observer.unobserve(skeleton);
            }
        });
    }, {
        rootMargin: '100px', // Start loading 100px before entering viewport
        threshold: 0.01
    });
    
    // Observe all skeleton audio elements
    skeletonAudios.forEach(skeleton => {
        audioObserver.observe(skeleton);
    });
    
    
    // ============================================
    // LAZY LOAD VIDEO (with Intersection Observer)
    // ============================================
    
    const skeletonVideos = document.querySelectorAll('.skeleton-video');
    
    const videoObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const skeleton = entry.target;
                const proxyUrl = skeleton.getAttribute('data-proxy-url');
                const title = skeleton.getAttribute('data-title');
                
                // Create video element
                const video = document.createElement('video');
                video.controls = true;
                video.width = 480;
                video.preload = 'metadata'; // Only load metadata initially
                video.title = title;
                
                const source = document.createElement('source');
                source.src = proxyUrl;
                video.appendChild(source);
                
                // Add fallback text
                video.innerHTML += 'Sorry, your browser doesn\'t support embedded videos.';
                
                // Replace skeleton with video player
                skeleton.parentElement.replaceChild(video, skeleton);
                
                // Stop observing this element
                observer.unobserve(skeleton);
            }
        });
    }, {
        rootMargin: '100px', // Start loading 100px before entering viewport
        threshold: 0.01
    });
    
    // Observe all skeleton video elements
    skeletonVideos.forEach(skeleton => {
        videoObserver.observe(skeleton);
    });
    
});
