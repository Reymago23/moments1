<?php

    include('connection.php');

    $emailOnDB = '';
    $emailToCheck = '';

    if(isset($_POST['emailToCheck'])){

        $emailToCheck = filter_var($_POST['emailToCheck'], FILTER_SANITIZE_EMAIL);
        if(!filter_var($emailToCheck, FILTER_VALIDATE_EMAIL)){

            echo '<p>invalid email</p>';
            exit;
        }

        $emailToCheck = mysqli_real_escape_string($con, $emailToCheck);
    }else{

        echo 'No post emailToCheck received';
        exit;
    }


    $sql = "SELECT * FROM tbl_users WHERE email = '$emailToCheck' LIMIT 1";

    $result = mysqli_query($con, $sql);

    if(!$result){

        echo 'ERROR! performing query';

        exit;
    }

    if(mysqli_num_rows($result) == 1){

        echo 'exists';
    }else{

        echo 'SUCCESS! the email is suitable for registration!.';
    }
?>
