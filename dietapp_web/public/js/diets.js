document.addEventListener('DOMContentLoaded',f_main);



function f_main(){



    document.getElementById('btn_mostrar_filtre').addEventListener('click',f_mostraFiltres);
    document.getElementById('btn_amagar_filtre').addEventListener('click',f_amagaFiltres);


    document.getElementById('btn_amagar_filtre').style.display = "none";

    document.getElementById('cerca_search').addEventListener('click',f_cercaPacients);
    document.getElementById('cerca_neteja_filtres').addEventListener('click',f_netejaFiltres);


}



function f_cercaPacients(){




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
        
    });


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

        let td_descripcio = document.createElement("td");
        td_descripcio.innerHTML = json[i].description;

        let td_tipus = document.createElement("td");
        td_tipus.setAttribute('style','text-align: center');
        td_tipus.innerHTML = json[i].name_type;

        let td_calories = document.createElement("td");
        td_calories.setAttribute('style','text-align: center');
        td_calories.innerHTML = json[i].calories/1000;

        let td_number_meals = document.createElement("td");
        td_number_meals.setAttribute('style','text-align: center');
        td_number_meals.innerHTML = json[i].number_meals;

        
        tr.appendChild(td_nom);
        tr.appendChild(td_descripcio);
        tr.appendChild(td_tipus);
        tr.appendChild(td_calories);
        tr.appendChild(td_number_meals);

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


