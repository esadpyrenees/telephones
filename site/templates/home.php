<?php snippet('header') ?>

<div class="accueil">
    <div class="titre-accueil">
        <h1 class="titre-article"><?= $page->title()->html() ?></h1>
    </div>
</div>

<main class="main">

    <div class="intro-accueil">
        <?= $page->text()->kirbytext() ?>
    </div>

</main>

<?php snippet('footer-sommaire') ?>