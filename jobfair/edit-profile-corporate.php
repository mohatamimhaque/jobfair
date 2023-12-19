<?php
session_start();
$page_title = "Edit Profile";


include('includes/header.php');
if(isset($_SESSION['corporate']) OR isset($_SESSION['admin'])){
    if(isset($_SESSION['corporate'])){
        $user_id=$_SESSION['corporate_user']['user_id'];
    }
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
    }
    include('includes/navbar.php');
    $query = mysqli_query($con, "SELECT * FROM corporate where user_id='$user_id'");
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row){
?>
<form style="width:100%" class="signup-form position-relative" action="<?= base_url('submit/edit-profile-corporate') ?>" method="POST">
            <input type="hidden" value="<?= $user_id ?>" name='user_id'>
        <p class="p-0 position-absolute m-0" style="font-size: 14px;top:5px;left: 0"><strong>*</strong> Required Information</p>
            <div class="signup-row">
                <div class="inputbox">
                    <label for="email">Email Address<strong>*</strong>:</label>
                    <div class="position-relative">
                        <input type="email" placeholder="Email" value="<?= $row['email'] ?>" name="email" id="email" required>
                        <span class="line"></span>
                    </div>
                </div>
                <p>Please enter valid email.</p>
            </div>
            <div class="signup-row">
                <div class="inputbox position-relative">
                    <label for="password">Password<strong>*</strong>:</label>
                    <div class="position-relative">
                        <input type="password" placeholder="Password" value="<?= $row['password'] ?>" name="password" id="password" required>
                        <span class="line"></span>
                    </div>
                </div>
                <p>	Enter 6 to 20 characters (A-Z, a-z, 0-9, no spaces).</p>
            </div>
            
            <div class="signup-row">
                <div class="inputbox mb-2 position-relative">
                    <label for="cpassword">confirm Password<strong>*</strong>:</label>
                    <div class="position-relative">
                        <input type="password" placeholder="Confirm Password" value="<?= $row['password'] ?>" name="cpassword" id="cpassword" required>
                        <span class="line"></span>
                        <div class="position-absolute form-check mt-1">
                            <input type="checkbox" id="password-show" class="form-check-input">
                            <label for="password-show" class="form-check-label" style="font-size: 12px;">show password</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="personal-information">
                <h3>Company Details</h3>
                <div class="personal-information-body">
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="name">Company Name<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Company Name" value="<?= $row['name'] ?>" name="name" id="name" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="address">address<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Address" value="<?= $row['address'] ?>" name="address" id="address" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="district">District<strong>*</strong>:</label>
                            <div class="position-relative">
                                <select name="district" id="district">
                                    <option value="<?= $row['district'] ?>"><?= $row['district'] ?></option>
                                    <?php
                                    include('includes/district.php');
                                     ?>
                                </select>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="phone">mobile number<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Phone / Mobile Number" value="<?= $row['mobile_number'] ?>" name="mobile_number" id="phone" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="website" style="text-transform:none">URL/Website<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="url" placeholder="URL/Website" value="<?= $row['website'] ?>" name="website" id="website" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="signup-row">
                        <label for="sort_description">Sort Description:</label>
                        <div class="position-relative mt-1" style="width:calc(100% - 150px)">
                            <input type="text" placeholder="Write a Sort Description (maximum characters 200)" value="<?= $row['sort_description'] ?>" name="sort_description" id="sort_description">
                            <span class="line"></span>
                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="personal-information">
                <h3>Contact Person Details</h3>
                <div class="personal-information-body">
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="contact_name">Name<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Contact Person Name" value="<?= $row['person_name'] ?>" name="person_name" id="person_name" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="designation">Designation<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Contact Person's Designation" value="<?= $row['person_designation'] ?>" name="person_designation" id="person_designation" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="contact_phone">phone/mobile<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Contact Person's Phone / Mobile" value="<?= $row['person_mobile_number'] ?>" name="person_mobile_number" id="person_mobile_number" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="department" style="text-transform:none">Jobs Department<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Jobs Department" name="person_job_department" value="<?= $row['person_job_department'] ?>"  id="person_job_department" required>
                                <span class="line"></span>
                            </div>
                        </div>
                       
                    </div>
                   

                </div>
            </div>
            
            <div class="submit_btn mt-2">
                <button type='submit' style='pointer-events:visible' name='submit'>Update</button>
            </div>

        </form>







<?php
}}}
else{

    if(!isset($_SESSION['message'])){
     $_SESSION["message"] = "You Have no Permission to Access this page.";
   }
   header("location:".$url);
  exit(0);
}
include('includes/footer.php');
?>