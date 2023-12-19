
<?php

session_start();
include("../includes/dbcon.php");
include("../includes/baseurl.php");
if(isset($_POST["action"])){
    $limit = 24;
    

$page = 1;
if($_POST['page'] > 1){
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

  $u='';
	$query = "
		SELECT * FROM jobseeker WHERE status = '0'
	";


    



  

               


  
    

       
if(isset($_POST["category"])){
    $category_filter = implode("','", $_POST["category"]);
      $query .= "
         AND category IN('".$category_filter."')
          ";
}

if(isset($_POST["skill"])){
  $skill_filter = implode("','", $_POST["skill"]);
  $query .= "
     AND skill IN('".$skill_filter."')
      ";
        
}
	
	


$filter_query = $query. " LIMIT $start,$limit";

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

?>
<div class="row">
<?php


	if($total_data > 0){
		foreach($result as $row){
    ?>
    <div class="candiate-container">
          <div class="candiate-about ">
              <div>
                  <div class="photo">
                      <img src="<?= base_url('upload/jobseeker/image/'.$row['photo']) ?>" alt="">
                  </div>
              </div>
              <div class="content">
                  <h4 class="name">
                      <?= $row['name'] ?>
                  </h4>
                  <h5><?= $row['expert_on'] ?></h5>
                  <p class="skills"><strong>Experience: </strong>
                <?php
                if($row['skill'] == '0'){
                  echo 'Fresher';
                }
                else{
                  echo $row['skill'].'Years+';
                }

                ?>
                </p>
              </div>
          </div>
          <div style="display:flex;align-items: center;">
              <a class="visit-button" href="<?= base_url('profile/jobseeker/'.$row['user_id']) ?>">visit profile</a>
          </div>
      </div>
                        
        
    <?php    
		}
	}
    echo "</div>";
    if($total_data > 0){
    $output = '
    
    <div style="margin-top:25px" class="ppp">
    <div class="pagination-box">
      <ul style="margin:auto" class="pagination">
    ';
    $total_links = ceil($total_data/$limit);
    $previous_link = '';
    $next_link = '';
    $page_link = '';
    
    //echo $total_links;
if($total_links > 1){
    if($total_links > 4){
      if($page <= 5)
      {
        for($count = 1; $count <= 5; $count++)
        {
          $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
      }
      else
      {
        $end_limit = $total_links - 5;
        if($page > $end_limit)
        {
          $page_array[] = 1;
          $page_array[] = '...';
          for($count = $end_limit; $count <= $total_links; $count++)
          {
            $page_array[] = $count;
          }
        }
        else
        {
          $page_array[] = 1;
          $page_array[] = '...';
          for($count = $page - 1; $count <= $page + 1; $count++)
          {
            $page_array[] = $count;
          }
          $page_array[] = '...';
          $page_array[] = $total_links;
        }
      }
    }
    else
    {
      for($count = 1; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    
    for($count = 0; $count < count($page_array); $count++)
    {
      if($page == $page_array[$count])
      {
        $page_link .= '
        <li class=" active">
          <a style="pointer-events:none"  href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
        </li>
        ';
       // <script>history.replaceState({},"","?page='.$page_array[$count].'");</script>
    
        $previous_id = $page_array[$count] - 1;
        if($previous_id > 0)
        {
          $previous_link = '<li><a  href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
        }
        
        $next_id = $page_array[$count] + 1;
        if($next_id > $total_links)
        {}
        else
        {
          $next_link = '<li><a  href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
        }
      }
      else
      {
        if($page_array[$count] == '...')
        {
          $page_link .= '
          <li>
              <a style="pointer-events: none;" href="#">...</a>
          </li>
          ';
        }
        else
        {
          $page_link .= '
          <li><a  href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
          ';
        }
      }
    }}
    
    $output .= $previous_link . $page_link . $next_link;
    $output .= '
      </ul>
    
    </div>
  </div>

    ';
    
    
    echo $output;
    }
    else{
        echo '<p class="text-warning" style="font-size:38px;margin:0">No data found</p>';
    }
}


?>


<style>

</style>
