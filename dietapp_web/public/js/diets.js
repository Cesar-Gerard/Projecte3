document.addEventListener('DOMContentLoaded',f_main);



function f_main(){



    document.getElementById('btn_mostrar_filtre').addEventListener('click',f_mostraFiltres);
    document.getElementById('btn_amagar_filtre').addEventListener('click',f_amagaFiltres);

    document.getElementById('cerca_nom_dieta').addEventListener('input', f_cercaDietes);
    document.getElementById('cerca_tipus_dieta').addEventListener('change',f_cercaDietes);


    document.getElementById('btn_amagar_filtre').style.display = "none";

    //document.getElementById('cerca_search').addEventListener('click',f_cercaDietes);
    document.getElementById('cerca_neteja_filtres').addEventListener('click',f_netejaFiltres);


}



function f_deleteDiet(id_diet){



    Swal.fire({
        title: 'Eliminar dieta',
        text: 'Estàs segur de voler eliminar la dieta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Elimina dieta',
        cancelButtonText: "Cancel·la", 
    }).then((result) => {
        if(!result.isDismissed){

            $.ajax({
                url: config.routes.zone_delete_dieta,
                data:{
                    'id_diet' : id_diet,
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                },
                type: 'POST'
            }).done(function (e)
            {
        
                
                

                if(e.status!=1){

                    Swal.fire(
                        'Eliminar dieta',
                        e.message,
                        'error'
                    );
                    
                }else{
                    
                    Swal.fire({ 
                        title: "Eliminar dieta",
                        text: "La dieta s'ha eliminat correctament",
                        icon: "success"}).then(okay => {
                        if (okay) {           
                            window.location.reload();             
                        }
                    });
                    
                }

                
                
            });
        
        }
        
/*
        
        */

    });


}


function f_cercaDietes(){

    let dieta_nom = document.getElementById('cerca_nom_dieta').value;
    let dieta_tipus = document.getElementById('cerca_tipus_dieta').value;

    $.ajax({
        url: config.routes.zone_filtre_dieta,
        data:{
            'dieta_nom' : dieta_nom,
            'dieta_tipus' : dieta_tipus,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {

        //Eliminar cel·les de la taula
        $("#dietes_taula tr").remove(); 
        
        f_dibuixaTaula(e);
        
    });

}



function f_netejaFiltres(){

    console.info('Provas');
    //Retornar totes les dades
    $.ajax({
        url: config.routes.zone_filtre_all_diets,
        data:{
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {

        //Eliminar cel·les de la taula
        $("#dietes_taula tr").remove(); 
        
        f_dibuixaTaula(e);

        document.getElementById('cerca_nom_dieta').value = '';
        document.getElementById('cerca_tipus_dieta').value = '-1';
        
    });


}


function f_goEdit(id_dieta){

    url = config.routes.zone_edit_dieta.replace('-1234',id_dieta);

    window.location.href = url;

}

function f_goClone(id_dieta){
    url = config.routes.zone_clone_dieta.replace('-1234',id_dieta);

    window.location.href = url;
}

function f_goPdf(id_dieta){
    
    url = config.routes.zone_pdf_dieta.replace('-1234',id_dieta);

    window.location.href = url;


}



function f_dibuixaTaula(e){

    let json = JSON.parse(e);


    let table = document.getElementById('dietes_taula');
    
    for(let i=0;i<json.length;i++){
        console.info(json[i]);

        let tr = document.createElement("tr");
        

        let td_nom = document.createElement("td");
        td_nom.setAttribute('style','text-align: center');
        td_nom.innerHTML = json[i].name;
        td_nom.addEventListener('click', f_goEdit.bind(null, json[i].id_diet));

        let td_descripcio = document.createElement("td");
        td_descripcio.innerHTML = json[i].description;
        td_descripcio.addEventListener('click', f_goEdit.bind(null, json[i].id_diet));

        let td_tipus = document.createElement("td");
        td_tipus.setAttribute('style','text-align: center');
        td_tipus.innerHTML = json[i].name_type;
        td_tipus.addEventListener('click', f_goEdit.bind(null, json[i].id_diet));

        let td_calories = document.createElement("td");
        td_calories.setAttribute('style','text-align: center');
        td_calories.innerHTML = json[i].calories/1000;
        td_calories.addEventListener('click', f_goEdit.bind(null, json[i].id_diet));

        let td_number_meals = document.createElement("td");
        td_number_meals.setAttribute('style','text-align: center');
        td_number_meals.innerHTML = json[i].number_meals;
        td_number_meals.addEventListener('click', f_goEdit.bind(null, json[i].id_diet));

        
        let td_buttons = document.createElement("td");
        td_buttons.setAttribute('style','text-align: center');

        //EDIT
        let a_edit = document.createElement("a");
        a_edit.innerHTML = "&nbsp;Editar";
        a_edit.setAttribute("class","button-3 btn-edit");
        a_edit.setAttribute("style","margin-top:10px;");
        a_edit.addEventListener('click', f_goEdit.bind(null, json[i].id_diet));

        let i_edit = document.createElement("i");
        i_edit.setAttribute("class","fa-solid fa-pen-to-square");

        //DELETE
        let a_delete = document.createElement("a");
        a_delete.innerHTML = "&nbsp;Eliminar";
        a_delete.setAttribute("class","button-3 btn-delete");
        a_delete.setAttribute("style","margin-top:10px;");
        a_delete.setAttribute("id","delete_diet{{"+json[i].id_diet+"}}");
        a_delete.addEventListener('click', f_deleteDiet.bind(null, json[i].id_diet));


        let i_delete = document.createElement("i");
        i_delete.setAttribute("class","fa-solid fa-trash");

        //CLONAR
        let a_clone = document.createElement("a");
        a_clone.innerHTML = "&nbsp;Clonar";
        a_clone.setAttribute("class","button-3 btn-clone");
        a_clone.setAttribute("style","margin-top:10px");
        a_clone.addEventListener('click', f_goClone.bind(null, json[i].id_diet));

        let i_clone = document.createElement("i");
        i_clone.setAttribute("class","fa-solid fa-clone");


        //GENERAR PDF
        let a_pdf = document.createElement("a");
        a_pdf.innerHTML = "&nbsp;Descarrega dieta";
        a_pdf.setAttribute("class","button-3 btn-pdf");
        a_pdf.setAttribute("style","margin-top:10px");
        a_pdf.addEventListener('click', f_goPdf.bind(null, json[i].id_diet));

        let i_pdf = document.createElement("i");
        i_pdf.setAttribute("class","fa-solid fa-file-pdf");


        a_edit.appendChild(i_edit);
        td_buttons.appendChild(a_edit);

        a_delete.appendChild(i_delete);
        td_buttons.appendChild(a_delete);

        a_clone.appendChild(i_clone);
        td_buttons.appendChild(a_clone);

        a_pdf.appendChild(i_pdf);
        td_buttons.appendChild(a_pdf);

        
        tr.appendChild(td_nom);
        tr.appendChild(td_descripcio);
        tr.appendChild(td_tipus);
        tr.appendChild(td_calories);
        tr.appendChild(td_number_meals);
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


