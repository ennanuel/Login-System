<?php

class Login extends Dbh {

    protected function checkUser($uidEmail) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        try{
            if(!$stmt->execute(array($uidEmail, $uidEmail))) {
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
            $resultCheck = true;
        }
        else {
            $resultCheck = false;
        }
        $stmt = null;
        return $resultCheck;
    }

    protected function fetchData($dat1, $dat2,) {
        $stmt = $this->connect()->prepare('SELECT ' .$dat1 .' FROM users WHERE users_uid = ? OR users_email = ?;');

        if(!$stmt->execute(array($dat2, $dat2))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $fetchedDat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;

        return $fetchedDat;
    }

    protected function checkUserPword($pword, $uidEmail) {

        $pwdHashed = $this->fetchData('users_pword', $uidEmail);
        $checkPwd = password_verify($pword, $pwdHashed[0]['users_pword']);

        $stmt = null;

        return $checkPwd;

    }

}