const cityElem = document.querySelectorAll(".contacts_city_item");

cityElem.forEach((city) => {
  const title = city.querySelector(".contacts_city_title");

  if (title) {
    title.addEventListener("click", () => {
      cityElem.forEach((e) => {
        if (e !== city) {
          e.classList.remove("contacts_active");
          const title = e.querySelector(".contacts_city_title");
          if (title) {
            title.classList.remove("active");
          }
        }
      });

      city.classList.toggle("contacts_active");
      title.classList.toggle("active");
    });
  }
});
