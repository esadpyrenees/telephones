<?php snippet('header') ?>

<h1><?= $page->title()->html() ?></h1>

<!-- articles -->
<?php foreach($articles as $article): ?>
<article>
  <h1><a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a></h1>
  <?= $article->text()->excerpt(300) ?>
</article>
<?php endforeach ?>

<!-- sidebar with tagcloud -->
<aside>
  <h1>Tags</h1>
  <ul class="tags">
    <?php foreach($tags as $tag): ?>
    <li>
      <a href="<?= url($page->url(), ['params' => ['tag' => $tag]]) ?>">
        <?= html($tag) ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</aside>

<!-- pagination -->
<nav class="pagination">
  <?php if($pagination->hasPrevPage()): ?>
  <a href="<?= $pagination->prevPageUrl() ?>">previous posts</a>
  <?php endif ?>

  <?php if($pagination->hasNextPage()): ?>
  <a href="<?= $pagination->nextPageUrl() ?>">next posts</a>
  <?php endif ?>
</nav>

<?php snippet('footer') ?>
