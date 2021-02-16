<?php snippet('header') ?>

<section class="content article">
  <h2><?php $page->title()->html() ?></h2>
    <?php foreach($page->children()->template('biblio') as $biblio) :
      $articles = page('sommaire')->children()->filter(function($child) use($biblio){
        return $child->bibliography()->toPages()->has($biblio);
      })
    ?>
    <p class='<?php foreach($articles as $article): ?><?= $article->author()->slug() ?><?php endforeach ?>'>
      <b><?= $biblio->text()->kt() ?></b>
      <?php if($articles->count() > 1) :?>
        
        <?php foreach($articles as $article): ?>
          notice présente dans les articles :
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

<?php snippet('footer') ?>