<footer id="footer" style="background-color: #FFF;border-top: 1px solid #ccc;padding: 20px;text-align: center;margin: 0 auto;">
    <div class="container" >
        <div class="row">
            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs"style="text-align: right;">
                <a href="http://www.ed.ac.uk/schools-departments/information-services/about/organisation/library-and-collections" target="_blank" title="Library &amp; University Collections Home">
                    <img src="img/LUC.png"/></a>
            </div>
            <div class="col-lg-8 col-md-8" style="">
                <h3><a href="#" title="University Collections Home">University Collections</a></h3>
                <p><a href="http://www.ed.ac.uk/about/website/privacy" title="Privacy and Cookies Link"  target="_blank" >Privacy &amp; Cookies</a>
                    &nbsp;&nbsp;<a href="./takedown" title="Takedown Policy Link">Takedown Policy</a>
                    &nbsp;&nbsp;<a href="./licensing" title="Licensing and Copyright Link">Licensing &amp; Copyright</a>
                    &nbsp;&nbsp;<a href="http://www.ed.ac.uk/about/website/accessibility" title="Website Accessibility Link" target="_blank">Accessibility</a></p>
                <p>Unless explicitly stated otherwise, all material is copyright &copy; 2017 <a href="http://www.ed.ac.uk" title="University of Edinburgh Home" target="_blank">University of Edinburgh</a>.</p>
            </div>
            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="text-align: left;">
                <a href="http://www.is.ed.ac.uk" target="_blank"  title="University of Edinburgh Information Services Home">
                    <img src="img/is.png"/></a>
            </div>
        </div>
    </div>
    <p class="back-to-top"><a href="#" id="gotop"><img src="img/backtotop.svg"/></a></p>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    //轮播自动播放
    $('#myCarousel').carousel({
        //自动4秒播放
        interval : 4000,
    });

    $(window).load(function () {
        $('.text').eq(0).css('margin-top', ($('.auto').eq(0).height() - $('.text').eq(0).height()) / 2 + 'px');
    });

    $(window).resize(function () {
        $('.text').eq(0).css('margin-top', ($('.auto').eq(0).height() - $('.text').eq(0).height()) / 2 + 'px');
    });

    $(window).load(function () {
        $('.text').eq(1).css('margin-top', ($('.auto').eq(1).height() - $('.text').eq(1).height()) / 2 + 'px');
    });

    $(window).resize(function () {
        $('.text').eq(1).css('margin-top', ($('.auto').eq(1).height() - $('.text').eq(1).height()) / 2 + 'px');
    });

</script>

<script>
    $(document).ready(function(){
        $(window).scroll( function() {               //滚动时触发
            var top = $(document).scrollTop();       //获取滚动条到顶部的垂直高度
            if(top > 100){                           //到一定高度显示
                var height = $(window).height();     //获得可视浏览器的高度
                $("#gotop").fadeIn(300).css({
                    top: height-80
                });
            }
            if(top < 100){                            //小于100消失
                $("#gotop").fadeOut(200);
            }
        });
        /*点击回到顶部*/
        $('#gotop').click(function(){
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });
    });
</script>


</body>
</html>
