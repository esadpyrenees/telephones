            </main>
          <footer class="sommaire-bas">
            <h2><?= $pages->first()->title() ?></h2>

            <div class="sommaire-credits">
              <?php foreach($pages->first()->children() as $article) :?>
                <li class="titre-article-footer">
                  <a <?php e($article->isActive(), ' class="active"') ?> href="<?= $article->url() ?>"><?= html($article->title()) ?></a>
                </li>
                <li class="auteur-article-footer">
                  <span <?php e($article->isActive(), ' class="active"') ?>><?= html($article->author()) ?></span>
                </li>
              <?php endforeach ?>
            </div>
          </footer>
        </div>

        <?php // Liste de fichier js ?>
        <?= js("assets/plyr/plyr.js") ?>
        <?= js("assets/js/jquery.js") ?>
        <?= js("assets/js/site.js") ?>

	</body>
</html>

