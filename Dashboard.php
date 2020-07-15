<?php

include "database.php";

session_start();

if(isset($_COOKIE['role']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['role'] = $_COOKIE['role'];
}

if(!isset($_SESSION['role']))
{
    header("Location:Home.php");
    mysqli_close($con);
    session_destroy();
    exit();
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Sal.js CSS -->
    <link rel="stylesheet" href="sal-master/dist/sal.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css?ts=<?=time()?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">

    <!-- Navbar css -->
    <link rel="stylesheet" href="css/templatemo-style.css">


    <title>Home</title>
  </head>
  <body>
    
                                                                <!-- Navbar -->
      <?php     if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){    ?>
  <nav class="nav">
          <div class="burger">
            <div class="burger__patty"></div>
          </div>

          <ul class="nav__list">
            <li class="nav__item">
              <a href="Dashboard.php" class="nav__link c-blue activeLink" data-toggle="tooltip" data-placement="right" title="لوحة التحكم"><i class="fas fa-cog"></i></a>
            </li>
            <li class="nav__item">
              <a href="Order.php" class="nav__link c-yellow" data-toggle="tooltip" data-placement="right" title="الطلبات"><i class="fas fa-box"></i></a>
            </li>
            <li class="nav__item">
              <a href="Comment.php" class="nav__link c-red" data-toggle="tooltip" data-placement="right" title="الرسائل"><i class="fas fa-envelope"></i></a>
            </li>
            <li class="nav__item">
              <a href="Post.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="إدارة المنتجات" data-toggle="tooltip" data-placement="right" title="المتجر"><i class="fas fa-clone"></i></a>
            </li>
            <li class="nav__item">
              <a href="Worker.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="إدارة الموظفين" data-toggle="tooltip" data-placement="right" title="المتجر"><i class="fas fa-user-friends"></i></a>
            </li>
            <li class="nav__item">
              <a href="checkAccount.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="تسجيل الخروج" data-toggle="tooltip" data-placement="right" title="المتجر"><img src="img/logout.png" alt=""></a>
            </li>
          </ul>
</nav>
      <?php    }
                  else{    ?>
  <nav class="nav">
          <div class="burger">
            <div class="burger__patty"></div>
          </div>

          <ul class="nav__list">
          <li class="nav__item">
              <a href="Dashboard.php" class="nav__link c-blue activeLink" data-toggle="tooltip" data-placement="right" title="لوحة التحكم"><i class="fas fa-cog"></i></a>
            </li>
            <li class="nav__item">
              <a href="Order.php" class="nav__link c-yellow" data-toggle="tooltip" data-placement="right" title="الطلبات"><i class="fas fa-box"></i></a>
            </li>
            <li class="nav__item">
              <a href="Comment.php" class="nav__link c-red" data-toggle="tooltip" data-placement="right" title="الرسائل"><i class="fas fa-envelope"></i></a>
            </li>
            <li class="nav__item">
              <a href="Post.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="إدارة المنتجات" data-toggle="tooltip" data-placement="right" title="المتجر"><i class="fas fa-clone"></i></a>
            </li>
            <li class="nav__item">
              <a href="checkAccount.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="تسجيل الخروج" data-toggle="tooltip" data-placement="right" title="المتجر"><img src="img/logout.png" alt=""></a>
            </li>
          </ul>
</nav>
                  <?php  }  ?>

                                                                <!-- Title -->
<div class="">
    <div id="headerTitle">
            <div class="headerImg"></div>
                <div class="headerCover"></div>
                <h1>
                لوحة التحكم
                </h1>
            </div>
    </div>



                                                                <!-- Dashboard -->


<?php     if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){    ?>

<div id="dashboard" class="mb-5">
    <div class="container text-center">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-4 col-sm-6">
<a href="Order.php">
              <div class="subDash rounded">
              <i class="fas fa-box"></i>
                <p>الطلبات</p>
                <p>يمكن استخدام هذا الخط يمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
              </div>
</a>
          </div>
          <div class="col-lg-4 col-sm-6">
<a href="Comment.php">
              <div class="subDash rounded">
              <i class="fas fa-envelope"></i>
                <p>الرسائل</p>
                <p>يمكن استخدام هذا الخط يمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
              </div>
</a>
          </div>
          <div class="col-lg-4 col-sm-6">
<a href="Post.php">
              <div class="subDash rounded">
              <i class="fas fa-clone"></i>
                <p>إدارة المنتجات</p>
                <p>يمكن استخدام هذا الخط يمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
              </div>
</a>
          </div>
          <div class="col-lg-4 col-sm-6">
<a href="Worker.php">
              <div class="subDash rounded">
              <i class="fas fa-user-friends"></i>
                <p>إدارة الموظفين</p>
                <p>يمكن استخدام هذا الخط يمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
              </div>
</a>
          </div>
        </div>
    </div>
</div>

<?php } 
          else{  ?>

<div id="dashboard">
    <div class="container text-center">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-4 col-sm-6">
<a href="Order.php">
              <div class="subDash rounded">
              <i class="fas fa-box"></i>
                <p>الطلبات</p>
                <p>يمكن استخدام هذا الخط يمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
              </div>
</a>
          </div>
          <div class="col-lg-4 col-sm-6">
<a href="Comment.php">
              <div class="subDash rounded">
              <i class="fas fa-envelope"></i>
                <p>الرسائل</p>
                <p>يمكن استخدام هذا الخط يمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
              </div>
</a>
          </div>
          <div class="col-lg-4 col-sm-6">
<a href="Post.php">
              <div class="subDash rounded">
              <i class="fas fa-clone"></i>
                <p>إدارة المنتجات</p>
                <p>يمكن استخدام هذا الخط يمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
              </div>
</a>
          </div>
        </div>
    </div>
</div>

          <?php  }  ?>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/882f4098ed.js" crossorigin="anonymous"></script>

    <!-- MixitUp -->
    <script src="mixitup-3/dist/mixitup.min.js"></script>

    <!-- Sal.js -->
    <script src="sal-master/dist/sal.js"></script>

    <!-- JS -->
    <script src="js/script.js?ts=<?=time()?>"></script>

    <!-- Navbar js -->
    <script src="js/main.js"></script>


</body>
</html>