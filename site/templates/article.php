<?php snippet('header') ?>

<section class="content-article">
  <div class="titrage">
    <h1 class="titre-article"><?= $page->title()->html() ?></h1>
    <h1 class="titre-auteur"><?= $page->author()->html() ?></h1>
  </div>
  <p class="mentions-article"><?= $page->title()->html() ?><br><br><?= $page->author()->html() ?></p>

  <?= $page->text()->ft() ?>  
</section>

<section id="biblio">
  <h2>Bibliographie</h2>
  <?php foreach($page->bibliography()->toPages() as $biblio) :?>
    <?= $biblio->text()->kt() ?>
  <?php endforeach ?>
</section>

<?php snippet('footer') ?>