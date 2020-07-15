<?php

include "database.php";

session_start();

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

    $sql_DisplayPost = " SELECT * FROM post WHERE NOT EXISTS ( SELECT * FROM orderr WHERE post.id = orderr.Pid AND status <> 1 OR post.id = orderr.Pid AND $empId = orderr.Eid ) ";
    
    $result_DisplayPost = mysqli_query($con,$sql_DisplayPost);
   }
else
{
    $sql_DisplayPost = " SELECT * FROM post WHERE NOT EXISTS ( SELECT * FROM orderr WHERE post.id = orderr.Pid AND status <> 1) ";
    $result_DisplayPost = mysqli_query($con,$sql_DisplayPost);
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
              <a href="#" class="nav__link c-yellow activeLink"><img src="img/store.png" alt=""></a>
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
              <a href="#" class="nav__link c-yellow activeLink"><img src="img/store.png" alt=""></a>
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
    <?php   if(isset($_GET['sucsses'])) {  ?>

    <div class="container text-center">
      <div class="alert alert-success d-inline-block alert-dismissible fade show mx-auto mt-5 mb-n5" role="alert">
      <span> تمت الاضافة الى السلة </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

    <?php   }      ?>  

                                                                <!-- Shop -->
<div class="container smallSection text-center">

<div class="mixBar mixBarSection">
		<div class="btn-group rounded" role="group">
        <div class="innerMixBG rounded"></div>
        <div class="innerMix rounded"></div>
			<button class="filter btn" data-filter=".random">أخرى</button>
			<button class="filter btn" data-filter=".new">الجديد</button>
			<button class="filter btn" data-filter=".old">القديم</button>
			<button class="filter btn" data-filter="all">الكل</button>
		</div>
		
		<div class="btn-group rounded" role="group">
        <div class="innerMixBG rounded"></div>
        <div class="innerMix rounded"></div>
			<button class="sort btn" data-sort="my-order:desc">السعر من الأعلى</button>
			<button class="sort btn" data-sort="my-order:asc">السعر من الأقل</button>
		</div>
</div>


<div id="Container" class="text-center mb-5">
  <div class='row'>
<?php  $i=0;
if(mysqli_num_rows($result_DisplayPost) > 0){
	 while ($row = mysqli_fetch_array($result_DisplayPost)) {  ?>
	
	<?php
      $i++;
	?>
    <div class="col-lg-4 col-sm-6 col-12 mb-5 mix <?php if($row['category'] == 'قديم') echo 'old';
                                                   else if($row['category'] == 'جديد') echo 'new';
                                                   else echo 'random' ?>" data-my-order="<?php echo $row['price'] ?>" data-sal="fade" data-sal-duration="500" data-sal-delay="0" data-sal-easing="ease-in">
    <a href="Detail.php?idImg=<?php echo $row['id'] ?>" class="rounded">
       <div class="holder mr-2 mb-5 rounded">
       <div class="innerMix rounded"></div>
        <img class="slideImg rounded" src="savedImg/<?php echo $row['image'] ?>" alt="">
          <div class="subHolder rounded">
              <p> <?php echo $row['title'] ?> </p>
              <div>
              <span> ريال </span> <span> <?php echo $row['price'] ?> </span>
                </div>
                <div class="innerMixBG rounded"></div>
            </div>
       </div>
      </a>
		</div>
	
		<?php
		
	if($i == mysqli_num_rows($result_DisplayPost)){
		echo "</div>";
	}

	
	?>

    <?php } }
    else{
      
      echo"
              <div class='container text-center toBlackColor noItems'>
              <img src='img/packet.png' alt=''>
              <p style='color: black !important;'>لا يوجد عناصر لعرضها</p>
              </div>
      ";



      echo "</div>";
    }
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
              <p class="title">للوصول الى</a></p>

              <?php if(isset($_SESSION['id'])){ ?>

                    <p><a href="Home.php">الصفحة الرئيسية</a></p>
                    <p><a href="#">صفحة المتجر</a></p>
                    <p><a href="Cart.php">صفحة سلة المشتريات </a></p>
                    <p><a href="checkAccount.php">صفحة تسجيل الخروج</a></p>

                    <?php } else {?>

                    <p><a href="Home.php">الصفحة الرئيسية</a></p>
                    <p><a href="#">صفحة المتجر</a></p>
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