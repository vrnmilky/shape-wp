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
});



