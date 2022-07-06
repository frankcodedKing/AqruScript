
 <html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="How to invest in bitcoin, Best bitcoin company, Bitcoin investment website, Bitcoin Wallet, Bitcoin plans, Crypto, Cryptocurrency, Where to use bitcoin, Btc, How to buy bitcoin, Ethereum, Return on Investment">
    <meta name="description" content="Acorns is a secure and leading bitcoin investment platform that makes it easy to invest in cryptocurrency like Bitcoin. We are based in the USA but available worldwide.">
    <meta name="robots" content= "index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Acorns - Invest, Earn, Grow, Spend | Acorns</title>
  
    <!-- CSS  -->
    {{-- {{asset('acorn/css/materialize.css')}} --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('acorn/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{asset('acorn/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{asset('acorn/slick/slick.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('acorn/slick/slick-theme.css')}}"/>
    <script src="https://kit.fontawesome.com/7904e50474.js" crossorigin="anonymous"></script>
    
    <!--Tidio-->

    <script src="//code.tidio.co/tpac1y4t3n45aiih3j5hdgc0aq76tbwd.js" async></script>
    
    {{-- popup --}}
    
    {{-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-1884add9-c4ec-4fc5-9a71-30d4030c5770"></div> --}}

    <!-- favicon  -->

  <link rel="apple-touch-icon" sizes="180x180" href="{{('acorn/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="https://sqy7rm.media.zestyio.com/logo-green.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="{{('acorn/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{('acorn/img/favicon/site.webmanifest')}}">
  </head>


  <body>
  
  
    <div class="navbar-fixed">
    <nav class="navbg" role="navigation">
      <div class="nav-wrapper container">
        <a  id="logo-container"  class="brand-logo hide-on-med-and-down" href="index" > <img src="{{asset('acorn/img/Oaklogo.png')}}"  alt="Oaklogo" height="40"  style="margin-top:12px"/></a>
        <a  id="logo-container"  class="brand-logo hide-on-large-only" href="index" > <img src="{{asset('acorn/img/Oaklogo.png')}}"  alt="Oaklogo" height="40"  style="margin-top:8px"/></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="{{route("index")}}" >Home</a></li>
          <li><a href="{{route("about")}}" >About us</a></li>
          <li><a href="{{route("contact")}}" >Contact us</a></li>
          <li><a href="{{route("whyus")}}" >Why us</a></li>
          <!--<li><a href="{{route("plan")}}" >Plans</a></li>-->
          <li><a href="{{route("careers")}}" >Careers</a></li>
          <li><a href="{{route("donate")}}" >Acorns Charity</a></li>
        {{-- guest if loggged in --}}

                
     <!--Show Logout for Logged in users-->
     @guest
     @if (Route::has('login'))
     <li><a href='{{route("login")}}' >Login</a></li>    
     @endif

     @if (Route::has('register'))
     <li><a href='{{route("register")}}'  class="registerBtn">Register</a></li>
     
     @endif
     @else
     
    
     <li>
         <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
     </li>
     <li>
       <a href="{{ route('userdashb') }}" class="registerBtn">Dashboard
           </a>
   </li>
   @endguest


<!-- {{-- end guest --}} -->
        </ul>
      <ul id="nav-mobile" class="side-nav sidenavBg">
        <li><a href="{{route("index")}}" >Home</a></li>
        <li><a href="{{route("about")}}" >About us</a></li>
        <li><a href="{{route("contact")}}" >Contact us</a></li>
        <li><a href="{{route("whyus")}}" >Why us</a></li>
          <!--<li><a href="{{route("plan")}}" >Plan</a></li>-->
          <li><a href="{{route("careers")}}" >Careers</a></li>
          <li><a href="{{route("donate")}}" >Acorns Charity</a></li>
      {{-- guest if loggged in --}}

              
   <!--Show Logout for Logged in users-->
   @guest
   @if (Route::has('login'))
   <li><a href='{{route("login")}}' >Login</a></li>    
   @endif

   @if (Route::has('register'))
   <li><a href='{{route("register")}}'  class="registerBtn">Register</a></li>
   
   @endif
   @else
   
  
   <li>
       <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form>
   </li>
   <li>
     <a href="{{ route('userdashb') }}" class="registerBtn">Dashboard
         </a>
 </li>
 @endguest
      </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse left"><i class="material-icons">menu</i></a>
      </div>
      </nav>
  </div>
  
  {{-- body here --}}

    @yield('body')

  {{-- body end --}}
  <footer class="page-footer footerbg">
      <div class="container">
        <div class="row">
          <div class="col-md-8" style="padding: 0px; margin:0%;">
            <p><b>Important Disclosures:  Investing involves risk, including loss of principal.</b>  Past performance does not guarantee or indicate future results.  Please consider, among other important factors, your investment objectives, risk tolerance and Acorns investment plans before investing.  <b>Diversification</b> and asset allocation do not guarantee a profit, nor do they eliminate the risk of loss of principal.  <b>It is not possible to invest directly in an index.</b>  Any <b>hypothetical performance</b> shown is for illustrative purposes only. Such results do not represent actual results and do not take into consideration economic or market factors which can impact performance. Actual clients may achieve investment results materially different from the results portrayed. <b>Round Up investments</b> are transferred from your linked funding source (Crypto wallet) to your Acorns corps account, where the funds are invested into a portfolio of selected Plan(s) or ETFs. Only purchases made with a funding source linked to your Acorns corps account with the feature active are eligible for Round Up investments.</br>Acorns does not charge transactional fees, commissions or maintenance fees based on assets for accounts under $1 million.</p>
        <p>Investors should consider the investment objectives, risks, charges and expenses of the funds carefully before investing.  This and other information are contained in the Fund’s prospectus.  Please read the prospectus carefully before you invest.</p>
  
          </div>
      <div class="col-md-4">
        <div class="row">
          <div class="col s4 m4">
            <span>LEGAL</span>
            <ul>
            <li><a href="cookie-policy" target="_blank">Cookies Policy</a></li>
            <li><a href="privacy-policy" target="_blank">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col s4 m4">
            <span >INFORMATIONS</span>
            <ul>
            <li><a href="about" target="_blank">About us</a></li>
            <li><a href="contact-us" >Contact us</a></li>
            <li><a href="why" target="_blank">Why us</a></li>
            <!--<li><a href="fees" target="_blank">Fees</a></li>-->
            <!--<li><a href="security" target="_blank">Security</a></li>-->
            </ul>
          </div>
          <div class="col s4 m4">
            <span >LEARN MORE</span>
            <ul>
            <li><a href="visacard" target="_blank">Acorns Visa Card</a></li>
            <li><a href="promotions" target="_blank">Promotions</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <p style="font-size:16px"><b>Connect with us on social media</b></p>
          <div class="col s2 m2">
            <a href="https://www.facebook.com/">
              <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
            </a>
          </div>
          <div class="col s2 m2">
            <a href="https://www.instagram.com/"> 
              <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
            </a>
          </div>
          <div class="col s2 m2">
            <a href="https://twitter.com"> 
              <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>	
          </div>
        </div>
      <div class="footer-copyright">
        <div class="container center"> 
      &copy 2021 Acorns
        </div>
      </div>
    </footer><div class="cookie-panel" style="display: none">
    <div class="cookie-panel__content">
      <div class="cookie-panel__text">
        We use cookies to ensure you get the best experience on our website (see &nbsp;<a href="privacy-policy" target="_blank">Privacy policy</a> &amp; <a href="cookie-policy" target="_blank">Cookies policy</a>).
      </div>
      <div class="cookie-panel__close   registerBtn">Agree</div>
    </div>
  </div>


 
  {{-- <!--  Scripts--> --}}
    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="{{asset('acorn/js/jquery.countup.js')}}"></script>
  <script src="{{asset('acorn/js/jquery.waypoints.js')}}"></script>
  <script type="text/javascript" src="{{asset('acorn/slick/slick.min.js')}}"></script>
    <script src="{{asset('acorn/js/materialize.js')}}"></script>
    <script src="{{asset('acorn/js/secondinit.js')}}"></script>
  <script>
  
    AOS.init();
  
  $('.counter').countUp({
    'time': 4000,
    'delay': 20
  });
  
    if(localStorage.getItem('OakcookieSeen') != 'Oakshown'){
      $(".cookie-panel").delay(2000).fadeIn();
      
  }
  
  $('.cookie-panel__close').click(function(e) {
    localStorage.setItem('OakcookieSeen','Oakshown')
    $('.cookie-panel').fadeOut(); 
  });
  
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
  
  
  $(document).ready(function(){
      $('.modal').modal();
    });
  </script>
  <script type="text/javascript">
      (function () {
          var options = {
              whatsapp: "+13107431416", // WhatsApp number
              call_to_action: "Message us", // Call to action
              position: "right", // Position may be 'right' or 'left'
          };
          var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
          var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
          s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
          var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
      })();
  </script>
    </body>
  </html>
  


  