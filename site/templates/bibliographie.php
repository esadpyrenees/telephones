<?php snippet('header') ?>


  <div class="bibliographie-generale">
    <h1><?= $page->title()->html() ?></h1>

    <section class="filtre">
      <select class="filters-select">
        <option value="*">Tout</option>
        <?php foreach(page('sommaire')->children()->listed() as $article) :?>
          <option value=".<?= $article->author()->slug() ?>"><?= $article->title() ?></option>
        <?php endforeach ?>
      </select>
    </section>

    <div class="biblio-generale-content">
      <?php foreach($page->children()->template('biblio')->sortBy('title', 'asc') as $biblio) :
        $articles = page('sommaire')->children()->filter(function($child) use($biblio){
        return $child->bibliography()->toPages()->has($biblio);}) ?>

      <div class='element-item <?php foreach($articles as $article): ?><?= $article->author()->slug() ?> <?php endforeach ?>'>
  
        <div class="left-column-biblio">
          <span class="auteurRef"><?= $biblio->auteurRef() ?></span><br>
          <span class="datePublication">(<?= $biblio->datePublication() ?>)</span>
        </div>
        
        <div class="right-column-biblio">
          <span class="titreOuvrage"> <em><?= $biblio->titreOuvrage() ?></em></span><br>
          <span class="referenceContent"><?= $biblio->referenceContent()->kt() ?></span>
          <article class="article-correspondant">
            <?php if($articles->count() > 1) :?>
              <?php foreach($articles as $article): ?>
                <span>
                  <a href="<?= $article->url() ?>"><?= $article->title() ?></a>
                </span>
              <?php endforeach ?>
            <?php elseif($articles->count() == 1) :?>
              <span>
                <a href="<?= $articles->first()->url() ?>"><?= $articles->first()->title() ?></a>
              </span>
            <?php else: ?>
              <span>Pas d’article</span>
            <?php endif ?>
          </article>
        </div>
      </div>
      <?php endforeach ?>
    </div>
              
<?php snippet('footer') ?>
