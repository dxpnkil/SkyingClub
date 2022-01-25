<?php
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'dbconnect.php';
        $user_email = $_POST['signupEmail'];
        $pass = $_POST['signupPassword'];
        $cpass = $_POST['signupcPassword'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];

        // Check whether this email exists
        $existSql1 = "select * from `users` where user_email = '$user_email'";
        $existSql2 = "select * from `users` where user_name = '$username'";
        $result1 = mysqli_query($conn, $existSql1);
        $result2 = mysqli_query($conn, $existSql2);
 
        $numRows1 = mysqli_num_rows($result1);
        $numRows2 = mysqli_num_rows($result2);

        if($numRows1>0){
            $showError = "Email already in use";
        }
        elseif ($numRows2>0){ 
            $showError = "Username already in use";
        }
        else{
            if($pass == $cpass){
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `user_fullname`, `user_name`, `timestamp`) VALUES ('$user_email', '$hash', '$fullname', '$username', current_timestamp());";
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    $showAlert = true;
                    header("Location: /index.php?signupsuccess=true");
                    exit();
                }

            }
            else{
                $showError = "Password do not match"; 
            }
        }
        header("Location: /index.php?signupsuccess=false&error=$showError");

    }
?>