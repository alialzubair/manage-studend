<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/style.css">
    <title>name website</title>
</head>
<body>
    <!-- start navbar -->
<nav class="navbar navbar-default">
 <div class="container">
    <div class="navbar-header">
     <button type="button" 
        class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#navbar">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">AdimStrap</a>    
          </div>
          <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="index.php">Dashbord</a></li>
                  <li><a href="section.php?do=manage">Section</a></li>
                  <li><a href="major.php?do=manage">Major</a></li>
                  <li><a href="users.php">Users</a></li>
                  <li><a href="employee.php">Employee</a></li>
                  <li><a href="hulls.php">Hulls</a></li>
                  <li><a href="manage_hulls.php">Manage Hulls</a></li>

              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Welecme , <?php echo $_SESSION['user'] ?></a></li>
                <li><a href="../index.php">Back to Home</a></li>
           

            </ul>
          </div>
      </div>
  </nav>
  <!-- end navbar -->
    <!-- header -->
    <header id="header">
      <div class="container">
          <div class="row"> 
              <div class="col-md-10">
                  <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Dashbord <small>Manager</small></h1>
              </div>
              <div class="col-md-2">
                  <div class="dropdown create">
                      <button class="btn btn-default carete" id="dropdownMenu1" data-toggle="dropdown">Approve Hulls
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <!-- <li><a type="button" data-toggle="modal" data-target="#addpage">Add Teacher</a></li> -->
                          <li><a href="approve_hulls.php">Show Order</a></li>
                          <li><a href="list_approve_hulls.php">List Approve Hulls</a></li>

                      </ul>

                  </div>
              </div>
          </div>
      </div>

  </header>
  <!-- end header -->
  <script src="layout/js/jquery-3.2.1.js"></script>

<script src="layout/js/bootstrap.min.js"></script>
<script src="layout/js/js.js"></script>


  <?php include 'include/footer.php'; ?>

    
