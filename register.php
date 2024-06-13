<?php
    require './smtp.php';

    session_start();

    // parse data
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $tel = $_POST['user_tel'];
    $address_1 = $_POST['user_address_1'];
    $address_2 = $_POST['user_address_2'];
    $city = $_POST['user_city'];
    $state_user = $_POST['user_state'];
    $zip_code = $_POST['user_zip_code'];
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];

    // use preg_match to compare if the email input matches that of the regex pattern of email
    $email_validation = preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email);
    
    // check for alphabets in telephone input
    $tel_validation = !preg_match("/[a-zA-Z]/i", $tel);

    // assuming that this is for Philippine use, check for alphabets in the zip code
    $zip_validation = !preg_match("/[a-zA-Z]/i", $zip_code);

    $password_mismatch = $password == $confirm_password;

    $_SESSION['name'] = $_POST['user_name'];
    $_SESSION['email'] = $_POST['user_email'];
    
    // check if anything had an error
    if(!$email_validation || !$tel_validation || !$zip_validation || !$password_mismatch){
        
        // save data in session storage to be able to access in the registration page without appearing in the link
        $_SESSION['tel'] = $_POST['user_tel'];
        $_SESSION['address_1'] = $_POST['user_address_1'];
        $_SESSION['address_2'] = $_POST['user_address_2'];
        $_SESSION['city'] = $_POST['user_city'];
        $_SESSION['state'] = $_POST['user_state'];
        $_SESSION['zip_code'] = $_POST['user_zip_code'];
        $_SESSION['username'] = $_POST['user_username'];
        $_SESSION['password'] = $_POST['user_password'];
        $_SESSION['confirm_password'] = $_POST['confirm_password'];
        header("Location: ./?error_status=1&ev=$email_validation&tv=$tel_validation&zv=$zip_validation&pm=$password_mismatch");
    } else {
        send_registration_email($email, $name);
        header("Location: ./success.php");
    }
?>
