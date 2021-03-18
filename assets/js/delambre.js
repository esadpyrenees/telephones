$(function(){
	const contentDelambre = $('.raymond-delambre');

	if (contentDelambre) {
		createObserver();
	}
	
	function createObserver() {
	  const container = document.querySelector('#content')
	  const boxElement = container.querySelectorAll('p');
	  const boxElementTitre = container.querySelectorAll('h2');

	  var observer;
	  const options = {
	    root: null,
	    rootMargin: "0px",
	    threshold: 0.5
	  };

	  boxElement.forEach(function(element) { 
	  	observer = new IntersectionObserver(handleIntersect , options);
	  	observer.observe(element);
	  });
	  boxElementTitre.forEach(function(elementTitre) { 
	  	observer = new IntersectionObserver(handleIntersect , options);
	  	observer.observe(elementTitre);
	  });
	}

	function handleIntersect(entries) {
	  entries.forEach(function(entry) {
	    if (entry.isIntersecting) {
	    	entry.target.style.color = "pink";
		} else {
			entry.target.style.color = "inherit";
		}
	  });
	}
})
