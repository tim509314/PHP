

    <div class="container-sm">
        <?php
            if($_SESSION){
                $cvQ = mysqli_query($dbConnection, "SELECT * FROM `cvs` WHERE `candidate_id` = '".$thisuser."'");
                $cv = mysqli_fetch_assoc($cvQ);
                
                if (mysqli_num_rows($cvQ) == 0) {
                    header("Location: ../jobportal/createcv.php");
                }
                if (mysqli_num_rows($cvQ) > 0) {
                    if($cv['candidate_id'] == $thisuser){
                        $candidateQ = mysqli_query($dbConnection, "SELECT * FROM `candidates` WHERE `email` ='".$_SESSION['email']."'");
                        $candidate = mysqli_fetch_assoc($candidateQ);

                        $cvQ = mysqli_query($dbConnection, "SELECT * FROM `cvs` WHERE `email` ='".$_SESSION['email']."'");
                        $cv = mysqli_fetch_assoc($cvQ);

                        echo '<div class="card" style="margin: 1rem">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title" style="font-weight: bold">'.$cv['full_name'].'</h5>';
                        echo '<h6 class="card-title">Email: '.$cv['email'].'</h6>';
                        echo '<h6 class="card-title">Phone no.: '.$cv['phone_no'].'</h6>';
                        echo '<p class="card-text" >Residential area: '.$cv['residential_area'].'</p>';
                        echo '<a href="../jobportal/editcv.php?job_id='.$cv['cv_id'].'" class="card-link">Edit</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
        ?>
    </div>