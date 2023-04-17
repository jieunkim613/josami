/*=============== SHOW HIDDEN MENU ===============*/
const showMenu = (toggleId, navbarId) => {
  const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId);

  if (toggle && navbar) {
    toggle.addEventListener("click", () => {
      /* Show menu */
      navbar.classList.toggle("show-menu");
      /* Rotate toggle icon */
      toggle.classList.toggle("rotate-icon");
    });
  }
};
showMenu("nav-toggle", "nav");

/*=============== SHOW SCROLL UP ===============*/
const scrollUp = () => {
  const scrollUp = document.getElementById("scroll-up");
  // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scrollup class
  this.scrollY >= 350
    ? scrollUp.classList.add("show-scroll")
    : scrollUp.classList.remove("show-scroll");
};
window.addEventListener("scroll", scrollUp);
