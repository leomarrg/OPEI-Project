function showOptions(className, element) {
    var options = document.querySelectorAll('.menu-container');
    options.forEach(function(option) {
        option.style.display = 'none';
    });

    var menuOptions = document.querySelectorAll('.menu-option-bar');
    menuOptions.forEach(function(menuOption) {
        menuOption.classList.remove('highlight');
    });

    document.querySelector('#welcome-text').style.display = 'none';
    document.querySelector('#year-text').style.display = 'block';
    document.querySelector('.' + className).style.display = 'flex';

    // Highlight the clicked option
    element.classList.add('highlight');
}