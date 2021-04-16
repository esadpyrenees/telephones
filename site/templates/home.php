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
  <a id="ScrollBtnHome" href="#intro-accueil">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="21.8px"
      height="24px" viewBox="0 0 21.8 24" style="overflow:visible;enable-background:new 0 0 21.8 24;" xml:space="preserve">
      <g>
        <path fill="#e1e1e1" class="st0" d="M0,13.7V8.3h0.7l5.9,6.1l2.7,3.2L8.7,8.7V0h4.4v8.7l-0.5,8.9l2.7-3.2l5.9-6.1h0.7v5.5L11.6,24h-1.3L0,13.7z"/>
      </g>
    </svg>
  </a>
</div>

<div id="intro-accueil" class="intro-accueil">
  <?= $page->text()->kirbytext() ?>
</div>

<?php snippet('footer-sommaire') ?>
