<?php
require_once('config.php');
require_once('Models/Answer.php');

class AnswersManager{
    private $pdo;

    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=forum2k16;charset=utf8', DATABASE_USER);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function createAnswer($topicId, Answer $answer){
        $query = $this->pdo->prepare("INSERT INTO `answers` (`topic_id`, `content`, `author_id`) VALUES (:topicId, :content, :author_id)");
        $query -> bindParam(':topicId', $topicId);
        $query -> bindParam(':content', $answer->getContent());
        $query -> bindParam(':author_id', $answer->getAuthorId());
        $query->execute();
    }

    function editTopic($id, $content){
        $query = $this->pdo->prepare("UPDATE answers SET content = :content WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query -> bindParam(':content', $content);
        $query->execute();
    }

    function getAnswersByTopicId($id){
        $query = $this->pdo->prepare("SELECT * FROM answers WHERE topic_id LIKE :id ORDER BY id ASC");
        $query->bindParam(':id', $id);
        $query->execute();

        $data = $query->fetchAll();
        if($data){
            return ($data);
        }
        return null;
    }

    function getAnswerById($id){
        $query = $this->pdo->prepare("SELECT * FROM answers WHERE id LIKE :id ORDER BY id ASC");
        $query->bindParam(':id', $id);
        $query->execute();

        $data = $query->fetch();
        if($data){
            return new Answer($data);
        }
        return null;
    }


    function deleteAnswer($id) {
        $query = $this->pdo->prepare("DELETE FROM answers  WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }


    function increaseRating($id){
        $query = $this->pdo->prepare("UPDATE answers SET rating = rating+1 WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query->execute();
    }

    function decreaseRating($id){
        $query = $this->pdo->prepare("UPDATE answers SET rating = rating-1 WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query->execute();
    }

}

?>