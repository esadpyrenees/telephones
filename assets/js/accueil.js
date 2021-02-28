$(function(){
	const titreAccueil = $('.titre-accueil'),
		  titreAccueilCarre = $('.carre'),
		  titreAccueilVertical = $('.vertical'),
		  accueil = $('#scene');

	let titreAccueilW = titreAccueil.outerWidth() - 5 ;
	let titreAccueilCarreW = titreAccueilCarre.outerWidth() - 5 ;
	let titreAccueilVerticalW = titreAccueilVertical.outerWidth() - 5 ;

	document.body.style.setProperty('--w', `${titreAccueilW}px`);
	document.body.style.setProperty('--wc', `${titreAccueilCarreW}px`);
	document.body.style.setProperty('--wv', `${titreAccueilVerticalW}px`);

	// $('body').addClass('accueil');

	$(window).resize(function() {
		titreAccueilW = titreAccueil.outerWidth() - 5 ;
		titreAccueilCarreW = titreAccueilCarre.outerWidth() - 5 ;
		titreAccueilVerticalW = titreAccueilVertical.outerWidth() - 5 ;
		document.body.style.setProperty('--w', `${titreAccueilW}px`);
		document.body.style.setProperty('--wc', `${titreAccueilCarreW}px`);
		document.body.style.setProperty('--wv', `${titreAccueilVerticalW}px`);
	});

	const boxElement = document.querySelector('.intro-accueil');

	if (boxElement) {
			createObserver();
	}
	
	function createObserver() {
		var observer;
	  const options = {
	    root: null,
	    rootMargin: "0px",
	    threshold: 0.15
	  };

	  observer = new IntersectionObserver(handleIntersect , options);
	  observer.observe(boxElement);
	}

	function handleIntersect(entries) {
	  entries.forEach(function(entry) {
	    if (entry.intersectionRatio>=0.15) {
	    	accueil.addClass('hide');
		} else {
			accueil.removeClass('hide');
		}
	  });
	}
})
