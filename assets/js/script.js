// CUSTOM JAVASCRIPT

console.log("School Website Loaded");

document.addEventListener("DOMContentLoaded", function(){

    const heroSlider =
    document.querySelector('#heroSlider');

    if(heroSlider){

        new bootstrap.Carousel(heroSlider,{

            interval:3000,

            ride:'carousel',

            pause:false,

            wrap:true,

            touch:true
        });
    }
});