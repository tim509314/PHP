<?php include_once('header.php'); ?>

<div class="container-sm" style="margin-top: 1rem">
  <?php
    if($_SESSION){
        $jobappQ = mysqli_query($dbConnection, "SELECT * FROM `jobapp` WHERE `job_id` ='".$_GET['job_id']."' AND `employer_id` = '".$thisuser."'");
        $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_id` ='".$_GET['job_id']."' AND `employer_id` = '".$thisuser."'");
        $job = mysqli_fetch_assoc($jobQ);
        echo 'This Application is: '.$job['job_title'];
        while ($jobapp = mysqli_fetch_assoc($jobappQ)){
            echo '<div class="card" style="margin-top: 1rem">';
            echo '<div class="card-body">';

            $cvQ = mysqli_query($dbConnection, "SELECT * FROM `cvs` WHERE `candidate_id` ='".$jobapp['candidate_id']."'");
            $cv = mysqli_fetch_assoc($cvQ);
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
              }
              echo '
              <div class="container text-left">
                <div class="row">
                    <div class="col-sm-8">';
                    echo '<h5 class="card-title" style="font-weight: bold">'.$cv['full_name'].' <span class="badge '.$color.'">'.$jobapp['apply_status'].'</span></h5> ';
                    echo '<h6 class="card-subtitle mb-2 text-body-secondary">'.$cv['email'].'</h6>';
                    echo '<h6 class="card-subtitle mb-2 text-body-secondary">'.$cv['phone_no'].'</h6>';
                    echo '<h6 class="card-subtitle mb-2 text-body-secondary">'.$cv['residential_area'].'</h6>';
                    echo '<form action="function.php?op=updateStatus" method="post">
                            <button type="submit" class="btn text-bg-success" name="status" value="accepted">Accept</button>
                            <button type="submit" class="btn text-bg-danger" name="status" value="rejected">Reject</button>
                            <button type="submit" class="btn text-bg-primary" name="status" value="hold">Hold</button>
                            <input type="hidden" name="jobapp_id" value="'.$jobapp['jobapp_id'].'">
                            <input type="hidden" name="job_id" value="'.$jobapp['job_id'].'">
                          </form>';
              echo '</div>';
                    echo '
                          <div class="col-sm-4 text-center ">
                              <img src="'.$cv['cv_img'].'" height="150px" style="padding-top:1rem">
                          </div>
                      </div>
                    </div>
                  </div>    
                </div>
                              ';
        }
    }
  ?>
</div>

<?php include_once('footer.php'); ?>