<?php
require '../../config/config.php';

//handelt  de inlog af
if ( isset($_POST['authUser'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT email, password, gebruikersrol FROM users WHERE email = '$email' AND password = '$password'";

    if(! $query = mysqli_query($con, $sql)){
        trigger_error('check de sql op fouten');
    }

    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_assoc($query);

        if ($password == $row['password']){
            session_start();
            $_SESSION['name'] = $row['email'];
            $_SESSION['role'] = $row['gebruikersrol'];
            header('location:../index.php');
        } else{
            $msg = url_encode('Gebruikersnaam of wachtwoord onjuist');
            header('location: ../login.php?msg=' . $msg );
        }
    }
}

//handelt de uitlog af 
if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    $msg = urlencode("u bent succelsvol uitgelogd");
    header('location:../login.php?msg='. $msg );    
}
