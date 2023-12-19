<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");

if(isset($_POST["logout_btn"])){

        //session destroy()
    
        unset( $_SESSION['auth']);    
        unset( $_SESSION['auth_user']);

        unset( $_SESSION['corporate']);    
        unset( $_SESSION['corporate_user']);

        $_SESSION['message'] = "Logged out Successfully";
        header("location:".$url);
        exit(0);
    

}

?>