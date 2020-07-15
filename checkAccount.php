<?php

include "database.php";

session_start();

//LogOut
if (isset($_SESSION['id'])) {
    
    if(isset($_COOKIE['id']))
    {
        setcookie('id', '', time() - (86400 * 30));
        setcookie('name', '', time() - (86400 * 30));
        setcookie('email', '', time() - (86400 * 30));
        setcookie('phone', '', time() - (86400 * 30));
        setcookie('role', '', time() - (86400 * 30));
    }

    header("Location:Home.php");
    mysqli_close($con);
    session_destroy();
    exit();

}

//LogIn
if(!isset($_POST['submit']))
{
    header("Location:Register.php?errorInRegister");
    mysqli_close($con);
    session_destroy();
    exit();
}
else
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    // find user in database
    $sql = " SELECT * FROM user WHERE email = '$email' ";
    $result = mysqli_query($con,$sql);
    // find employee in database
    $sqlE = " SELECT * FROM employee WHERE email = '$email' ";
    $resultE = mysqli_query($con,$sqlE);

    // check whether user or employee has account or not
    if(mysqli_num_rows($result) <= 0 && mysqli_num_rows($resultE) <= 0)
        {
            header("Location:Register.php?errorInLogin");
            mysqli_close($con);
            session_destroy();
            exit();
        }
        else
        {
            // check whether user password is correct
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);

                if(!(password_verify($password,$row['password'])))
                {
                    header("Location:Register.php?errorInLogin");
                    mysqli_close($con);
                    session_destroy();
                    exit();
                }
            
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];
            
                    if(isset($_POST['remember']))
                    {
                        setcookie('id', $row['id'], time() + (86400 * 30));
                        setcookie('name', $row['name'], time() + (86400 * 30));
                        setcookie('email', $row['email'], time() + (86400 * 30));
                        setcookie('phone', $row['phone'], time() + (86400 * 30));
                    }
                    
                    header("Location:Home.php");
                    mysqli_close($con);
                    exit();
            }
            // check whether employee password is correct
            else if(mysqli_num_rows($resultE) > 0)
            {
                $rowE = mysqli_fetch_assoc($resultE);

                if(!(password_verify($password,$rowE['password'])))
                {
                    header("Location:Register.php?errorInLogin");
                    mysqli_close($con);
                    session_destroy();
                    exit();
                }
            
                    $_SESSION['id'] = $rowE['id'];
                    $_SESSION['name'] = $rowE['name'];
                    $_SESSION['email'] = $rowE['email'];
                    $_SESSION['role'] = $rowE['role'];
            
                    if(isset($_POST['remember']))
                    {
                        setcookie('id', $rowE['id'], time() + (86400 * 30));
                        setcookie('name', $rowE['name'], time() + (86400 * 30));
                        setcookie('email', $rowE['email'], time() + (86400 * 30));
                        setcookie('role', $rowE['role'], time() + (86400 * 30));
                    }
                    
                    header("Location:Dashboard.php");
                    mysqli_close($con);
                    exit();
            }
        }
   

} 


?>