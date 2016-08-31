<?php
require_once('Manager/usersManager.php');
class UsersService{

    private $manager;

    function __construct() {
        $this->manager = new UsersManager();
    }

    function registerUser(User $user){

        $user->generateNewSalt();
        $password = sha1($user->getPassword().$user->getSalt());
        $user->setPassword($password);

        $this->manager->registerUser($user);
    }

    function getUserByUsername($username){
        return $this->manager->getUserByUsername($username);
    }

    function getUserByEmail($email){
        return $this->manager->getUserByEmail($email);
    }

    function editUser($user){
        $this->manager->editUser($user);
    }


    function getUserById($id){
        return $this->manager->getUserById($id);
    }

    function getUserBySessionKey($sessionKey){
        return $this->manager->getUserBySessionKey($sessionKey);
    }

    function loginUser($username, $password){
        $user = $this->manager->getUserByUsername($username);
        if(!$user){
            throw new Exception("Incorrect username or password!", 400);
        }
        $password = sha1($password.$user->getSalt());
        $sessionKey = null;

        if($user->getPassword() === $password){
            $sessionKey = $this->generateSessionKey($user->getId());
            $this->manager->changeUserSessionKey($user->getId(), $sessionKey);
            $_SESSION['sessionKey'] = $sessionKey;
            $_SESSION['id'] = $user->getId();
        }

        return $sessionKey;
    }

    function logoutUser(){
        session_unset();
    }

    private function generateSessionKey($userId){
        $sessionKeyChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $sessionKey = $userId;
        for($i = 0; $i < 50; $i++){
            $sessionKey .= $sessionKeyChars[rand(0, strlen($sessionKeyChars) - 1)];
        }

        return $sessionKey;
    }
}
?>