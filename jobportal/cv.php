<?php 
  include_once('header.php');
  if(!$_SESSION){
    header("Location: ../jobportal/login.php?identity=candidate");
  }
?>
   <?php
    $cvQ = mysqli_query($dbConnection, "SELECT * FROM `cvs` WHERE `candidate_id` = '".$thisuser."'");
    $cv = mysqli_fetch_assoc($cvQ);
    if($_GET['job_id']){
        $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_id` = '".$_GET['job_id']."'");
        $job = mysqli_fetch_assoc($jobQ);
        echo '<div class="container-sm">Apply for positions: <a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">'.$job['job_title'].'</a></div>';
        include_once('viewprofile.php');
        echo '<div class="container-sm">
        <form action="function.php?op=apply" method="post">
        <input type="hidden" name="job_id" value="'.$job['job_id'].'">
        <input type="hidden" name="cv_id" value="'.$cv['cv_id'].'">';
        echo '<button type="submit" class="btn btn-danger">Apply Now</button>
        </form>
        </div>
        ';
  }
   ?>

<?php include_once('footer.php'); ?>