let arrowButton=document.querySelector('.fontIcon');
window.addEventListener("scroll",function(){
    if (this.window.scrollY>=600)
    arrowButton.style.opacity="1";
    else
    arrowButton.style.opacity="0";
})

let moveUp=function(){
   window.scrollTo(0,0);
}

let burger=document.querySelector('.burger');
let mainUl=document.querySelector('.mainul');
burger.addEventListener("click",function(){
    if(mainUl.style.display=='none' || mainUl.style.display=='')
    mainUl.style.display="block";
    else
    mainUl.style.display="none";

})