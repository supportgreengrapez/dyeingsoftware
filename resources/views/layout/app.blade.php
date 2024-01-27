<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="description" content="Dyeing Software is a Bilty Record Keeping Cloud Software which aims to help its users maintain their outgoing and incoming shipments with different customers and suppliers. You can Add, manage, download and delete your bilty records instantly. All the data that you enter on the platform is 100% secure and you do not need to worry about any data theft or data sharing with any 3rd party." />
<meta name="keywords" content="Record Keeping ,Cloud Software,Bilty Software" />
<meta name="author" content="Bilty Books">
<link rel="shortcut icon" href="{{url('/')}}/img/favicon.png"/>
<title>Dyieng Software</title>
<!-- Bootstrap CSS -->
<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">

<!-- Fontawesome CSS -->
<link href="{{url('/')}}/css/font-awesome.min.css" rel="stylesheet">

<!-- Google Font -->
<!-- Main css -->
<link rel="stylesheet" href="{{url('/')}}/css/style.css">
<link rel="stylesheet" href="{{url('/')}}/css/utill.css">
<link rel="stylesheet" href="{{url('/')}}/css/mainn.css">
<!-- Responsive css -->
<link rel="stylesheet" href="{{url('/')}}/css/responsive.css">
<link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Carter+One" rel="stylesheet">
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us17.list-manage.com","uuid":"cac31add28291dd988b90fba2","lid":"857af2412d","uniqueMethods":true}) })</script>
</head><body>
<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
          <div class="text-left">
            <ul class="top-social">
              <li><a href="https://www.facebook.com/Dyeing Software" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.instagram.com/Dyeing Software/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://www.linkedin.com/Dyeing Software/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        <div class=" col-lg-6 col-md-6  col-sm-12 col-xs-12 ">
          <div class="social-list">
            <ul class="top-contacts">
              <li><a href="https://mail.google.com/mail/u/0/#inbox"><i class="fa fa-envelope"></i> info@dyeingsoftware.com</a></li>
              <li><a class="mobilesOnly"  href="tel:+923008481078"> <i class="fa fa-phone"></i> +92 (300) 848-1078</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm1-12">
        <div class="logoimg"> <a href="{{url('/')}}/">Dyeing Software</a> </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm1-12 pull-right">
        <div class="logbox pull-right">
          <ul class="unstyled-list list-inline ">
            @if(session()->has('username'))
            <li><a href="{{url('/')}}/logout" class="btn btn-default btnn">Log out <i class="fa fa-key"></i></a></li>
            @else
            <li><a href="{{url('/')}}/login" class="btn btn-default btnn">LOGIN <i class="fa fa-key"></i></a></li>
            <li><a href="{{url('/')}}/register"  class="btn btn-default btnn">REGISTER <i class="fa fa-user"></i></a></li>
            @endif
            <div class="clearfix"> </div>
          </ul>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm1-12 pull-right">
        <div class="logbox pull-right">
          <ul class="unstyled-list list-inline pull-right">
            <li>
              <div class="input-group stylish-input-group "> </div>
            </li>
            <div class="clearfix"> </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default selfnav">
    <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse cust" id="navbar-collapse-1">
        <ul class="nav navbar-nav custul navbar-right">
          @if(session()->has('username'))
          <li><a href="{{url('/')}}/dashboard">Dashboard</a></li>
          @else
          <li><a href="{{url('/')}}/">Home</a></li>
          <li><a href="{{url('/')}}/how-it-works">How it works</a></li>
          <li><a href="{{url('/')}}/pricing-and-plan">Pricing and Plans</a></li>
          <li><a href="{{url('/')}}/contact-us">Contact Us</a></li>
          @endif
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container --> 
  </nav>
  <!-- /.navbar --> 
  
</header>
<!--header--> 
@yield('content'); 

<!--footer-->
<footer class="footer1">
  <div class="container">
    <div class="row"><!-- row -->
      
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="footer">
          <h4>NewsLetter</h4>
          <div class="form-group">
            <div class="cols-sm-10">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
              </div>
            </div>
          </div>
          <div class="footer-img"> <img src="img/123.png"  alt="logo"> </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="footer">
          <h4>Information</h4>
          <div class="form-group">
            <div class="cols-sm-10">
              <ul class="list-unstyled clear-margins">
                <!-- widgets -->
                
                <li class="widget-container widget_nav_menu"><!-- widgets list -->
                  <ul>
                    <li><a  href="{{url('/')}}/about-us"><i class="fa fa-angle-right"></i> About Us</a></li>
                    <li><a  href="{{url('/')}}/term-and-conditions"><i class="fa fa-angle-right"></i> Terms & Conditions</a></li>
                    <li><a  href="{{url('/')}}/contact-us"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                    <li><a  href="{{url('/')}}/Faq"><i class="fa fa-angle-right"></i> FAQ</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <!-- widgets column left end -->
      
      <div class="col-lg-3 col-md-3"><!-- widgets column left -->
        <div class="footer">
          <h4>Personal Account</h4>
          <div class="form-group">
            <div class="cols-sm-10">
              <ul class="list-unstyled clear-margins">
                <!-- widgets -->
                
                <li class="widget-container widget_nav_menu"><!-- widgets list -->
                  <ul>
                    <li><a  href="{{url('/')}}/login"><i class="fa fa-angle-right"></i> My Account</a></li>
                    <li><a  href="{{url('/')}}/login"><i class="fa fa-angle-right"></i> My Order</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- widgets column left end --> 
      
      <!-- widgets column left end -->
      
      <div class="col-lg-3 col-md-3"><!-- widgets column center -->
        <div class="footer">
          <h4>Get in Touch</h4>
          <div class="form-group">
            <div class="cols-sm-10">
              <ul class="list-unstyled clear-margins">
                <!-- widgets -->
                
                <li class="widget-container widget_nav_menu"><!-- widgets list -->
                  <ul class="list-unstyled clear-margins">
                    <!-- widgets -->
                    
                    <li class="widget-container widget_recent_news"><!-- widgets list -->
                      
                      <div class="footerp">
                        <p style="color:white;"><b>Email Id:</b> <a href="https://mail.google.com/mail/u/0/#inbox"  target="_blank">info@Dyeing Software.com</a></p>
                        <a class="mobilesOnly"  href="tel:+92 (300) 848-1078">
                        <p style="color:white;"><b>Phone Numbers</b>: +92 (300) 848-1078 </p>
                        </a>
                        <p style="color:white;"><b>King Fabrics fair line silk factory katar band road toker niaz beig off Multan road street no 2 lahore</b></p>
                        <div id="google_translate_element"></div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4"> </div>
      <div class="col-lg-8">
        <ul class="social-network social-circle pull-center">
          <li><a href="https://www.facebook.com/Dyeing Software" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.instagram.com/Dyeing Software/" target="_blank" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="leftbar">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <p>Copyright © 2020-2021 Bilty Books. All rights reserved.</p>
              <p>Powered By : <a href="https://greengrapez.com/" target="_blank"><img src="img/logo1.png" alt="logo" style="max-width:70px;"></a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 hidden-xs">
        <div class="rightbar">
          <ul class="list-inline">
            <li><a href="{{url('/')}}/">Home</a></li>
            <li><a href="{{url('/')}}/how-it-works">How it works</a></li>
            <li><a href="{{url('/')}}/pricing-and-plan">Pricing and Plans</a></li>
            <li><a href="{{url('/')}}/contact-us">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--footer--> 
<script  src="{{url('/')}}/js/jquery.min.js"></script> 
<script src="{{url('/')}}/js/bootstrap.min.js"></script> 
<script>
      
      
      function show1(){
document.getElementById('div2').style.display ='block';
document.getElementById('div1').style.display = 'none';
}
function show2(){
document.getElementById('div1').style.display = 'block';
document.getElementById('div2').style.display = 'none';
}
  </script> 
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script> 
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
<!-- WhatsHelp.io widget --> 
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+92 (300) 848-1078", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script> 
<!-- /WhatsHelp.io widget -->

</body>
</html>