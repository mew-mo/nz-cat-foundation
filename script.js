console.log('hi');

var menuItems = document.querySelector('#menu-main-menu').children;

for (var i = 0; i < menuItems.length; i++) {
  menuItems[i].classList.add('nav-item');
  console.log(menuItems[i].children);
  menuItems[i].children[0].classList.add('nav-link');
}
