<?php

if (isset($_GET['topic-id'])){
    try{
        $topicToEdit = $topicsService->getTopicById($_GET['topic-id']);


        if ($user && $user->isAdmin()){
            // Continue...
        } else {
            if (!$topicToEdit || !$user || $topicToEdit->getAuthorId() != $user->getId()){
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
    <span class="or-reg" style="border: none; padding: 0;text-align: left; text-transform: uppercase; width: 70%; font-size: 25px">Edit topic</span>
    <section class="new-topic">
        <form method="post" name="">
            <input type="text" name="title" id="topic-subject" placeholder="Subject..." value="<?php echo $topicToEdit->getTitle()?>"/>

            <span class="or-reg" style="border: none; padding: 0;text-align: left; text-transform: uppercase; width: 98%; font-size: 15px; margin: 0 auto">Content</span>
            <textarea name="content" id="topic-content"><?php echo $topicToEdit->getContent()?></textarea>

            <select name="category" style="margin-top: 15px;">
                <?php
                $categories = $categoryService->getCategories(300);
                foreach ($categories as $category){ ?>
                    <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                <?php
                }?>
            </select>

            <div style="width: 98%; margin: 0 auto; text-align: right;">
                <input type="submit" id="addTopicBtn" name="editTopicBtn"/>
            </div>
        </form>
    </section>
</main>
<script>
    CKEDITOR.replace('topic-content');
</script>
