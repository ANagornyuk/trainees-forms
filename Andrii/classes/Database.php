<?php


class Database
{
    private $pdo;
    private static $instance = null;

    private function __construct($dbDetails){
        //require 'evn_vars.php';
        $servername = $dbDetails['servername'];
        $username = $dbDetails['username'];
        $password = $dbDetails['password'];
        $dbname = $dbDetails['dbname'];
        $table = $dbDetails['table'];
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

    public static function connect($dbDetails){
        // Check if instance is already exists
        if(self::$instance == null) {
            self::$instance = new Database($dbDetails);
        }

        return self::$instance;
    }

    public function SignUp($FirstName, $LastName, $Email, $Password){ //$_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']
        try {
            $insert = $this->pdo->prepare("
            INSERT INTO users 
            (FirstName, LastName, Email, Password)
            VALUES
            (:fname, :lname, :email, :password)
            ");
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

    public function LogIn($Email){ //$_POST['email']
        try {
            $stmt = $this->pdo->prepare("
            SELECT Password, FirstName, id 
            FROM users
            WHERE Email = ? 
            ");
            $stmt->execute([$Email]);
            $select = $stmt->fetch();
        } catch(PDOException $e) {
            echo "Select failed: " . $e->getMessage();
        }
        return $select;
    }

    public function getUserdata($UserId){
        try {
            $stmt = $this->pdo->prepare("
            SELECT * 
            FROM users
            WHERE id = ? 
            ");
            $stmt->execute([$UserId]);
            $select = $stmt->fetch();
        } catch(PDOException $e) {
            echo "Select failed: " . $e->getMessage();
        }
        return $select;
    }

    public function selectAllEmail(){
        $select = $this->pdo->query("SELECT Email FROM users;")->fetchAll();
        return $select;
    }

    public function setUserdata($select, $column, $newData){
        try {
            $sql = "
            UPDATE users
            SET $column = :val 
            WHERE id= :id
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(
                ':val' => $newData,
                ':id' => $select['ID']
            ));
        } catch(PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            exit();
        }
    }


    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }


}