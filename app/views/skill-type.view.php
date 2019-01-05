<?php require('partials/head.php')?>

<h1>
    <?= "$message $type"?>
</h1>

<div class="section">
    <div class="container">
        <ul>
            <div class="box">
                <?php foreach ($skills as $skill) : ?>
                <li>
                    <?= htmlspecialchars($skill->name) ?>
                    <?= htmlspecialchars($skill->level) ?>
                    <?php require 'partials/delete.php' ?>
                </li>
                <?php endforeach; ?>
            </div>
        </ul>
    </div>
</div>


<?php require('partials/footer.php')?>