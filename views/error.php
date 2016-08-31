<main id="wrapper">
    <section class="category" style="padding:20px;height: auto; text-align: center">
        <?php if(isset($_GET['error'])){
            echo ("<span style='display: inline-block;height: 100%;font-size: 20px;'>" . $_GET['error'] . "</span>");
        }?>
    </section>
</main>