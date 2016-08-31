<?php

require_once('Service/topicsService.php');

$topicsService = new TopicsService();

if (isset($_GET['page']) && $_GET['page'] == 'main'){
    $mostPopularTopics = $topicsService->getMostPopularTopics();
    $latestTopics = $topicsService->getTopics(3);


}
if (isset($_GET['page'])){
    if ($_GET['page'] == 'main' || $_GET['page'] == 'admin'){
        if (isset($_GET['deleteTopic'])){
            if (($user && $user->isAdmin()) || ($user && $topicsService->getTopicById($_GET['deleteTopic'])->getAuthorId() == $user->getId())){
                $topicsService->deleteTopicById($_GET['deleteTopic']);
                header("Location: index.php?page=" . $_GET['page']);
                die();
            }
        }
    }
}

if (isset($_POST['addTopicBtn'])){
    try{
        $topic = new Topic();
        $topic->setTitle($_POST['title']);
        $topic->setContent($_POST['topic-content']);
        $topic->setCategoryId($_POST['category']);
        $topic->setAuthorId($user->getId());

        $topicsService->createTopic($topic);

        header("Location: index.php?page=main");
    }
    catch(Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }
}

if (isset($_POST['editTopicBtn'])){
    try{
        $topic = new Topic();
        $topic->setTitle($_POST['title']);
        $topic->setContent($_POST['content']);
        $topic->setCategoryId($_POST['category']);

        $topicsService->editTopic($_GET['topic-id'], $topic);

        header("Location: index.php?page=topic&topic-id=" . $_GET['topic-id']);
    }
    catch(Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
        var_dump($error);
    }
}

