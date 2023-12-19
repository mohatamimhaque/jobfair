<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");

if(isset($_POST["submit"])){
    $corporate_id = $_POST['corporate_id'];
    $post_name = $_POST['post_name'];
    $post_category = $_POST['post_category'];
    $post_number = $_POST['post_number'];
    $salary = $_POST['salary'];
    $job_location = $_POST['job_location'];
    $file = $_FILES['file']['name'];
    if($file != NULL){

    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
    $file_name = time().'.'.$file_extension;
    }
    else{
        $file_name='';
    }

    $application_start = $_POST['application_start'];
    $application_deadline = $_POST['application_deadline'];
    $description = $_POST['description'];

    function jobpost_id($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    while(TRUE){
        $jobpost_id = jobpost_id();
        $id =  mysqli_query($con, "SELECT jobpost_id from jobpost WHERE jobpost_id='$jobpost_id'");
        if(mysqli_num_rows($id)>0){
            continue;
        }
        else{
            break;
        }
    }


    $query = mysqli_query($con,"INSERT INTO jobpost SET jobpost_id='$jobpost_id',corporate_id='$corporate_id',post_name='$post_name',post_category='$post_category',post_number='$post_number',salary='$salary',job_location='$job_location',file='$file_name',application_start='$application_start',application_deadline='$application_deadline',description='$description'");

    if($query){
        if($file != NULL){
            move_uploaded_file($_FILES['file']['tmp_name'], '../upload/corporate/file/'.$file_name);
        }
        echo 'dsdsds';

        $check = mysqli_query($con, "SELECT * from jobseeker WHERE category='$post_category'");
        if(mysqli_num_rows($check)>0){
            foreach($check as $row){
                $user_id=$row['user_id'];
                if($row['notification_list'] != ''){
                    $data = explode(',',$row['notification_list']);
                    if(in_array($jobpost_id, $data, TRUE)){
                    }
                    else{
                        $data[]=$jobpost_id.'-0';
                        $notification_list = implode(',',$data);
                        mysqli_query($con, "UPDATE jobseeker SET notification_list='$notification_list' WHERE user_id='$user_id'");
                    }
                }
                else{
                    $notification_list = $jobpost_id.'-0';
                    mysqli_query($con, "UPDATE jobseeker SET notification_list='$notification_list' WHERE user_id='$user_id'"); 
                }

            }

            $_SESSION['message'] = 'Post Successfully.';
            header("location:".$url.'profile/corporate/'.$corporate_id);
            exit(0);
        }
       
        $_SESSION['message'] = 'Post Successfully.';
        header("location:".$url.'profile/corporate/'.$corporate_id);
        exit(0);



    }
    else{
        if (isset($_SERVER["HTTP_REFERER"])) {
            $previous_page = $_SERVER["HTTP_REFERER"];
            $_SESSION['message'] = 'Something Worng';
            header("location:".$previous_page);
            exit(0);
            
        }
    }







}












?>