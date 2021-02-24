// -------------------------------------------------------- Scrollfonction --------------------------------------------------------

$(function(){
	const $notes = $('.note-icon'),
		$titres = $('.titre-article'),
		$autrice = $('.titre-auteur'),
		$mentions = $('.mentions-article')
		$main = $('main'),
		$fond = $('#fond-ecran'),
		$scrollUp = "scroll-up",
		$scrollDown = "scroll-down",
		$menu_icon = $('#menu-icon'),
		$navigation = $('#navigation'),
		$accueil = $('#accueil'),
		$sommaire = $('#sommaire'),
		$sommaireBas = $('.sommaire-bas'),
		$images_link = $('.image-texte'),
		$media_cont = $('.media-contener'),
		$close_icon = $('#close-icon'),
		$media_close_icon = $(".media-close-icon"),
		$media_size_icon = $(".media-size-icon");


	let $lastScroll = 0;

	// Inutile pour Kirby 
	
	// const contentTitre = $titres.text();
	// const contentAuteur = $autrice.text();
	// $mentions.append(`${contentTitre}<br><br>${contentAuteur}`);

	$(window).scroll(function() {
		const wheight = $(window).scrollTop();
		const wInnerHeight = $(window).height();
		const $wTitle = $titres.offset();
		const $wBottom = $main.height();

		if(wheight >= $wTitle.top + 100) {
            $fond.addClass('read-on');
        } else {
            $fond.removeClass('read-on');
        }

        if(wheight >= $wBottom - wInnerHeight) {
        	$fond.toggleClass('read-on');
        	// $main.addClass('dark-fond');
        	// $sommaireBas.addClass('sommaire-bas-display');
        } else {
        	// $main.removeClass('dark-fond');
        	// $sommaireBas.removeClass('sommaire-bas-display');
        }

		let currentScroll = $(window).scrollTop();
		if (currentScroll == 0) {
		$('body').removeClass('scroll-up');
		return;
		}

		if (currentScroll > $lastScroll && !$('body').hasClass('scroll-down')) {
		// down
		$('body').removeClass('scroll-up');
		$('body').addClass('scroll-down');
		} else if (currentScroll < $lastScroll && $('body').hasClass('scroll-down')) {
		// up
		$('body').removeClass('scroll-down');
		$('body').addClass('scroll-up');
		}
		$lastScroll = currentScroll;
	});

	function InitPlyr() {
		console.log("hello");
        //PLAYER JS 
	    const playersnew = Plyr.setup('.js-player', {
	                controls:['play-large','progress', 'volume', 'fullscreen', 'poster']
	    });

	    $('.plyr__sr-only').empty();
	    $('.plyr__control--overlaid').empty();

	    const playTitle = `
	        <span class="play">PLAY</span>
	    `;
	    $('.plyr__control--overlaid').append(playTitle);
    }

	$notes.on("click", function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).next().toggleClass('visible');
	})

	$menu_icon.on("click", function(e){
		e.preventDefault();
		$('body').toggleClass('body-display-menu');
	})

	$sommaire.on("click", function(e){
		e.preventDefault();
		$(this).next().toggle();
	})

	$images_link.on("click", function(e){
		e.preventDefault();
		// var $toDisplayImg = $(this).next();
		// $toDisplayImg.toggleClass('image-display');
		console.log($(this).data("media"));
		const media = $(this).data("media");
		const media_source = $(this).data("url");
		const media_legende = $(this).next();
		let content = "";

		$media_cont.empty();

		if(media=="img") {
			console.log("c'est une image");
			content = `
				<img src="${media_source}">
			`;
			$media_cont.append(content);

		}
		if(media=="vid-web") {
			content = `
				<div id="player" class="js-player" data-plyr-provider="youtube" data-plyr-embed-id="${media_source}"></div>
			`;
			$media_cont.append(content);
			InitPlyr();
		}

		const cloneLegende = media_legende.clone();
		const cloneCloseMedia = $media_close_icon.clone();
		const cloneSizeMedia = $media_size_icon.clone();
		$media_cont.append(cloneLegende);
		$media_cont.append(cloneCloseMedia);
		$media_cont.append(cloneSizeMedia);

		$media_cont.addClass('image-display');
		cloneLegende.addClass('display-media-content');
		cloneCloseMedia.addClass('display-media-icons');
		cloneSizeMedia.addClass('display-media-icons');

		cloneSizeMedia.on("click", function(e){
			e.preventDefault();
			$('body').addClass('body-display-media');
		})

		cloneCloseMedia.on("click", function(e){
			e.preventDefault();
			$media_cont.empty();
			$media_cont.removeClass('image-display');
		})
	})

	$close_icon.on("click", function(e){
		e.preventDefault();
		$('body').toggleClass('body-display-media');
	})
})

// -------------------------------------------------------- Scrollbar --------------------------------------------------------

const progressBarContainer = document.querySelector("#progressBarContainer");
const progressBar = document.querySelector("#progressBar");
let totalPageHeight = document.body.scrollHeight - window.innerHeight;
let debounceResize;

window.addEventListener("scroll", () => {
  let newProgressHeight = window.pageYOffset / totalPageHeight;
  progressBar.style.transform = `scale(1,${newProgressHeight})`;
}, {
  capture: true,
  passive: true
});

window.addEventListener("resize", () => {
  clearTimeout(debounceResize);
  debounceResize = setTimeout(() => {
    totalPageHeight = document.body.scrollHeight - window.innerHeight;
  }, 250);
});

progressBarContainer.addEventListener("click", (e) => {
  let newPageScroll = e.clientY / progressBarContainer.offsetHeight * totalPageHeight;
  window.scrollTo({
    top: newPageScroll,
    behavior: 'smooth'
  });
});


// -------------------------------------------------------- Afficher/Cacher la bibliographie --------------------------------------------------------

$( ".button" ).click(function() {
	$( ".bibliographie" ).slideToggle( "slow" );
	if (this.innerHTML === "Bibliographie +") {
		this.innerHTML = "Bibliographie -";
	  } else {
		this.innerHTML = "Bibliographie +";
	  }
  });

// -------------------------------------------------------- Timer --------------------------------------------------------

var timerInstance = new easytimer.Timer();

timerInstance.start();

timerInstance.addEventListener('secondsUpdated', function (e) {
    $('#basicUsage').html(timerInstance.getTimeValues().toString());
});

