<?php
session_start();
$page_title = "Jobpost";


include('includes/header.php');
if(isset($_SESSION['corporate']) OR isset($_SESSION['admin'])){
    if(isset($_SESSION['corporate'])){
        $user_id=$_SESSION['corporate_user']['user_id'];
    }
    include('includes/navbar.php');
?>



<div class="jobpost">
                    <div class="jobpost-header">
                        <p class="m-0">Create a New Job Post</p>
                        <a style='pointer-events:visible' href="<?= base_url('profile/corporate/'.$user_id) ?>">back</a>
                    </div>
                    <form class="jobpost-body mt-4" action="<?= base_url('submit/jobpost-create') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name='corporate_id' value="<?= $user_id ?>">
                    <div class="signup-row">
                            <div class="inputbox">
                                <label for="post-name">Post name<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input type="text" placeholder="Post Name" name="post_name" id="post-name" required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <label for="post-number" style="text-transform:none">Post Category<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <select name="post_category" required id="category">
                                    <?php
                                        include('includes/category.php');

                                        ?>    
                                         </select>
                                    <span class="line"></span>

                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <div class="inputbox">
                                <label for="post-number" style="text-transform:none">Post Number<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input type="text" placeholder="Post Number" name="post_number" id="post-number" required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <label for="salary">Salary<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input type="text" placeholder="Salary" name="salary" id="salary" required>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <div class="inputbox">
                                <label for="post-number" style="text-transform:none">Job Location<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <select name="job_location" id="job-location">
                                        <?php
        include('includes/district.php');

                                        ?>

                                    </select>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="inputbox file_upload">
                                <label for="file">file upload:</label>
                                <div class="custom_file position-relative" style="overflow:hidden">
                                    <input style="overflow:hidden" accept=".jpg,.jpeg,.png,.jfif,.pdf" type="file" name='file' id="file">
                                    <label for="file" class="show_filename">Choose File...</label>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <div class="inputbox">
                                <label for="application-start" style="text-transform:none">Application Start<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input type="date" placeholder="Application Start" name="application_start" id="application-start"min="2022-01-01" max="2050-12-31" required required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <label for="application-deadline" style="text-transform:none">Application Deadline<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input type="date" placeholder="Application Deadline" name="application_deadline" id="application-deadline" min="22-01-01" max="2050-12-31" required required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="signup-row">
                            <div class="" style="width:100%;flex-direction:column">
                                <label for="description" style="text-transform:none">Description:</label>
                                <textarea name="description" id="summernote" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="submit_btn">
                            <button type="submit" name='submit'>post</button>
                        </div>
                    </form>
                </div>






                <?php

}
else{

    if(!isset($_SESSION['message'])){
     $_SESSION["message"] = "You Have no Permission to Access this page.";
   }
   header("location:".$url);
  exit(0);
}
include('includes/footer.php');
?>