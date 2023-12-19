<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");
if (isset($_SERVER["HTTP_REFERER"])) {
    $previous_page = $_SERVER["HTTP_REFERER"];
}

if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $district = $_POST['district'];
    $mobile_number = $_POST['mobile_number'];
    $website = $_POST['website'];
    $sort_description = $_POST['sort_description'];
    $person_name = $_POST['person_name'];
    $person_designation = $_POST['person_designation'];
    $person_mobile_number = $_POST['person_mobile_number'];
    $person_job_department = $_POST['person_job_department'];



    function user_id($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    while(TRUE){
        $user_id = user_id();
        $id =  mysqli_query($con, "SELECT user_id from jobseeker WHERE user_id='$user_id'");
        if(mysqli_num_rows($id)>0){
            continue;
        }
        else{
            break;
        }
    }
    if($password == $cpassword){
        $checkemail = "SELECT email from corporate WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        if(mysqli_num_rows($checkemail_run)>0){
            $_SESSION['message'] = 'You Have been Already Registered...';
            header("location:".$previous_page);
            exit(0);
        }
        else{
            $query = "INSERT INTO corporate SET name='$name',user_id='$user_id',email='$email',
            password='$password',address='$address',district='$district',mobile_number='$mobile_number',website='$website',sort_description='$sort_description',
            person_name='$person_name',person_designation='$person_designation',person_mobile_number='$person_mobile_number',person_job_department='$person_job_department'";
            $query_run = mysqli_query($con, $query);

            if($query_run){                
                $_SESSION['corporate'] = true;
                $_SESSION['corporate_user'] = [
                    'user_id' => $user_id
                ];
                $_SESSION['message'] = 'Register Successfully';
                header("location:".$url);
                exit(0);
            }
            else{
                $_SESSION['message'] = 'Something Worng';
                header("location:".$previous_page);
                exit(0);
            }
        }
    }
    else{
        $_SESSION['message'] = "Password Doesn't Matched";;
        header("location:".$previous_page);
        exit(0);
    }
}