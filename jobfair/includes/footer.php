        </div>
            <!---------------main content end--------------------->
        </div>
 <!-------------end main wrapper----------------------->



<?php
    if(isset($_SESSION["message"])){
        ?>
        <script>alert('<?=  $_SESSION["message"]; ?>')</script>
        <?php
        unset($_SESSION["message"]);

    }
?>


    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/neumorphism.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script>
        
        $(document).ready(function(){
            $('.jobseeker-login-btn').click(function(){
            var thisclicked = $(this); 
            var email = thisclicked.closest('#loginModal').find('#jemail').val();
            var password = thisclicked.closest('#loginModal').find('#jpassword').val();
            if(email != '' && password != ''){
              $.ajax({
                url:"<?= base_url('ajax/login') ?>",
                method:"POST",
                data:{jlogin:'login',email:email,password:password},
                success:function(data){
                        alert(data);
                        location.reload();
                    }
                })
            }

    })
    })
        $(document).ready(function(){
            $('.corporate-login-btn').click(function(){
                
            var thisclicked = $(this); 
            var email = thisclicked.closest('#loginModal').find('#cemail').val();
            var password = thisclicked.closest('#loginModal').find('#cpassword').val();
            if(email != '' && password != ''){
              $.ajax({
                url:"<?= base_url('ajax/login') ?>",
                method:"POST",
                data:{clogin:'login',email:email,password:password},
                success:function(data){
                        alert(data);
                        location.reload();
                    }
                })
            }

    })
    })
        
            

            

    
    </script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

   <script>

       $(document).ready(function() {

    $('#summernote').summernote({
        placeholder: 'type description here.....',
        tabsize: 2,
        height: 120,

      });


       });

       $(document).ready(function() {
            $('.table').DataTable();
        } );

   </script>
</body>
</html>