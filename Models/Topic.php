<?php

class Topic {

    private $id;

    private $title;

    private $content;

    private $authorId;

    private $views;

    private $rating;

    private $answers;

    private $categoryId;

    private $date;

    function __construct($topicData = null) {

        if(isset($topicData['id'])){
            $this->id = $topicData['id'];
        }
        if(isset($topicData['title'])){
            $this->title = $topicData['title'];
        }
        if(isset($topicData['content'])){
            $this->content = $topicData['content'];
        }
        if(isset($topicData['author_id'])){
            $this->authorId = $topicData['author_id'];
        }
        if(isset($topicData['views'])){
            $this->views = $topicData['views'];
        }
        if(isset($topicData['rating'])){
            $this->rating = $topicData['rating'];
        }
        if(isset($topicData['answers'])){
            $this->answers = $topicData['answers'];
        }
        if(isset($topicData['category_id'])){
            $this->categoryId = $topicData['category_id'];
        }
        if(isset($topicData['date'])){
            $this->date = $topicData['date'];
        }
    }

    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setTitle($title)
    {
        $this->title = htmlentities($title);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setViews($views)
    {
        $this->views = $views;
    }

    public function getViews()
    {
        return $this->views;
    }





}