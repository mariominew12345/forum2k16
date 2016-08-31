<?php
require_once('config.php');
require_once('Models/Topic.php');

class TopicsManager{
    private $pdo;

    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=forum2k16;charset=utf8', DATABASE_USER);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function createTopic(Topic $topic){
        $query = $this->pdo->prepare("INSERT INTO `topics` (`title`, `content`, `author_id`, `category_id`) VALUES (:title, :content, :author_id, :category_id)");
        $query -> bindParam(':title', $topic->getTitle());
        $query -> bindParam(':content', $topic->getContent());
        $query -> bindParam(':author_id', $topic->getAuthorId());
        $query -> bindParam(':category_id', $topic->getCategoryId());
        $query->execute();
    }

    function editTopic($id, Topic $topic){
        $query = $this->pdo->prepare("UPDATE `topics` SET title = :title, content = :content, category_id = :category_id  WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query -> bindParam(':title', $topic->getTitle());
        $query -> bindParam(':content', $topic->getContent());
        $query -> bindParam(':category_id', $topic->getCategoryId());
        $query->execute();
    }

    function getTopicById($id){
        $query = $this->pdo->prepare("SELECT * FROM topics WHERE id LIKE :id");
        $query->bindParam(':id', $id);
        $query->execute();

        $data = $query->fetch();
        if($data){
            return new Topic($data);
        }
        return null;
    }

    function getTopics($limit){
        $query = $this->pdo->prepare("SELECT * FROM topics ORDER BY id DESC LIMIT " . $limit);
        $query->execute();

        $data = $query->fetchAll();
        if($data){
            return ($data);
        }
        return null;
    }

    function getMostPopularTopics(){
        $query = $this->pdo->prepare("SELECT * FROM topics ORDER BY views DESC LIMIT 3");
        $query->execute();

        $data = $query->fetchAll();
        if($data){
            return ($data);
        }
        return null;
    }

    function getTopicsByCategoryId($id){
        $query = $this->pdo->prepare("SELECT * FROM topics WHERE category_id LIKE :categoryId ORDER BY date DESC");
        $query->bindParam(':categoryId', $id);
        $query->execute();

        $data = $query->fetchAll();
        if($data){
            return ($data);
        }
        return null;
    }

    private function deleteTopicAnswers($topicId) {
        $this->deleteTopicAnswers($topicId);

        $query = $this->pdo->prepare("DELETE FROM answers WHERE topic_id = :topicId");
        $query->bindParam(':topicId', $topicId);
        $query->execute();
    }

    function deleteTopic($topicId) {
        $query = $this->pdo->prepare("DELETE FROM topics  WHERE id = :topicId");
        $query->bindParam(':topicId', $topicId);
        $query->execute();
    }

    function increaseViews($id){
        $query = $this->pdo->prepare("UPDATE topics SET views = views+1 WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query->execute();
    }

    function increaseAnswers($id){
        $query = $this->pdo->prepare("UPDATE topics SET answers = answers+1 WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query->execute();
    }

    function increaseRating($id){
        $query = $this->pdo->prepare("UPDATE topics SET rating = rating+1 WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query->execute();
    }

    function decreaseRating($id){
        $query = $this->pdo->prepare("UPDATE topics SET rating = rating-1 WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query->execute();
    }

    function search($queryText){
        $queryString = "SELECT * FROM topics WHERE";
        $wordsToSearch = preg_split("/[\s,-]+/", $queryText);
        foreach($wordsToSearch as $word){
            $queryString .= " title LIKE '%".$word."%' AND";
        }
        $queryString .= " 1=1";
        $query = $this->pdo->prepare($queryString);
        $query->execute();
        $data = $query->fetchAll();
        if($data){
            return ($data);
        }
        return null;
    }

    function decreaseAnswers($id){
        $query = $this->pdo->prepare("UPDATE topics SET answers = answers-1 WHERE id LIKE :id");
        $query -> bindParam(':id', $id);
        $query->execute();
    }
}

?>