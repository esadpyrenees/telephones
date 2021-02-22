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

  <?= $page->text()->ft() ?>  

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
		<aside><?= $page->bioauthor()->kt() ?></aside>
	</div>

<?php snippet('footer-sommaire') ?>
