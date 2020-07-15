<?php

include "database.php";

session_start();

if(!isset($_GET['idImg']))
{
    header('Location:Shop.php');
    exit();
}
if(isset($_COOKIE['phone']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['phone'] = $_COOKIE['phone'];
}

if(isset($_SESSION['id']))
{
    $empId = $_SESSION['id'];
    $idImg = $_GET['idImg'];

    $sql_Item = " SELECT * FROM post WHERE id = ".$idImg." ";

    $result_Item = mysqli_query($con,$sql_Item);
}
else
{
    $idImg = $_GET['idImg'];

    $sql_Item = " SELECT * FROM post WHERE id = ".$idImg." ";
    $result_Item = mysqli_query($con,$sql_Item);
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
      <?php       if(isset($_SESSION['phone'])){    ?>
  <nav class="nav">
          <div class="burger">
            <div class="burger__patty"></div>
          </div>

          <ul class="nav__list">
            <li class="nav__item">
              <a href="Home.php" class="nav__link c-blue" data-toggle="tooltip" data-placement="right" title="الصفحة الرئيسية"><img src="img/home.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="Shop.php" class="nav__link c-yellow" data-toggle="tooltip" data-placement="right" title="المتجر"><img src="img/store.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="Cart.php" class="nav__link c-red" data-toggle="tooltip" data-placement="right" title="سلة المشتريات"><img src="img/cart.png" alt=""></a>
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
              <a href="Home.php" class="nav__link c-blue" data-toggle="tooltip" data-placement="right" title="الصفحة الرئيسية"><img src="img/home.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="Shop.php" class="nav__link c-yellow" data-toggle="tooltip" data-placement="right" title="المتجر"><img src="img/store.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="Register.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="تسجيل الدخول"><img src="img/login.png" alt=""></a>
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
                دار التحف
                </h1>
            </div>
    </div>

                                                              <!-- Response -->
    <?php   if(isset($_GET['errorInAdd'])) {  ?>

            <div class="container text-center">
              <div class="alert alert-danger d-inline-block alert-dismissible fade show mx-auto mt-5 mb-n5" role="alert">
              <span>عذرا... يجب عليك تسجيل الدخول اولا، <a href="Register.php">لتسجيل الدخول</a></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           </div>

       <?php   }      ?>  


                                                                <!-- Shop -->
<div class="container mb-5" style="margin-top: 150px;">
<div class="shopHolder">
    <div class="shopImg"></div>
    <div class="shopCover"></div>
    <p class="bigPCart" data-sal="fade" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-in">تفاصيل المنتج</p>
          <div class="row justify-content-center align-items-md-end align-items-center pb-5">
            <?php 
                      if(mysqli_num_rows($result_Item) > 0){
                        $row = mysqli_fetch_array($result_Item)    ?>
  
                <div class="leftDetail col-md-6 col-12 text-center" data-sal="slide-right" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
                          <img src="savedImg/<?php echo $row['image'] ?>" alt="">
                </div>
                        
                <div class="rightDetail col-md-6 col-12 text-right" data-sal="slide-left" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
  
                          <p> اسم المنتج:  <?php  echo $row['title']  ?> </p><hr>
                          <p> وصف المنتج:  <?php  echo $row['text']  ?> </p><hr>
                          <p> الصنف:  <?php  echo $row['category']  ?> </p><hr>
                          <p> السعر:  <?php echo $row['price'] ?> ريال </p>
                <form action="addToCart.php" method="post" enctype="multipart/form-data" class="text-center mt-5">
                              <input type="hidden" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']; ?>" name="empId">
                              <input type="hidden" value="<?php if(isset($_SESSION['id'])) echo $row['id']; ?>" name="postId">
                              <input type="hidden" value="<?php if(isset($idImg)) echo $idImg; ?>" name="imgId">
                              <button type="submit" name="submit" class="btn btn-outline-danger submit">اضافه الى السلة</button>
                </form>     
              </div>
          </div>
          <?php   }
          else
            echo "sory no data";
           ?>
  
</div>
    </div>







                                                                <!-- Footer -->
<div id="footer" class="section">
      <div class="footerImg"></div>
      <div class="footerCover"></div>
      
      <div class="container footerHolder">
        <div class="row">
          <div class="col-md-5 col-10 offset-1 offset-md-0" data-sal="slide-right" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
            <div class="leftSide">
              <div class="toCover"></div>
                <p class="title">معلومات التواصل</p>
                <p>البريد الالكتروني: aqeele@gmail.com</p>
                <p>رقم الهاتف: 0114211171</p>
                <p>رقم الجوال: 0554341177</p>
                <p>العنوان: الرياض شارع عسير،<br>بجوار تموينات كيف الحال،<br> خلف شقق بخير</p>
            </div>
          </div>
          <div class="col-md-5 col-10 offset-1 offset-md-2 mt-md-0 mt-5" data-sal="slide-left" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
            <div class="rightSide">
              <div class="toCover"></div>

              <?php if(isset($_SESSION['id'])){ ?>

                  <p><a href="Home.php">الصفحة الرئيسية</a></p>
                  <p><a href="Shop.php">صفحة المتجر</a></p>
                  <p><a href="Cart.php">صفحة سلة المشتريات </a></p>
                  <p><a href="checkAccount.php">صفحة تسجيل الخروج</a></p>

                  <?php } else {?>

                  <p><a href="Home.php">الصفحة الرئيسية</a></p>
                  <p><a href="Shop.php">صفحة المتجر</a></p>
                  <p><a href="Register.php">صفحة تسجيل الدخول</a></p>

                  <?php } ?>

              <p class="title">تابعنا على</p>
              <div class="socialMedia">
              <a href=""><i class="fab fa-twitter-square"></i></a>
              <a href=""><i class="fab fa-facebook-square"></i></a>
              <a href=""><i class="fab fa-instagram-square"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mine">
        <p>Developed By Hamad Aloqayli</p>
      </div>
</div>




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