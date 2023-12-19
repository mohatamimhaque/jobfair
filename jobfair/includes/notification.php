<div class="notification">
                    <div class="noticaition-icon">
                        <span class="notification-number"></span>
                        <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
                        </svg>
                    </div>
<div class="notification-view">
    <div class="notification-list">
        

<?php
$count=0;
$user_id=$_SESSION['jobfair_user']['user_id'];
$query = mysqli_query($con, "SELECT * FROM jobseeker where user_id='$user_id'");
if(mysqli_num_rows($query) > 0){
    foreach($query as $row){
        if($row['notification_list'] != NUll or $row['notification_list'] != ''){
        $list = explode(',',$row['notification_list']);

        foreach($list as $value) {
            $new_item = array();
            $item = explode('-',$value);
            if($item[1]==0){
                $count+=1;
            }
            $jobpost_id = $item[0];
            $query = mysqli_query($con, "SELECT * FROM jobpost where jobpost_id='$jobpost_id' and status='0'");
            if(mysqli_num_rows($query) > 0){
                foreach($query as $row){
                    $corporate_id = $row['corporate_id'];
                    $query = mysqli_query($con, "SELECT * FROM corporate where user_id='$corporate_id' and status='0'");
                    if(mysqli_num_rows($query) > 0){
                        foreach($query as $c){
                          ?>
                        <div class="notifiaction-item <?= $item[0] ?>">
                            <a href="<?= base_url('view/jobpost/'.$row['jobpost_id']) ?>" class='nnn'><?=$c['name'] ?> posted a new job, you can try it.</a>
                            <input type="hidden" value="<?= $item[0] ?>" id='<?= $item[0] ?>'>
                        </div>
                            <?php
                    }
                    if($item[1] == '0'){
                        ?>
                            <style>
                                .<?= $item[0] ?>.notifiaction-item a{
                                    color: rgb(47, 129, 252);
                                }
                            </style>
                           
                        <?php
                    }
                }  
            }
        }
?>
      



<?php



        }
    }

    else{
        ?>
<style>
    .notification-list{
        padding:0;
        margin:0
    }
    .notification-view{
        padding:0;
        margin:0
    }
    .notification-item{
        padding:0;
        margin:0
    }
    .notification-view a{
        padding:0;
        margin:0
    }
</style>
        <?php

    }


}}

?>


    </div>
</div>
</div>

<script>
    

$(document).ready(function(){
    var count=<?= $count ?>;
    if(count === 0){
        $('.notification-number').hide();

    }
    else{
        $(".notification-number").html(count);
    }
  $('.nnn').click(function(){
    var thisclicked = $(this); 
	var id = thisclicked.closest('.notifiaction-item').find('input').val();
    $.ajax({
        url:"<?= base_url('ajax/notification') ?>",
        method:"POST",
        data:{notification:"notification",id:id},
        success:function(data) {
			alert(data);
        }
    })


  });
})
</script>