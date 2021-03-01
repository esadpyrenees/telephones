<?php snippet('header') ?>


  <div class="bibliographie-generale">
    <h1><?= $page->title()->html() ?></h1>

    <section class="filtre">
      <select class="filters-select">
        <option value="*">Tout</option>
        <option value=".anais-guilet-corinne-melin">Introduction</option>
        <option value=".anais-guilet">Quelques spécificités du smartphone à l'écran: une introduction</option>
        <option value=".martine-beugnet">Cinéma et petits écrans : le cadre et la (dé)mesure</option>
        <option value=".ghislaine-chabert">Usages du smartphone et grand écran, l’expérience spectatorielle du ‘second screen’</option>
        <option value=".corinne-melin">Le filmeur au téléphone-caméra dans le cinéma contemporain</option>
        <option value=".fabien-zocco">Divers exemples d’usage du smartphone dans le champ de l’art contemporain et du cinéma</option>
        <option value=".laurence-allard">D’une boucle l’autre, TikTok et l’algo-ritournelle : performer entre rage et ennui en temps de pandémie</option>
        <option value=".raymond-delambre">Vous avez demandé (la police) Ethan Hunt, ne quittez pas : “Fallout”</option>
      </select>
    </section>

    <div>
      <h2 class="entree-reference">Références</h2>
      <h2 class="article-correspondant">Article(s)</h2>
    </div>

    <div class="biblio-content">
      <?php foreach($page->children()->template('biblio') as $biblio) :
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
