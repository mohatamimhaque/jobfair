<?php
session_start();
$page_title = "Signup";


include('includes/header.php');
if(isset($_SESSION['jobfair']) OR isset($_SESSION['corporate'])){
    if(!isset($_SESSION['message'])){
      $_SESSION["message"] = "You Are Already Logged in";
    }
    header("location:".$url);
   exit(0);
  }
  if (isset($_SERVER["HTTP_REFERER"])) {
    $previous_page = $_SERVER["HTTP_REFERER"];
}

?>


<div id="main-warpper" class="signuppage">
        <div class="signupheader">
            <p class="mt-3">Signup as a Employer</p>
            <a href="<?= $url ?>">back</a>
        </div>
        <form class="signup-form position-relative" action="<?= base_url('submit/signup-corporate') ?>" method="POST">
            <p class="p-0 position-absolute m-0" style="font-size: 14px;top:5px;left: 0"><strong>*</strong> Required Information</p>
            <div class="signup-row">
                <div class="inputbox">
                    <label for="email">Email Address<strong>*</strong>:</label>
                    <div class="position-relative">
                        <input type="email" placeholder="Email" name="email" id="email" required>
                        <span class="line"></span>
                    </div>
                </div>
                <p>Please enter valid email.</p>
            </div>
            <div class="signup-row">
                <div class="inputbox position-relative">
                    <label for="password">Password<strong>*</strong>:</label>
                    <div class="position-relative">
                        <input type="password" placeholder="Password" name="password" id="password" required>
                        <span class="line"></span>
                    </div>
                </div>
                <p>	Enter 6 to 20 characters (A-Z, a-z, 0-9, no spaces).</p>
            </div>
            
            <div class="signup-row">
                <div class="inputbox mb-2 position-relative">
                    <label for="cpassword">confirm Password<strong>*</strong>:</label>
                    <div class="position-relative">
                        <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" required>
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
                                <input type="text" placeholder="Company Name" name="name" id="name" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="address">address<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Address" name="address" id="address" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="district">District<strong>*</strong>:</label>
                            <div class="position-relative">
                                <select name="district" id="district">
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
                                <input type="text" placeholder="Phone / Mobile Number" name="mobile_number" id="phone" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="website" style="text-transform:none">URL/Website<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="url" placeholder="URL/Website" name="website" id="website" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="signup-row">
                        <label for="sort_description">Sort Description:</label>
                        <div class="position-relative mt-1" style="width:calc(100% - 150px)">
                            <input type="text" placeholder="Write a Sort Description (maximum characters 200)" name="sort_description" id="sort_description">
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
                                <input type="text" placeholder="Contact Person Name" name="person_name" id="person_name" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="designation">Designation<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Contact Person's Designation" name="person_designation" id="person_designation" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="contact_phone">phone/mobile<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Contact Person's Phone / Mobile" name="person_mobile_number" id="person_mobile_number" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="department" style="text-transform:none">Jobs Department<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Jobs Department" name="person_job_department" id="person_job_department" required>
                                <span class="line"></span>
                            </div>
                        </div>
                       
                    </div>
                   

                </div>
            </div>
            <div class="terms mt-3">
                <h3 style="font-size:17px" class="m-0">Terms & Condition</h3>
                <ul class="mt-3">
                    <li>Your Profile can be viewed by any person.</li>
                    
                </ul>
                <div class="form-check ml-3 mt-2">
                    <input type="checkbox" id="terms-accept" class="form-check-input">
                    <label for="terms-accept" class="form-check-label w-50" style="font-size:15px">I agree to the following</label>
                </div>
            </div>
            <div class="submit_btn mt-2">
                <button type='submit' name='submit'>Submit</button>
            </div>

        </form>






<?php
include('includes/footer.php');
?>