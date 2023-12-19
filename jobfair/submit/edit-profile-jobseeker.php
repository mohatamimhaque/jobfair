<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");

if(isset($_POST["submit"])){
    $user_id = $_POST['user_id'];
    $old_photo = $_POST['old_photo'];
    $old_cv = $_POST['old_cv'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['image']['name'];
    $update_filename='';
    if($image != NULL){
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;
        
        $update_photo=$filename;
    }
    else{
        $update_photo=$old_photo;
        $image_extension = '';


    }
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
    $update_filename='';
    if($cv != NULL){
        $cv_extension = pathinfo($cv, PATHINFO_EXTENSION);
        $filename = time().'.'.$cv_extension;
        
        $update_cv=$filename;
    }
    else{
        $cv_extension='';
        $update_cv=$old_cv;

    }
    $address = $_POST['address'];
    $district = $_POST['district'];
    $mobile_number = $_POST['phone'];
    $description = $_POST['sort_description'];

   
    if($password == $cpassword){
        $checkemail = "SELECT email from jobseeker WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
       
            $allowTypes = array('jpg','png','jpeg','gif','jfif','pdf',''); 
            if(in_array($image_extension, $allowTypes)){            
                $query = "UPDATE jobseeker SET name='$name',user_id='$user_id',email='$email',
            password='$password',photo='$update_photo',fathers_name='$fathers_name',mothers_name='$mothers_name',
                birthday='$birthday',gender='$gender',education_status='$education_status',gpa='$gpa',expert_on='$expert_on',category='$category',
                skill='$skill',cv='$update_cv',address='$address',district='$district',mobile_number='$mobile_number',description='$description' WHERE user_id='$user_id'";
                $query_run = mysqli_query($con, $query);
                if($query_run){
                    if($image!=NULL){
                        if(file_exists('../upload/jobseeker/image/'.$old_photo)){
                             unlink('../upload/jobseeker/image/'.$old_photo);
                        }
            
                        move_uploaded_file($_FILES['image']['tmp_name'], '../upload/jobseeker/image/'.$update_photo);
                    }
                    if($cv_extension != ''){
                        if($cv != NULL){
                            if(file_exists('../upload/jobseeker/cv/'.$old_cv)){
                                 unlink('../upload/jobseeker/cv/'.$old_cv);
                                 echo 'scdsc';
                                }
                            
                            move_uploaded_file($_FILES['cv']['tmp_name'], '../upload/jobseeker/cv/'.$update_cv);
                        }

                    }
                    

                    $_SESSION['message'] = 'Updated Successfully';
                    header("location:".$url."profile/jobseeker/".$user_id);
                    exit(0);
                }
                else{
                    $_SESSION['message'] = 'Something Worng';
                   header("location:".$url.'signup/jobseeker');
                    exit(0);
                }
                
            }
            else{
                $_SESSION['message'] = "This Type Don't Allow";
                header("location:".$url.'signup/jobseeker');
                exit(0);
            }

    }
    else{
        $_SESSION['message'] = "Password Doesn't Matched";;
        header("location:".$url.'signup/jobseeker');
        exit(0);
    }


}

    ?>