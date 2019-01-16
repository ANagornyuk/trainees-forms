<?php


class Database
{
    private $pdo;

    public function __construct(){
        require 'evn_vars.php';
        try {
            $this->pdo = new PDO("mysql:host=$servername", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
            $this->pdo->query("use $dbname");
            $this->pdo->query($table);

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }

    public function SignUp($FirstName, $LastName, $Email, $Password){ //$_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']
        try {
            $insert = $this->pdo->prepare("
            INSERT INTO users 
            (FirstName, LastName, Email, Password)
            VALUES
            (:fname, :lname, :email, :password)");
            $password = password_hash($Password, PASSWORD_DEFAULT);
            $insert->execute(array(
                ':fname' => $FirstName,
                ':lname' => $LastName,
                ':email' => $Email,
                ':password' => $password,
            ));
        } catch(PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
        }

    }

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
}