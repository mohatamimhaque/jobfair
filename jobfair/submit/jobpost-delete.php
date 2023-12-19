<?php
session_start();
include("../includes/baseurl.php");
include("../includes/dbcon.php");
if (isset($_SERVER["HTTP_REFERER"])) {
    $previous_page = $_SERVER["HTTP_REFERER"];
}
if(isset($_POST["submit"])){
    $id = $_POST["submit"];

    $query = "UPDATE jobpost SET status='1' WHERE jobpost_id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        
        $check = mysqli_query($con, "SELECT * from jobseeker");
        if(mysqli_num_rows($check)>0){
            foreach($check as $row){
                $user_id=$row['user_id'];
                if($row['notification_list'] != ''){
                    $data = explode(',',$row['notification_list']);
                    $item1 = $id.'-0';
                    $item2 = $id.'-1';
                    if (($key = array_search($item1, $data)) !== false) {
                        unset($data[$key]);
                    }
                    if (($key = array_search($item2, $data)) !== false) {
                        unset($data[$key]);
                    }
                    $new_list = implode(',',$data);
                    mysqli_query($con, "UPDATE jobseeker SET notification_list='$new_list' WHERE user_id='$user_id'"); 
                }


            
            
            
            
            }}

        $_SESSION['message'] = 'Deleted Successfully';
       header("location:".$previous_page);
    exit(0);
    }
}



?>