<?php

class User {

    private $id;

    private $username;

    private $email;

    private $firstName;

    private $lastName;

    private $password;

    private $salt;

    private $isAdmin;

    private $avatar;

    function __construct($userData = null) {

        if(isset($userData['id'])){
            $this->id = $userData['id'];
        }
        if(isset($userData['username'])){
            $this->username =  htmlentities($userData['username']);
        }
        if(isset($userData['password'])){
            $this->password = $userData['password'];
        }
        if(isset($userData['email'])){
            $this->email =  htmlentities($userData['email']);
        }
        if(isset($userData['firstName'])){
            $this->firstName =  htmlentities($userData['firstName']);
        }
        if(isset($userData['lastName'])){
            $this->lastName =  htmlentities($userData['lastName']);
        }
        if(isset($userData['salt'])){
            $this->salt = $userData['salt'];
        }
        if(isset($userData['is_admin'])){
            $this->isAdmin = $userData['is_admin'];
        }
        if(isset($userData['avatar'])){
            $this->avatar = $userData['avatar'];
        }
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function generateNewSalt(){
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    public function isAdmin()
    {
        return $this->isAdmin;
    }


    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

}