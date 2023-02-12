<?php 
include 'database-connection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DBConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $id = $user->getId();
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (user_id,first_name,last_name,email,password) VALUES (?,?,?,?,?)";
        
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name,$surname,$email,$password]);
        echo "<script> alert('You are registered now!') </script>";
    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user";
        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserByEmailAndPassword($email,$password){
    }

    function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE user_id='$id'";
        $statement=$conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }


    function updateUser($id,$name,$surname,$email,$password){
        $conn = $this->connection;

        $sql = "UPDATE user SET first_name=?,last_name=?,email=?,password=? where user_id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$name,$surname,$email,$password,$id]);
        echo "<script> alert('User has been updated successfuly!') </script>";
    }

    function deleteUserById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE user_id=?"; 

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('User has been deleted successfuly!') </script>";
    }
}


?>