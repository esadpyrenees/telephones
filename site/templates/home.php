<?php snippet('header') ?>

<section class="content article">
    <h1 class="titre-article"><?= $page->title()->html() ?></h1>
	<h1 class="titre-auteur"><?= $page->author()->html() ?></h1>

    <?= $page->text()->kirbytext() ?>

    <p class="mentions-article"><?= $page->title()->html() ?><br><br><?= $page->author()->html() ?></p>
</section>

<?php snippet('footer') ?>