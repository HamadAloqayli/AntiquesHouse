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

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location:Home.php");
    mysqli_close($con);
    session_destroy();
    exit();
}

$empId = $_SESSION['id'];

$sql_ShowWorker = " SELECT * FROM employee WHERE role = 'worker' ORDER BY id ASC ";

$result_ShowWorker = mysqli_query($con,$sql_ShowWorker);


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
              <a href="Comment.php" class="nav__link c-red" data-toggle="tooltip" data-placement="right" title="الرسائل"><i class="fas fa-envelope"></i></a>
            </li>
            <li class="nav__item">
              <a href="Post.php" class="nav__link c-green" data-toggle="tooltip" data-placement="right" title="إدارة المنتجات" data-toggle="tooltip" data-placement="right" title="المتجر"><i class="fas fa-clone"></i></a>
            </li>
            <li class="nav__item">
              <a href="Worker.php" class="nav__link c-green activeLink" data-toggle="tooltip" data-placement="right" title="إدارة الموظفين" data-toggle="tooltip" data-placement="right" title="المتجر"><i class="fas fa-user-friends"></i></a>
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
                إدارة الموظفين
                </h1>
            </div>
    </div>



                                                                <!-- Worker -->

<div class="container" style="margin-top: 100px">

<div class="holderFormAdd">

	<button data-toggle="collapse" data-target="#form1" type="button" class="btn form-control addWorker addWorkerBtn mb-4" data="newWorker" id="test">إضافة موظف</button>
  
  <?php
                        if(isset($_GET['errorInSubmit']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  لا يمكن اتمام عمليه الاضافه 
                            </div>';

                        if(isset($_GET['errorInName']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  يوجد خطأ في كتابة اسم الموظف
                            </div>';

                            if(isset($_GET['errorInEmailDuplicate']))
                                echo '
                                <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                      تم استخدام البريد الالكتروني مسبقا  
                                </div>';
                                
                                if(isset($_GET['errorInPassword']))
                                    echo '
                                    <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                            يجب ان تكون كلمة المرور اكثر من (3) خانات 
                                    </div>';

                        if(isset($_GET['success']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                تمت عملية الاضافة
                            </div>';

                            if(isset($_GET['errorInSubmitE']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  لا يمكن التعديل
                            </div>';

                            if(isset($_GET['errorInWorkerNameE']))
                            echo '
                            <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                  يوجد خطأ في كتابة اسم الموظف
                            </div>';

                            if(isset($_GET['successE']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                تمت عمليه التعديل
                            </div>';

                            if(isset($_GET['successD']))
                            echo '
                            <div id="successMsg" class="mt-3 text-success text-center mb-4">
                                تمت عمليه الحذف
                            </div>';

?>

			<div class="formAdd addWorkerForm collapse" id="form1">
					<form action="addWorker.php" method="POST" style="direction: rtl" class="row row1 text-center needs-validation" novalidate>

							<input type="text" name="nameAdd" class="form-control col-3" id="newName" placeholder="الاسم" required>
						
							<input type="email" name="emailAdd" class="form-control col-3" id="newEmail" placeholder="البريد الالكتروني" required>
	
							<input type="password" name="passwordAdd" class="form-control col-3" id="newPassword" placeholder="كلمة المرور" required>
							
                        <button type="submit" class="btn submit col-1 buttonToSend" name="submit">ارسال</button>

						</form>
			</div>
</div>

<br>
<br>

<div class="showTable mx-auto text-center table-responsive mb-5" style="direction: rtl;">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">الرقم</th>
      <th scope="col">الرقم التسلسلي</th>
      <th scope="col">الاسم</th>
      <th scope="col">البريد الالكتروني</th>
    </tr>
  </thead>
  <tbody>

	  <?php
      $i=0;
      if(mysqli_num_rows($result_ShowWorker) > 0){
	  while ($row = mysqli_fetch_array($result_ShowWorker)) {
		?>
	  
    <tr>
      <th scope='row'><?php echo ++$i ?></th>
      <td><?php echo $row['id'] ?></td>
	  <td><?php echo $row['name'] ?></td>
	  <td><?php echo $row['email'] ?></td>
	  <td><a href="" data-toggle="collapse" data-target="#form3" title="edit" class="toEditW" onclick="getEdit(<?php echo $row['id'] ?>,'<?php echo $row['name'] ?>','<?php echo $row['email'] ?>')"> <img src="img/edit.png"></a></td>
    <td><a href="" style="cursor: pointer" data-toggle="modal" data-target="#exampleModal" onclick="toDeleteWorker(<?php echo $row['id'] ?>)" title="delete"><img src="img/x-button.png"></a></td>

    </tr>

	<?php
      } }
      else
        echo 'sorry no data';
	?>

  </tbody>
</table>

  </div>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header flex-row-reverse">
        <h5 class="modal-title" id="exampleModalLabel">تأكيد عمليه الحذف</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger form-control delWorker" data-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-outline-danger form-control position-relative delWorker"><a href="" class="stretched-link">حذف</a></button>
      </div>
    </div>
  </div>
</div>
	  
		<div class="formEdit holderFormAdd editWorkerForm my-5 collapse" id="form3">
                <form action="editWorker.php" method="POST" style="direction: rtl" class="row row1 text-center needs-validation" novalidate>
                
						<input type="text" name="nameEdit" id="editName" class="form-control col-4" value="" placeholder="الاسم">
					
						<input type="email" name="emailEdit" id="editEmail" class="form-control col-4" value="" placeholder="البريد الالكتروني">

					    <input type="hidden" name="idEdit" id="editId" value="">
  				
                    <!-- <input type="submit" class="btn btn-success" value="send" onclick="confirm('are you sure ?')?alert('done'):alert('sory')"> -->
                    <button type="submit" class="btn submit col-1 buttonToSend" name="submit">ارسال</button>
			 	 </form>
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