<?php 
include_once 'userRepo.php';
include_once 'user.php';

if(isset($_POST['registerBtn'])){
    if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])){
        echo "Please fill all fields!";
    }else{
        $name = $_POST['firstname'];
        $surname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = rand(0,127).$name;

        $user = new User($id,$name,$surname,$email,$password);
        $userRepository = new UserRepository();
        $userRepository->insertUser($user);
    }
}


?>