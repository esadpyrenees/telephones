<?php snippet('header') ?>

<div id="fond-ecran"></div>
<main class="main main-article">

  <div class="titrage">
    <h1 class="titre-article"><?= $page->title()->html() ?></h1>
    <div class="bloc-auteur"><h1 class="titre-auteur"><?= $page->author()->html() ?></h1></div>
  </div>

  <div class="mentions-article"><?= $page->title()->html() ?><br><br><?= $page->author()->html() ?></div>
  <div class="media-contener"></div>
  <div class="media-close-icon">
  	<svg version="1.1" id="close-icon-svg" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
  	<g>
  	<path d="M0.111,45.048l20.023-20.021L0.111,5.006L5.114,0l20.024,20.021L45.161,0l5.004,5.009L30.146,25.029l20.019,20.019
  	l-5.004,5.006L25.138,30.035L5.12,50.057L0.111,45.048z"></path>
  	</g>
  	</svg>
  </div>
  <div class="media-size-icon">
  	<svg version="1.1" id="size-icon-svg" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
  	<g>
  		<path d="M18.138,22.951L6.441,10.365l0.594,7.032l0.368,29.244l-0.739,0.738L0,41.086V1.48L1.48,0h39.606l6.293,6.664l-0.741,0.742
  			L17.396,7.035l-6.959-0.594l12.882,11.697L49.971,44.79l-5.184,5.181L18.138,22.951z"></path>
  	</g>
  	</svg>
  </div>

<div class="media-prev-icon">
<svg version="1.1" id="prev-icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 66 58.1" style="enable-background:new 0 0 66 58.1;" xml:space="preserve">
<g>
  <path d="M28,32.5l-17.2-0.6l5.4,4.6l20.9,20.4l0,1L28,58.1l-28-28V28L28,0l9.2,0.3l0,1L16.2,21.7l-5.3,4.5l17.4-0.8H66l0,7.3
    L28,32.5z"/>
</g>
</svg>
</div>

<div class="media-next-icon">
<svg version="1.1" id="next-icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 66 58.1" style="enable-background:new 0 0 66 58.1;" xml:space="preserve">
<g>
	<path d="M38,25.6l17.2,0.6l-5.4-4.6L28.8,1.3l0-1L38,0l28,28v2.1l-28,28l-9.2-0.3l0-1l20.9-20.4l5.3-4.5l-17.4,0.8H0l0-7.3L38,25.6
		z"/>
</g>
</svg>
</div>

  <article id="content" class="content">
    <?= $page->text()->ft() ?>
  </article>

  <a id="article-arrow" href="#bibliography">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="21.8px" height="24px" viewBox="0 0 21.8 24" style="overflow:visible;enable-background:new 0 0 21.8 24;" xml:space="preserve">
      <g>
        <path fill="#0f0f0f" class="st0" d="M0,13.7V8.3h0.7l5.9,6.1l2.7,3.2L8.7,8.7V0h4.4v8.7l-0.5,8.9l2.7-3.2l5.9-6.1h0.7v5.5L11.6,24h-1.3L0,13.7z"></path>
      </g>
    </svg>
  </a>

  </main>

<?php if ($page->bibliography()->isNotEmpty()): ?>
  <div class="bibliographie-article" id="bibliography">
    <h2>Bibliographie</h2>
    <btn id="BiblioBtn">Afficher</btn>
    
    <div class="bibliographie">
        <?php foreach($page->bibliography()->toPages()->sortBy('title', 'asc') as $biblio) :?>
          <div class="biblio-content">

              <div class="left-column-biblio">
              <?php if ($biblio->auteurRef()->isNotEmpty()): ?>
                <span class="auteurRef"><?= $biblio->auteurRef() ?></span><br>
              <?php endif ?>
              <?php if ($biblio->datePublication()->isNotEmpty()): ?>
                <span class="datePublication">(<?= $biblio->datePublication() ?>)</span>
              <?php endif ?>
              </div>

              <div class="right-column-biblio">
                <?php if ($biblio->titreOuvrage()->isNotEmpty()): ?>
                  <span class="titreOuvrage"><?= $biblio->titreOuvrage()->kti() ?></span><br>
                <?php endif ?>
                <?php if ($biblio->referenceContent()->isNotEmpty()): ?>
                  <span class="referenceContent"><?= $biblio->referenceContent()->kt() ?></span>
                <?php endif ?>
              </div>

          </div>      
        <?php endforeach ?>
    </div>
  </div>
<?php endif ?>

<?php if ($page->filmography()->isNotEmpty()): ?>
  <div class="bibliographie-article">
    <h2>Filmographie</h2>
    <btn id="FilmoBtn">Afficher</btn>
    
    <div class="filmographie">
        <?php foreach($page->filmography()->toPages()->sortBy('title', 'asc') as $filmo) :?>
          <div class="biblio-content">

              <div class="left-column-biblio">
              <?php if ($filmo->auteurRef()->isNotEmpty()): ?>
                <span class="auteurRef"><?= $filmo->auteurRef() ?></span><br>
              <?php endif ?>
              <?php if ($filmo->datePublication()->isNotEmpty()): ?>
                <span class="datePublication">(<?= $filmo->datePublication() ?>)</span>
              <?php endif ?>
              </div>

              <div class="right-column-biblio">
                <?php if ($filmo->titreOuvrage()->isNotEmpty()): ?>
                  <span class="titreOuvrage"><?= $filmo->titreOuvrage()->kti() ?></span><br>
                <?php endif ?>
                <?php if ($filmo->referenceContent()->isNotEmpty()): ?>
                  <span class="referenceContent"><?= $filmo->referenceContent()->kt() ?></span>
                <?php endif ?>
              </div>

          </div>      
        <?php endforeach ?>
    </div>
  </div>
<?php endif ?>

<?php if ($page->ent()->isNotEmpty()): ?>
  <div class="bibliographie-article">
    <h2>Entretiens & Notices</h2>
    <btn id="EntBtn">Afficher</btn>
    
    <div class="entretiens">
        <?php foreach($page->ent()->toPages()->sortBy('title', 'asc') as $entretien) :?>
          <div class="biblio-content">

              <div class="left-column-biblio">
              <?php if ($entretien->auteurRef()->isNotEmpty()): ?>
                <span class="auteurRef"><?= $entretien->auteurRef() ?></span><br>
              <?php endif ?>
              <?php if ($entretien->datePublication()->isNotEmpty()): ?>
                <span class="datePublication">(<?= $entretien->datePublication() ?>)</span>
              <?php endif ?>
              </div>

              <div class="right-column-biblio">
                <?php if ($entretien->titreOuvrage()->isNotEmpty()): ?>
                  <span class="titreOuvrage"><?= $entretien->titreOuvrage()->kti() ?></span><br>
                <?php endif ?>
                <?php if ($entretien->referenceContent()->isNotEmpty()): ?>
                  <span class="referenceContent"><?= $entretien->referenceContent()->kt() ?></span>
                <?php endif ?>
              </div>

          </div>      
        <?php endforeach ?>
    </div>
  </div>
<?php endif ?>

	<div class="auteur-bio">
    <h2>Auteur.e.s</h2>
      <aside><?= $page->bioauthor()->kt() ?></aside>
	</div>

<?php snippet('footer-sommaire') ?>
