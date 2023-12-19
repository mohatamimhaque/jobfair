<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");
if (isset($_SERVER["HTTP_REFERER"])) {
    $previous_page = $_SERVER["HTTP_REFERER"];
}
if(isset($_POST["submit"])){
    $user_id = $_POST['user_id'];
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
    $sort_description = $_POST['sort_description'];
    

    if($password == $cpassword){
    
            $query = "UPDATE corporate SET name='$name',user_id='$user_id',email='$email',
            password='$password',address='$address',district='$district',mobile_number='$mobile_number',website='$website',sort_description='$sort_description',
            person_name='$person_name',person_designation='$person_designation',person_mobile_number='$person_mobile_number',person_job_department='$person_job_department' WHERE user_id='$user_id'";
            $query_run = mysqli_query($con, $query);
            
            if($query_run){                
                

                $_SESSION['message'] = 'Updated Successfully';
                header("location:".$url."profile/corporate/".$user_id);
                exit(0);
            }
            else{
                $_SESSION['message'] = 'Something Worng';
                header("location:".$previous_page);
                exit(0);
            }
        }
        else{
            $_SESSION['message'] = "Password Doesn't Matched";
            //header("location:".$previous_page);
            //exit(0);
        }
    }
   
?>