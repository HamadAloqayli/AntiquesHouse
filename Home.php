<?php

session_start();

if(isset($_COOKIE['phone']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['phone'] = $_COOKIE['phone'];
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

    <!-- Map css -->
    <style>
      #map
      {
        width: 100%;
        height: 300px;
      }
    </style>

        <!-- Map js -->
        <script>
      var map;
      var marker;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 24.620760, lng: 46.697630},
          zoom: 16
        });

        marker = new google.maps.Marker({
          position: {lat: 24.620760, lng: 46.697630},
          map: map
        });

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBj6klY_sbU99RC_PcBB-RirE8QejGNRNw&callback=initMap"
    async defer>
  </script>


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
              <a href="#" class="nav__link c-blue activeLink"><img src="img/home.png" alt=""></a>
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
              <a href="#" class="nav__link c-blue activeLink"><img src="img/home.png" alt=""></a>
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

                                                                <!-- Header -->
<div id="header">
  <div class="headerImg"></div>
<div class="headerCover"></div>

<h1>
دار التحف
</h1>
<p>
  <a href="#guid">تسوق الآن</a>
</p>
</div>

<!-- About -->
<div id="about" class="section">
  <div class="container">
    <div class="aboutHolder">
      <div class="aboutImg"></div>
      <div class="aboutCover"></div>
      <p class="title" data-sal="slide-left" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">عن المؤسسة</p>
      <br>
      <p data-sal="slide-right" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">الخط الاميري محاكاة للخط الطباعي التي تتميز به مطبعة بولاق بالقاهرة منذ اوئل القرن العشرين والتي تعرف ايضا بالمطبعة الاميرية ومن هنا اخذ هذا الخط اسمه .
        يستخدم هذا الخط النسخي لطباعة الكتب والنصوص الطويل . ويمكن استخدام هذا الخط في كتابة المحتوى للموقع العربي</p>
      </div>
    </div>
  </div>
    
                                                                <!-- Guid -->
<div id="guid" class="section2">
  <div class="container text-center">
      <div class="guidHolder">
            <div class="guidImg"></div>
            <div class="guidCover"></div>

            <div class="articleHolder">
              <div class="article" data-sal="slide-right" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
              <img src="img/pic3.jpg" alt="">

              <div class="articleInner">
                    <p>أخرى</p>
                    <p>الخط الاميري محاكاة للخط الطباعي التي تتميز به مطبعة بولاق بالقاهرة منذ اوئل القرن العشرين</p>
                    <a href="Shop.php?random"><button>المزيد</button></a>
                  </div>
              </div>
              <div class="article" data-sal="slide-up" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
                  <img src="img/pic1.jpg" alt="">

                  <div class="articleInner">
                    <p>تحف جديدة</p>
                    <p>الخط الاميري محاكاة للخط الطباعي التي تتميز به مطبعة بولاق بالقاهرة منذ اوئل القرن العشرين</p>
                    <a href="Shop.php?new"><button>المزيد</button></a>
                  </div>
              </div>
                    <div class="article" data-sal="slide-left" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
                    <img src="img/pic2.jpg" alt="">

                    <div class="articleInner">
                          <p>تحف قديمة</p>
                          <p>الخط الاميري محاكاة للخط الطباعي التي تتميز به مطبعة بولاق بالقاهرة منذ اوئل القرن العشرين</p>
                          <a href="Shop.php?old"><button>المزيد</button></a>
                        </div>
                    </div>
            </div>
      </div>
  </div>
</div>

                                                                <!-- Contact -->

<div id="contact" class="section3">

<!-- Response -->
<?php   if(isset($_GET['errorInName'])) {  
echo '
<div class="container text-center">
  <div class="alert alert-danger d-inline-block alert-dismissible fade show mx-auto" role="alert">
  <span> يجب ان يكون الاسم خالي من الأرقام و الرموز </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>';

   }      ?>

<?php   if(isset($_GET['longString'])) {  ?>

<div class="container text-center">
  <div class="alert alert-danger d-inline-block alert-dismissible fade show mx-auto" role="alert">
  <span> عدد الحروف في عنوان الرسالة أو نص الرسالة تجاوز تجاوز الحد المسموح </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>

<?php   }      ?>

<?php   if(isset($_GET['successSent'])) {  ?>

<div class="container text-center">
  <div class="alert alert-success d-inline-block alert-dismissible fade show mx-auto" role="alert">
  <span> تم الارسال بنجاح، سوف نتواصل معك في اقرب وقت ممكن على البريد الالكتروني </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>

<?php   }      ?>

  <div class="container">
      <div class="contactHolder">
        <div class="contactImg"></div>
        <div class="contactCover"></div>
          <p class="title" data-sal="zoom-out" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">تواصل معنا</p>
          <br>
            <form action="addCommentUser.php" method="POST" class="needs-validation" novalidate style="direction: rtl" data-sal="zoom-out" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">
<br>
              <div class="form-group row justify-content-center align-items-center">
                <label for="colFormLabel" class="col-sm-2 col-form-label">الاسم</label>
                <div class="col-sm-8">
                  <input type="text" name="name" class="form-control" id="colFormLabel" required>
                </div>
              </div>

              <div class="form-group row justify-content-center align-items-center">
                <label for="colFormLabel" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                <div class="col-sm-8">
                  <input type="email" name="email" class="form-control" id="colFormLabel" required>
                </div>
              </div>

              <div class="form-group row justify-content-center align-items-center">
                <label for="colFormLabel" class="col-sm-2 col-form-label">عنوان الرسالة</label>
                <div class="col-sm-8">
                  <input type="text" name="title" class="form-control" id="colFormLabel" required>
                </div>
              </div>

              <div class="form-group row justify-content-center align-items-center">
                <label for="colFormLabel" class="col-sm-2 col-form-label">نص الرسالة</label>
                <div class="col-sm-8">
                  <textarea name="text" id="" cols="30" rows="5" class="form-control" id="colFormLabel" required></textarea>
                </div>
              </div>

              <button type="submit" name="submit" class="btn submit">ارسال</button>

        </form>
      </div>
    </div>
</div>

                                                                <!-- Location -->
<div id="location" class="section5">
  <div class="container">
      <div class="locationHolder">
            <div class="locationImg"></div>
            <div class="locationCover"></div>
              <p class="title" data-sal="zoom-out" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out">موقع المؤسسة</p>
              <br>
              <div id="map" data-sal="zoom-out" data-sal-duration="800" data-sal-delay="0" data-sal-easing="ease-out"></div>
          </div>
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
              <p class="title">للوصول الى</a></p>

              <?php if(isset($_SESSION['id'])){ ?>

                    <p><a href="#">الصفحة الرئيسية</a></p>
                    <p><a href="Shop.php">صفحة المتجر</a></p>
                    <p><a href="Cart.php">صفحة سلة المشتريات </a></p>
                    <p><a href="checkAccount.php">صفحة تسجيل الخروج</a></p>

                    <?php } else {?>

                    <p><a href="#">الصفحة الرئيسية</a></p>
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