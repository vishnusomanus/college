<!doctype html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="college, campus, university, courses, school, educational">
    <meta name="description" content="PMSA - College, University and campus template">
    <meta name="author" content="Ansonika">
    <link rel="shortcut icon" href="$baseUrl/../Images/icbs_logo.png" type="image/x-icon">
    
    <!-- css style goes here -->

      <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/footer.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- css style go to end here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
 

    <nav class="navbar navbar-expand-lg navbar-dark header-back sticky-top header-navbar-fonts">
      <a class="navbar-brand d-flex align-items-center" href="../index.php">
        <img src="../images/icbs_logo.png" class="logo-image" width="50" height="50">
        <h3 class="text-light text-uppercase ml-2">PMSA College</h3>
      </a> 
      <div class="collapse  show" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto nav-right">
          <li class="nav-item active">
            <?php if (isset($_SESSION['LoginAdmin']) && $_SESSION['LoginAdmin'] != "")
                        $link = 'http://localhost/college/admin/admin-index.php';
                    else if (isset($_SESSION['LoginTeacher']) && $_SESSION['LoginTeacher'] != "")
                        $link = 'http://localhost/college/teacher/teacher-index.php';
                    else if (isset($_SESSION['LoginStudent']))
                        $link = 'http://localhost/college/student/student-index.php';
                    
                     ?>
            <a class="nav-link" href="<?=$link ?>" >Dashboard</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../login/logout.php"><i class="fa fa-sign-out text-white fa-lg" aria-hidden="true"></i><span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
<?php 
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
 ?>