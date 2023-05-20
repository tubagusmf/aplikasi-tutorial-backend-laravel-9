
   <footer>
    <!-- Footer Start-->
    
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area footer-bg" style="background-color: #fd7e14">
        <div class="container">
            <div class="footer-border">
                 <div class="row d-flex align-items-center">
                     <div class="col-xl-12 ">
                         <div class="footer-copy-right text-center">
                             <p style="color: #fff"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> By Tubagus 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

 <!-- JS here -->
 
     <!-- All JS Custom Plugins Link Here here -->
     <script src="{{ asset('assets/template') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
     <!-- Jquery, Popper, Bootstrap -->
     <script src="{{ asset('assets/template') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/popper.min.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/bootstrap.min.js"></script>
     <!-- Jquery Mobile Menu -->
     <script src="{{ asset('assets/template') }}/assets/js/jquery.slicknav.min.js"></script>

     <!-- Jquery Slick , Owl-Carousel Plugins -->
     <script src="{{ asset('assets/template') }}/assets/js/owl.carousel.min.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/slick.min.js"></script>
     <!-- Date Picker -->
     <script src="{{ asset('assets/template') }}/assets/js/gijgo.min.js"></script>
     <!-- One Page, Animated-HeadLin -->
     <script src="{{ asset('assets/template') }}/assets/js/wow.min.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/animated.headline.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/jquery.magnific-popup.js"></script>

     <!-- Scrollup, nice-select, sticky -->
     <script src="{{ asset('assets/template') }}/assets/js/jquery.scrollUp.min.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/jquery.nice-select.min.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/jquery.sticky.js"></script>
     
     <!-- contact js -->
     <script src="{{ asset('assets/template') }}/assets/js/contact.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/jquery.form.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/jquery.validate.min.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/mail-script.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/jquery.ajaxchimp.min.js"></script>
     
     <!-- Jquery Plugins, main Jquery -->	
     <script src="{{ asset('assets/template') }}/assets/js/plugins.js"></script>
     <script src="{{ asset('assets/template') }}/assets/js/main.js"></script>

    <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>
     
 </body>
</html>