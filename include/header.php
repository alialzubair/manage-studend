
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   

    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/style.css">
    <link rel="stylesheet" href="layout/css/font-awesome.css">
    <script src="layout/js/jquery-3.2.1.js"></script>
<script src="layout/js/bootstrap.min.js"></script>
<script src="layout/js/myjs.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="layout/css/style.css">
    <title>Document</title>
</head>
<body>
 <div>
  
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">website</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="book.php">Hulls</a></li>
        <!-- college -->
        <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">College<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <!-- get all major form database -->
    <?php
      $major=getall('major');
       //loop throw the major and output  in li
       foreach($major as $m){?>
        <li role="separator" class="divider"></li>
        <li><a href="section.php?id=<?php echo $m['major_id'] ?>&name=<?php echo $m['major_name'] ?>"><?php echo $m['major_name'] ?></a></li>
<?php }
    ?>
  </ul>
        <!-- end college -->
        <li><a href="about.php">About Us</a></li>
        <li><a href="connent.php">connect Us</a></li>
        
         </ul>
      <?php
        if(isset($_SESSION['user']) || isset($_SESSION['student'])){

          

           //check the admin
           @$admin=admin($_SESSION['user']);
           if($admin){?>
                
<ul class="nav navbar-nav navbar-right">
<li><a href="profile.php"><b class="text-danger">welcome</b> <b class="text-info"><?php echo $_SESSION['user']; ?></b></a>
 
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">menu<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="admin/index.php">go to Dashbord</a></li>
    <li><a href="profile.php">MY Profile</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="logout.php">logout</a></li>
  </ul>
<?php
           }
    //check if employee
    @$empl=empl($_SESSION['user']);
    if($empl){?>
      <ul class="nav navbar-nav navbar-right">
<li><a href="profile.php"><b class="text-danger">welcome</b> <b class="text-info"><?php echo $_SESSION['user']; ?></b></a>
 
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="ordres.php">MY Orders</a></li>
    <li><a href="profile.php">MY Profile</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="logout.php">logout</a></li>
  </ul>

    
      
   <?php }
      
      // studend
      $status=status($_SESSION['student']);
      //check the status
      if($status==0){?>
              <ul class="nav navbar-nav navbar-right">
  
  <li><a href="#" class="alert alert-danger">your account not active yet</a></li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li role="separator" class="divider"></li>
      <li><a href="logout.php">logout</a></li>
    </ul>
 
      <?php }else{
        @$studend=studend($_SESSION['student']);
        if($studend){?>
         <ul class="nav navbar-nav navbar-right">
  <li><a href="profile.php"><b class="text-danger">welcome</b> <b class="text-info"><?php echo $_SESSION['student']; ?></b></a>
   
  </li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="booking.php">MY Booking</a></li>
      <li><a href="profile.php">MY Profile</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="logout.php">logout</a></li>
    </ul>
  
      
  
       <?php }
  
      }
     
         
        }
        else{?>
           <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="loginEmp.php">Employee</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="loginUser.php">Student</a></li>
  </ul>
  <!-- sign up -->
  <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sing Up<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="regster_emp.php">Employee</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="regster_studend.php">Student</a></li>
  </ul>
    
       <?php }
      
      ?>
      
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


