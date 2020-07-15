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


$empId = $_SESSION['id'];

$sql_DisplayPost = " SELECT * FROM post WHERE NOT EXISTS ( SELECT * FROM orderr WHERE post.id = orderr.Pid AND status <> 1 ) ORDER BY id ASC";

$result_DisplayPost = mysqli_query($con,$sql_DisplayPost);


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
              <a href="Post.php" class="nav__link c-green activeLink" data-toggle="tooltip" data-placement="right" title="إدارة المنتجات" data-toggle="tooltip" data-placement="right" title="المتجر"><i class="fas fa-clone"></i></a>
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
              <a href="Comment.php" class="nav__link c-red" data-toggle="tooltip" data-placement="right" title="الرسائل"><i class="fas fa-envelope"></i></a>
            </li>
            <li class="nav__item">
              <a href="Post.php" class="nav__link c-green activeLink" data-toggle="tooltip" data-placement="right" title="إدارة المنتجات" data-toggle="tooltip" data-placement="right" title="المتجر"><i class="fas fa-clone"></i></a>
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
                إدارة المنتجات
                </h1>
            </div>
    </div>



                                                                <!-- Post -->

<div class="container" style="margin-top: 100px">

<button data-toggle="collapse" data-target="#form1" type="button" class="btn form-control addPost mb-4" id="test" data="newPost">اضافة منتج جديد</button>
             
             <?php
                      if(isset($_GET['errorInSubmitOrUpload']))
                          echo '
                          <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                لا يمكن رفع الملف
                          </div>';

                      if(isset($_GET['errorInProductName']))
                          echo '
                          <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                يوجد خطأ في اضافةاسم المنتج
                          </div>';

                      if(isset($_GET['errorInProductDescription']))
                          echo '
                          <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                               يوجد خطأ في اضافة وصف المنتج 
                          </div>';

                      if(isset($_GET['errorInProductPrice']))
                          echo '
                          <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                              يوجد خطأ في اضافة سعر المنتج
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

                      if(isset($_GET['errorInProductNameE']))
                          echo '
                          <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                                يوجد خطأ في تعديل اسم المنتج
                          </div>';

                      if(isset($_GET['errorInProductDescriptionE']))
                          echo '
                          <div id="errorMsg" class="mt-3 text-danger text-center mb-4">
                               يوجد خطأ في تعديل وصف المنتج 
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

    <div class="formAdd collapse mb-4" id="form1">
              <form action="addNewPost.php" method="POST" enctype="multipart/form-data" style="direction: rtl" class="text-center needs-validation" novalidate>

<div class="row row2">

            <div class="col-md-3 col-12 hasP">
              <p>صوره المنتج</p>
              <input type="file" name="imageAdd" id="newImage" class="form-control-file">
            </div>


            <input type="text" name="titleAdd" id="newTitle" class="form-control col-md-3 col-5" placeholder="اسم المنتج" required>

            <textarea name="descriptionAdd" id="newDescription" cols="30" rows="5" class="form-control col-md-3 col-5" placeholder="وصف المنتج" required></textarea>
</div>


          
<div class="row row3">
        <div class="radioHolder col-3 hasP" style="direction: ltr">
          <p>نوع المنتج</p>
                <div class="form-check">
                  <input class="form-check-input" id="exampleRadios1" type="radio" name="typeAdd" value="قديم" required>
                </div>
                <label class="form-check-label" for="exampleRadios1">
                    قديم
                  </label>
    
                <div class="form-check">
                  <input class="form-check-input" id="exampleRadios2" type="radio" name="typeAdd" value="جديد">
                </div>
                <label class="form-check-label" for="exampleRadios2">
                    جديد
                  </label>

                <div class="form-check">
                  <input class="form-check-input" id="exampleRadios3" type="radio" name="typeAdd" value="أخرى">
                </div>
                <label class="form-check-label" for="exampleRadios3">
                    أخرى
                  </label>
        </div>
            
            
            <input type="text" name="priceAdd" id="newPrice" class="form-control col-3 offset-2" placeholder="سعر المنتج" required>
              

              <button type="submit" class="btn col-1 my-auto submit buttonToSend" name="submit">ارسال</button>
</div>        

                
                </form>
</div>

  <div class="showTable mx-auto text-center table-responsive" style="direction: rtl;">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">الرقم</th>
          <th scope="col">الرقم التسلسلي</th>
          <th scope="col">الصوره</th>
          <th scope="col">اسم المنتج</th>
        </tr>
      </thead>
      <tbody class="shoowTable">

        <?php
        $i=0;
        if(mysqli_num_rows($result_DisplayPost) > 0){
        while ($row = mysqli_fetch_array($result_DisplayPost)) {
        ?>
        
        <tr>
          <th scope='row'><?php echo ++$i ?></th>
          <td><?php echo $row['id'] ?></td>
        <td><img src="savedImg/<?php echo $row['image'] ?>" class="" style="width: 300px; height: 200px;"></td>
        <td><?php echo $row['title'] ?></td>
        <td><a href="" data-toggle="collapse" data-target="#form2" title="edit" class="toEdit" onclick="getEdit1(<?php echo $row['id'] ?>,'<?php echo $row['title'] ?>','<?php echo $row['text'] ?>')"><img src="img/edit.png"></a></td>
        <td><a href="" style="cursor: pointer" data-toggle="modal" data-target="#exampleModal" onclick="toDeletePost(<?php echo $row['id'] ?>)" title="delete"><img src="img/x-button.png"></a></td>
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
      <button type="button" class="btn btn-outline-danger form-control delPost" data-dismiss="modal">الغاء</button>
      <button type="button" class="btn btn-outline-danger form-control position-relative delPost"><a href="#" class="stretched-link">حذف</a></button>
    </div>
  </div>
</div>
</div>

<div class="formEdit collapse" id="form2">
              <form action="editPost.php" method="POST" enctype="multipart/form-data" style="direction: rtl" class="text-center mb-5 needs-validation" novalidate>
                  
        <div class="row row1">

                    <input type="text" name="titleEdit" id="editTitle" value="" class="form-control col-4" placeholder="اسم المنتج" required>
          
                    <textarea name="textEdit" id="editText" cols="30" rows="5" value="" class="form-control col-4 offset-2" placeholder="وصف المنتج" required></textarea>
          
                    <input type="hidden" name="idEdit" id="editId" value="">

                    <button type="submit" class="btn col-1 my-auto buttonToSend" name="submit">ارسال</button>

                  </div>
        
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