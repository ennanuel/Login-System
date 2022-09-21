<?php

if(isset($_POST['submit'])) {
    
    //Grabbing the data
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pword = $_POST['pword'];
    $confPword = $_POST['conf-pword'];

    //Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-controller.classes.php";

    $signup = new SignupContr($uid, $name, $email, $pword, $confPword);

    //Running error handlers and signup
    $signup->signupUser();

    //Going to back to front page
    header("location: ../index.php?msg=successful");

}