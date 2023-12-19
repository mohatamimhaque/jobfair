<div class="side-nav">
                <div class="closer">
                    
                </div>
                <div class="sidemenu">
                    <div class="close">
                        <div class="bar">

                        </div>
                    </div>
                    <div class="sidemenu-header">

                        <?php
                   if(isset($_SESSION['jobfair_user'])){
                        $user_id=$_SESSION['jobfair_user']['user_id'];
                        $q = mysqli_query($con, "SELECT * FROM jobseeker where user_id='$user_id'");
                        if(mysqli_num_rows($q) > 0){
                             foreach($q as $row){
                        
                    ?>
                        <div class="top">
                            <div class="photo">
                                <img src="<?= base_url('upload/jobseeker/image/'.$r['photo']) ?>" alt="">
                            </div>
                            <div class="content">
                                <p><?= $row['name'] ?></p>
                                <small>Jobseeker</small>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="<?= base_url('profile/jobseeker/'.$r['user_id']) ?>">My Profile</a>
                            <a href="<?= base_url('edit/profile/jobseeker') ?>">Edit Profile</a>
                            <form action="<?= base_url('submit/logout') ?>" method="POST" class="dropitem3">
                                 <button type="sumbit" name="logout_btn">Logout</button>
                             </form>
                        </div>

                    <?php
                }}}
             
             
                    if(isset($_SESSION['corporate_user'])){
                        $user_id=$_SESSION['corporate_user']['user_id'];
                        $q = mysqli_query($con, "SELECT * FROM corporate where user_id='$user_id'");
                        if(mysqli_num_rows($q) > 0){
                             foreach($q as $row){
                        
                    ?>
                        <div class="top">
                           
                            <div class="content">
                                <p><?= $row['name'] ?></p>
                                <small>Jobseeker</small>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="<?= base_url('profile/corporate/'.$r['user_id']) ?>">My Profile</a>
                            <a href="<?= base_url('edit/profile/corporate') ?>">Edit Profile</a>
                            <form action="<?= base_url('submit/logout') ?>" method="POST" class="dropitem3">
                                 <button type="sumbit" name="logout_btn">Logout</button>
                             </form>
                        </div>

                    <?php
                }}}
                
                if(!isset($_SESSION['corporate_user']) AND  !isset($_SESSION['jobfair_user'])) {

                        ?>
                        <div class="sidemenu-login login-btn mb-3">
                            <button>Login</button>
                        </div>
                            <?php } ?>


                    </div>
                    <div class="sidemenu-body">
                        <a href="">Home</a>
                        <a href="">Jobseeker</a>
                        <a href="">Jobpost</a>
                    </div>
                </div>

            </div>