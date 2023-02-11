<?php
include_once 'userRepo.php';

$userId = $_GET['id'];

$userRepository = new UserRepository();

$user = $userRepository->getUserById($userId);


?>


<form action="" method="POST">
        <input type="text" name="id" value="<?=$user['user_id']?>" readonly> <br><br>
        <input type="text" name="firstname" value="<?=$user['first_name']?>"> <br><br>
        <input type="text" name="lastname" value="<?=$user['last_name']?>"> <br><br>
        <input type="text" name="email" value="<?=$user['email']?>"> <br><br>
        <input type="text" name="password" value="<?=$user['password']?>"> <br><br>

        <input type="submit" name="save" value="save"> <br><br>
</form>


<?php
if(isset($_POST['save'])){
    $id = $userId;
    $name = $_POST['firstname'];
    $surname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepository->updateUser($id,$name,$surname,$email,$password);
    header("location:dashboard.php");
}

?>