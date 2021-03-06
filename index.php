<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="college, campus, university, courses, school, educational">
    <meta name="description" content="PMSA - College, University and campus template">
    <meta name="author" content="Ansonika">
    <title>PMSA - College, University and campus template - SHARED ON THEMELOCK.COM</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="home/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="home/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="home/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="home/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="home/img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="home/css/base.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
	<link href="home/layerslider/css/layerslider.css" rel="stylesheet">
    <link href="home/css/tabs.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="home/js/html5shiv.min.js"></script>
      <script src="home/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- PHP Starts Here -->
<?php 
session_start();
    require_once "connection/connection.php"; 
    $message="Email Or Password Does Not Match";
    
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=md5($_POST["password"]);

        $query="select * from login where user_id='$username' and Password='$password' ";
        $result=mysqli_query($con,$query);
        //print_r($query);die();
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["Role"]=="Admin")
                {
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: admin/admin-index.php');
                }
                else if ($row["Role"]=="Teacher" and $row["account"]=="Activate")
                {
                    $_SESSION['LoginTeacher']=$row["user_id"];
                    header('Location: teacher/teacher-index.php');
                }
                else if ($row["Role"]=="Student" and $row["account"]=="Activate")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: student/student-index.php');
                }
            }
        }
        else
        { 
            header("Location: index.php");
        }
    }
?>


<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

<div id="preloader">
	<div class="pulse"></div>
</div><!-- Pulse Preloader -->

    <header>
		<a id="logo" href="index.html"><img src="home/img/logo.png" width="125" height="40" alt="PMSA" data-retina="true"></a>
		<nav id="top-nav">
			<ul>
				<li><a href="tour.html">Tour</a></li>
                <?php if(empty($_SESSION)){ ?>
                    <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
                <?php }else{ 

                    if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "")
                        $link = 'admin/admin-index.php';
                    else if (isset($_SESSION['LoginTeacher']) && $_SESSION['LoginTeacher'] != "")
                        $link = 'teacher/teacher-index.php';
                    else if (isset($_SESSION['LoginStudent']))
                        $link = 'student/student-index.php';
                    
                    ?>
                    <li><a href="<?=$link ?>" >Dashboard</a></li>
                    <li><a href="login/logout.php" >Logout</a></li>
                <?php } ?>
			</ul>
		</nav>

		<!-- <a id="menu-trigger" href="#"><span class="menu-trigger-text">Menu</span><span class="menu-trigger-icon"></span></a> -->
	</header> <!-- End Header -->
    
    <nav id="side-nav">
		<ul class="side-nav-menu">    
         <li class="item-has-children">
				<a href="#">Home</a>
				<ul class="sub-menu">
					<li><a href="index.html">Home Layer slider</a></li>
                    <li><a href="index_2.html">Home Video</a></li>
					<li><a href="index_3.html">Home version 2</a></li>
                    <li><a href="index_4.html">Home version 3</a></li>
                    <li><a href="index_5.html">Home quick contact</a></li>
				</ul>
			</li> <!-- item-has-children -->        
            <li class="item-has-children">
				<a href="#">Academics</a>
				<ul class="sub-menu">
					<li><a href="diploma.html">Diploma courses</a></li>
                    <li><a href="graduate.html">Graduate courses</a></li>
					<li><a href="master.html">Master courses</a></li>
                    <li><a href="apply_online.html">Apply online</a></li>
                    <li><a href="staff.html">Staff</a></li>
				</ul>
			</li> <!-- item-has-children -->
			<li class="item-has-children">
				<a href="#">About</a>
				<ul class="sub-menu">
					<li><a href="about.html">About us</a></li>
                    <li><a href="contacts.html">Plan a visit</a></li>
					<li><a href="staff.html">Staff</a></li>
					<li><a href="gallery.html">Gallery</a></li>
				</ul>
			</li> <!-- item-has-children -->
            <li>
            <li class="item-has-children">
				<a href="#">Elements &amp; pages</a>
				<ul class="sub-menu">
					<li><a href="icon-pack-1.html">Icon pack 1</a></li>
					<li><a href="icon-pack-2.html">Icon pack 2</a></li>
					<li><a href="icon-pack-3.html">Icon pack 3</a></li>
                    <li><a href="icon-pack-4.html">Icon pack 4</a></li>
                    <li><a href="agenda_calendar.html">Agenda calendar</a></li>
                    <li><a href="shortcodes.html">Shortcodes</a></li>
                    <li><a href="site_launch/index.html">Site launch/Coming soon</a></li>
				</ul>
			</li> <!-- item-has-children -->
            <li>
            <ul class="side-nav-menu single-item-wp">
                <li><a href="tour.html">Tour</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contacts.html">Contacts</a></li>
            </ul> <!--single-item-wp -->
            <ul class="side-nav-menu single-item-wp">
                <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
                <li><a href="#"  data-toggle="modal" data-target="#register">Register</a></li>
                <li class="hidden-lg hidden-md"><a href="#search">Search</a></li>
                <li><a href="#0">Terms &amp; Conditions</a></li>
            </ul> <!--single-item-wp -->
            </li>
        </ul> <!-- side-nav-menu -->
		<div id="social">
            <ul>
               <li><a href="#"><i class="icon-facebook"></i></a></li>
               <li><a href="#"><i class="icon-twitter"></i></a></li>
               <li><a href="#"><i class="icon-google"></i></a></li>
               <li><a href="#"><i class="icon-linkedin"></i></a></li>
           </ul>
       </div>
	</nav><!--End nav-->
    
	<div class="main-wrapper">

	<div id="full-slider-wrapper">
    <div id="layerslider" style="width:100%;height:650px;">
        <!-- first slide -->
        <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
            <img src="home/img/slides/slide_1.jpg" class="ls-bg" alt="Slide background">
        	<h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" >PMSA <strong>Excellence</strong> in teaching</h3>
            
            <p class="ls-l" style="top:62%; left:50%;" data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;" ><a href="tour.html" class="button_intro">Take a tour</a> 
       </div>
       
        <!-- second slide -->
    <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
            <img  src="home/img/slides/slide_2.jpg" class="ls-bg" alt="Slide background">
        	<h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" >PMSA <strong>Qualified</strong> teachers</h3>
            
            <p class="ls-l" style="top:65%; left:50%;" data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;" ><a href="tour.html" class="button_intro">Take a tour</a> 
    </div>
    
     <!-- third slide -->
     <div class="ls-slide" data-ls="slidedelay:5000; transition2d:5;" >
             <img src="home/img/slides/slide_3.jpg" class="ls-bg" alt="Slide background">
        	<h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" ><strong>Great</strong> students community</h3>
            
            <p class="ls-l" style="top:65%; left:50%;" data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;" ><a href="tour.html" class="button_intro">Take a tour</a> 
    </div>
      
    <!-- fourth slide -->
    <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
        <img src="home/img/slides/slide_4.jpg" class="ls-bg" alt="Slide background">
        	<h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" ><strong>Well equiped</strong> classrooms</h3>
            
            <p class="ls-l" style="top:65%; left:50%;" data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;"><a href="tour.html" class="button_intro">Take a tour</a> 
    </div>
 
    </div>
    </div><!-- End layerslider -->
    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
        	<div class="col-md-4 col-sm-4">
            	 <div class="home_feat_1_box">
                        <a href="#">
                        <img src="home/img/home_feat_1_1.jpg" class="img-responsive" alt="">
                        <div class="short_info"><h3>Plan a visit</h3><i class="arrow_carrot-right_alt2"></i></div>
                        </a>
                    </div>
            </div>
            <div class="col-md-4 col-sm-4">
           <div class="home_feat_1_box">
                        <a href="#">
                        <img src="home/img/home_feat_1_2.jpg" class="img-responsive" alt="">
                        <div class="short_info"><h3>Study Programs</h3><i class="arrow_carrot-right_alt2"></i></div>
                        </a>
                    </div>
            </div>
            <div class="col-md-4 col-sm-4">
           <div class="home_feat_1_box">
                        <a href="#">
                        <img src="home/img/home_feat_1_3.jpg" class="img-responsive" alt="">
                        <div class="short_info"><h3>Admissions</h3><i class="arrow_carrot-right_alt2"></i></div>
                        </a>
                    </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    <div class="container margin_60">
    <div class="main_title">
    <h2>PMSA </h2>
    <p>PMSA Pookoya Thangal Memorial Arts and Science College was started during the academic year 2003 -2004 by Villoor Educational and Charitable Trust. The College was named after Pookoya Thangal who was a great Islamic scholar and orator, who dedicated his life to uplift the poor and downtrodden masses of Malabar. He was also a great political leader and President of Indian Union Muslim League. PMSA Pookoya Thangal Memorial Arts and Science College is affiliated to the University of Kerala with the objective of offering university level education in emerging areas of Science, Technology, Commerce and Management and build up the vital infrastructure for the aspirants of higher education especially from the weaker and minority sections of the society.</p>
    </div>
    	
       
        <hr class="more_margin">
        
        <div class="row add_bottom_60 d-none" style="display: none;">
            <div class="main_title">
            <h2>PMSA focus on these ....</h2>
            </div>
        	<div class="col-md-6 col-md-offset-3">
            <div id="graph">
            <img src="home/img/graphic.jpg" class="wow zoomIn" data-wow-delay="0.1s" alt="">
            	<div class="features step_1 wow zoomIn" data-wow-delay="1s">
            	<h4><strong>01.</strong> Students growth</h4>
                </div>
                <div class="features step_2 wow zoomIn" data-wow-delay="1.5s">
                <h4><strong>02.</strong> Best learning practice</h4>
                </div>
                <div class="features step_3 wow zoomIn" data-wow-delay="2s">
                <h4><strong>03.</strong> Focus on targets</h4>
                </div>
                <div class="features step_4 wow zoomIn" data-wow-delay="2.5s">
                <h4><strong>04.</strong> Interdisciplanary model</h4>
                </div>
                </div>
                </div>
            </div><!-- End row -->
           	<div class="text-center"><a href="tour.html" class=" button_outline large">Take a tour of PMSA</a></div>
    </div><!-- End container -->
    
 	<div class="bg_content testimonials d-none"  style="display: none;">
              <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol><!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <p>
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.
                                    </p>
                                </blockquote>
                               <small><img class="img-circle" src="home/img/testimonial_1.jpg" alt="">Stefany</small>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <p>
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.
                                    </p>
                                </blockquote>
                                 <small><img class="img-circle" src="home/img/testimonial_2.jpg" alt="">Karla</small>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <p>
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.
                                    </p>
                                </blockquote>
                                <small><img class="img-circle" src="home/img/testimonial_1.jpg" alt="">Maira</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End bg_content -->
    
    <div class="container margin_60">
          <div class="main_title">
    <h2>Latest from PMSA ....</h2>
    </div>
    <div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-courses"><span>Courses</span></a></li>
						<li><a href="#section-2" class="icon-news"><span>News and Events</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
						<div class="row list_courses_tabs">
                        	
                            <div class="col-md-6 col-sm-6">
                             <h2>Graduate Courses</h2>
							<ul>
                            	<li>
                                <div><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                           	    <h3><strong>Bachelor of Business Administration </strong>(BBA)</h3></a></div>
                                </li>
                                <li>
                                <div><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                           	    <h3><strong>Bachelor in Computer Applications </strong>(BCA)</h3></a></div>
                                </li>
                                <li>
                                <div><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                           	    <h3><strong>Bachelor of Science in Computer Science </strong>(BSc)</h3></a></div>
                                </li>
                                <li>
                                <div><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                           	    <h3><strong>Bachelor of Commerce in Computers Application </strong>(B.Com)</h3></a></div>
                                </li>
                                <li>
                                <div><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                           	    <h3><strong>Bachelor of Science in Biochemistry & Industrial Microbiology </strong>(BSc)</h3></a></div>
                                </li>  
                                <li>
                                <div><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                                <h3><strong>Bachelor of Commerce in Co-Operation  </strong>(B.Com Co-operation)</h3></a></div>
                                </li>                            
                            </ul>
                            </div>
                            <div class="col-md-6 col-sm-6">
                             <h2>Master Courses</h2>
							<ul>
                            	<li><div><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                           	    <h3><strong>Masters of Commerce in Finance</strong> (M.Com)</h3></a></div>
                                </li>
                                <li><div style="display: none;"><a href="#"><figure><img src="home/img/course_1_thumb.jpg" alt="" class="img-rounded"></figure>
                           	    <h3><strong>Digital media</strong> master</h3></a></div>
                                </li>
                                
                            </ul>
                            </div>
                        </div>
					</section>
					<section id="section-2">
						<div class="row list_news_tabs">
                        	<div class="col-md-4 col-sm-4">
                            <p><a href="#0"><img src="home/img/news_1_thumb.jpg" alt="" class="img-responsive"></a></p>
                                  <span class="date_published">On 17 December 2021</span>
							<h3><a href="#0">Careers </a></h3>
                            <p>Lorem ipsum dolor sit amet, ei tincidunt persequeris efficiantur vel, usu animal patrioque omittantur et. Timeam nostrud platonem nec ea, simul nihil delectus has ex. </p>
                            <a href="#0" class="button small">Read more</a>
                            </div>
                            <div class="col-md-4 col-sm-4">
                            <p><a href="#0"><img src="home/img/news_2_thumb.jpg" alt="" class="img-responsive"></a></p>
                                  <span class="date_published">On 14 February 2022</span>
							<h3><a href="#0">Green Campus</a></h3>
                            <p>Lorem ipsum dolor sit amet, ei tincidunt persequeris efficiantur vel, usu animal patrioque omittantur et. Timeam nostrud platonem nec ea, simul nihil delectus has ex. </p>
                            <a href="#0" class="button small">Read more</a>
                            </div>
                            <div class="col-md-4 col-sm-4">
                            <p><a href="#0"><img src="home/img/news_3_thumb.jpg" alt="" class="img-responsive"></a></p>
                                  <span class="date_published">On 1 January 2022</span>
							<h3><a href="#0">Admissions 2022</a></h3>
                            <p>Lorem ipsum dolor sit amet, ei tincidunt persequeris efficiantur vel, usu animal patrioque omittantur et. Timeam nostrud platonem nec ea, simul nihil delectus has ex. </p>
                            <a href="#0" class="button small">Read more</a>
                            </div>
                        </div><!--End row -->
					</section>
					<section id="section-3">
					<div class="row list_news_tabs">
                        	<div class="col-md-4 col-sm-4">
                            <p><a href="#0"><img src="home/img/event_1_thumb.jpg" alt="" class="img-responsive"></a></p>
                                  <span class="date_published">20 Agusut 2015</span>
							<h3><a href="#0">Next students meeting</a></h3>
                            <p>Lorem ipsum dolor sit amet, ei tincidunt persequeris efficiantur vel, usu animal patrioque omittantur et. Timeam nostrud platonem nec ea, simul nihil delectus has ex. </p>
                            <a href="#0" class="button small">Read more</a>
                            </div>
                            <div class="col-md-4 col-sm-4">
                            <p><a href="#0"><img src="home/img/event_2_thumb.jpg" alt="" class="img-responsive"></a></p>
                                  <span class="date_published">20 Agusut 2015</span>
							<h3><a href="#0">10 October Open day</a></h3>
                            <p>Lorem ipsum dolor sit amet, ei tincidunt persequeris efficiantur vel, usu animal patrioque omittantur et. Timeam nostrud platonem nec ea, simul nihil delectus has ex. </p>
                            <a href="#0" class="button small">Read more</a>
                            </div>
                            <div class="col-md-4 col-sm-4">
                            <p><a href="#0"><img src="home/img/event_3_thumb.jpg" alt="" class="img-responsive"></a></p>
                                  <span class="date_published">20 Agusut 2015</span>
							<h3><a href="#0">Photography workshop</a></h3>
                            <p>Lorem ipsum dolor sit amet, ei tincidunt persequeris efficiantur vel, usu animal patrioque omittantur et. Timeam nostrud platonem nec ea, simul nihil delectus has ex. </p>
                            <a href="#0" class="button small">Read more</a>
                            </div>
                        </div><!--End row -->
					</section>
					
				</div><!-- /content -->
			</div><!-- End tabs -->
            </div>
    
 
    
    <div class="bg_content magnific">
            <div>
                <h3>Discover the Campus</h3>
                
            </div>
        </div><!-- End bg_content -->
        
        <div class="container_gray_bg" id="newsletter_container">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter" id="newsletter" class="form-inline">
                        <input name="email_newsletter" id="email_newsletter" type="email" value="" placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button"> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        </div><!-- End newsletter_container -->

        <footer>
        <div class="container">
            <div class="row ">
                <div class="col-md-3 col-sm-3">
                    <p id="logo_footer">
                        <img src="home/img/logo.png" width="125" height="40" alt="PMSA" data-retina="true">
                    </p>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>About</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Terms and condition</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>Academic</h4>
                    <ul>
                        <li><a href="#">Plans of study</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="#">Staff</a></li>
                        <li><a href="#">Students</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>Contact us</h4>
                    <ul>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Plan a visit</a></li>
                    </ul>
                    <ul id="contacts_footer">
                        <li>Info line - +91 47424 24690, +91 47424 24692</li>
                        <li>Email - <a href="mailto: pmsaptmcollege@gmail.com"> pmsaptmcollege@gmail.com</a> </li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
        </footer><!-- End footer -->
        <div id="copy">
            <div class="container">
                 ?? PMSA 2022 - All rights reserved.
            </div>
        </div><!-- End copy -->
	</div> <!-- main-wrapper -->

	
 <!-- Login modal -->   
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="index.php"  class="popup-form" id="myLogin"  method="post">
					<input type="text" name="email" class="form-control form-white" placeholder="Enter Your ID/Email">
					<input type="password" name="password" class="form-control form-white" placeholder="Password">
                    <input type="hidden" name="btnlogin" value="1">
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>  
    
<!-- Register modal -->   
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<form action="#" class="popup-form" id="myRegister">
					<input type="text" class="form-control form-white" placeholder="Name">
					<input type="text" class="form-control form-white" placeholder="Last Name">
                    <input type="email" class="form-control form-white" placeholder="Email">
                    <input type="text" class="form-control form-white" placeholder="Password">
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="accept_2" id="check_2" name="check_2" />
							<label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Register</button>
				</form>
			</div>
		</div>
	</div>
    
  <!-- Search modal -->   
 <div id="search">
    <button type="button" class="close">??</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here" >
        <button type="submit" class="button">Search</button>
    </form>
</div>
    
<!-- Common scripts -->
<script src="home/js/jquery-1.11.2.min.js"></script>
<script src="home/js/common_scripts_min.js"></script>
<script src="home/js/functions.js"></script>
<script src="assets/validate.js"></script>

<!-- Specific scripts -->
<script src="home/layerslider/js/greensock.js"></script>
 <script src="home/layerslider/js/layerslider.transitions.js"></script>
<script src="home/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
		'use strict';
        $('#layerslider').layerSlider({
            autoStart: true,
			responsive: true,
			responsiveUnder: 1280,
			layersContainer: 1170,
            skinsPath: 'layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    });
</script>
<script src="home/js/tabs.js"></script>
<script>new CBPFWTabs( document.getElementById( 'tabs' ) );</script>
</body>
</html>