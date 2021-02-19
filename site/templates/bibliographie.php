<?php snippet('header') ?>

<main class="main">

<section class="">
  <h1 class="titre-article"><?= $page->title()->html() ?></h1>
    <?php foreach($page->children()->template('biblio') as $biblio) :
      $articles = page('sommaire')->children()->filter(function($child) use($biblio){
        return $child->bibliography()->toPages()->has($biblio);
      })
    ?>
    <p class='<?php foreach($articles as $article): ?><?= $article->author()->slug() ?><?php endforeach ?>'>
      <b><?= $biblio->text()->kt() ?></b>
      <?php if($articles->count() > 1) :?>
        notice présente dans les articles :
        <?php foreach($articles as $article): ?>
        <em><a href="<?= $article->url() ?>"><?= $article->title() ?></a></em>
        <?php endforeach ?>
      <?php elseif($articles->count() == 1) :?>
        notice présente dans l’article :
        <em><a href="<?= $articles->first()->url() ?>"><?= $articles->first()->title() ?></a></em>
      <?php else: ?>
        Pas d’article
      <?php endif ?>
    </p>
      <br>
  <?php endforeach ?>
</section>

</main>

<?php snippet('footer') ?>