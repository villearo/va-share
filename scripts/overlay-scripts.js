var overlayOpenButton = document.getElementById('va-overlay-open');
var overlayCloseButton = document.getElementById('va-overlay-close');

if(overlayOpenButton){
	overlayOpenButton.addEventListener('click', toggleOverlayVisibility, false);
}

overlayCloseButton.addEventListener('click', toggleOverlayVisibility, false);

function toggleOverlayVisibility(){
	document.getElementById('va-overlay').classList.toggle('visible');
	document.body.classList.toggle('no-scroll');
}
