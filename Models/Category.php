<?php

class Category {

    private $id;

    private $name;

    private $description;

    function __construct($categoryData = null) {

        if(isset($categoryData['id'])){
            $this->id = $categoryData['id'];
        }
        if(isset($categoryData['name'])){
            $this->name =  htmlentities($categoryData['name']);
        }
        if(isset($categoryData['description'])){
            $this->description = htmlentities($categoryData['description']);
        }
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
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

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

}