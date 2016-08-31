<?php

if (isset($_GET['answer-id'])){
    try{
        $answerToEdit = $answerService->getAnswerById($_GET['answer-id']);


        if ($user && $user->isAdmin()){
            // Continue...
        } else {
            if (!$answerToEdit || !$user || $answerToEdit->getAuthorId() != $user->getId()){
                header('Location: index.php?page=error&eror=Topic doesn\'t exists, or you don\'t have the permissions to edit it.');
            }
        }

    }catch (Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }

}

?>

<link rel="stylesheet" href="./styles/new-topic.css"/>
<main id="wrapper">
    <span class="or-reg" style="border: none; padding: 0;text-align: left; text-transform: uppercase; width: 70%; font-size: 25px">Edit answer</span>
    <section class="new-topic">
        <form method="post" name="">
            <span class="or-reg" style="border: none; padding: 0;text-align: left; text-transform: uppercase; width: 98%; font-size: 15px; margin: 0 auto">Content</span>
            <textarea name="content" id="topic-content"><?php echo $answerToEdit->getContent()?></textarea>
            <div style="width: 98%; margin: 0 auto; text-align: right;">
                <input type="submit" id="addTopicBtn" name="editAnswerBtn"/>
            </div>
        </form>
    </section>
</main>
<script>
    CKEDITOR.replace('topic-content');
</script>
