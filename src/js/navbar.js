
const slideBar = document.getElementById('slideBar_mobile');
const menuBar = document.getElementById('menuBar');
const closeBar = document.getElementById('close_slide_bar')

menuBar.addEventListener('click', () => {
    slideBar.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    window.scrollTo(0, 0);
})


closeBar.addEventListener('click', () => {
    slideBar.style.display = 'none';
    document.body.style.overflowX = 'scroll';
})