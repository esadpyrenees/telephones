          <footer id="foot-scene" class="sommaire-bas">
            <h1><?= $pages->first()->title() ?></h1>

            <div class="sommaire-credits">
                <h2>I – Le téléphone connecté : acteur du cinéma contemporain</h2>

                <?php foreach($pages->first()->children()->filterBy('partie', 'partieune') as $article) :?>
                  <p <?php e($article->isActive(), ' class="active"') ?>><?= html($article->author()) ?></p>
                  <a <?php e($article->isActive(), ' class="active"') ?> href="<?= $article->url() ?>"><em><?= html($article->title()) ?></em></a>
                <?php endforeach ?>

                <h2>II – La caméra-stylo-connectée</h2>

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
        <script>console.log("JB was here!")</script>
	</body>
</html>
