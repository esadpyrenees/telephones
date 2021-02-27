          <footer id="foot-scene" class="sommaire-bas">
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
        <?= js("assets/js/easytimer.min.js") ?>
        <?= js("assets/js/jquery.js") ?>
        <?= js("assets/js/index.js") ?>
        <?= js("assets/js/accueil.js") ?>

	</body>
</html>
