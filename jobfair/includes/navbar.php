    <!-------------start main wrapper----------------------->
    <div id="main-warpper">

    <div id="loginModal" class="">
            <div class="loginCard">
                <div class="close">
                    <div class="bar">
                    </div>
                </div>
                <div class="loginCard-header">
                    <h3>Jobfair</h3>
                    <p>SIGN IN</p>
                </div>
                <div class="loginCard-body">
                    <div class="loginrow">
                        <div class="login-menu">
                            <button class="menu-link jobseeker-btn is-active">
                                jobseeker zone
                            </button>
                            <button class="menu-link corporate-btn">
                                corporate zone
                            </button>
                        </div>
                    </div>
                    <div style="width:90%;margin:auto" class="loginform is-active jobseeker-login">
                        <div class="loginrow mt-4">
                            <input type="email" name='email' id="jemail" placeholder="Email" class="input-shadow">
                        </div>
                        <div class="loginrow mt-2 mb-2">
                             <input type="password" name="password" id="jpassword" placeholder="Password">
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" id="showpasscode" class="form-check-input">
                                <label for="showpasscode" class="form-check-label" style="font-size:12px">Password Show</label>
                            </div>
                            <div>
                                <a href="">lost password?</a>
                            </div>
                        </div>
                        <div class="loginrow login-btn mt-2">
                            <button class="jobseeker-login-btn">Login</button>
                        </div>
                        <div class="logincard-footer mt-2">
                            <p class="fs-14 m-0">or</p>
                            <a class="fs-17" href="<?= base_url('signup/jobseeker') ?>">Create an Account</a>
                        </div>
                    </div>
                    <div style="width:90%;margin:auto" class="loginform corporate-login">
                        <div class="loginrow mt-4">
                            <input type="email" name='email' id="cemail" placeholder="Email" class="input-shadow">
                        </div>
                        <div class="loginrow mt-2 mb-2">
                             <input type="password" name="password" id="cpassword" placeholder="Password">
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" id="showpasscode2" class="form-check-input">
                                <label for="showpasscode2" class="form-check-label" style="font-size:12px">Password Show</label>
                            </div>
                            <div>
                                <a href="">lost password?</a>
                            </div>
                        </div>
                        <div class="loginrow login-btn mt-2">
                            <button class="corporate-login-btn">Login</button>
                        </div>
                        <div class="logincard-footer mt-2">
                            <p class="fs-14 m-0">or</p>
                            <a class="fs-17" href="<?= base_url('signup/corporate') ?>">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!---------------navbar start--------------------->
        <div id="navbar">
            <div class="logo">
                <p>JobFair</p>
            </div>
            <div class="header-menu">
                <a class="menu-link" href="<?=base_url('') ?>">Home</a>
                <a class="menu-link" href="<?=base_url('') ?>">Job Seeker</a>
                <a class="menu-link" href="<?=base_url('jobpost') ?>" >Jobpost</a>
             </div>
            <div class="header-profile">
                
                <?php if(isset($_SESSION['jobfair_user'])) : ?>
              
                    
                    <?php
include("notification.php");

                    ?>
              
                <?php endif; ?>
                <?php if(isset($_SESSION['jobfair_user']) OR isset($_SESSION['corporate_user'])): ?>
                    <?php
                   if(isset($_SESSION['jobfair_user'])){
                        $user_id=$_SESSION['jobfair_user']['user_id'];
                        $table='jobseeker';
                    } 
                    if(isset($_SESSION['corporate_user'])){
                        $user_id=$_SESSION['corporate_user']['user_id'];
                        $table='corporate';
                    }
                    $q = mysqli_query($con, "SELECT * FROM $table where user_id='$user_id'");
                    if(mysqli_num_rows($q) > 0){
                         foreach($q as $r){
                    ?>  

                <div class="profile-shortcut position:relative">
                    <div class="signafter">
                        <div class="signinfo">
                              <div class="avatar ml-4">
                                  <?php
                                    if(isset($_SESSION['jobfair_user'])){ ?>
                                        <div style="width:38px;height:38px;border-radius:50%">
                                      <img src="<?= base_url('upload/jobseeker/image/'.$r['photo']) ?>" alt="avatar" style="width:100%;height:100%;border-radius:50%">
                                    </div>
                                  
                                  <?php 
                                   }
                                   if(isset($_SESSION['corporate_user'])){ 
                                    ?>
                                    <div style="width:150px;height:38px;position:relative;" class="mt-3">
                                      <p class="fs-10 fw-700" style='font-size:18px;text-transform:uppercase;'><?= $r['name'] ?><i class="ml-2 fa-solid fa-caret-down"></i></p>
                                   </div>
                                      <?php } ?>
                              </div>
                            </div>
                         <div class="dropmenu">
                              <div class="dropitem">
                                  <?php if(isset($_SESSION['jobfair_user'])) : ?>
                                  <div style="width:45px;height:35px;">
                                      <img src="<?= base_url('upload/jobseeker/image/'.$r['photo']) ?>" alt="avatar" style="width:100%;height:100%;border-radius:8px">
                                      
                                    </div>
                                    <?php endif; ?>
                                  <div class="ml-1">
                                      <p><?= $r['name'] ?></p>
                                      <p style="text-transform:none"><?= $r['email'] ?></p>
                                      <?php if(isset($_SESSION['jobfair_user'])) : ?>
                                      <a href="<?= base_url('edit/profile/jobseeker') ?>">edit profile</a>
                                      <?php else :?>
                                        <a href="<?= base_url('edit/profile/corporate') ?>">edit profile</a>

                                        <?php endif; ?>

                                  </div>
                              </div>
                              <hr>
                              <div class="dropitem2">
                              <?php if(isset($_SESSION['jobfair_user'])) : ?>
                                  <a href="<?= base_url('profile/jobseeker/'.$r['user_id']) ?>">
                                      <i class="fa-solid fa-user"></i>
                                      <p>my profile</p>
                                  </a>
                                  <?php else :?>
                                    <a href="<?= base_url('profile/corporate/'.$r['user_id']) ?>">
                                    <i class="fa-solid fa-user"></i>
                                      <p>my profile</p>
                                    </a>
                                    <?php endif; ?>

                              </div>
                              <form action="<?= base_url('submit/logout') ?>" method="POST" class="dropitem3">
                                  <button id="logout_btn" type="submit" name='logout_btn'><i class="fa-solid fa-power-off"></i>
                                    Logout</button>
                              </form>
                            </div>
                      </div>
                </div>

                <?php
                         }}

                    ?>
                <?php else :?>
                <div class="login-btn">
                    <button class="loginModal-activeBtn">login</button>
                </div>
                <?php endif; ?>
                </div>
            </div>


            <div id="mobile_navbar">
                <div class="logo">
                    <p>JobFair</p>
                </div>
                <div class="sidemenu-active">
                    <div class="hamburger-menu">
                            <div class="bar"></div>
                    </div>
                </div>
            </div>
            <?php
            include("sidemenu.php");

            ?>
            <!---------------navbar end--------------------->
            <!---------------main content start--------------------->
            <div class="wrapper">

