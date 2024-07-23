function Dom(element){
    return document.querySelector(element);
}
function DomALL(element) {
    return document.querySelectorAll(element);
}

window.addEventListener('load',()=>{
    
    // const menu_mobile = Dom('#menu-mobile');
    // menu_mobile.addEventListener('click',()=>{
    //     tonggle_check();
    // });


});   


function tonggle_check(){
        const check_array = DomALL('.check');
        let check = check_array[0].checked === false ? false : true ;
        console.log('check = ', check);
        check_array.forEach(item=>{
            if(!check){
                item.checked = true;
            }else{
                item.checked = false;
            }
        })
}