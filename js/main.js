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

    getSize();
    
});


//расчет высоты контейнера продукта
function getSize() {
    const header = document.querySelector('.header');
    const footer = document.querySelector('.footer');
    let headerHeight = header.offsetHeight;
    let footerHeight = footer.offsetHeight;
    root.style.setProperty('--header-Height', `${headerHeight}px`);
    root.style.setProperty('--footer-Height', `${footerHeight}px`);
}


function debounce(func, delay) {
    let timeout;
    return function () {
        const context = this;
        const args = arguments;
        clearTimeout(timeout); // Очистить предыдущий таймаут
        timeout = setTimeout(function () {
            func.apply(context, args); // Вызвать функцию после задержки
        }, delay);
    };
}

const debouncedResize = debounce(getSize, 100);
window.addEventListener('resize', debouncedResize);