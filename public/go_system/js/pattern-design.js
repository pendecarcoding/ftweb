let leather = document.querySelector('.leather-pattern');
let color   =  document.querySelectorAll('.card-coloroption');

        for (let i = 0; i < color.length; i++) {
            color[i].addEventListener('click',()=>{
                let coloroption = window.getComputedStyle(color[i]).backgroundColor;
                leather.style.background = coloroption;
            })

        }
