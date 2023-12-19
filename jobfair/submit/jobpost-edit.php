<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");

if(isset($_POST["submit"])){
    $corporate_id = $_POST['corporate_id'];
    $jobpost_id = $_POST['jobpost_id'];
    $old_file = $_POST['old_file'];
    $post_name = $_POST['post_name'];
    $post_category = $_POST['post_category'];
    $post_number = $_POST['post_number'];
    $salary = $_POST['salary'];
    $job_location = $_POST['job_location'];

    $file = $_FILES['file']['name'];
    $update_file='';
    if($file != NULL){
        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
        $filename = time().'.'.$file_extension;
        
        $update_file=$filename;
    }
    else{

        $update_file=$old_file;
        $file_extension = '';

    }




    $application_start = $_POST['application_start'];
    $application_deadline = $_POST['application_deadline'];
    $description = $_POST['description'];


    $query = mysqli_query($con,"UPDATE jobpost SET post_name='$post_name',post_category='$post_category',post_number='$post_number',salary='$salary',job_location='$job_location',file='$update_file',application_start='$application_start',application_deadline='$application_deadline',description='$description' WHERE jobpost_id='$jobpost_id'");


    if($query){
        echo 'ok';
        if($file_extension != ''){
            if($file != NULL){
                move_uploaded_file($_FILES['file']['tmp_name'], '../upload/corporate/file/'.$update_file);
            }

        }
      
            $_SESSION['message'] = 'Updated Successfully.';
            header("location:".$url.'view/jobpost/'.$jobpost_id);
            exit(0);
        }

    
    else{
        if (isset($_SERVER["HTTP_REFERER"])) {
            $previous_page = $_SERVER["HTTP_REFERER"];
            $_SESSION['message'] = 'Something Worng';
            header("location:".$previous_page);
            exit(0);
        }
        echo 'no';
    }


}

else{
    if (isset($_SERVER["HTTP_REFERER"])) {
        $previous_page = $_SERVER["HTTP_REFERER"];
        $_SESSION['message'] = 'Something Worng';
        header("location:".$previous_page);
        exit(0);
        
    }
}


?>












