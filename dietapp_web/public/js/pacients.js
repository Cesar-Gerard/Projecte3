document.addEventListener('DOMContentLoaded',f_main);




function f_main(){

    /**
     * btn_mostrar_filtre
     * btn_amagar_filtre
     */
    document.getElementById('btn_mostrar_filtre').addEventListener('click',f_mostraFiltres);
    document.getElementById('btn_amagar_filtre').addEventListener('click',f_amagaFiltres);

    document.getElementById('btn_amagar_filtre').style.display = "none";

    document.getElementById('cerca_nom_pacient').addEventListener('input',f_cercaPacients);
    document.getElementById('cerca_cognom_pacient').addEventListener('input',f_cercaPacients);
    document.getElementById('cerca_tipus_dietes').addEventListener('change',f_cercaPacients);


    //document.getElementById('cerca_search').addEventListener('click',f_cercaPacients);
    document.getElementById('cerca_neteja_filtres').addEventListener('click',f_netejaFiltres);

}



function f_netejaFiltres(){

    //Retornar totes les dades
    $.ajax({
        url: config.routes.zone_filtre_all_pacients,
        data:{
            'nutricionist' : config.vars.nutricionist,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {

        //Eliminar cel·les de la taula
        $("#pacients_taula tr").remove(); 

        document.getElementById('cerca_nom_pacient').value = '';
        document.getElementById('cerca_cognom_pacient').value = '';
        document.getElementById('cerca_tipus_dietes').value = '-1';

        
        f_dibuixaTaula(e);
        
    });




}



function f_cercaPacients(){


    let filtre_nom = document.getElementById('cerca_nom_pacient').value;
    let filtre_cognom = document.getElementById('cerca_cognom_pacient').value;
    let dieta_selected = document.getElementById('cerca_tipus_dietes').value;


    $.ajax({
        url: config.routes.zone_filtre_pacient,
        data:{
            'nom' : filtre_nom,
            'cognom' : filtre_cognom,
            'dieta' : dieta_selected,
            'nutricionist' : config.vars.nutricionist,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {

        //Eliminar cel·les de la taula
        $("#pacients_taula tr").remove(); 
        
        f_dibuixaTaula(e);
        
    });

}


function f_goEdit(id_pacient) {
    url = config.routes.zone_edit_pacient.replace('-1234',id_pacient);

    window.location.href = url;


  }

function f_dibuixaTaula(e){

    let json = JSON.parse(e);


    let table = document.getElementById('pacients_taula');
    
    for(let i=0;i<json.length;i++){
        console.info(json[i]);

        let tr = document.createElement("tr");
        tr.addEventListener('click', f_goEdit.bind(null, json[i].id));

        let td_pacient = document.createElement("td");
        td_pacient.innerHTML = json[i].name_user+" "+json[i].lastname_user;

        let td_phone = document.createElement("td");
        td_phone.innerHTML = json[i].phone_patient;

        let td_address = document.createElement("td");
        td_address.innerHTML = json[i].address_patient;

        let td_dieta_actual = document.createElement("td");
        if(json[i].name.length==0){
            td_dieta_actual.innerHTML = "Sense dieta assignada";
        }else{
            td_dieta_actual.innerHTML = json[i].name;
        }

        let td_buttons = document.createElement("td");

        let a_edit = document.createElement("a");
        a_edit.innerHTML = "Edita ";
        a_edit.setAttribute("class","button-3 btn-edit");
        

        let i_edit = document.createElement("i");
        i_edit.setAttribute("class","fa-solid fa-user-pen");
        
/*
        let a_delete = document.createElement("a");
        a_delete.setAttribute("class","button-3 btn-delete");


        let i_delete = document.createElement("i");
        i_delete.setAttribute("class","fa-solid fa-user-slash");
*/

        a_edit.appendChild(i_edit);
        td_buttons.appendChild(a_edit);
/*
        a_delete.appendChild(i_delete);
        td_buttons.appendChild(a_delete);
*/
        tr.appendChild(td_pacient);
        tr.appendChild(td_phone);
        tr.appendChild(td_address);
        tr.appendChild(td_dieta_actual);
        tr.appendChild(td_buttons);

        table.appendChild(tr);


    }


}


function f_mostraFiltres(){

    document.getElementById('btn_amagar_filtre').style.display = "block";
    document.getElementById('btn_mostrar_filtre').style.display = "none";

    document.getElementById('filtres_div').style.display = "none";
}


function f_amagaFiltres(){

    document.getElementById('btn_amagar_filtre').style.display = "none";
    document.getElementById('btn_mostrar_filtre').style.display = "block";


    document.getElementById('filtres_div').style.display = "block";
}