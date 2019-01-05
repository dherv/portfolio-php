<?php require('partials/head.php')?>

<div class="section">
    <div class="container">
        <ul>
            <?php foreach ($skills as $type) : ?>
            <div class="box">
                <h3 class="subtitle">
                    <a href="/type?type=<?php echo $type ?>" />
                    <?php echo $type ?></a>
                </h3>

            </div>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require('partials/footer.php')?>