document.addEventListener('DOMContentLoaded',f_main);


function f_main(){


    document.getElementById('prova').addEventListener('click',f_detecta);


    document.getElementById('dishes_text').addEventListener('input',f_buscaDishes);



    $("#launchPad").height($(window).height() - 20);
    var dropSpace = $(window).width() - $("#launchPad").width();
    $("#dropZone").width(dropSpace - 70);
    $("#dropZone").height($("#launchPad").height());
    
    $(".card").draggable({
        appendTo: "body",
        cursor: "move",
        helper: 'clone',
        revert: "invalid"
    });
    
    $("#launchPad").droppable({
        tolerance: "intersect",
        accept: ".card",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            $("#launchPad").append($(ui.draggable));
        }
    });
    
    $(".stackDrop1").droppable({
        tolerance: "intersect",
        accept: ".card",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {        
            $(this).append($(ui.draggable));
            
            let id = console.info(event.target.id);


            let fills = document.getElementById(id);
            console.info(fills);


            //console.info(elems);

        }
    });
    
    $(".stackDrop2").droppable({
        tolerance: "intersect",
        accept: ".card",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {        
            $(this).append($(ui.draggable));
        }
    });


}


function f_buscaDishes(){

    let dish_nom = document.getElementById('dishes_text').value;

    $.ajax({
        url: config.routes.zone_dishes_filtrar,
        data:{
            'dish_nom' : dish_nom,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {

        //Eliminar cel·les de la taula
        
        $("#launchPad div").remove(); 
        
        f_dibuixaDragables(e);
        
    });



}



function f_dibuixaDragables(e){

    

    
    let json = JSON.parse(e);


    let table = document.getElementById('launchPad');
    
    for(let i=0;i<json.length;i++){
        console.info(json[i]);

        let div = document.createElement("div");
        div.setAttribute('id',json[i].id_dishes);
        div.setAttribute('class','card ui-draggable ui-draggable-handle');
        //TODO: Afegir el text dins del DIV

        

/*
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
*/
        
    }

    


}


function f_detecta(){

    console.info(document.getElementById('migdia1').childElementCount);


}