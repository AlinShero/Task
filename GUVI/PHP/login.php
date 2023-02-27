<?php 
session_start(); 
include 'config.php';

if (isset($_POST['email']) && isset($_POST['pass'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $mail = validate($_POST['mail']);
    $pass = validate($_POST['pass']);
    if (empty($mail)) {
        header("Location:index.html?error=Email is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.html?error=Password is required");
        exit();
    }else{

        $sql = "SELECT id,name,email,dob,mobile,gender from test WHERE email='$mail' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                echo "Logged in!";
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: profile.php");
                exit();
            }else{
                header("Location: index.html?error=Incorect email or password");
                exit();
            }
        }else{
            header("Location: index.html?error=Incorect email or password");
            exit();
        }
    }
}else{
    header("Location: index.html");
    exit();
}