<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        include_once 'userRepo.php';
        $userRepository  = new UserRepository();
        $users = $userRepository->getAllUsers();
        foreach($users as $user){
            echo 
            "
            <tr>
                <td>$user[user_id]</td>
                <td>$user[first_name]</td>
                <td>$user[last_name]</td>
                <td>$user[email]</td>
                <td>$user[password]</td>
                <td><a href='edit.php?id=$user[user_id]'>Edit</a></td>
                <td><a href='delete.php?id=$user[user_id]'>Delete</a></td>

            </tr>
            ";
        }
        
        
        ?>
    </table>
</body>
</html>