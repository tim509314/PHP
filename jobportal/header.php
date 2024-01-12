<?php
    session_start();
    include_once 'dbConnect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobPortal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <style>
    body{
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
footer{
    margin-top: auto;
}
</style>

</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../jobportal/index.php">Jobportal</a>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <ul class="navbar-nav">
                    <?php
                        if($_SESSION){
                            $employerQ = mysqli_query($dbConnection, "SELECT * FROM `employers` WHERE `email` ='".$_SESSION['email']."'");
                            $employer = mysqli_fetch_assoc($employerQ);

                            $candidateQ = mysqli_query($dbConnection, "SELECT * FROM `candidates` WHERE `email` ='".$_SESSION['email']."'");
                            $candidate = mysqli_fetch_assoc($candidateQ);
                            if(!empty($candidate['email'])){
                                echo '<li class="nav-item"><a class="nav-link" href="../jobportal/Profile.php">Hi, '.$candidate['full_name'].'</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="../jobportal/appplication.php">Your Application</a></li>';
                                $thisuser = $candidate['candidate_id'];
                            }
                            if(!empty($employer['email'])){
                                echo '<li class="nav-item"><a class="nav-link">Hi, '.$employer['full_name'].'</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="../jobportal/postjob.php">Post Job</a></li>';
                                $thisuser = $employer['employer_id'];
                            }
                            echo '<li class="nav-item"><a class="nav-link" href="../jobportal/function.php?op=logout">Logout</a></li>';
                        }else{
                            echo '<li class="nav-item"><a class="nav-link" href="../jobportal/login.php">Login</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../jobportal/register.php">Register</a></li>';
                        }
                            
                    ?>
                </ul>
            </nav>
        </div>
    </nav>