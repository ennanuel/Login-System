<?php

class Signup extends Dbh {

    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        try{
            if(!$stmt->execute(array($uid, $email))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
        } catch (PDOException $ex) {
            print 'err: ' .$ex->getMessage();
            die();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function setUser($uid, $email, $name, $pword) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_name, users_uid, users_pword, users_email) VALUES (?, ?, ?, ?);');

        $hashedPwd = password_hash($pword, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

}