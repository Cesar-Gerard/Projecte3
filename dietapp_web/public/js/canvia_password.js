document.addEventListener('DOMContentLoaded',f_main);



function f_main(){


    document.getElementById('see_password').addEventListener('click',f_veurePassword1);
    document.getElementById('see_password2').addEventListener('click',f_veurePassword2);
    document.getElementById('btn_canviar_password').addEventListener('click',f_canviaContrasenya);

    document.getElementById('canviar_password').addEventListener('input',f_comprovaPassword);
    document.getElementById('canviar_password2').addEventListener('input',f_comprovaPassword);
}




function f_canviaContrasenya(){

}


function f_comprovaPassword(){
    let password1 = document.getElementById('canviar_password').value.trim();
    let password2 = document.getElementById('canviar_password2').value.trim();

    if(password1.length==0 || password2.length==0){
        document.getElementById('err_password').textContent = "Has d'introduir les dues contrasenyes";

        document.getElementById('btn_canviar_password').disabled = true;
    }else{
        if(password1!=password2){
            document.getElementById('err_password').textContent = "Les contrasenyes no coincideixen";

            document.getElementById('btn_canviar_password').disabled = true;
        }else{
            //Activar el botó
            document.getElementById('err_password').textContent = "";

            document.getElementById('btn_canviar_password').disabled = false;
        }
    }
}


function f_veurePassword1(){

    let password = document.getElementById('canviar_password');
    
    if(password.type == "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }
}

function f_veurePassword2(){

    let password = document.getElementById('canviar_password2');
    
    if(password.type == "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }
}