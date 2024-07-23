function display(id_a,id_b,clss_name){
    try{
    const a = document.getElementById(id_a);
    const b = document.getElementById(id_b);
    a.addEventListener('click',function(){
        b.classList.add(clss_name);
        // console.log('mo')
        
    })
    document.addEventListener('click',function(e){
        if(e.target === a || a.contains(e.target) || b.contains(e.target)){
            return;
        }
        // console.log('dong');
         b.classList.remove(clss_name);
    })
    }
    catch(err){
        return null;
    }
}

display('check1','sub_check1','display_flex');
display('check2','sub_check2','display_block');


