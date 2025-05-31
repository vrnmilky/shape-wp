const root = document.documentElement;
const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
root.style.setProperty('--scroll-padding', `${scrollbarWidth}px`);

const popularBue = document.querySelectorAll('.popular-card__btn');
const body = document.querySelector('body');
const modalOver = document.querySelector('.modal-overlay');
const modal = document.querySelector('.modal');
const close = document.querySelectorAll('.close-modal');

popularBue.forEach (e => {
    e.addEventListener('click', () => {
        modalOver.style.display = 'block';
        body.classList.toggle('no-scroll');

    })
})

modalOver.addEventListener('click', (e) => {
    if (e.target === modalOver) {
        modalOver.style.display = 'none';
        body.classList.toggle('no-scroll');
    }
});

close.forEach(e => {
    e.addEventListener('click', ()=> {
        modalOver.style.display = 'none';
        body.classList.toggle('no-scroll');
    })
})



