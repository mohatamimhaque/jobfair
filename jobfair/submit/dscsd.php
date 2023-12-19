<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");

if(isset($_POST["signup"])){
    echo 'ok';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $image_name = time().'.'.$image_extension;
    $fathers_name = $_POST['fathers_name'];
    $mothers_name = $_POST['mothers_name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $education_status = $_POST['education_status'];
    $gpa = $_POST['gpa'];
    $expert_on = $_POST['expert_on'];
    $category = $_POST['category'];
    $skill = $_POST['skill'];
    $cv = $_FILES['cv']['name'];
    $cv_extension = pathinfo($cv, PATHINFO_EXTENSION);
    $cv_name = time().'.'.$cv_extension;
    $address = $_POST['address'];
    $district = $_POST['district'];
    $mobile_number = $_POST['phone'];
    $description = $_POST['sort_description'];

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
        $checkemail = "SELECT email from jobseeker WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        if(mysqli_num_rows($checkemail_run)>0){
            $_SESSION['message'] = 'Something Went Worng';
            header("location:".$url.'submit/signup-jobseeker');
            exit(0);
        }
        else{
            $allowTypes = array('jpg','png','jpeg','gif','jfif','pdf'); 
            if(in_array($image_extension, $allowTypes) AND in_array($cv_extension, $allowTypes)){
                $query = "INSERT INTO laptop SET name='$name',user_id='$user_id',email='$email',
                password='$password',photo='$image_name,fathers_name='$fathers_name',mothers_name='$mothers_name',
                birthday='$birthday',gender='$gender',education_status='$education_status',gpa='$gpa',expert_on='$expert_on',category='$category',
                skill='$skill',cv='$cv_name',address='$address',district='$district',mobile_number='$mobile_number',description='$description'";
                $query_run = mysqli_query($con, $query);
                if($query_run){
                    move_uploaded_file($_FILES['image']['tmp_name'], '../upload/jobseeker/image/'.$image_name);
                    move_uploaded_file($_FILES['cv']['tmp_name'], '../upload/jobseeker/cv/'.$cv_name);
                    
                    $_SESSION['auth'] = true;
                    $_SESSION['auth_user'] = [
                        'user_id' => $user_id,
                    ];

                    $_SESSION['message'] = 'Register Successfully';
                    header("location:".$url);
                    exit(0);
                }
                else{
                    $_SESSION['message'] = 'Something Went Worng';
                    header("location:".$url.'submit/signup-jobseeker');
                    exit(0);
                }
            }
            else{
                $_SESSION['message'] = "This Type Don't Allow";;
                header("location:".$url.'submit/signup-jobseeker');
                exit(0);
            }

           
        }

    }
    else{
        $_SESSION['message'] = "Password Doesn't Matched";;
        header("location:".$url.'submit/signup-jobseeker');
        exit(0);
    }


/*
    echo $name;
    echo $email;
    echo $password;
    echo $cpassword;
    echo $image_name;
    echo $fathers_name;
    echo $mothers_name;
    echo $birthday;
    echo $gender;
    echo $education_status;
    echo $gpa;
    echo $expert_on;
    echo $skill;
    echo $address;
    echo $district;
    echo $mobile_number;
    echo $cv_name;
*/


}
else{
    echo 'no';
}



?>
