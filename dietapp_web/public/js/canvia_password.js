document.addEventListener('DOMContentLoaded',f_main);



function f_main(){


    document.getElementById('see_password').addEventListener('click',f_veurePassword1);
    document.getElementById('see_password2').addEventListener('click',f_veurePassword2);
    document.getElementById('btn_canviar_password').addEventListener('click',f_canviaContrasenya);

    document.getElementById('canviar_password').addEventListener('input',f_comprovaPassword);
    document.getElementById('canviar_password2').addEventListener('input',f_comprovaPassword);
}




function f_canviaContrasenya(){

    let password = document.getElementById('canviar_password').value.trim();

    document.getElementById('btn_canviar_password').innerHTML = "<span><i style='#018F43' class='fa fa-spinner faa-spin animated faa-fast fa-xl'></i></span>";
    $.ajax({
        url: config.routes.zone_canvia_password,
        data:{
            'usuari' : config.vars.user,
            'password' : password,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {document.getElementById('btn_canviar_password').innerHTML = "<i class='fa-solid fa-key'></i> Canvia";
        if(e==1){
            //Redirect a home
            Swal.fire({ 
                title: "Canviar contrasenya",
                text: "El canvi de contrasenya s\'ha efectuat correctament",
                icon: "success"}).then(okay => {
                if (okay) {           
                    window.location.href = config.routes.zone_login;          
                }
            });
        }else{
            Swal.fire(
                'Canviar contrasenya',
                'Degut a un error, no s\'ha pogut fer el canvi de contrasenya',
                'error'
            );
        }
        
                      
    });
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