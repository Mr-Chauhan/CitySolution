<footer>
        <!-- <div class="inner-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 f-about">
                        <a href="index.html">
                            <h1>City Solution</h1>
                        </a>
                        <p>We possess within us two minds. So far I have written only of the conscious mind. I would now like to introduce you to your second mind, the hidden and mysterious subconscious. Our subconscious mind contains such power.</p>

                    </div>
                    <div class="col-md-4 l-posts">
                        <h3 class="widgetheading">Latest Posts</h3>
                        <ul>
                            <li><a href="#">This is awesome post title</a></li>
                            <li><a href="#">Awesome features are awesome</a></li>
                            <li><a href="#">Create your own awesome website</a></li>
                            <li><a href="#">Wow, this is fourth post title</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 f-contact">
                        <h3 class="widgetheading">Stay in touch</h3>
                        <a href="#">
                            <p><i class="fa fa-envelope"></i> example@gmail.com</p>
                        </a>
                        <p><i class="fa fa-phone"></i> +345 578 59 45 416</p>
                        <p><i class="fa fa-home"></i> City Solution inc | PO Box 23456 Little Lonsdale St, New York <br> Victoria 8011 USA</p>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="last-div">
            <div class="container">
                <div class="row">
                    <center>
                    <div class="copyright">

                    copyright &copy; {{ now()->year }} City Solution  All Rights Reserved.
                     
                    </div>
                    </center>

                    <!-- <ul class="social-network">
                        <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
                        <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
                        <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
                        <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
                        <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/wow.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('front/js/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('front/js/fancybox/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('front/js/functions.js')}}"></script>
    <script>
        wow = new WOW({}).init();
    </script>
<script>
    $(document).ready(function(){
  $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});
</script>
</body>

</html>