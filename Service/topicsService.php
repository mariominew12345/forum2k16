<?php
require_once('Manager/topicsManager.php');

class TopicsService{

    private $manager;

    function __construct() {
        $this->manager = new TopicsManager();
    }

    function createTopic(Topic $topic){
        $this->manager->createTopic($topic);
    }

    function getTopicById($id){
        return $this->manager->getTopicById($id);
    }

    function getCategories($limit){
        return $this->manager->getTopics($limit);
    }

    function deleteTopicById($id){
        $this->manager->deleteTopic($id);
    }

    function increaseViews($id){
        $this->manager->increaseViews($id);
    }

    function increaseRating($id){
        $this->manager->increaseRating($id);
    }

    function decreaseRating($id){
        $this->manager->decreaseRating($id);
    }

    function increaseAnswers($id){
        $this->manager->increaseAnswers($id);
    }

    function getMostPopularTopics(){
        return $this->manager->getMostPopularTopics();
    }

    function getTopics($limit){
        return $this->manager->getTopics($limit);
    }

    function decreaseAnswers($id){
        $this->manager->decreaseAnswers($id);
    }

    function searchTopics($text){
        return $this->manager->search($text);
    }

    function getTopicsByCategoryId($id){
        return $this->manager->getTopicsByCategoryId($id);
    }

    function editTopic($id, Topic $topic){
        $this->manager->editTopic($id, $topic);
    }
}
?>