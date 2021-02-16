<?php snippet('header') ?>

<section class="content-article">
  <div class="titrage">
    <h1 class="titre-article"><?= $page->title()->html() ?></h1>
    <h1 class="titre-auteur"><?= $page->author()->html() ?></h1>
  </div>
  <p class="mentions-article"><?= $page->title()->html() ?><br><br><?= $page->author()->html() ?></p>

  <?= $page->text()->ft() ?>  
</section>

<?php if ($page->bibliographie()->isNotEmpty()): ?>
  <section class="content-bibliographie">
    <div>
        <button class="button">Afficher la bibliographie</button>
        <div class="bibliographie">
            <?= $page->bibliographie()->kt() ?>
        </div>
    </div>
  </section>
<?php endif ?>

<?php snippet('footer') ?>