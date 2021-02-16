<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title><?= $site->title() ?> | <?= $page->title() ?></title>
        <meta property="og:title" content="<?= $site->title() ?> | <?= $page->title() ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?= $site->description() ?> | <?= $page->description() ?>" />
        <meta property="og:image" content="<?= url('assets/img/') ?>" />

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="">
        <meta name="twitter:creator" content="">
        <meta name="twitter:title" content="<?= $site->title() ?> | <?= $page->title() ?>">
        <meta name="twitter:description" content="<?= $site->description() ?> | <?= $page->description() ?>">
        <meta name="twitter:image" content="<?= url('assets/img/') ?>">
        
        <?php // lien vers plusieurs fichiers CSS ?>
        <?= css(["assets/css/style.css"], ["assets/plyr/plyr.css"]) ?>
            
    </head>

    <body cz-shortcut-listen="true">
        <div class="page">
            <div id="progressBarContainer">
                <div id="progressBar"></div>
            </div>
            <div id="navigation">
                <ul class="menu">
                        <li id="menu-sommaire">
                            <a id="sommaire" href=""><?= $pages->first()->title() ?></a>
                            <ul id="navigation-sommaire">
                                <?php foreach($pages->first()->children() as $article) :?>
                                    <li>
                                        <a href="<?= $article->url() ?>"><?= html($article->title()) ?><br><span class="autrices"><?= html($article->author()) ?></span></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>

                        <?php foreach($pages->listed()->not($pages->first()) as $page) :?>
                            <li class="">
                                <a href="<?= $page->url() ?>"><?= html($page->title()) ?></a>
                            </li>
                        <?php endforeach ?>
                </ul>
            </div>

            <div id="menu-icon">
                <svg version="1.1" id="menu-icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                <g>
                    <path fill="#E1E1E1" d="M0,0h49.992v50H0V0z M5.554,11.114h38.887V5.556H5.554V11.114z M44.441,22.221v-5.552H5.554v5.552H44.441z
                        M44.441,33.338v-5.559H5.554v5.559H44.441z M44.441,44.441v-5.554H5.554v5.554H44.441z"></path>
                </g>
                </svg>
            </div>

            <a id="accueil" href="<?= $site->url() ?>"></a>
            <p id="timer">00:05:26</p>
            
            <main class="main">
		    <div id="fond-ecran"></div>