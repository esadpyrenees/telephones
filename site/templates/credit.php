<?php snippet('header') ?>

<section class="content article">
  <article>
    <h1 class="titre-article"><?= $page->title()->html() ?></h1>

    <article>
      <?= $page->text()->kt() ?>
    </article>

  </article>
</section>

<?php snippet('footer') ?>