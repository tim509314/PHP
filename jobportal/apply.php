<?php 
  include_once('header.php');
  if(!$_SESSION){
    header("Location: ../jobportal/login.php?identity=candidate");
  }
?>

<div class="container-sm">
  <?php
    $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_id` = '".$_GET['job_id']."'");
    $job = mysqli_fetch_assoc($jobQ);
    
    $jobappQ = mysqli_query($dbConnection, "SELECT * FROM `jobapp` WHERE `job_id` ='".$_GET['job_id']."' AND `candidate_id` = '".$thisuser."'");
    $jobapp = mysqli_fetch_assoc($jobappQ);

    echo '<div class="card-body" style="margin: 1rem">';
    if(mysqli_num_rows($jobappQ) > 0){
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
        echo '<br>Apply date: '.$jobapp['apply_datetime'];
      }else{
        echo '<a href="../jobportal/cv.php?candidate_id='.$thisuser.'&job_id='.$_GET['job_id'].'" class="card-link"><button type="button" class="btn btn-danger" aria-expanded="false">Apply Now</button></a>';
      }
    }else{
      echo '<a href="../jobportal/cv.php?candidate_id='.$thisuser.'&job_id='.$_GET['job_id'].'" class="card-link"><button type="button" class="btn btn-danger" aria-expanded="false">Apply Now</button></a>';
    }
    echo '</div>';

    echo '<div class="card" style="margin: 1rem">';
    echo '<div class="card-body">';
    echo '<p class="card-text" style="font-size: 0.8rem">'.$job['post_datetime'].'</p>';
    echo '<h5 class="card-title" style="font-weight: bold">'.$job['job_title'].'</h5>';
    echo '<h6 class="card-subtitle mb-2 text-body-secondary">'.$job['company'].'</h6>';
    echo '<p class="card-text">
        <ul>
            <li>'.$job['job_highlight1'].'</li>
            <li>'.$job['job_highlight2'].'</li>
            <li>'.$job['job_highlight3'].'</li>
        </ul>
      </p>';
    echo '<p class="card-text">'.$job['job_description'].'</p>';
    echo '</div>';
    echo '</div>';
  ?>
</div>

<?php include_once('footer.php'); ?>