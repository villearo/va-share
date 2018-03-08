document.getElementById('va-overlay-open').addEventListener('click', toggleOverlayVisibility, false);
document.getElementById('va-overlay-close').addEventListener('click', toggleOverlayVisibility, false);
function toggleOverlayVisibility() {
	document.getElementById('va-overlay').classList.toggle('visible');
	document.body.classList.toggle('no-scroll');
}
