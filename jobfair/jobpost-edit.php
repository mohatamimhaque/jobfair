<?php
session_start();
$page_title = "Edit Profile";


include('includes/header.php');
include('includes/navbar.php');
if(isset($_GET['id'])){
    $jobpost_id = $_GET['id'];
    if(isset($_SESSION['corporate'])){
        $user_id=$_SESSION['corporate_user']['user_id'];
    $query = mysqli_query($con, "SELECT * FROM jobpost where jobpost_id='$jobpost_id' and corporate_id = '$user_id' and status='0'");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
?>
<div class="jobpost">
                    <div class="jobpost-header">
                        <p class="m-0">Create a New Job Post</p>
                        <a style='pointer-events:visible' href="<?= base_url('profile/corporate/'.$user_id) ?>">back</a>
                    </div>
                    <form class="jobpost-body mt-4" action="<?= base_url('submit/jobpost-edit') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name='jobpost_id' value="<?= $row['jobpost_id'] ?>">
                        <input type="hidden" name='corporate_id' value="<?= $user_id ?>">
                    <div class="signup-row">
                            <div class="inputbox">
                                <label for="post-name">Post name<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input value='<?= $row['post_name'] ?>' type="text" placeholder="Post Name" name="post_name" id="post-name" required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <label for="post-number" style="text-transform:none">Post Category<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <select name="post_category" required id="category">
                                        <option value="<?= $row['post_category'] ?>"><?= $row['post_category'] ?></option>
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
                                    <input type="text" value='<?= $row['post_number'] ?>' placeholder="Post Number" name="post_number" id="post-number" required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <label for="salary">Salary<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input type="text" placeholder="Salary" value='<?= $row['salary'] ?>' name="salary" id="salary" required>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="signup-row">
                            <div class="inputbox">
                                <label for="post-number" style="text-transform:none">Job Location<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <select name="job_location" id="job-location">
                                        <option value="<?= $row['job_location'] ?>"><?= $row['job_location'] ?></option>
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
                                <input type="hidden" value='<?= $row['file'] ?>' name='old_file'>
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
                                    <input type="date" value='<?= $row['application_start'] ?>' placeholder="Application Start" name="application_start" id="application-start"min="2022-01-01" max="2050-12-31" required required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            <div class="inputbox">
                                <label for="application-deadline" style="text-transform:none">Application Deadline<strong>*</strong>:</label>
                                <div class="position-relative">
                                    <input type="date" value='<?= $row['application_deadline'] ?>' placeholder="Application Deadline" name="application_deadline" id="application-deadline" min="22-01-01" max="2050-12-31" required required>
                                    <span class="line"></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="signup-row">
                            <div class="" style="width:100%;flex-direction:column">
                                <label for="description" style="text-transform:none">Description:</label>
                                <textarea name="description" id="summernote" cols="30" rows="5"><?= $row['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="submit_btn">
                            <button type="submit" name='submit'>Update</button>
                        </div>
                    </form>
                </div>


<?php
        }}
    else{
        header("location:".$url);
        exit(0); 
    }
    }
    else{
        header("location:".$url);
        exit(0); 
    }
}
else{
    header("location:".$url);
    exit(0); 
}
include('includes/footer.php');

?>



