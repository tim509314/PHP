<?php include_once('header.php'); ?>

<div class="container-sm" style="margin-top: 1rem">
  <?php
  echo '<div style="margin-top: 1rem">';
  echo'
          <div class="container-fluid">
            <form class="d-flex" role="search" action="index.php"  method="post">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchjob">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
  ';
  if($_SESSION){
    if (mysqli_num_rows($employerQ) > 0){
      if (isset($_POST['searchjob'])) {
        $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_title` LIKE '%".$_POST['searchjob']."%' ORDER BY `post_datetime` DESC" );
          while ($job = mysqli_fetch_assoc($jobQ)){
            echo '<div class="card" style="margin-top: 1rem">';
            echo '<div class="card-body">';
            include('job_details.php');
            echo '<a href="../jobportal/checkcandidates.php?job_id='.$job['job_id'].'" class="card-link">Check Candidates</a>';
            echo '<a href="../jobportal/editjob.php?job_id='.$job['job_id'].'" class="card-link">Edit</a>';
            echo '</div>';
            echo '</div>';
          }
      }else{
        $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs`  WHERE `employer_id` = '".$employer['employer_id']."' ORDER BY `post_datetime` DESC" );
          while ($job = mysqli_fetch_assoc($jobQ)){
            echo '<div class="card" style="margin-top: 1rem">';
            echo '<div class="card-body">';
            include('job_details.php');
            echo '<a href="../jobportal/checkcandidates.php?job_id='.$job['job_id'].'" class="card-link">Check Candidates</a>';
            echo '<a href="../jobportal/editjob.php?job_id='.$job['job_id'].'" class="card-link">Edit</a>';
            echo '</div>';
            echo '</div>';
          }
      }
    }

    if (mysqli_num_rows($candidateQ) > 0){
      if (isset($_POST['searchjob'])) {
        $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_title` LIKE '%".$_POST['searchjob']."%' ORDER BY `post_datetime` DESC");
          if($jobapp = mysqli_fetch_assoc($jobappQ)){
          echo '<div class="card" style="margin-top: 1rem">';
          echo '<div class="card-body">';
          include('job_details.php');
          echo '<a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">Check Status</a>';
          echo '</div>';
          echo '</div>';
        }else{
          echo '<div class="card" style="margin-top: 1rem">';
          echo '<div class="card-body">';
          include('job_details.php');
          echo '<a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">Apply now</a>';
          echo '</div>';
          echo '</div>';
        }
      }else{
      $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` ORDER BY `post_datetime` DESC");
      while ($job = mysqli_fetch_assoc($jobQ)){
        $jobappQ = mysqli_query($dbConnection, "SELECT * FROM `jobapp` WHERE `job_id` = '".$job['job_id']."' AND `candidate_id` = '".$thisuser."'");
        if($jobapp = mysqli_fetch_assoc($jobappQ)){
          echo '<div class="card" style="margin-top: 1rem">';
          echo '<div class="card-body">';
          include('job_details.php');
          echo '<a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">Check Status</a>';
          echo '</div>';
          echo '</div>';
        }else{
          echo '<div class="card" style="margin-top: 1rem">';
          echo '<div class="card-body">';
          include('job_details.php');
          echo '<a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">Apply now</a>';
          echo '</div>';
          echo '</div>';
        }
      }
      }
    }
  }else{
    if (isset($_POST['searchjob'])) {
      $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_title` LIKE '%".$_POST['searchjob']."%' ORDER BY `post_datetime` DESC");
      while ($job = mysqli_fetch_assoc($jobQ)){
        echo '<div class="card" style="margin-top: 1rem">';
        echo '<div class="card-body">';
        include('job_details.php');
        echo '<a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">Apply now</a>';
        echo '</div>';
        echo '</div>';
      }
    }else{
    $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` ORDER BY `post_datetime` DESC");
    if (mysqli_num_rows($jobQ) > 0) {
      while ($job = mysqli_fetch_assoc($jobQ)){
        echo '<div class="card" style="margin-top: 1rem">';
        echo '<div class="card-body">';
        include('job_details.php');
        echo '<a href="../jobportal/apply.php?job_id='.$job['job_id'].'" class="card-link">Apply now</a>';
        echo '</div>';
        echo '</div>';
      }
    }
  }
  
  if (mysqli_num_rows($jobQ) == 0 && !isset($_POST['searchjob'])) {
    echo '<div class="card" style="margin-top: 1rem">';
    echo '<div class="card-body">';
    echo '<p class="text-center">No jobs available at the moment. Please check back later.</p>';
    echo '</div>';
    echo '</div>';
  }else if(mysqli_num_rows($jobQ) == 0 && isset($_POST['searchjob'])){
    echo '<div class="card" style="margin-top: 1rem">';
    echo '<div class="card-body">';
    echo '<p class="text-center">Sorry, no results were found for "'.$_POST['searchjob'].'". <br>Please try again with different keywords.</p>';
    echo '</div>';
    echo '</div>';
  }
}

  ?>
</div>

<?php include_once('footer.php'); ?>