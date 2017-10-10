// Set global vars
var vaOverlayElement;

window.addEventListener('load', vaOverlay);

function vaOverlay() {
	vaOverlayElement = document.getElementById( 'va-overlay' );
    var buttonOpen = document.getElementById( 'va-overlay-open' );
    var buttonClose = document.getElementById( 'va-overlay-close' );
    buttonOpen.addEventListener('click', function() {
    	toggleOverlayVisibility();
    });
	buttonClose.addEventListener('click', function() {
    	toggleOverlayVisibility();
    });

}

// Show and hide overlay (this function is marked at admin options page and can be called globally)
function toggleOverlayVisibility() {
	vaOverlayElement.classList.toggle( 'visible' );
	document.body.classList.toggle( 'no-scroll' );
}
