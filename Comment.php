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

if($_SESSION['role'] == 'admin')
{
    $empId = $_SESSION['id'];
    
    $sql_ShowComment = " SELECT * FROM comment WHERE sender = 'worker' ORDER BY id DESC ";
    
    $result_ShowComment = mysqli_query($con,$sql_ShowComment);

}
else if($_SESSION['role'] == 'worker')
{
  $empId = $_SESSION['id'];
  
  $sql_ShowComment = " SELECT * FROM comment WHERE sender = 'admin' ORDER BY id DESC ";
  
  $result_ShowComment = mysqli_query($con,$sql_ShowComment);

}

$sql_ShowCommentUser = " SELECT * FROM commentuser ORDER BY id DESC ";

$result_ShowCommentUser = mysqli_query($con,$sql_ShowCommentUser);

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
              <a href="Dashboard.php" class="nav__link c-blue" data-toggle="tooltip" data-placement="right" title="لوحة التحكم"><i class="fas fa-cog"></i></a>
            </li>
            <li class="nav__item">
              <a href="Order.php" class="nav__link c-yellow" data-toggle="tooltip" data-placement="right" title="الطلبات"><i class="fas fa-box"></i></a>
            </li>
            <li class="nav__item">
              <a href="Comment.php" class="nav__link c-red activeLink" data-toggle="tooltip" data-placement="right" title="الرسائل"><i class="fas fa-envelope"></i></a>
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
              <a href="Dashboard.php" class="nav__link c-blue" data-toggle="tooltip" data-placement="right" title="لوحة التحكم"><i class="fas fa-cog"></i></a>
            </li>
            <li class="nav__item">
              <a href="Order.php" class="nav__link c-yellow" data-toggle="tooltip" data-placement="right" title="الطلبات"><i class="fas fa-box"></i></a>
            </li>
            <li class="nav__item">
              <a href="Comment.php" class="nav__link c-red activeLink" data-toggle="tooltip" data-placement="right" title="الرسائل"><i class="fas fa-envelope"></i></a>
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
                الرسائل
                </h1>
            </div>
    </div>



                                                                <!-- Comment -->

                    
                                                            <!-- worker comments -->
<div class="container" style="margin-top: 100px">

<div class="holderFormAdd">

<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ){
                   echo '<p style="color: var(--dark-blue); font-size: 2rem; text-align:center;">رسائل الموظفين</p>';
      }
      else
      {
        echo '<p style="color: var(--dark-blue); font-size: 2rem; text-align:center;">رسائل المدير</p>';
      }
 ?>

	<button data-toggle="collapse" data-target="#form2" type="button" class="btn form-control addWorker addCommentBtn mb-4" data="newWorker" id="test">ارسال رسالة</button>
  
  <?php
                        if(isset($_GET['errorInSubmitC']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  لا يمكن اتمام عمليه الارسال 
                            </div>';

                          if(isset($_GET['successC']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                تمت عمليه الارسال
                            </div>';

?>
			<div class="formAdd addCommentForm collapse" id="form2">
					<form action="addComment.php" method="POST" style="direction: rtl" class="row row1 text-center needs-validation" novalidate>

							<input type="text" name="titleAdd" id="newTitle" class="form-control col-4" placeholder="عنوان الرساله" required>

							<input type="text" name="textAdd" id="newText" class="form-control col-4" placeholder="نص الرساله" required>

						    <!-- <input type="hidden" id="dateComment" name="dateComment" value=""> -->
							
                            <!-- <input  type="submit" class="btn btn-success" value="send" onclick="sendDateComment()"> -->
                            <button type="submit" class="btn submit col-1 buttonToSend" name="submit">ارسال</button>
						</form>
			</div>
</div>
<br>
<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn form-control readAll mb-4">تمت قراءه الكل</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header flex-row-reverse">
        <h5 class="modal-title" id="exampleModalLabel">تأكيد عمليه القراءه</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger form-control delPost" data-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-outline-danger form-control position-relative delPost"><a href="#" onclick="confirmeReadComment()" class="stretched-link">قراءه</a></button>
      </div>
    </div>
  </div>
</div>

<div class="showTable mx-auto text-center table-responsive" style="direction: rtl;">
    <table class="table">
      <thead>
        <tr>
          <th scope="col"> </th>
          <th scope="col">عنوان الرساله</th>
          <th scope="col">نص الرساله</th>
          <th scope="col">تاريخ الارسال</th>
        </tr>
      </thead>
      <tbody>
    
          <?php
          $i=0;
          if(mysqli_num_rows($result_ShowComment) > 0){
          while ($row = mysqli_fetch_array($result_ShowComment)) {
            ?>
          
        <tr>
        
          <td style="font-size: 12px;"><?php if($row['status'] == '1') echo "<i class='fas fa-circle hideIconComment' data='disIcon' style='color: var(--main-en-color)'></i>"; ?></td>
          <td><?php echo $row['title'] ?></td>
          <td><?php echo $row['text'] ?></td>
          <td><?php echo $row['date'] ?></td>          
        </tr>
    
        <?php
          } }
          else
            echo "sorry no data";
        ?>
    
      </tbody>
    </table>
</div>

<br>
<br>
<br>
<hr>                                                <!-- user comments -->
<br>
<br>
<br>

<p style="color: var(--dark-blue); font-size: 2rem; text-align:center;">رسائل العملاء</p>

<button type="button" data-toggle="modal" data-target="#exampleModal2" class="btn form-control readAll mb-4">تمت قراءه الكل</button>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header flex-row-reverse">
        <h5 class="modal-title" id="exampleModal2Label">تأكيد عمليه القراءه</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger form-control delPost" data-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-outline-danger form-control position-relative delPost"><a href="#" onclick="confirmeReadCommentUser()" class="stretched-link">قراءه</a></button>
      </div>
    </div>
  </div>
</div>

<div class="showTable mx-auto text-center table-responsive" style="direction: rtl;">
    <table class="table">
      <thead>
        <tr>
          <th scope="col"> </th>
          <th scope="col">الاسم</th>
          <th scope="col">البريد الالكتروني</th>
          <th scope="col">عنوان الرساله</th>
          <th scope="col">نص الرساله</th>
          <th scope="col">تاريخ الارسال</th>
        </tr>
      </thead>
      <tbody>
    
          <?php
          $i=0;
          if(mysqli_num_rows($result_ShowCommentUser) > 0){
          while ($row = mysqli_fetch_array($result_ShowCommentUser)) {
            ?>
          
        <tr>
        
          <td style="font-size: 12px;"><?php if($row['status'] == '1') echo "<i class='fas fa-circle hideIconCommentUser' data='disIcon' style='color: var(--main-en-color)'></i>"; ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php echo $row['title'] ?></td>
          <td><?php echo $row['text'] ?></td>
          <td><?php echo $row['date'] ?></td>          
        </tr>
    
        <?php
          } }
          else
            echo "sorry no data";
        ?>
    
      </tbody>
    </table>
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