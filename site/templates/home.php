<?php snippet('header') ?>

<section class="scene-ouverture">
  <video id="scene" autoplay loop muted>
    <source src="assets/statics/vid4-personnal shopper google Hilma.mp4"
            type="video/mp4">
  </video>
  <div id="titre-accueil-container">
    <img class="titre-accueil site" src="assets/statics/titre-accueil-nv-site.svg">
    <img class="titre-accueil carre" src="assets/statics/titre-accueil-nv-carre.svg">
    <img class="titre-accueil vertical" src="assets/statics/titre-accueil-nv-vertical.svg">
    <div class="bordure gauche"></div>
    <div class="bordure droite"></div>
  </div>
</section>

<div class="ScrollBtn">
  <btn id="ScrollBtnHome">🠗</btn>
</div>

<div id="intro-accueil" class="intro-accueil">
  <?= $page->text()->kirbytext() ?>
</div>

<?php snippet('footer-sommaire') ?>
