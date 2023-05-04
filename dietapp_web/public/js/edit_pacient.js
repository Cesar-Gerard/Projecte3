document.addEventListener('DOMContentLoaded',f_main);



function f_main(){
   
    //Millora: crear composició usuari(primera lletra nom + cognom(fins espai) )
    //Treure caràcters especialss


    // initialize the validation library
    const validation = new JustValidate('#f_edit_pacient', {
        errorFieldCssClass: 'is-invalid',
    });


    // apply rules to form fields
    validation
    .addField('#pacient_name', [
        {
            rule: 'required',
            errorMessage: 'El nom del pacient és obligatori',
        },
        {
            rule: 'minLength',
            value: 2,
            errorMessage: 'El nom ha de tenir almenys 2 caràcters'
        },
        {
            rule: 'maxLength',
            value: 45,
            errorMessage: 'El nom ha de tenir com a màxim 45 caràcters',
        },
    
    ])
    .addField('#pacient_cognoms', [
        {
            rule: 'required',
            errorMessage: "El cognom és obligatori",
        },
        {
            rule: 'minLength',
            value: 4,
            errorMessage: 'El cognom ha de tenir almenys 4 caràcters'
        },
        {
            rule: 'maxLength',
            value: 45,
            errorMessage: 'El nom ha de tenir com a màxim 45 caràcters',
        },
    
    ])
    .addField('#pacient_email', [
        {
            rule: 'required',
            errorMessage: "L'email és obligatori",
        },
        {
            rule: 'minLength',
            value: 10,
            errorMessage: "L'email de l'usuari ha de tenir almenys 10 caràcters"
        },
        {
            rule: 'maxLength',
            value: 45,
            errorMessage: "L'email de l'usuari ha de tenir com a màxim 45 caràcters",
        },
        {
            rule: 'email',
            errorMessage: "Ha de ser un email vàlid"
        },
    
    ])
    .addField('#pacient_phone', [
        {
            rule: 'minLength',
            value: 9,
            errorMessage: "El telèfon ha de tenir almenys 10 caràcters"
        },
        {
            rule: 'maxLength',
            value: 45,
            errorMessage: "El telèfon ha de tenir com a màxim 20 caràcters",
        },
        {
            rule: 'customRegexp',
            value: /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g,
            errorMessage: "El telèfon ha de ser vàlid",
        },
    
    ])
    .addField('#pacient_address', [
        {
            rule: 'minLength',
            value: 5,
            errorMessage: "L'adreça ha de tenir almenys 5 caràcters"
        },
        {
            rule: 'maxLength',
            value: 1000,
            errorMessage: "L'adreça ha de tenir com a màxim 1000 caràcters",
        },
        
    
    ])


    .onSuccess((event) => {
        f_editarPacient();
    });

}



function f_editarPacient(){

    $.ajax({
        url: config.routes.zone_editar_pacient,
        data:{
            'id': config.vars.pacient,
            'pacient_name' : $('#pacient_name').val(),
            'pacient_cognoms' : $('#pacient_cognoms').val(),
            'pacient_email' : $('#pacient_email').val(),
            'pacient_phone' : $('#pacient_phone').val(),
            'pacient_address' : $('#pacient_address').val(),
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {

        console.info('Ret: '+e.status);
 
        if(e.status!="error"){
            

            Swal.fire({ 
                title: "Crear pacient",
                text: "El pacient s'ha creat correctament",
                icon: "success"
            }).then(okay => {
                if (okay) {
                    window.location.href = config.routes.zone_pacients;
                    
                }
            });



        }else{
            console.info('err');
            Swal.fire(
                'Crear pacient',
                e.message,
                'error'
            );
        }
        
                      
    });


    




}



