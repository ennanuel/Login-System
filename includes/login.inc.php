<?php

if(isset($_POST['submit'])) {

    $emailUid = $_POST['email-uid'];
    $pword = $_POST['pword'];

    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-controller.classes.php";

    $login = new LoginContr($emailUid, $pword);

    $login->logUserIn();

    header('location: ../index.php');

}