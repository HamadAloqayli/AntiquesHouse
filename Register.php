<?php

session_start();

if(isset($_SESSION['id']) || isset($_COOKIE['id']))
{
    header("Location:Home.php");
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
              <a href="checkAccount.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="تسجيل الخروج"><img src="img/logout.png" alt=""></a>
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
              <a href="#" class="nav__link c-green activeLink"><img src="img/login.png" alt=""></a>
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

                                                      <!-- success -->
    <?php   if(isset($_GET['success'])) {  ?>

    <div class="container text-center">
      <div class="alert alert-success d-inline-block alert-dismissible fade show mx-auto mt-5 mb-n5" role="alert">
      <span> تم التسجيل بنجاح </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

    <?php   }      ?>

                                                       <!-- fail -->
    <?php   if(isset($_GET['errorInName']) || isset($_GET['errorInEmailDuplicate']) || isset($_GET['errorInEmailCompatibility']) || isset($_GET['errorInPassword']) || isset($_GET['errorInPasswordCompatibility']) || isset($_GET['errorInPhoneLength']) || isset($_GET['errorInPhoneNumber'])) {  ?>

    <div class="container text-center">
      <div class="alert alert-danger d-inline-block alert-dismissible fade show mx-auto mt-5 mb-n5" role="alert">
      <span> يوجد خطأ في التسجيل </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

    <?php   }      ?>

    <?php   if(isset($_GET['errorInRegister'])) {  ?>

<div class="container text-center">
  <div class="alert alert-danger d-inline-block alert-dismissible fade show mx-auto mt-5 mb-n5" role="alert">
  <span> يجب تسجيل الدخول </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>

<?php   }      ?>  

<?php   if(isset($_GET['errorInLogin'])) {  ?>

<div class="container text-center">
  <div class="alert alert-danger d-inline-block alert-dismissible fade show mx-auto mt-5 mb-n5" role="alert">
  <span> يوجد خطأ في البريد الالكتروني أو كلمة المرور </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>

<?php   }      ?>  
                                                                <!-- Register -->

<div class="container registerContainer section text-center">
    <div class="registerHolder">
      <div class="registerImg"></div>
      <div class="registerCover"></div>
          

        <p class="pToggle">لإنشاء حساب</p>
        
        <div id="login">
            <p class="pTitle">
                        تسجيل الدخول
            </p>
            <form action="checkAccount.php" method="post" style="direction: rtl" class="needs-validation" novalidate>
                    <input type="email" name="email" placeholder="البريد الالكتروني" class="form-control paddingForFail" required>
                        <div class="invalid-feedback">
            
                        </div>
                    <input type="password" name="password" placeholder="كلمة المرور" class="form-control paddingForFail" required>
                        <div class="invalid-feedback">
            
                        </div>
                   <div class="holdCheckBox mb-3">
                       <input type="checkbox" name="remember" style="width: auto">
                       <label>تذكرني</label>
                   </div>
                   <p class="newAccount">
                      ليس لديك حساب ؟     <span> لإنشاء حساب جديد </span>
                   </p>
                   <br>
            
                   <button type="submit" name="submit" class="btn btn-outline-danger submit">دخول</button>
                </form>
        </div>

        <div id="register">

        <p class="pTitle">
                        إنشاء حساب
            </p>

        <form action="createAccount.php" method="post" style="direction: rtl" id="registerForm" class="needs-validation" novalidate>
                <input type="text" placeholder="الاسم" name="name" class="form-control" required>
                    <div class="invalid-feedback d-block text-right paddingForFail">
                        <?php

                            if(isset($_GET['errorInName']))
                                echo 'يوجد خطأ في كتابة الاسم';

                        ?>
                    </div>
                <input type="email" name="email1" value="<?php 
                    if(isset($_GET['errorInEmailDuplicate'])) 
                        echo $_GET['errorInEmailDuplicate'];

                    else if(isset($_GET['errorInEmailCompatibility']))
                        echo $_GET['errorInEmailCompatibility'];
                
                ?>" placeholder="البريد الالكتروني" class="form-control" required>
                    <div class="invalid-feedback d-block text-right paddingForFail">
                            <?php

                                if(isset($_GET['errorInEmailDuplicate']))
                                    echo 'تم استخدام البريد الالكتروني مسبقا';

                                if(isset($_GET['errorInEmailCompatibility']))
                                    echo 'البريد الالكتروني و تأكيد البريد الألكتروني غير متوافقان';

                            ?>
                    </div>
                <input type="email" name="email2" placeholder="تأكيد البريد الالكتروني" class="form-control paddingForFail" required>
                    <div class="invalid-feedback confirmEmail text-danger text-right">
                       
                    </div>
                <input type="password" name="password1" placeholder="كلمة المرور" class="form-control" required>
                    <div class="invalid-feedback d-block text-right paddingForFail">
                         <?php

                            if(isset($_GET['errorInPassword']))
                                echo 'يجب ان تكون كلمة المرور اكثر من (3) خانات';

                            if(isset($_GET['errorInPasswordCompatibility']))
                                echo 'كلمة المرور وتأكيد كلمة المرور غير متوافقان';

                         ?>
                    </div>
                <input type="password" name="password2" placeholder="تأكيد كلمة المرور" class="form-control paddingForFail" required>
                    <div class="invalid-feedback confirmPassword text-danger text-right">
                       
                    </div>
                <input type="text" name="phone" placeholder="رقم الجوال" class="form-control" required>
                <small class="d-block text-right">مثال: 05xxxxxxxx</small>
                    <div class="invalid-feedback d-block text-right">
                        <?php

                            if(isset($_GET['errorInPhoneLength']))
                                echo 'يجب ان يكون رقم الجوال (10) خانات';

                            if(isset($_GET['errorInPhoneNumber']))
                                echo 'يجب ان يكون رقم الجوال ارقام فقط';
                            

                        ?>
                    </div>
                <br>
                    <p class="hasAccount">
                       لديك حساب مسبقا ؟     <span> تسجيل دخول </span>
                   </p>
                   <br>

                <button type="submit" name="submit" class="btn btn-outline-danger submit">تسجيل</button>
            </form>
        </div>

    </div>
</div>
                    







                                                                <!-- Footer -->
<div id="footer" class="section">
      <div class="footerImg"></div>
      <div class="footerCover"></div>
      
      <div class="container footerHolder">
        <div class="row">
          <div class="col-md-5 col-10 offset-1 offset-md-0">
            <div class="leftSide">
              <div class="toCover"></div>
                <p class="title">معلومات التواصل</p>
                <p>البريد الالكتروني: aqeele@gmail.com</p>
                <p>رقم الهاتف: 0114211171</p>
                <p>رقم الجوال: 0554341177</p>
                <p>العنوان: الرياض شارع عسير،<br>بجوار تموينات كيف الحال،<br> خلف شقق بخير</p>
            </div>
          </div>
          <div class="col-md-5 col-10 offset-1 offset-md-2 mt-md-0 mt-5">
            <div class="rightSide">
              <div class="toCover"></div>
              <p class="title">للوصول الى</a></p>

              <?php if(isset($_SESSION['id'])){ ?>

                    <p><a href="Home.php">الصفحة الرئيسية</a></p>
                    <p><a href="Shop.php">صفحة المتجر</a></p>
                    <p><a href="Cart.php">صفحة سلة المشتريات </a></p>
                    <p><a href="checkAccount.php">صفحة تسجيل الخروج</a></p>

                    <?php } else {?>

                    <p><a href="Home.php">الصفحة الرئيسية</a></p>
                    <p><a href="Shop.php">صفحة المتجر</a></p>
                    <p><a href="#">صفحة تسجيل الدخول</a></p>

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