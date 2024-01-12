<?php include_once('header.php'); ?>

<div class="container-sm">
  <?php
  if($_SESSION){
    if (mysqli_num_rows($candidateQ) > 0){
        $jobappQ = mysqli_query($dbConnection, "SELECT * FROM `jobapp` WHERE `candidate_id` ='".$candidate['candidate_id']."'");
        while ($jobapp = mysqli_fetch_assoc($jobappQ)){
            $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_id` = '".$jobapp['job_id']."' ORDER BY `post_datetime` DESC");
            $job = mysqli_fetch_assoc($jobQ);
            echo '<div class="card" style="margin: 1rem">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title" style="font-weight: bold">'.$job['job_title'].'</h5>';
            
            echo '<h6 class="card-subtitle mb-2 text-body-secondary">'.$job['company'].'</h6>';
            if($jobapp['job_id'] == $job['job_id']){
                switch($jobapp['apply_status']){
                  case 'hold':
                    $color = "text-bg-primary"; 
                    break;
                  case 'rejected':
                    $color = "text-bg-danger";
                    break;
                  case 'accepted':
                    $color = "text-bg-success";
                    break;
                }
                echo 'Application Status: <span class="badge '.$color.'">'.$jobapp['apply_status'].'</span>';
              }
            echo '<br><a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">Check details</a>';
            echo '</div>';
            echo '</div>';
        }
    }
    if ( mysqli_fetch_assoc($jobappQ) == 0){
      echo '<div class="card" style="margin: 1rem">';
      echo '<div class="card-body">';
      echo '<p class="text-center">You have not submitted any applications yet.</p>';
      echo '</div>';
      echo '</div>';
    }
  }
  
  ?>
</div>

<?php include_once('footer.php'); ?>