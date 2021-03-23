// -------------------------------------------------------- Scrollfonction --------------------------------------------------------

$(function(){
	const $notes = $('.note-icon'),
		$titres = $('.titre-article'),
		$autrice = $('.titre-auteur'),
		$mentions = $('.mentions-article'),
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

	const boxElement = document.querySelector('#content');

	if (boxElement) {
		createObserver();
	}

	function createObserver() {
		var observer;
		const options = {
			root: null,
			rootMargin: "0px",
			threshold: [0.01,0.95]
		};

		observer = new window.IntersectionObserver(handleIntersect , options);
		observer.observe(boxElement);
	}

	function handleIntersect(entries) {
		entries.forEach(function(entry) {
			if (entry.intersectionRatio>=0.01) {
				$fond.addClass('read-on');
		} else if (!entry.isIntersecting){
				$fond.removeClass('read-on');
		}
		});
	}

	function InitPlyr() {
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

    $(window).scroll(function() {
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

	$notes.on("click", function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).next().toggleClass('visible');
		if(typeof(resizeScrollBar) == "function" ){
			resizeScrollBar();
		}
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

		console.log($(this).data("media"));
		const media = $(this).data("media");
		const media_source = $(this).data("url");
		const media_legende = $(this).next();
		let content = "";

		$media_cont.empty();

		if(media=="img") {
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

		if(media=="vid-file") {
			content = `
				<video id="player" class="js-player" playsinline controls data-poster="">
		        	<source src="${media_source}" type="video/mp4" />
		      	</video>
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
let totalPageHeight = 0;
let progressBarContainer_size = 0;
let debounceResize = null;

window.addEventListener("load", function(){
	
	resizeScrollBar();

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
			resizeScrollBar();
		}, 250);
	});

});

function resizeScrollBar(){
	progressBarContainer_size = progressBarContainer.getBoundingClientRect();
	totalPageHeight = document.body.scrollHeight - window.innerHeight;
}

progressBarContainer.addEventListener("click", (e) => {
  let newPageScroll = (e.clientY - progressBarContainer_size.top) / progressBarContainer.offsetHeight * totalPageHeight;
  window.scrollTo({
    top: newPageScroll,
    behavior: 'smooth'
  });
});


// -------------------------------------------------------- Afficher/Cacher la bibliographie/Filmographie/Entretiens --------------------------------------------------------

$( "#BiblioBtn" ).click(function() {
	if(typeof(resizeScrollBar) == "function" ){
		resizeScrollBar();
	}
	$( ".bibliographie" ).slideToggle( "slow" );
	if (this.innerHTML === "Afficher") {
		this.innerHTML = "Cacher";
	  } else {
		this.innerHTML = "Afficher";
	  }
  });

$( "#FilmoBtn" ).click(function() {
	if(typeof(resizeScrollBar) == "function" ){
		resizeScrollBar();
	}
	$( ".filmographie" ).slideToggle( "slow" );
	if (this.innerHTML === "Afficher") {
		this.innerHTML = "Cacher";
		} else {
		this.innerHTML = "Afficher";
		}
});

$( "#EntBtn" ).click(function() {
	if(typeof(resizeScrollBar) == "function" ){
		resizeScrollBar();
	}
	$( ".entretiens" ).slideToggle( "slow" );
	if (this.innerHTML === "Afficher") {
		this.innerHTML = "Cacher";
		} else {
		this.innerHTML = "Afficher";
		}
});

// -------------------------------------------------------- Timer --------------------------------------------------------

var timerInstance = new easytimer.Timer();

timerInstance.start();

timerInstance.addEventListener('secondsUpdated', function (e) {
    $('#basicUsage').html(timerInstance.getTimeValues().toString());
});


// -------------------------------------------------------- Filtre bibliographie --------------------------------------------------------

// init Isotope
var $biblio = $('.biblio-generale-content');

if($biblio.length){
	// isotope init
	var $grid = $biblio.isotope({
		itemSelector: '.element-item'
	});
		
  // bind filter on select change
  $('.filters-select').on( 'change', function() {
		// get filter value from option value
		var filterValue = this.value;
		// use filterFn if matches value
		$grid.isotope({ filter: filterValue });
  });
}