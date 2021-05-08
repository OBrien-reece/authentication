<?php
session_start();
include('dbconnect.php');
if(isset($_POST['registerBtn'])){
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $cPassword = mysqli_real_escape_string($connect, $_POST['cPassword']);

    if($password!=$cPassword){
        $_SESSION['status'] = 'Passwords do not match';
        header("Location:register.php");
    }else{
        $checkEmailExistance = mysqli_query($connect, "SELECT *FROM users_table WHERE email='$email'");
        if(mysqli_num_rows($checkEmailExistance)>0){
              $_SESSION['status'] = 'E_Mail exists';
              header("Location:register.php");            
        }else{
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $insertDataToDB = mysqli_query($connect, "INSERT INTO users_table(name,email,password)
                              VALUES('$name','$email','$hashedPassword')");
            if(!$insertDataToDB){
                        $_SESSION['status'] = 'Failed to save';
                        header("Location:register.php");
            }else{
                        $_SESSION['loggedInUser'] = $email;
                        header("Location:login.php");
            }
        }
    }
}


if(isset($_POST['loginBtn'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        //checl details of the user trying to login 
        $checkUserLogindetails = mysqli_query($connect, "SELECT *FROM users_table WHERE email='$email'");
        //hii code inaambia MYQSLI that unataka details row by row
        $row = mysqli_fetch_assoc($checkUserLogindetails);
        //hii ni password iko kwa database
        $user_pass = trim($row['password']);
        //check kama email mseee ame type ina exist kwa database ama znafanana
        if($row['email'] == $email){
            //check ka passwords znafanana na yenye iko kwa db
            if(password_verify($password, $user_pass)){
                    $_SESSION['loggedInUser'] = $email;
                    header("Location:home.php");
            }else{
                $_SESSION['status'] = "Password and E-mail combination is invalid";
                header("Location:login.php");
            }
        }else{
            $_SESSION['status'] = "E-mail is invalid/does not exist";
            header("Location:login.php");            
        }
}
?>