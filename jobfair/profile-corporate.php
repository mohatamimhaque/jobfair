<?php
session_start();
$page_title = " Profile";


include('includes/header.php');
include('includes/navbar.php');

?>
<?php

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM corporate where user_id='$user_id'");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
?>
   <div class="profile">
                    <h3>Company Info</h3>
                    <div class="profile-container">
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Name:</p>
                                <p><?= $row['name'] ?></p>
                            </div>
                            <div class="profile-content">
                                <p>Address:</p>
                                <p><?= $row['address'] ?></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Phone/Mobile Number:</p>
                                <p><a href="tel:<?= $row['mobile_number'] ?>"><?= $row['mobile_number'] ?></a> </p>
                            </div>
                            <div class="profile-content">
                                <p>Email:</p>
                                <p><a style="text-transform:none" href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>URL/Website:</p>
                                <p style='text-transform:none'><a href="<?= $row['website'] ?>" class="<?= $row['website'] ?>"><?= $row['website'] ?></a> </p>
                            </div>
                        </div>
                       
                        <?php
                            if($row['sort_description'] != ''){
                                ?>
                        <div class="profile-row">
                            <div class="profile-content" style="flex-direction: column;">
                                <p class="m-0">Description:</p>
                                <p><?= $row['sort_description'] ?></p>
                            </div>
                        </div>
                            <?php } ?>
                    </div>
                    <h3>Contact Person Details</h3>
                    <div class="profile-container">
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Person Name:</p>
                                <p><?= $row['person_name'] ?></p>
                            </div>
                           
                            <div class="profile-content">
                                <p>Designation:</p>
                                <p><?= $row['person_designation'] ?></p>
                            </div>
                           
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Phone or Mobile:</p>
                                <p><a href="tel:<?= $row['person_mobile_number'] ?>"><?= $row['person_mobile_number'] ?></a> </p>
                            </div>
                    
                            <div class="profile-content">
                                <p class="m-0">Jobs Department	:</p>
                                <p><?= $row['person_job_department'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_SESSION['corporate'])){

                    ?>
                    <h3>Action</h3>
                    <div class="profile-container action-div">
                        <div class="profile-row">
                            <div class="profile-content">
                                <a href="<?= base_url('create/jobpost') ?>">Create a new job post</a>
                            </div>
                            <div class="profile-content">
                                <a href="<?= base_url('edit/profile/corporate') ?>">Update Profile</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }?>
                    <h3>Job Post</h3>
                    <ol>
                        <?php
                         $query = mysqli_query($con, "SELECT * FROM jobpost where corporate_id='$user_id' and status='0' order by created_at");
                        if(mysqli_num_rows($query) > 0){
                            foreach($query as $r){
                                ?>
                        <li class='d-flex justify-content-between'>
                            <a href="<?= base_url('view/jobpost/'.$r['jobpost_id']) ?>"><?= $r['post_name'] ?></a>
                            <?php
                    if(isset($_SESSION['corporate'])){

                    ?>
                            <form action="<?= base_url('submit/jobpost-delete') ?>" method='POST'>
                                <button style='box-shadow:none;padding:4px 8px;' type='submit' name='submit' value='<?=$r['jobpost_id'] ?>' class='btn btn-danger'>delete</button>
                            </form>

                            <?php }?>
                         </li>
                        <?php
                        }}
                        ?>
                    </ol>
            </div>







<?php
}}}
include('includes/footer.php');
?>