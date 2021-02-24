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

<?php snippet('footer') ?>
