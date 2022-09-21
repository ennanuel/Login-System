<?php

class SignupContr extends SignUp {

    private $uid;
    private $name;
    private $email;
    private $pword;
    private $confPword;

    public function __construct($uid, $name, $email, $pword, $confPword) {
        $this->uid = $uid;
        $this->name = $name;
        $this->email = $email;
        $this->pword = $pword;
        $this->confPword = $confPword;
    }

    
    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->pwordMatch() == false) {
            header("location: ../index.php?error=password");
            exit();
        }
        if($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=emailoruidtaken");
            exit();
        }

        $this->setUser($this->uid, $this->email, $this->name, $this->pword);
    }

    private function emptyInput() {
        $result;
        if(empty($this->uid) || empty($this->name) || empty($this->email) || empty($this->pword) || empty($this->confPword)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function pwordMatch() {
        $result;
        if($this->pword !== $this->confPword) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck() {
        $result;
        if(!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}