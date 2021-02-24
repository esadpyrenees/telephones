<?php snippet('header') ?>

<div class="accueil">
    <div class="titre-accueil">
        <h1 class="titre-article"><?= $page->title()->html() ?></h1>
    </div>
</div>

    <div class="intro-accueil">
        <?= $page->text()->kirbytext() ?>
    </div>

<?php snippet('footer-sommaire') ?>
