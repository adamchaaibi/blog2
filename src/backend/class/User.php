<?php
require_once 'DbConfig.php';

class User extends DbConfig{

    public function create($data){
        try{
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        if($data['password'] != $data['conf-password']){
            throw new Exception("Wachtwoorden komen niet overeen.");
        }
        $encryptedPassword = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $data['username']);
        $stmt->bindParam(":password", $encryptedPassword);
        if(!$stmt->execute()){
            throw new Exception("Account maken niet gelukt.");
        }
        header("location: login.php");
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    public function getUser($username){
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getUsers(){
        $sql = "SELECT id, username FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function login($data){
        try{
            $user = $this->getUser($data['username']);
            if(!$user){
                throw new Exception("Gebruiker bestaat niet.");
            }
            if(!password_verify($data['password'], $user->password)){
                throw new Exception("Wachtwoord is Incorrect.");
            }
            session_start();
            $_SESSION['ingelogd'] = true;
            $_SESSION['username'] = $user->username;
            header("location: backend/admin.php");

        }catch(Exception $e){
            echo $e->getMessage();

        }
    }
}
?>