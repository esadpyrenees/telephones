        </main>

            <div class="bibliographie-article">
            <h1 class="button">Bibliographie</h1>
            <div class="bibliographie">
                <?php foreach($page->bibliography()->toPages() as $biblio) :?>
                    <?= $biblio->text()->kt() ?>
                <?php endforeach ?>
            </div>
            </div>

            <div class="auteur-bio">
                <aside><?= $page->bioauthor() ?></aside>
            </div>

          <footer class="sommaire-bas">
            <h1><?= $pages->first()->title() ?></h1>

            <div class="sommaire-credits">
                <h2>I – Le téléphone connecté : acteur du cinéma contemporain</h2>

                <?php foreach($pages->first()->children()->filterBy('partie', 'partieune') as $article) :?>
                  <a <?php e($article->isActive(), ' class="active"') ?> href="<?= $article->url() ?>"><?= html($article->title()) ?></a>
                  <p <?php e($article->isActive(), ' class="active"') ?>><em><?= html($article->author()) ?></em></p>
                <?php endforeach ?>

                <h2>II – La caméra-stylo-connectée</h2>

              <?php foreach($pages->first()->children()->filterBy('partie', 'partiedeux') as $article) :?>
                  <a <?php e($article->isActive(), ' class="active"') ?> href="<?= $article->url() ?>"><?= html($article->title()) ?></a>
                  <p <?php e($article->isActive(), ' class="active"') ?>><em><?= html($article->author()) ?></em></p>
              <?php endforeach ?>
            </div>
          </footer>

        <?php // Liste de fichier js ?>
        <?= js("assets/js/plyr.js") ?>
        <?= js("assets/js/jquery.js") ?>
        <?= js("assets/js/index.js") ?>

	</body>
</html>

