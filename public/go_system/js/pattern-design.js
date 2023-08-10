let leatherPatterns = document.querySelectorAll('.leather-pattern');
let colorOptions = document.querySelectorAll('.card-coloroption');

for (let i = 0; i < colorOptions.length; i++) {
    colorOptions[i].addEventListener('click', () => {
        let colorOption = window.getComputedStyle(colorOptions[i]).backgroundColor;
        leatherPatterns.forEach((leather) => {
            leather.style.background = colorOption;
        });
    });
}
