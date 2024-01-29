document.addEventListener('DOMContentLoaded', function() {
    var burgerMenu = document.querySelector('.home-burger-menu');
    var mobileMenu = document.querySelector('.home-mobile-menu');
    var mobileMenuClose = document.querySelector('.home-close-mobile-menu');


    burgerMenu.addEventListener('click', function() {
        // Toggle the mobile menu visibility
        mobileMenu.classList.toggle('active');
    });

    mobileMenuClose.addEventListener('click', function() {
        // Toggle the mobile menu visibility
        mobileMenu.classList.toggle('active');
    });



});



