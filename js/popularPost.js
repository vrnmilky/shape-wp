function getPostsPerPage() {
    if (window.innerWidth >= 1260) {
        return 3;
    }
    else if (window.innerWidth >= 993) {
        return 4;
    }
    else {
        return 2;
    }
}


let postsPerPage = getPostsPerPage();


const requestData = {
    action: 'count_product',
    size: postsPerPage
}

const queryData = new URLSearchParams();
for (const key in requestData) {
    queryData.set(key, requestData[key])
}

fetch(myajax.url, {
    method: "POST",
    body: queryData,
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
    },
})
    .then(response => response.text())
    .then(response => {
        console.log(response);
    });











function manageNavBtn() {
    popularNav = document.querySelector('.popular-description-nav');
    left = false;
    right = false;

    addBtn = document.createElement('button');
    addBtn.disabled = true;
    addBtn.classList.add('popular-description-nav__btn');

    popularNav.querySelectorAll('*').forEach(e => {
        if (e.classList.contains('prev')) {
            left = true;
            return
        }
        if (e.classList.contains('next')) {
            right = true;
            return
        }
    })


    if (left && !right) {
        popularNav.appendChild(addBtn);
        addBtn.classList.add('popular-description-nav__btn--right-not_active');

    }
    else if (!left && right) {
        nextElement = popularNav.querySelector('.next')
        popularNav.insertBefore(addBtn, nextElement);
        addBtn.classList.add('popular-description-nav__btn--left-not_active');

    }
    else if (!left && !right) {
        console.log('Ошибка стрелки не найдены!')
    }
    else {
        // console.log('Обе стрелки')
    }
}


manageNavBtn();