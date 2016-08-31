<?php

class Answer {

    private $id;

    private $topicId;

    private $rating;

    private $content;

    private $authorId;

    private $date;

    function __construct($topicData = null) {

        if(isset($topicData['id'])){
            $this->id = $topicData['id'];
        }

        if(isset($topicData['content'])){
            $this->content = $topicData['content'];
        }

        if(isset($topicData['author_id'])){
            $this->authorId = $topicData['author_id'];
        }

        if(isset($topicData['topic_id'])){
            $this->topicId = $topicData['topic_id'];
        }

        if(isset($topicData['rating'])){
            $this->rating = $topicData['rating'];
        }

        if(isset($topicData['date'])){
            $this->date = $topicData['date'];
        }
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
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

    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
    }

    public function getTopicId()
    {
        return $this->topicId;
    }
}