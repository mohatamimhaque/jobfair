<?php
session_start();
include("../includes/dbcon.php");
if(isset($_POST["notification"])){
    $id= $_POST["id"];
    $user_id=$_SESSION['jobfair_user']['user_id'];
$query = mysqli_query($con, "SELECT * FROM jobseeker where user_id='$user_id'");
if(mysqli_num_rows($query) > 0){
    foreach($query as $row){
        $list = explode(',',$row['notification_list']);
        $old_item = $id.'-0';
        $new_item = $id.'-1';
        if (($key = array_search($old_item, $list)) !== false) {
            unset($list[$key]);
            $list[$key] = $new_item;
        }

        $new_list = implode(',',$list);
        mysqli_query($con, "UPDATE jobseeker SET notification_list='$new_list' WHERE user_id='$user_id'"); 
        
      
    }}
}