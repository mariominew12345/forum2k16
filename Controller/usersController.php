<?php
session_start();

require_once('Service/usersService.php');

$userService = new UsersService();

if(isset($_SESSION['sessionKey'])){
    $user = $userService->getUserBySessionKey($_SESSION['sessionKey']);
}
else{
    $user = null;
}

if(isset($_POST['login'])){
    try{
        $sessionKey = $userService->loginUser($_POST['username'], $_POST['password']);

        if($sessionKey != ""){
            header("Location: index.php?page=main");
        }
        else{
            header("Location: index.php?page=error&error=Username or password don't match");
        }

    }
    catch(Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }
}

if (isset($_POST['editProfile'])){
    try{

        $user->setAvatar($_POST['avatar']);
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
        $userService->editUser($user);

    }catch (Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }

}

if(isset($_POST['registerUser'])){
    try {
        validateUserData($_POST);

        if ($userService->getUserByUsername($_POST['username'])) {
            throw new Exception("Username already exists!", 400);
        }
        if ($userService->getUserByEmail($_POST['email'])) {
            throw new Exception("Email already exists!", 400);
        }
        if ($_POST['password'] != $_POST['repeatPassword']) {
            throw new Exception("Passwords don't match!", 400);
        }
        if ($_POST['email'] != $_POST['repeatEmail']) {
            throw new Exception("Emails don't match!", 400);
        }


        $newUser = new User();
        $newUser->setUsername($_POST['username']);
        $newUser->setFirstName($_POST['firstName']);
        $newUser->setLastName($_POST['lastName']);
        $newUser->setEmail($_POST['email']);
        $newUser->setPassword($_POST['password']);


        $userService->registerUser($newUser);
        $userService->loginUser($newUser->getUsername(), $_POST['password']);
        header("Location: index.php?page=main");
    }
    catch(Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }
}

function validateUserData($userData){
    if(!isset($userData['username']) || $userData['username'] == ""){
        throw new Exception("Username cannot be empty!", 400);
    }
    if(!isValid($userData['username'])){
        throw new Exception("Username can only contain [A-Z , a-z] and [1-9]", 400);
    }
    if(!isset($userData['firstName']) || $userData['firstName'] == ""){
        throw new Exception("First name can not be empty!", 400);
    }
    if(!isValid($userData['firstName'])){
        throw new Exception("Name can only contain [A-Z , a-z] and [1-9]", 400);
    }
    if(!isset($userData['lastName']) || $userData['lastName'] == ""){
        throw new Exception("Name cannot be empty!", 400);
    }
    if(!isValid($userData['lastName'])){
        throw new Exception("Surname can only contain [A-Z , a-z] and [1-9]", 400);
    }
    if(!isset($userData['email']) || $userData['email'] == ""){
        throw new Exception("Emal cannot be empty!", 400);
    }
    if(!isset($userData['password']) || strlen($userData['password']) < PASSWORD_MIN_LENGTH){
        throw new Exception("Password should be atleast " . PASSWORD_MIN_LENGTH . " chars!", 400);
    }

}

function logoutUser($userService){
    $userService->logoutUser();
    header("Location: index.php?page=main");
}

function isValid($str) {
    return !preg_match('/[^A-Za-z0-9.#\\-$]/', $str);
}

?>