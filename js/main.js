document.addEventListener('DOMContentLoaded', () => {
    const shopBy = document.querySelectorAll('.furniture__subtitle a')
    shopBy.forEach(e => {
        e.addEventListener('click', () => {
            shopBy.forEach(e => e.classList.remove('active'));
            e.classList.add('active')
        })
    });
    const furnitureImg = document.getElementById('furnitureImg');
    const furnitureCard = document.querySelectorAll('.furniture__items li');


    furnitureCard.forEach(card => {
        card.addEventListener('click', () => {
            const cardText = card.querySelector('.furniture__card-text').textContent;
            furnitureCard.forEach(item => item.classList.remove('active'));
            furnitureImg.src = images[cardText];
            card.classList.add('active')
        })
    });


    //Лайки
    const like = document.querySelectorAll('.popular-card-like');
    const likesData = JSON.parse(localStorage.getItem('liked')) || {};

    function loadLikes() {
        Object.keys(likesData).forEach(id => {
            if (likesData[id]) {
                like.forEach(z => {
                    if (z.id === id) {
                        z.classList.add('active');
                    }
                });
            }
        });
    }


    loadLikes()
    like.forEach(e => {
        e.addEventListener('click', () => {
            e.classList.toggle('active')
            if (e.classList.contains('active')) {
                likesData[e.id] = true;
            }
            else {
                likesData[e.id] = false;
            }
            localStorage.setItem('liked', JSON.stringify(likesData))
        })
    });

});


// modal

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

