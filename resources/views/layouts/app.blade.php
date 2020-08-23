<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color-switcher.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu_sideslide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Fonts -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
            <div class="container-fluid">          
              <a class="navbar-brand" href="index.html"><span class="lni-bulb"></span>ESSENCE</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="Services">Services</a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="Features">Features</a>
                  </li>                            
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="Contact">Contact Us</a>
                  </li>    
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="Blog">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ url('/register') }}">Register</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ url('/login') }}">Login</a>
                  </li> 
                </ul>              
              </div>
            </div>
          </nav> 
    

        <main class="py-4" style="margin-top:40px">
            @yield('content')
        </main>
    </div>
    <div class="container-fluid">
            <!-- Footer Section Start -->
    <footer>
        <!-- Footer Area Start -->
        <section class="footer-Content bg-dark text-white">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                <h3>Essence</h3>
                <div class="textwidget">
                  <p>If you think you have the passion, 
                  attitude and capability to join us 
                  the next big software company
                  s so that we can get the convers.</p>
                </div>
                <ul class="footer-social">
                  <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                  <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                </ul> 
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                <div class="widget">
                  <h3 class="block-title">Short Link</h3>
                  <ul class="menu">
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Advance Sarch</a></li>
                    <li><a href="#">Site Map</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                <div class="widget">
                  <h3 class="block-title">Contact Us</h3>
                  <ul class="contact-footer">
                    <li>
                      <strong>Address :</strong> <span>1900 Pico Blvd, New York br Centernial, colorado</span>
                    </li>
                    <li>
                      <strong>Phone :</strong> <span>+48 123 456 789</span>
                    </li>
                    <li>
                      <strong>E-mail :</strong> <span><a href="#">info@example.com</a></span>
                    </li>
                  </ul> 
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                <div class="widget">
                  <h3 class="block-title">Instagram</h3>
                  <ul class="instagram-footer">
                    <li><a href="#"><img src="img/instagram/insta1.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/instagram/insta2.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/instagram/insta3.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/instagram/insta4.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/instagram/insta5.jpg" alt=""></a></li>
                    <li><a href="#"><img src="img/instagram/insta6.jpg" alt=""></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Footer area End -->
        
        <!-- Copyright Start  -->
        <div id="copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="site-info float-left">
                  <p>Crafted by <a href="http://uideck.com" rel="nofollow">UIdeck</a></p>
                </div>              
                <div class="float-right">  
                  <ul class="nav nav-inline">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">About Prime</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">TOS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Return Policy</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Contact</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Copyright End -->
  
      </footer>
      <!-- Footer Section End --> 
    </div>
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/color-switcher.js') }}"></script>
<script src="{{ asset('js/jquery.mixitup.js') }}"></script>
<script src="{{ asset('js/nivo-lightbox.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>    
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>    
<script src="{{ asset('js/jquery.nav.js') }}"></script>    
<script src="{{ asset('js/scrolling-nav.js') }}"></script>    
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>     
<script src="{{ asset('js/wow.js') }}"></script> 
<script src="{{ asset('js/jquery.vide.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>    
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>    
<script src="{{ asset('js/waypoints.min.js') }}"></script>    
<script src="{{ asset('js/form-validator.min.js') }}"></script>
<script src="{{ asset('js/contact-form-script.js') }}"></script>   
<script src="{{ asset('js/main.js') }}"></script>  
</body>
</html>
