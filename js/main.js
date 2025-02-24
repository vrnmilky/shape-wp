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




    const menuBtn = document.querySelector('.nav__actions--menu');
    const openMenu = document.querySelector('.menu__container');
    const body = document.querySelector('body');
    menuBtn.addEventListener('click', () => {
        console.log('Нажал');
        body.classList.toggle('no-scroll');
        openMenu.classList.toggle('open');
        menuBtn.classList.toggle('open');
    })

});



