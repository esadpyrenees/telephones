<?php snippet('header') ?>


  <div class="bibliographie-generale">
    <h1><?= $page->title()->html() ?></h1>

    <section class="filtre">
      <select class="filters-select">
        <option value="*">Tout</option>        
        <?php foreach(page('sommaire')->children()->listed()->sortBy('title', 'asc') as $article) :?>
          <option value="<?= $article->author()->slug() ?>"><?= $article->title() ?></option>
        <?php endforeach ?>
      </select>
    </section>

    <div>
      <h2 class="entree-reference">Références</h2>
      <h2 class="article-correspondant">Article(s)</h2>
    </div>

    <div class="biblio-content">
      <?php foreach($page->children()->template('biblio')->sortBy('title', 'asc') as $biblio) :
        $articles = page('sommaire')->children()->filter(function($child) use($biblio){
        return $child->bibliography()->toPages()->has($biblio);}) ?>

        <div class='element-item <?php foreach($articles as $article): ?><?= $article->author()->slug() ?><?php endforeach ?>'>

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

  </div>

<?php snippet('footer') ?>
