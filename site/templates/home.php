<?php snippet('header') ?>

<div class="accueil">
    <div class="titre-accueil">
        <h1 class="titre-article"><?= $page->title()->html() ?></h1>
    </div>
</div>

<main class="main">

    <?= $page->text()->kirbytext() ?>

</main>

<?php snippet('footer-sommaire') ?>