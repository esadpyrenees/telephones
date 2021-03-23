<?php snippet('header') ?>

<div id="fond-ecran"></div>
<main class="main">

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
  	<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
  	<g>
  		<path d="M18.138,22.951L6.441,10.365l0.594,7.032l0.368,29.244l-0.739,0.738L0,41.086V1.48L1.48,0h39.606l6.293,6.664l-0.741,0.742
  			L17.396,7.035l-6.959-0.594l12.882,11.697L49.971,44.79l-5.184,5.181L18.138,22.951z"></path>
  	</g>
  	</svg>
  </div>

  <article id="content" class="content">
    <?= $page->text()->ft() ?>
  </article>


  </main>

<?php if ($page->bibliography()->isNotEmpty()): ?>
  <div class="bibliographie-article">
    <h1>Bibliographie</h1>
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
                  <span class="titreOuvrage"><em><?= $biblio->titreOuvrage() ?></em></span><br>
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
    <h1>Filmographie</h1>
    
    <div class="bibliographie">
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
                  <span class="titreOuvrage"><em><?= $filmo->titreOuvrage() ?></em></span><br>
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

<?php if ($page->entretien()->isNotEmpty()): ?>
  <div class="bibliographie-article">
    <h1>Entretiens et Notices</h1>
    
    <div class="bibliographie">
        <?php foreach($page->entretien()->toPages()->sortBy('title', 'asc') as $entretien) :?>
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
                  <span class="titreOuvrage"><em><?= $entretien->titreOuvrage() ?></em></span><br>
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
    <h1>Auteur.e.s</h1>
      <aside><?= $page->bioauthor()->kt() ?></aside>
	</div>

<?php snippet('footer-sommaire') ?>
