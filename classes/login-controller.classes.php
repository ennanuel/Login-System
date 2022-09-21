<?php

class LoginContr extends Login {

    private $emailUid;
    private $pword;

    public function __construct($emailUid, $pword) {
        $this->emailUid = $emailUid;
        $this->pword = $pword;
    }

    public function logUserIn() {
        if(!$this->emptyInput()) {
            header('location: ../index.php?error=emptyinput');
            die();
        }
        if(!$this->checkUidEmail()) {
            header('location: ../index.php?error=userdoesnotexist');
            die();
        }
        if(!$this->checkUserPword($this->pword, $this->emailUid)) {
            header('location: ../index.php?error=incorrectpassword');
            die();
        }

        $user = $this->fetchData('*', $this->emailUid);

        session_start();
        $_SESSION['userid'] = $user[0]['users_id'];
        $_SESSION['useruid'] = $user[0]['users_uid'];

    }

    public function emptyInput() {
        $result;
        if(empty($this->emailUid) || empty($this->pword)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    public function checkUidEmail() {
        $result;
        if(!$this->checkUser($this->emailUid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}