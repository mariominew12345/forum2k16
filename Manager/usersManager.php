<?php
require_once('config.php');
require_once('Models/User.php');

class UsersManager{
    private $pdo;

    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=forum2k16;charset=utf8', DATABASE_USER);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function registerUser(User $user){
        $query = $this->pdo->prepare("INSERT INTO users (username, email, first_name, last_name, password, salt)
                                VALUES (:username, :email, :firstName, :lastName, :password, :salt)");
        $query -> bindParam(':username', $user->getUsername());
        $query -> bindParam(':email', $user->getEmail());
        $query -> bindParam(':firstName', $user->getFirstName());
        $query -> bindParam(':lastName', $user->getLastName());
        $query -> bindParam(':password', $user->getPassword());
        $query -> bindParam(':salt', $user->getSalt());
        $query->execute();
    }

    function getUserByUsername($username){
        $query = $this->pdo->prepare("SELECT id, username, first_name AS firstName, last_name AS lastName, password, salt, avatar
                                          FROM users
                                          WHERE username LIKE :username");
        $query->bindParam(':username', $username);
        $query->execute();

        $data = $query->fetch();
        if($data){
            return new User($data);
        }
        return null;
    }

    function getUserById($id){
        $query = $this->pdo->prepare("SELECT * FROM users WHERE id LIKE :id");
        $query->bindParam(':id', $id);
        $query->execute();

        $data = $query->fetch();
        if($data){
            return new User($data);
        }
        return null;
    }

    function getUserByEmail($email){
        $query = $this->pdo->prepare("SELECT id, username, first_name AS firstName, last_name AS lastName, avatar
                                          FROM users
                                          WHERE email LIKE :email");
        $query->bindParam(':email', $email);
        $query->execute();

        $data = $query->fetch();
        if($data){
            return new User($data);
        }
        return null;
    }

    function changeUserSessionKey($userId, $sessionKey){
        $query = $this->pdo->prepare("UPDATE users
                                          SET session_key = :sessionKey
                                          WHERE id LIKE :id");
        $query->bindParam(':id', $userId);
        $query->bindParam(':sessionKey', $sessionKey);
        $query->execute();
    }

    function editUser(User $user){
        $query = $this->pdo->prepare("UPDATE users
                                          SET avatar = :avatar,
                                          first_name = :firstName,
                                          last_name = :lastName
                                          WHERE id LIKE :id");
        $query->bindParam(':id', $user->getId());
        $query->bindParam(':avatar', $user->getAvatar());
        $query->bindParam(':firstName', $user->getFirstName());
        $query->bindParam(':lastName', $user->getLastName());

        $query->execute();
    }

    function getUserBySessionKey($sessionKey){
        $query = $this->pdo->prepare("SELECT users.id, users.username, users.first_name AS firstName, users.last_name AS lastName,
                                          users.email, users.is_admin, avatar
                                          FROM users
                                          WHERE session_key LIKE :sessionKey");
        $query->bindParam(':sessionKey', $sessionKey);
        $query->execute();

        $data = $query->fetch();
        if($data){
            return new User($data);
        }
        return null;
    }

    function getUserByUsernameAndPassword($username, $password){
        $query = $this->pdo->prepare("SELECT id, username, first_name AS firstName, last_name AS lastName, salt, avatar
                                          FROM users
                                          WHERE username LIKE :username AND password LIKE :password");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();

        $data = $query->fetch();
        if($data){
            return new User($data);
        }
        return null;
    }

}

?>