<link rel="stylesheet" href="./styles/new-topic.css"/>
<main id="wrapper">
    <span class="or-reg" style="border: none; padding: 0;text-align: left; text-transform: uppercase; width: 70%; font-size: 25px">Post a new topic</span>
    <section class="new-topic">
        <form method="post" name="newTopic">
            <input type="text" name="title" id="topic-subject" placeholder="Subject..."/>

            <span class="or-reg" style="border: none; padding: 0;text-align: left; text-transform: uppercase; width: 98%; font-size: 15px; margin: 0 auto">Content</span>
            <textarea name="topic-content" id="topic-content"></textarea>

            <select name="category" style="margin-top: 15px;">
                <?php
                $categories = $categoryService->getCategories(300);
                foreach ($categories as $category){ ?>
                    <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                <?php
                }?>
            </select>

            <div style="width: 98%; margin: 0 auto; text-align: right;">
                <input type="submit" id="addTopicBtn" name="addTopicBtn"/>
            </div>
        </form>
    </section>
</main>
<script>
    CKEDITOR.replace('topic-content');
</script>
