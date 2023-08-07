let color1 = document.querySelector('.twon-color1');
let color   =  document.querySelectorAll('.card-coloroption-one');

        for (let i = 0; i < color.length; i++) {
            color[i].addEventListener('click',()=>{
                let coloroption = window.getComputedStyle(color[i]).backgroundColor;
                color1.style.background = coloroption;
            })

        }


let color2 = document.querySelector('.twon-color2');
let colors   =  document.querySelectorAll('.card-coloroption-two');
for (let i = 0; i < colors.length; i++) {
    colors[i].addEventListener('click',()=>{
        let coloroption = window.getComputedStyle(colors[i]).backgroundColor;
        color2.style.background = coloroption;
    })

}
