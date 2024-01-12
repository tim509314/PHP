<?php include_once('header.php'); ?>

<?php
    $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_id` = '".$_GET['job_id']."'");
    $job = mysqli_fetch_assoc($jobQ);
    echo'
    <div class="container-sm" style="margin-top: 1rem">
        <form action="function.php?op=updatejob" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Job Title</span>
                <input type="text" class="form-control" placeholder="Job Title" aria-label="job_title" aria-describedby="basic-addon1" name="job_title" value="'.$job['job_title'].'">
            </div>

            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Job Highlight 1</span>
            <input type="text" class="form-control" placeholder="Job Highlight 1" aria-label="job_title" aria-describedby="basic-addon1" name="job_highlight1"  value="'.$job['job_highlight1'].'">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Job Highlight 2</span>
            <input type="text" class="form-control" placeholder="Job Highlight 2" aria-label="job_title" aria-describedby="basic-addon1" name="job_highlight2"  value="'.$job['job_highlight2'].'">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Job Highlight 3</span>
            <input type="text" class="form-control" placeholder="Job Highlight 3" aria-label="job_title" aria-describedby="basic-addon1" name="job_highlight3"  value="'.$job['job_highlight3'].'">
        </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">Job Description</span>
                    <textarea class="form-control" aria-label="Job Description" name="job_description" >'.$job['job_description'].'</textarea>
                </div>
            </div>
            <input type="hidden" name="job_id"  value="'.$job['job_id'].'">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    ';
    ?>

<?php include_once('footer.php'); ?>