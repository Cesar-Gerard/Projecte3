document.addEventListener('DOMContentLoaded',f_main);



function f_main(){

    document.getElementById('email_recupera').addEventListener('input',f_validaEmail);

    document.getElementById('btn_recupera_pw').addEventListener('click',f_enviaMailRecuperaPw);

}


function f_enviaMailRecuperaPw(){

    let email = document.getElementById('email_recupera').value.trim();

    document.getElementById('btn_recupera_pw').innerHTML = "<span><i style='#018F43' class='fa fa-spinner faa-spin animated faa-fast fa-xl'></i></span>";
    
    $.ajax({
        
        url: config.routes.zone_recupera_contrasenya,
        data:{
            'email' : email,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {
        document.getElementById('btn_recupera_pw').innerHTML = "<i class='fa-solid fa-envelope fa-beat'></i> Envia";
        
        if(e){

            Swal.fire(
                'Restablir contrasenya',
                'S\'ha enviat un email amb les instruccions per poder restarblir la contrasenya',
                'success'
            );

        }else{
            Swal.fire(
                'Restablir contrasenya',
                'Degut a un error, no s\'ha pogut enviar el correu',
                'error'
            );
        }
    });


}


function f_validaEmail(){
    let email = document.getElementById('email_recupera').value.trim();
    if(validateEmail(email)){
        document.getElementById('btn_recupera_pw').disabled = false;

        document.getElementById('mail_err').textContent = "";

    }else{
        document.getElementById('btn_recupera_pw').disabled = true;

        //Estils input
        document.getElementById('email_recupera').style = "border 1px solid red !important;";
        document.getElementById('mail_err').textContent = "L'email ha de ser una adreça vàlida";
    }




}

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};