<?php
session_start();

$page_title = "Jobseeker";
include('includes/header.php');
if(isset($_SESSION['jobfair']) OR isset($_SESSION['corporate']) OR isset($_SESSION['admin'])){
 
    include('includes/navbar.php');

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM jobseeker where user_id='$user_id'");
    if(mysqli_num_rows($query) > 0){
         foreach($query as $row){
    


?>

<div class="profile">
                    <div class="position-relative">
                        <div class="profile-image">
                            <img src="<?= base_url('upload/jobseeker/image/'.$row['photo']) ?>" alt="">
                        </div>
                        <div class="profile-header">
                        <?php if(isset($_SESSION['jobfair_user'])) : ?>

                            <p>My Account</p>
                            <a style="pointer-events:visible" href="<?= base_url('edit/profile/jobseeker') ?>">Edit Account</a>
                            <?php else :?>
                                <p><?= $row['name'] ?></p>
                                <?php
                                if (isset($_SERVER["HTTP_REFERER"])) {
                                 $previous_page = $_SERVER["HTTP_REFERER"];
                                            ?>
                                      <a href="<?= $previous_page ?>">BAck</a>

                               <?php
                                    }                
                                ?>
                            <?php endif; ?>


                            

                        </div>
                    </div>
                    <div class="profile-container mt-5">
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Name:</p>
                                <p><?= $row['name'] ?></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Father's Name:</p>
                                <p><?= $row['fathers_name'] ?></p>
                            </div>
                            <div class="profile-content">
                                <p>Mothers's Name:</p>
                                <p><?= $row['mothers_name'] ?></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Birthday:</p>
                                <p><?= $row['birthday'] ?></p>
                            </div>
                            <div class="profile-content">
                                <p>Gender:</p>
                                <p><?= $row['gender'] ?></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Education Status:</p>
                                <p><?= $row['education_status'] ?></p>
                            </div>
                            <div class="profile-content">
                                <p>GPA/CGPA:</p>
                                <p><?= $row['gpa'] ?></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Expert on:</p>
                                <p><?= $row['expert_on'] ?></p>
                            </div>
                            <div class="profile-content">
                                <p>Skill:</p>
                                <p>
                                    <?php
                                    if($row['skill'] == '0'){
                                        echo 'Fresher';
                                    }
                                    else{
                                        echo $row['skill'].'Years+';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Phone/Mobile Number:</p>
                                <p><a href="tel:<?= $row['mobile-number'] ?>"><?= $row['mobile_number'] ?></a> </p>
                            </div>
                            <div class="profile-content">
                                <p>Email:</p>
                                <p><a style="text-transform:none" href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Addrress:</p>
                                <p><?= $row['address'] ?></p>
                            </div>
                            <div class="profile-content cv">
                                <p>CV:</p>
                                <?php
                                if($row['cv'] != ''){
                                    ?>
                                <p><a href="<?= base_url('upload/jobseeker/cv/'.$row['cv']) ?>">Download</a></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
          

                        <div class="profile-row">
                            <div class="profile-content" style="flex-direction: column;">
                                <p class="m-0">Sort Description:</p>
                                <p><?= $row['description'] ?></p>
                            </div>
                        </div>
                    </div>
                    
            </div>






<?php
}}}}
else{

    if(!isset($_SESSION['message'])){
     $_SESSION["message"] = "You Have no Permission to Access this page.";
   }
   header("location:".$url);
  exit(0);
}

include('includes/footer.php');
?>
