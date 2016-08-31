<div id="wrapper">
    <section class="category-holder">
        <div class="category-title">Categories</div>
        <div class="category-information">
            <div class="stat stat-title">Title</div>

            <?php
            $categories = $categoryService->getCategories(300);

            foreach ($categories as $category){ ?>

                <div class="category">
                    <div class="cat cat-title">
                        <img src="./images/folder1.png" class="category-avatar"/>
                        <div class="cat-description">
                            <span><a href="index.php?page=category&categoryId=<?php echo $category['id']?>"><?php echo $category['name']?></a></span>
                            <span><?php echo $category['description']?></span>
                        </div>
                    </div>

                </div>

            <?php
            }
            ?>
        </div>
    </section>
</div>