<?php snippet('header') ?>


  <div class="bibliographie-generale">
    <h1><?= $page->title()->html() ?></h1>

    <section class="filtre">
      <button class="">Anaïs Guilet</button>
      <button class="">Corinne Melin</button>
      <button class="">Laurence Allard</button>
      <button class="">Fabien Zocco</button>
      <button class="">Ghislaine Chabert</button>
      <button class="">Raymond Delambre</button>
      <button class="">Martine Beugnet</button>
    </section>

    <div>
      <h2 class="entree-reference">Références</h2>
      <h2 class="article-correspondant">Notice présente dans :</h2>
    </div>
      
      <?php foreach($page->children()->template('biblio') as $biblio) :
        $articles = page('sommaire')->children()->filter(function($child) use($biblio){
        return $child->bibliography()->toPages()->has($biblio);}) ?>
        
        <div class='<?php foreach($articles as $article): ?><?= $article->author()->slug() ?><?php endforeach ?>'>

          <article class="entree-reference">
            <?= $biblio->text()->kt() ?>
          </article>

          <?php if($articles->count() > 1) :?>
            <article class="article-correspondant">
              <?php foreach($articles as $article): ?>
                <li><em><a href="<?= $article->url() ?>"><?= $article->title() ?></a></em></li>
              <?php endforeach ?>
            </article>

          <?php elseif($articles->count() == 1) :?>
            <article class="article-correspondant">
              <em><a href="<?= $articles->first()->url() ?>"><?= $articles->first()->title() ?></a></em>
            </article>

          <?php else: ?>
            <article class="article-correspondant">
              <p>Pas d’article</p>
            </article>
          <?php endif ?>

          </div>
        
        <br>
        
      <?php endforeach ?>
  </div>

<?php snippet('footer') ?>