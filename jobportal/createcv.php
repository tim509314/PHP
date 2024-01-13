<?php include_once('header.php'); ?>

    <div class="container-sm">
        <?php
            if($_SESSION){
                $cvQ = mysqli_query($dbConnection, "SELECT * FROM `cvs` WHERE `candidate_id` = '".$thisuser."'");
                $cv = mysqli_fetch_assoc($cvQ);
                
                if (mysqli_num_rows($cvQ) == 0) {
                    echo'
                        <div class="container-sm" >
                            <div class="container-sm" style="margin-top: 1rem">
                            <div class="row">
                    <div class="col-sm-8">
                                <p class="text" >Please fill in your details below.</p>
                                <form action="function.php?op=createcv" method="post" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Full Name</span>
                                        <input type="text" class="form-control" placeholder="Full Name" aria-label="job_title" aria-describedby="basic-addon1" name="full_name">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Phone no.</span>
                                        <input type="text" class="form-control" placeholder="Phone no." aria-label="phone_no" aria-describedby="basic-addon1" name="phone_no">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Residential area</label>
                                        <select class="form-select" id="inputGroupSelect01" name="residential_area">
                                            <option selected>Choose...</option>
                                            <option value="Kowloon">Kowloon</option>
                                            <option value="Hong Kong Island">Hong Kong Island</option>
                                            <option value="New Territori">New Territori</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="cv_img"  onchange="readURL(this);">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    
                                    <input type="hidden" name="candidate_id" value="'.$thisuser.'">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                </div>
                                <div class="col-sm-4 text-center ">
                                    <img id="blah"  style="height:200px; padding-top:8rem ">
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