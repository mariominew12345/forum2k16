<?php
require_once('Manager/answersManager.php');

class AnswersService{

    private $manager;

    function __construct() {
        $this->manager = new AnswersManager();
    }

    function createAnswer($topicId, Answer $answer){
        $this->manager->createAnswer($topicId, $answer);
    }

    function editAnswer($answerId, $content){
        $this->manager->editTopic($answerId, $content);
    }

    function getAnswersByTopicId($id){
        return $this->manager->getAnswersByTopicId($id);
    }

    function getAnswerById($id){
        return $this->manager->getAnswerById($id);
    }

    function deleteAnswer($id){
        $this->manager->deleteAnswer($id);
    }

    function increaseRating($id){
        $this->manager->increaseRating($id);
    }

    function decreaseRating($id){
        $this->manager->decreaseRating($id);
    }
}
?>