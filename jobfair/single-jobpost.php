<?php
session_start();
$page_title = "Jobpost";


include('includes/header.php');
include('includes/navbar.php');
if(isset($_GET['id'])){
    $jobpost_id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM jobpost where jobpost_id='$jobpost_id' and status='0'");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
?>


<div class="jobpost">
                    <div class="jobpost-header">
                        <div class="m-0 d-flex">
                            <h3>Position: <?= $row['post_name'] ?></h3>
                        </div>
                        <div class="d-flex">
                        <?php if(isset($_SESSION['corporate'])) { ?>
                            <a style="pointer-events:visible" href="<?= base_url('edit/jobpost/'.$row['jobpost_id'])?>">edit</a>
                            <?php
        }
                            
                          else{

                            if (isset($_SERVER["HTTP_REFERER"])) {
                                $previous_page = $_SERVER["HTTP_REFERER"];
                                ?>
                               <a style="pointer-events:visible" href="<?= $previous_page ?>">back</a>
                            <?php }}


                            ?>

                            
                        </div>

                    </div>
                    <div class="jobpost-body mt-3" style="width:100%">
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Post number:</p>
                                <p><?= $row['post_number'] ?></p>
                            </div>
                            <div class="profile-content">
                                <p>Job Location:</p>
                                <p><?= $row['job_location'] ?></p>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Salary:</p>
                                <p><?= $row['salary'] ?></p>
                            </div>
                            <div class="profile-content file">
                                <p>File Download:</p>
                                <?php
                                if($row['file'] != ''){
                                    ?>
                                <p><a href="<?= base_url('upload/corporate/file/'.$row['file']) ?>" download style="font-size:13px;padding:4px 12px">Download</a></p>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="profile-content">
                                <p>Application Start:</p>
                                <p><?= $row['application_start'] ?></p>
                            </div>
                            <div class="profile-content">
                                <p>Deadline:</p>
                                <p><?= $row['application_deadline'] ?></p>
                            </div>
                        </div>
                       
                        <div class="profile-row">
                            <div class="profile-content" style="flex-direction:column ;width:100%" >
                                <p class="m-0">Description:</p>
                                <div style="width:100%"><?= $row['description'] ?></div>
                            </div>
                        </div>
                        <hr>


                    <div class="organization_information mb-4">
                        <?php
                        $user_id=$row['corporate_id'];
                        $query = mysqli_query($con, "SELECT * FROM corporate where user_id='$user_id'");
                        if(mysqli_num_rows($query) > 0){
                            foreach($query as $row){
                                ?>
                        <h4>Organization Information</h4>
                        <p>Name: <a href="<?=base_url('profile/corporate/'.$user_id) ?>"><?= $row['name'] ?></a></p>
                        <p>Website: <a href="<?= $row['website'] ?>"><?= $row['website'] ?></a></p>
                                <?php 
                            }}?>
                    </div>
                    </div>
                </div>





<?php
        }
    }
    else{
        ?>
        <div class="jobpost">

        <h3> No Content Fount </h3>

        </div>
        <?php
    }
}
include('includes/footer.php');
?>