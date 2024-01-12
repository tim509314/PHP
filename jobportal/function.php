<?php
    session_start();
    include_once 'dbConnect.php';

    switch($_GET['op']){
        case 'register':
            switch($_POST['identity']){
                case 'candidates':
                        candidatesRegister(hashpw($_POST['password']));
                        break;
                case 'employers':
                        employersRegister(hashpw($_POST['password']));
                        break;
            }
            break;
        case 'checkLogin':
            checkLogin($_POST['email'], $_POST['password'], $_POST['identity']);
            break;
        case 'logout':
            logout();
            break;
        case 'postjob':
            postjob($_SESSION['email']);
            break;
        case 'updatejob':
            updatejob($_POST['job_title'], $_POST['job_description'], $_POST['job_highlight1'], $_POST['job_highlight2'], $_POST['job_highlight3'],$_POST['job_id']);
            break;
        case 'createcv':
            createcv($_POST['full_name'], $_POST['email'], $_POST['phone_no'], $_POST['residential_area'], $_POST['candidate_id']);
            break;
        case 'apply':
            applyjob($_POST['job_id'], $_POST['cv_id']);
            break;
        case 'updateStatus':
            updateStatus($_POST['status'], $_POST['jobapp_id'], $_POST['job_id']);
            break;
        case 'updatecv':
            updatecv($_POST['full_name'], $_POST['email'], $_POST['phone_no'], $_POST['residential_area'], $_POST['candidate_id']);
            break;
        case 'searchjob':
            searchjob();
            break;
    }

    function searchjob(){
        header("Location: ../jobportal/index.php?searchjob");
    }

    function updatecv($full_name, $email, $phone_no, $residential_area, $candidate_id){
        $updatetime = date("Y-m-d h:i:s");
        global $dbConnection;
        if(areInputsNotNull(array($full_name, $email, $phone_no, $residential_area))) {
            $sql = "UPDATE `db_jobportal`.`cvs` SET 
                    `full_name` = '$full_name', 
                    `email` = '$email', 
                    `phone_no` = '$phone_no', 
                    `residential_area` = '$residential_area'
                    WHERE `candidate_id` = $candidate_id";   
                    
            if(mysqli_query($dbConnection, $sql)){
                header("Location: ../jobportal/index.php");
            }else{
                echo "Error updating record: " . $dbConnection->error;
            } 
        } else {
            alert("Invalid Input", "../jobportal/index.php");
        }     
    }


    function updateStatus($status, $jobapp_id, $job_id){
        echo $status.'<br>';
        global $dbConnection;
        $jobappQ = mysqli_query($dbConnection, "SELECT * FROM `jobapp` WHERE `jobapp_id` ='".$jobapp_id."'");
        $jobapp = mysqli_fetch_assoc($jobappQ);

        $sql = "UPDATE `db_jobportal`.`jobapp` SET 
                    `apply_status` = '$status'
                    WHERE `jobapp_id` = $jobapp_id"; 

        if(mysqli_query($dbConnection, $sql)){
            header("Location: ../jobportal/index.php"); 
        }else{
            echo "Error updating record: " . $dbConnection->error;
        } 
    }

    function applyjob($job_id, $cv_id){
        global $dbConnection;
        $cvQ = mysqli_query($dbConnection, "SELECT * FROM `cvs` WHERE `cv_id` ='".$cv_id."'");
        $cv = mysqli_fetch_assoc($cvQ);

        $jobQ = mysqli_query($dbConnection, "SELECT * FROM `jobs` WHERE `job_id` ='".$job_id."'");
        $job = mysqli_fetch_assoc($jobQ);
        
        $applytime = date('Y-m-d h:i:s');

        $sql = "INSERT INTO `db_jobportal`.`jobapp`(
            `candidate_id`, 
            `employer_id`, 
            `job_id`, 
            `apply_datetime`
            ) VALUES (
            '".$cv['candidate_id']."',
            '".$job['employer_id']."',
            '".$job['job_id']."',
            '".$applytime."'
            )";

        if(mysqli_query($dbConnection, $sql)){
            header("Location: ../jobportal/index.php");
        }else{
            echo "Error updating record: " . $dbConnection->error;
        }
    }

    function createcv($full_name, $email, $phone_no, $residential_area, $candidate_id){
        global $dbConnection;
        $candidateQ = mysqli_query($dbConnection, "SELECT * FROM `candidates` WHERE `email` ='".$email."'");
        $candidate = mysqli_fetch_assoc($candidateQ);

        if(areInputsNotNull(array($full_name, $email, $phone_no, $residential_area))) {
            $sql = "INSERT INTO `db_jobportal`.`cvs`(
                `candidate_id`, 
                `full_name`, 
                `email`, 
                `phone_no`, 
                `residential_area`
                ) VALUES (
                '$candidate_id',
                '".$full_name."',
                '".$email."',
                '".$phone_no."',
                '".$residential_area."'
                )";

            if(mysqli_query($dbConnection, $sql)){
                header("Location: ../jobportal/index.php");
            }else{
                echo "Error updating record: " . $dbConnection->error;
            }
        } else {
            alert("Invalid Input", "../jobportal/index.php");
        }
        
    }


    function updatejob($job_title, $job_description, $job_highlight1, $job_highlight2, $job_highlight3, $job_id){
        $updatetime = date("Y-m-d h:i:s");
        global $dbConnection;
        if(areInputsNotNull(array($job_title, $job_description, $job_highlight1, $job_highlight2, $job_highlight3, $job_id))) {
            $sql = "UPDATE `db_jobportal`.`jobs` SET 
                    `job_title` = '$job_title',
                    `edit_datetime` = '$updatetime',
                    `job_description`= '$job_description',
                    `job_highlight1`= '$job_highlight1',
                    `job_highlight2`= '$job_highlight2',
                    `job_highlight3`= '$job_highlight3'
                    WHERE `job_id` = $job_id";   
                    
            if(mysqli_query($dbConnection, $sql)){
                header("Location: ../jobportal/index.php");
            }else{
                echo "Error updating record: " . $dbConnection->error;
            } 
        } else {
            alert("Invalid Input", "../jobportal/index.php");
        }     
    }

    function employersRegister($password){
        global $dbConnection;
        if(areInputsNotNull(array($_POST['full_name'], $_POST['email'], $password, $_POST['company'], $_POST['contact_no']))) {
            $sql = "INSERT INTO `db_jobportal`.`employers`(
                    `full_name`, 
                    `email`, 
                    `password`,
                    `company`,
                    `contact_no`
                    ) VALUES (
                    '{$_POST['full_name']}',
                    '{$_POST['email']}',
                    '$password',
                    '{$_POST['company']}',
                    '{$_POST['contact_no']}'
                    )";

            $identity = 'employers';
            countItem($identity, $_POST['email'], $sql);
        } else {
            alert("Invalid Input", "../jobportal/employers.php");
        }   
    }

    function postjob($email){
        global $dbConnection;
        $employerQ = mysqli_query($dbConnection, "SELECT * FROM `employers` WHERE `email` ='".$email."'");
        $employer = mysqli_fetch_assoc($employerQ);

        if(areInputsNotNull(array($_POST['job_title'], $_POST['job_description'], $_POST['job_highlight1'], $_POST['job_highlight2'], $_POST['job_highlight3']))) {
            $sql = "INSERT INTO `db_jobportal`.`jobs`(
                `employer_id`, 
                `job_title`, 
                `company`, 
                `post_datetime`, 
                `job_description`,
                `job_highlight1`,
                `job_highlight2`,
                `job_highlight3`
                ) VALUES (
                '".$employer['employer_id']."',
                '{$_POST['job_title']}',
                '".$employer['company']."',
                '".date("Y-m-d h:i:s")."',
                '{$_POST['job_description']}',
                '{$_POST['job_highlight1']}',
                '{$_POST['job_highlight2']}',
                '{$_POST['job_highlight3']}'
                )";

            if(mysqli_query($dbConnection, $sql)){
                header("Location: ../jobportal/index.php");
            }else{
                echo "Error updating record: " . $dbConnection->error;
            }
        }else{
            alert("Invalid Input", "../jobportal/postjob.php");
        }
    }

    function candidatesRegister($password){
        global $dbConnection;
        if(areInputsNotNull(array($_POST['full_name'], $_POST['email'], $password))) {
            $sql = "INSERT INTO `db_jobportal`.`candidates`(
                    `full_name`, 
                    `email`, 
                    `password`
                    ) VALUES (
                    '{$_POST['full_name']}',
                    '{$_POST['email']}',
                    '$password'
                    )";
            $identity = 'candidates';
            countItem($identity, $_POST['email'], $sql);
        }else{
            alert("Invalid Input", "../jobportal/employers.php");
        }
    }

    function logout(){
        session_destroy();
        header("Location: ../jobportal/index.php");
    }

    function checkLogin($email, $password, $identity){
        global $dbConnection;
        $userQ = mysqli_query($dbConnection, "SELECT * FROM $identity WHERE `email` ='".$email."'");
        $user = mysqli_fetch_assoc($userQ);
        if(areInputsNotNull(array($email, $password, $identity))) {
            if($email == $user['email'] && password_verify($password, $user['password'])){
                session_start();
                $_SESSION['email'] = $user['email'];
                header("Location: ../jobportal/index.php");
            }else{
                alert("Invalid Email or Password", "../jobportal/candidates.php");
            }
        }else{
            alert("Invalid Input", "../jobportal/candidates.php");
        }
        
    }

    function countItem($identity, $email, $sql){
        global $dbConnection;

        mysqli_select_db($dbConnection,"db_jobportal");

        $candidates_result = mysqli_query($dbConnection,"SELECT `email` FROM `candidates` WHERE `email` ='".$email."'");
        $employers_result = mysqli_query($dbConnection,"SELECT `email` FROM `employers` WHERE `email` ='".$email."'");

        $num_rows_candidates = mysqli_num_rows($candidates_result);
        $num_rows_employers = mysqli_num_rows($employers_result);

        if($num_rows_candidates == 0 && $num_rows_employers == 0){
            if(mysqli_query($dbConnection, $sql)){
                header("Location: ../jobportal/candidates.php");
            }else{
                header("Location: ../jobportal/employers.php");
            } 
        }else{
            alert("This email is already registered, please try another email", "../jobportal/employers.php");
        } 
    }

    function alert($msg, $url) {
        echo "<SCRIPT> //not showing me this
            alert('$msg')
            window.location.replace('$url'); 
            </SCRIPT>";
    }

    function areInputsNotNull($inputs) {
        foreach($inputs as $input) {
            if(empty($input)) {
                return false; // At least one input is null or empty
            }
        }
        return true; // All inputs are not null and not empty
    }

        function hashpw($password){
            return password_hash($password, PASSWORD_BCRYPT);
        }
?>