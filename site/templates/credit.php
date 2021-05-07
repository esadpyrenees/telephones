<?php snippet('header') ?>

<div class="credits">
    <h1><?= $page->title()->html() ?></h1>

      <?= $page->text()->kt() ?>

    <div id="logos">
      <?php foreach($page->logo()->toFiles() as $logos): ?>
        <?= $logos ?>
      <?php endforeach ?>
		</div>

    
    
  </div>
  <div id="mentions-access">
    <a href="<?= $site->find('mentions-legales')->url() ?>"><?= $site->find('mentions-legales')->title() ?></a>
  </div>

<?php snippet('footer') ?>
