document.addEventListener('DOMContentLoaded', () => {
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
})