// -------------------------------------------------------- Scrollfonction --------------------------------------------------------

$(function () {
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
		$medias_link = $('.medias-texte'),
		$media_cont = $('.media-contener'),
		$close_icon = $('#close-icon'),
		$media_close_icon = $(".media-close-icon"),
		$media_size_icon = $(".media-size-icon"),
		$media_prev_icon = $(".media-prev-icon"),
		$media_next_icon = $(".media-next-icon");

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
			threshold: [0.01, 0.95]
		};

		observer = new window.IntersectionObserver(handleIntersect, options);
		observer.observe(boxElement);
	}

	function handleIntersect(entries) {
		entries.forEach(function (entry) {
			if (entry.intersectionRatio >= 0.01) {
				$fond.addClass('read-on');
			} else if (!entry.isIntersecting) {
				$fond.removeClass('read-on');
			}
		});
	}

	function InitPlyr() {
		//PLAYER JS
		const playersnew = Plyr.setup('.js-player', {
			controls: ['play-large', 'progress', 'volume', 'fullscreen', 'poster']
		});
	}

	$(window).scroll(function () {
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

	$notes.on("click", function (e) {
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).next().toggleClass('visible');
		if (typeof (resizeScrollBar) == "function") {
			resizeScrollBar();
		}
	})

	$menu_icon.on("click", function (e) {
		e.preventDefault();
		$('body').toggleClass('body-display-menu');
	})

	$sommaire.on("click", function (e) {
		e.preventDefault();
		$(this).next().toggle();
	})

	// multiple medias
	var currentSlide = 0, medias_array = [], medias_length=0;
	$medias_link.on("click", function (e) {
		e.preventDefault();
		medias_array = window[$(this).data('script')];
		// const myGallery = GLightbox({
		// 	elements: window[script],
		// 	autoplayVideos: true,
		// });
		// myGallery.open();
		console.log(medias_array)
		currentSlide = 0;
		medias_length=medias_array.length;
		var first = medias_array[currentSlide];
		var caption = $('<span class="image-legende">' + first.description + '</span>')
		buildMedia(first.type, first.href, caption, true, currentSlide, medias_array);
	});

	$images_link.on("click", function (e) {
		e.preventDefault();

		const media = $(this).data("media");
		const media_source = $(this).data("url");
		const media_legende = $(this).next();

		buildMedia(media, media_source, media_legende, false, 0, []);
	})
	function buildMediaNav($media_cont){
		const clonePrevMedia = $media_prev_icon.clone();
		const cloneNextMedia = $media_next_icon.clone();
		$media_cont.append(clonePrevMedia);
		$media_cont.append(cloneNextMedia);

		clonePrevMedia.addClass('display-media-icons');
		cloneNextMedia.addClass('display-media-icons');
		clonePrevMedia.on("click", function (e) {
			e.preventDefault();
			console.log(prevSlide());
		})
		cloneNextMedia.on("click", function (e) {
			e.preventDefault();
			console.log(nextSlide());
		})
	}
	function nextSlide() {
		return (currentSlide + 1) % medias_length;
	}
	function prevSlide() {
		return ((currentSlide - 1) % medias_length + medias_length) % medias_length;
	}
	
	function buildMedia(media, media_source, media_legende, gallery, index, medias_array){
		console.log('build Media', media, media_source, media_legende, index, medias_array);
		
		let content = "";

		$media_cont.empty();

		if (media == "img" || media == "image") {
			content = `<img src="${media_source}">`;
			$media_cont.append(content);
		}

		if (media == "vid-web") {
			content = `<div id="player" class="js-player" data-plyr-provider="youtube" data-plyr-embed-id="${media_source}"></div>`;
			$media_cont.append(content);
			InitPlyr();
		}

		if (media == "vid-file") {
			content = `<video id="player" class="js-player" playsinline controls data-poster="">
					<source src="${media_source}" type="video/mp4" />
				</video>`;
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

		cloneSizeMedia.on("click", function (e) {
			e.preventDefault();
			$('body').addClass('body-display-media');
		})

		cloneCloseMedia.on("click", function (e) {
			e.preventDefault();
			$media_cont.empty();
			$media_cont.removeClass('image-display');
		})

		if(gallery){
			buildMediaNav($media_cont);
		}
	}

	$close_icon.on("click", function (e) {
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

window.addEventListener("load", function () {

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

function resizeScrollBar() {
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

$("#BiblioBtn").click(function () {
	if (typeof (resizeScrollBar) == "function") {
		resizeScrollBar();
	}
	$(".bibliographie").slideToggle("slow");
	if (this.innerHTML === "Afficher") {
		this.innerHTML = "Cacher";
	} else {
		this.innerHTML = "Afficher";
	}
});

$("#FilmoBtn").click(function () {
	if (typeof (resizeScrollBar) == "function") {
		resizeScrollBar();
	}
	$(".filmographie").slideToggle("slow");
	if (this.innerHTML === "Afficher") {
		this.innerHTML = "Cacher";
	} else {
		this.innerHTML = "Afficher";
	}
});

$("#EntBtn").click(function () {
	if (typeof (resizeScrollBar) == "function") {
		resizeScrollBar();
	}
	$(".entretiens").slideToggle("slow");
	if (this.innerHTML === "Afficher") {
		this.innerHTML = "Cacher";
	} else {
		this.innerHTML = "Afficher";
	}
});

// -------------------------------------------------------- Timer --------------------------------------------------------

// si pas de dernière visite, 
my_start = 0;

window.addEventListener("load", function () {

	var s = localStorage.getItem('start');
	if (s) {
		// convertir 01:06:42 en “heures”
		var split = s.split(':');
		var hours_in_seconds = parseInt(split[0]) * 60 * 60;
		var minutes_in_seconds = parseInt(split[1]) * 60;
		var seconds = parseInt(split[2]) + minutes_in_seconds + hours_in_seconds;
		my_start = seconds;
	}
	var timerInstance = new easytimer.Timer();

	timerInstance.start({ precision: 'seconds', startValues: { seconds: my_start } });

	timerInstance.addEventListener('secondsUpdated', function (e) {
		$('#basicUsage').html(timerInstance.getTimeValues().toString());
	});

	// quand on quitte la page
	window.onbeforeunload = function () {
		// stockage de la valeur du timerInstance : cookie / localStorage
		localStorage.setItem('start', timerInstance.getTimeValues().toString());
	};

})


// -------------------------------------------------------- Filtre bibliographie --------------------------------------------------------

// init Isotope
var $biblio = $('.biblio-generale-content');

if ($biblio.length) {

	window.addEventListener("load", function () {
		// isotope init
		var $grid = $biblio.isotope({
			itemSelector: '.element-item'
		});

		// bind filter on select change
		$('.filters-select').on('change', function () {
			// get filter value from option value
			var filterValue = this.value;
			// use filterFn if matches value
			$grid.isotope({ filter: filterValue });
		});
	})
}

// -------------------------------------------------------- Scroll Bouton Accueil --------------------------------------------------------

const IntroAccueomHeight = document.getElementById('intro-accueil');

$(document).ready(function () {
	// $('#ScrollBtnHome').on('click', function() {
	// 	$("html, body").animate({ scrollTop: $('#intro-accueil').position().top }, 1200);
	// });
});
