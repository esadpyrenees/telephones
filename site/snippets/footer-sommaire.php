          <footer id="foot-scene" class="sommaire-bas">
            <h2><?= $pages->first()->title() ?></h2>

            <div class="sommaire-credits">
                <h3>I – Le téléphone connecté : acteur du cinéma contemporain</h3>

                <?php foreach($pages->first()->children()->filterBy('partie', 'partieune') as $article) :?>
                  <p <?php e($article->isActive(), ' class="active"') ?>><?= html($article->author()) ?></p>
                  <a <?php e($article->isActive(), ' class="active"') ?> href="<?= $article->url() ?>"><em><?= html($article->title()) ?></em></a>
                <?php endforeach ?>

                <h3>II – La caméra-stylo-connectée</h3>

              <?php foreach($pages->first()->children()->filterBy('partie', 'partiedeux') as $article) :?>
                <p <?php e($article->isActive(), ' class="active"') ?>><?= html($article->author()) ?></p>
                  <a <?php e($article->isActive(), ' class="active"') ?> href="<?= $article->url() ?>"><em><?= html($article->title()) ?></em></a>
              <?php endforeach ?>
            </div>
          </footer>

        <?php // Liste de fichier js ?>
        <?= js("assets/js/plyr.js") ?>
        <?= js("assets/js/easytimer.min.js") ?>
        <?= js("assets/js/jquery.js") ?>
        <?= js("assets/js/index.js") ?>
        <?= js("assets/js/accueil.js") ?>
        <?= js("assets/js/delambre.js") ?>
	</body>
</html>
