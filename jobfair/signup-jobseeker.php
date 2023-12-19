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

<!-------------start main wrapper----------------------->
<div id="main-warpper" class="signuppage">
        <div class="signupheader">
            <p class="mt-3">Create your Profile as Job Seeker</p>
            <a href="<?= $url ?>">back</a>
        </div>
        <form class="signup-form position-relative" action="<?= base_url('submit/signup-jobseeker') ?>" method="POST" enctype="multipart/form-data">
            <p class="p-0 position-absolute m-0" style="font-size: 14px;top:5px;left: 0"><strong>*</strong> required Information</p>
            <div class="signup-row">
                <div class="inputbox">
                    <label for="email">Your Email Address<strong>*</strong>:</label>
                    <div class="position-relative">
                        <input type="email" placeholder="Email" name="email" id="email" required>
                        <span class="line"></span>
                    </div>
                </div>
                <p>Please enter valid email, you may occasionally receive emails relevant to new job postings.</p>
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
                        <div class="position-absolute mt-1 form-check">
                            <input type="checkbox" id="password-show" class="form-check-input">
                            <label for="password-show" class="form-check-label" style="font-size: 12px;">show password</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="personal-information">
                <h3>personal information</h3>
                <div class="personal-information-body">
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="name">full name<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Your Full Name" name="name" id="name" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox profile-photo">
                            <label for="image">Your Photo<strong>*</strong>:</label>
                            <div class="custom_file position-relative" style="overflow:hidden">
                                <input accept=".jpg,.jpeg,.png,.jfif" style="overflow:hidden" type="file" name='image' id="image" required>
                                <label for="image" class="show_filename">Choose File...</label>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="fathers_name">Father's Name<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Father's Name" name="fathers_name" id="fathers_name" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="mothers_name">Mothers's Name<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Mothers's Name" name="mothers_name" id="mothers_name" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="birthday">Birthday:</label>
                            <div class="position-relative">
                                <input type="date" name="birthday" id="birthday" min="1980-01-01" max="2008-12-31" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label>gender<strong>*</strong>:</label>
                            <div class="gender d-flex">
                                <div class="form-check">
                                    <input type="radio" id="male" class="form-check-input" value="male" name="gender" required>
                                    <label for="male" class="form-check-label" style="font-size: 13px;">male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="female" name="gender" value="female" class="form-check-input" required>
                                    <label for="female" class="form-check-label" style="font-size: 13px;" >female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="education-status">education status<strong>*</strong>:</label>
                            <div class="position-relative">
                                <select name="education_status" required id="education_status" required>
                                    <option value="0">Choose..</option>
                                    <option value="1st Semester">1st Semester</option>
                                    <option value="2nd Semester">2nd Semester</option>
                                    <option value="3rd Semester">3rd Semester</option>
                                    <option value="4th Semester">4th Semester</option>
                                    <option value="5th Semester">5th Semester</option>
                                    <option value="6th Semester">6th Semester</option>
                                    <option value="7th Semester">7th Semester</option>
                                    <option value="Complete">Complete</option>
                                </select>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="result" style="text-transform: uppercase;">gpa/cgpa<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Result" name="gpa" id="result" required>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="signup-row">
                        <div class="inputbox">
                            <label for="expert_on">expert On<strong>*</strong>:</label>
                            <div class="position-relative">
                                <input type="text" placeholder="Expert On" name="expert_on" id="expert_on" required>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label for="category">category<strong>*</strong>:</label>
                            <div class="position-relative">
                                <select name="category" required id="category">
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
                            <label for="skill">skill<strong>*</strong>:</label>
                            <div class="position-relative">
                                <select name="skill" required id="skill">
                                    <?php
                                     include('includes/skill.php');
                                    ?>
                                </select>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="inputbox cv_upload">
                            <label for="cv" style="text-transform: uppercase;">CV:</label>
                            <div class="custom_file position-relative" style="overflow:hidden">
                                <input accept=".pdf" style="overflow:hidden" type="file" name='cv' id="cv">
                                <label for="cv" class="show_filename">Choose File...</label>
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
                                <select name="district" id="district" required>
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
                                <input type="text" placeholder="Phone / Mobile Number" name="phone" id="phone" required>
                                <span class="line"></span>
                            </div>
                        </div><div class="inputbox">
                            <label for="sort_description">Sort Description:</label>
                            <div class="position-relative mt-1">
                                <input type="text" placeholder="Write a Sort Description (maximum characters 200)" name="sort_description" id="sort_description">
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="terms mt-3">
                <h3 style="font-size:17px" class="m-0">Terms & Condition</h3>
                <ul class="mt-3">
                    <li>Your Profile CV can be viewed by any corporate company.</li>
                    
                </ul>
                <div class="form-check ml-3 mt-2">
                    <input type="checkbox" id="terms-accept" class="form-check-input">
                    <label for="terms-accept" class="form-check-label w-50" style="font-size:15px">I agree to the following</label>
                </div>
            </div>
            <div class="submit_btn mt-2">
                <button type='submit' name='submit'>signup</button>
            </div>
        </form>






<?php
include('includes/footer.php');
?>