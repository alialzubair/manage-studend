
<?php 
include 'include/header.php'; ?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <title>Student Assistance System (SAS)</title>
    <!--meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="This is a eductinal website amied to help students in AOU" />
    <!-- used to discribe the website-->
    <script>
      addEventListener("load", function () {
      	setTimeout(hideURLbar, 0);
      }, false);
      
      function hideURLbar() {
      	window.scrollTo(0, 1);
      }
    </script>
    <!--//meta tags ends here-->
    <!--booststrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <!--//booststrap end-->
    <!-- font-awesome icons -->
     <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
    <!-- //font-awesome icons -->
    <link href="css/blast.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style10.css" />
    <!--stylesheets-->
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//stylesheets-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Merriweather:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
 <body>
     <!--------------------------------------------------------------------------------------->
    <div class="blast-box">
    <div class="blast-icon"><span class="fas fa-tint"></span></div>
    <div class="blast-frame">
        <p>change colors</p>
        <div class="blast-colors">
          <div class="blast-color">#86bc42</div>
          <div class="blast-color">#8373ce</div>
          <div class="blast-color">#14d4f4</div>
          <div class="blast-color">#72284b</div>
        </div>
        <p class="blast-custom-colors">Custom colors</p>
        <input type="color" name="blastCustomColor" value="#cf2626">
      </div>
</div>
       <!--------------------------------------------------------------------------------------->
      
     <div class="header-outs" id="header">
      <div class="header-w3layouts">
        <div class="container">
          <div class="row headder-contact">
            <div class="col-lg-6 col-md-7 col-sm-9 info-contact-agile">
              <ul>
                <li>
                  <span class="fa fa-key" ></span>
                  <p><a href="login/login-type.php">login</a></p>
                </li>
                <li>
                  <span class="fa fa-lock"></span>
                  <p><a href="login/choose.php">Rigister</a></p>
                </li>
                <li>
                </li>
              </ul>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-3 icons px-0">
              <ul>
                <li><a href="https://www.facebook.com/ArabOpenUniversity.Ksa/" target="_blank">
                    <span class="fab fa-facebook-f"></span></a></li>
                  <li><a href="mailto:aoujed@aou.edu.sa" target="_blank"><span class="fas fa-envelope">
                    </span></a></li>
                  <li><a href="https://twitter.com/aoujed" target="_blank"><span class="fab fa-twitter"></span></a></li>
                  <li><a href="https://www.snapchat.com/add/aoujed" target="_blank"><span class="fab fa-snapchat"></span></a></li>
             </ul>
            </div>
          </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            
          <!-- <img src="images/Arab_Open_University_Logo.jpg" width="120" height="100" class="c1"  class="rounded float-right" class="img-fluid" class="img-thumbnail"style="margin-left:0%;margin-right:0%; padding-right:50px; padding-left:0px; ">-->
        
          <div class="hedder-up">
         <h1 ><a href="index.php" class="navbar-brand" data-blast="color">SAS</a></h1>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="headdser-nav-color" data-blast="bgColor">
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a href="#about" class="nav-link scroll" >About</a>
                </li>
                <li class="nav-item">
                  <a href="#service" class="nav-link scroll">Services</a>
                </li>
                <li class="nav-item">
                  <a href="#galary" class="nav-link scroll">Galary</a>
                </li>
                <li class="nav-item">
                  <a href="#contact" class="nav-link scroll">Contact</a>
                </li>
              </ul>
            </div>
          </div>
            <!--<img src="images/logo.png" width="100" height="100" class="c1"  class="rounded float-left" class="img-fluid" class="img-thumbnail" style="margin-left:0%;margin-left:0%; padding-left:50px; padding-left:30px; ">-->
           </nav>
        <!--//navigation section -->
        <div class="clearfix"> </div>
      </div>
      <!--banner -->
      <!-- Slideshow 4 -->
         <div class="slider">
        <div class="callbacks_container">
          <ul class="rslides" id="slider4">
            <li>
              <div class="slider-img one-img">
                <div class="container">
                  <div class="slider-info text-left">
                    <h5 >Student Assistance System</h5>
                    <div class="outs_more-buttn" >
                      <a href="#" data-toggle="modal" data-target="#exampleModalLive" data-blast="bgColor">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="slider-img two-img">
                <div class="container">
                  <div class="slider-info text-left">
                  <h5 >Student Assistance System</h5>
                    <div class="outs_more-buttn">
                      <a href="#" data-toggle="modal" data-target="#exampleModalLive" data-blast="bgColor">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="slider-img three-img">
                <div class="container">
                  <div class="slider-info text-left">
                  <h5 >Student Assistance System</h5>
                    <div class="outs_more-buttn">
                      <a href="#" data-toggle="modal" data-target="#exampleModalLive" data-blast="bgColor">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- This is here just to demonstrate the callbacks -->
        <!-- <ul class="events">
          <li>Example 4 callback events</li>
          </ul>-->
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- //banner -->
    <!--about-->
      
  <section class="about" id="about">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <!--Horizontal Tab-->
        <div id="horizontalTab">
          <ul class="resp-tabs-list justify-content-center">
            <li data-blast="bgColor">Arab Open University</li>
            <li data-blast="bgColor">Student Assistance System</li>
            <li data-blast="bgColor">Student Union</li>
          </ul>
          <div class="resp-tabs-container">
            <div class="tab1" >
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h4 class="mb-3" data-blast="color"> Who we are </h4>
                    <p>The Arab Open University seeks to facilitate its services to students and harness all of its potentials to their convenience, then reach to highest levels of excellence and creativity.</p>
                   <!-- <h5 data-blast="color"> Who we are</h5>-->
                  </div>
                </div>
                <div class="col-md-5 about-txt-img">
                  <img src="../web/images/hhh.jpg" class="img-thumbnail" alt="">
                </div>
              </div>
            </div>
            <div class="tab2">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="../web/images/logo.png" class="img-thumbnail" alt="" width="50%">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h4 class="mb-3" data-blast="color"> Who we are</h4>
                    <p>In line with the University's principal in student service and facilities to them, the student assistance system has been designed to conform to this vision and the seeking to achieve the desired goals</p>
                    <!--<h5 data-blast="color"></h5>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="tab3">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h4 class="mb-3" data-blast="color">Who we are</h4>
                    <p>As a result of the alliance and cooperation between the university and the students, the so-called Student Union Council was established, which seeks to consolidate the principles of cooperation and interaction between the university and the students</p>
                   <!-- <h5 data-blast="color">Who we are</h5>-->
                  </div>
                </div>
                <div class="col-md-5 about-txt-img">
                  <img src="../web/images/download.jpg" class="img-thumbnail" alt="">
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
    
    <!--//about-->
    <!--service-->
    <section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title clr text-center mb-lg-5 mb-md-4  mb-sm-4 mb-3">services</h3>
        <div class="row">
          <div class="col-sm-6 w3layouts-service-list text-center">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-book banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
               <a href="../web/login/booking/booking-info.php"><h4 class="my-3"> Booking</h4></a>
                <p>Electronic Reservation System </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 w3layouts-service-list text-center ">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-address-book banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
               <a href="../web/login/appointments/gender.php"> <h4 class="my-3">Appointments</h4></a>
                <p>Electronic Appointments System </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 w3layouts-service-list text-center mt-md-4 mt-sm-3 mt-3">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-graduation-cap banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                  <a href="../web/club/index.php">
                      <h4 class="my-3">Students Union </h4></a>
                <p>Clubs,vision,and events</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 w3layouts-service-list text-center mt-md-4 mt-sm-3 mt-3">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-pencil-alt banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                   <a href="../web/servey/index.php">
                    <h4 class="my-3">Questionnaires</h4></a>
                <p>Electronic Questionnaire System</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//service-->
    <!--blog -->
    <section class="blog py-lg-4 py-md-3 py-sm-3 py-3" id="galary">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Our Activites </h3>
        <div class="row">
         <div class="col-lg-4 col-md-6 col-sm-6 blog-grid-flex">
            <div class="clients-color">
              <img src="../web/images/jeddah.png"  class="img-fluid" alt="">
              <div class="blog-txt-info">
                <h4 class="mt-2"><a href="#" data-toggle="modal" data-target="#exampleModalLive" data-blast="color">Jeddah International Book Fair </a></h4>
                <div class="news-date my-3">
                
                </div>
                <p> بالتعاون من نادي الاعمال ولجنة رُشد، أقيمت رحلة لطالبات الجامعة العربية المفتوحة فرع جدة إلى معرض جدة الدولي للكتاب
                  </p>
              
              </div>
            </div>
          </div>
                   <div class="col-lg-4 col-md-6 col-sm-6 blog-grid-flex">
            <div class="clients-color">
              <img src="../web/images/ccccc.png"   alt="" height="190" width="100%">
              <div class="blog-txt-info">
                <h4 class="mt-2"><a href="#" data-toggle="modal" data-target="#exampleModalLive" data-blast="color">عبير ألوان الخير في مجتمعنا </a></h4>
                <div class="news-date my-3">
                  <ul>
                    
                  </ul>
                </div> 
                <p>
                         
                    إحدى اللحظات الجميلة التي عاشتها مجموعة من الطالبات المتطوعات من الجامعة العربية المفتوحة
                    كانت "رحلة الأربطة" رحلة قادتهم إلى تجربةٍ فريدة
                </p>
               
              </div>
            </div>
          </div>
              <div class="col-lg-4 col-md-6 col-sm-6  blog-grid-flex">
            <div class="clients-color">
              <img src="../web/images/Screenshot_2.png" class="img-fluid" alt="">
              <div class="blog-txt-info">
                <h4 class="mt-2"><a href="#" data-toggle="modal" data-target="#exampleModalLive" data-blast="color">Jeddah Flutter </a></h4>
                <div class="news-date my-3">
                
                </div>
                <p>
                     أقام نادي الروبوت والذكاء الإصطناعي في الجامعة العربية المفتوحة
                     فعالية خاصة لتقنية فلاتر، حيث تم عرض البث المباشر لإعلان نجاح وجوائز فلاتر               
                  
                  </p>

              </div>
            </div>
          </div>
      </div>
      </div>
    </section>

    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="contact">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3" style="margin-right:380px;">Contact Us</h3>
        <div class="row">
          <div class="col-md-5 address-grid">
      
          </div>
          <div class="col-md-7 contact-form" style="margin-right:10px;">
            <form action="#" method="post">
              <div class="row text-center contact-wls-detail">
                <div class="col-md-6 form-group contact-forms">
                  <input type="text" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group contact-forms">
                  <input type="email" class="form-control" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group contact-forms">
                <input type="text" class="form-control" placeholder="Subject" required="">
              </div>
              <div class="form-group contact-forms">
                <textarea class="form-control" rows="3" placeholder="Your Message" required=""></textarea>
              </div>
              <div class="sent-butnn text-center">
                <button type="submit" class="btn btn-block" data-blast="bgColor">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--//contact -->
     
    <!--footer--> 
     <?php
     include_once("include/footer.php");
     ?>
     
    <?php
     include_once("include/sliedshow.php");
     ?>
     
  </body>
</html>