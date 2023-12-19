<?php
session_start();
include("../includes/dbcon.php");
if(isset($_POST["jlogin"])){
    if(!isset($_SESSION['jobfair']) OR !isset($_SESSION['corporate'])){
    $email= $_POST["email"];
    $password= $_POST["password"];

    $query =mysqli_query($con, "SELECT * FROM jobseeker WHERE email='$email' AND password = '$password' LIMIT 1");

    if(mysqli_num_rows($query) > 0){
        foreach($query as $data){
            $user_id = $data['user_id'];
            $status = $data['status'];//1 =Delete Account, 0=Active
        }
    if($status == "0"){
        $_SESSION['jobfair'] = true;
        $_SESSION['jobfair_user'] = [
            'user_id' => $user_id
        ];
        echo 'Login Successfully.';
    }
    else{
        echo 'Something Went Worng.';
    }
}
    else{
        echo "You Aren't Registered.";
    }
    }}


if(isset($_POST["clogin"])){
    if(!isset($_SESSION['jobfair']) OR !isset($_SESSION['corporate'])){
    $email= $_POST["email"];
    $password= $_POST["password"];

    $query =mysqli_query($con, "SELECT * FROM corporate WHERE email='$email' AND password = '$password' LIMIT 1");

    if(mysqli_num_rows($query) > 0){
        foreach($query as $data){
            $user_id = $data['user_id'];
            $status = $data['status'];//1 =Delete Account, 0=Active
        }
    if($status == "0"){
        $_SESSION['corporate'] = true;
        $_SESSION['corporate_user'] = [
            'user_id' => $user_id
        ];
        echo 'Login Successfully.';
    }
    else{
        echo 'Something Went Worng.';
    }
}
    else{
        echo "You Aren't Registered.";
    }
    }}





?>