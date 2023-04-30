

document.addEventListener('DOMContentLoaded',f_main);

let c_user = false;
let c_password = false;

function f_main(){

    document.getElementById('login').addEventListener('click',f_login);
    

    
    document.getElementById('see_password').addEventListener('click',f_veureContrasenya);


    

    f_comprovaObligatori('username','u');
    f_comprovaObligatori('password','p');


}


function f_comprovaObligatori(id,tipus_camp){

    document.getElementById(id).addEventListener('input',f_comprova);

    function f_comprova(){

        let camp = document.getElementById(id).value;

        if(camp.length==0){
            //Camp obligatori
            if(tipus_camp=='u'){
                c_user = false;
            }else{
                c_password = false;
            }
        }else{
            if(tipus_camp=='u'){
                c_user = true;
            }else{
                c_password = true;
            }
        }

        f_activarBotoLogin();

    }

}

function f_activarBotoLogin(){

    document.getElementById('login').disabled = !(c_user && c_password);

}


function f_veureContrasenya(){
    
    let passdocument = document.getElementById('password');

    //let passdocument = document.getElementById("l_password");
    if(passdocument.type == "password"){
        passdocument.type = "text";
    }else{
        passdocument.type = "password";
    }


}


function f_login(){

    let usuari = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();

    document.getElementById('login').innerHTML = "<span><i style='#018F43' class='fa fa-spinner faa-spin animated faa-fast fa-xl'></i></span>";

    $.ajax({
        url: config.routes.zone_login,
        data:{
            'usuari' : usuari,
            'password' : password,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {
        document.getElementById('login').innerHTML = "<i class='a-solid fa-right-to-bracket'></i> Inicia sessió";
        if(e==1){
            //Redirect a home
            window.location.href = config.routes.zone_home;
        }else{
            console.info('err');
            Swal.fire(
                'Inici de sessió',
                'Usuari o contrasenya incorrectes',
                'error'
            );
        }
        
                      
    });
}


