function getPostsPerPage() {
    if (window.innerWidth >= 1260) {
        return 3; // Для экранов шириной от 1260px и выше
    }
    else if (window.innerWidth >= 993) {
        return 4; // Для экранов шириной от 993px до 1259px
    }
    else {
        return 2; // Для экранов шириной менее 993px
    }
}

// Получаем количество постов на странице
let postsPerPage = getPostsPerPage();

// function fetchPosts() {
//     var xhr = new XMLHttpRequest();
//     var params = 'action=load_posts&posts_per_page=' + postsPerPage;  // Параметры запроса

//     // Открытие соединения с сервером
//     xhr.open('POST', '/wp-admin/admin-ajax.php', true);

//     // Установка заголовков для отправки данных как POST
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//     // Обработка ответа от сервера
//     xhr.onload = function() {
//         if (xhr.status === 200) {
//             // Выводим ответ от сервера (например, список постов)
//             var postsContainer = document.querySelector('.popular-card'); // Используем querySelector
//             if (postsContainer) {
//                 postsContainer.innerHTML = xhr.responseText; // Обновляем содержимое
//             } else {
//                 console.error('Контейнер с классом "popular-card" не найден.');
//             }
//         } else {
//             console.error('Ошибка при запросе: ', xhr.statusText);
//         }
//     };

//     // Отправляем запрос
//     xhr.send(params);
// }

// // Вызываем функцию для загрузки записей
// fetchPosts();
