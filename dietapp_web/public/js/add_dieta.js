document.addEventListener('DOMContentLoaded',f_main);


let nom_ok = false;
let descripcio_ok = false;
let calendari_dietes_ok = false;



function f_main(){


    //document.getElementById('prova').addEventListener('click',f_detecta);
    document.getElementById('dishes_text').addEventListener('input',f_buscaDishes);

    f_dragable();

    document.getElementById('dieta_nom').addEventListener('blur',f_comprovaNom);
    document.getElementById('dieta_descripcion').addEventListener('blur',f_comprovaDescripcio);

    document.getElementById('crea-dieta').addEventListener('click',f_comprovaCrearDietes);
   


}


function f_creaDieta(){

    


    let nom = document.getElementById('dieta_nom').value;
    let descripcio = document.getElementById('dieta_descripcion').value;
    let calories = 0;
    let tipus_dieta = document.getElementById('dieta_tipus').value;


    //Crear array que agrupi tots els apats de la dieta

    let esmorzars = [];
    let dinars = [];
    let berenars = [];
    let sopars = [];
    let migdies = [];



    let number_id;
    let pos_number_id;
    
    for(let i=1; i<=5; i++){
        //Buscar els elements Child de cada cel·la
        let childs_esmorzars = document.getElementById('esmorzar-'+i).children;
        let childs_dinars = document.getElementById('dinar-'+i).children;
        let childs_berenars = document.getElementById('berenar-'+i).children;
        let childs_sopars = document.getElementById('sopar-'+i).children;
        let childs_migdies = document.getElementById('migdia-'+i).children;


        
        esmorzars[i] = [];
        for(let j=0; j<childs_esmorzars.length; j++){

            pos_number_id = childs_esmorzars[j].id.indexOf("-");
            number_id = childs_esmorzars[j].id.substring(pos_number_id+1,childs_esmorzars[j].id.length);
            esmorzars[i].push(number_id);
        }

        dinars[i] = [];
        for(let j=0; j<childs_dinars.length; j++){

            pos_number_id = childs_dinars[j].id.indexOf("-");
            number_id = childs_dinars[j].id.substring(pos_number_id+1,childs_dinars[j].id.length);
            dinars[i].push(number_id);
        }

        berenars[i] = [];
        for(let j=0; j<childs_berenars.length; j++){

            pos_number_id = childs_berenars[j].id.indexOf("-");
            number_id = childs_berenars[j].id.substring(pos_number_id+1,childs_berenars[j].id.length);
            berenars[i].push(number_id);
        }

        sopars[i] = [];
        for(let j=0; j<childs_sopars.length; j++){

            pos_number_id = childs_sopars[j].id.indexOf("-");
            number_id = childs_sopars[j].id.substring(pos_number_id+1,childs_sopars[j].id.length);
            sopars[i].push(number_id);
        }

        migdies[i] = [];
        for(let j=0; j<childs_migdies.length; j++){

            pos_number_id = childs_migdies[j].id.indexOf("-");
            number_id = childs_migdies[j].id.substring(pos_number_id+1,childs_migdies[j].id.length);
            migdies[i].push(number_id);
        }




    }
    //console.info(esmorzars);
    //console.info(dinars);
    //console.info(berenars);
    //console.info(sopars);
    //console.info(migdies);

    //Ajuntem la info en un sol objecte
    let dieta = {};
    dieta.nom = nom;
    dieta.descripcio = descripcio;
    dieta.tipus = tipus_dieta;
    dieta.esmorzars = esmorzars;
    dieta.dinars = dinars;
    dieta.berenars = berenars;
    dieta.sopars = sopars;
    dieta.migdies = migdies;

    console.info(dieta);



    //Peiticó ajax

    $.ajax({
        url: config.routes.zone_diet_add,
        data:{
            'dieta' : dieta,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {
        
    });



}



function f_comprovaCrearDietes(){

    f_creaDieta();
    /*
    if(f_comprovaCalendari()){
        
        calendari_dietes_ok = true;

    }else{
        Swal.fire(
            'Crear dieta',
            'Cada franja ha de tenir almenys un plat',
            'error'
        );

        calendari_dietes_ok = false;
    }


    if(nom_ok && descripcio_ok && calendari_dietes_ok){
        f_creaDieta();
    }

    */
    

}



function f_comprovaCalendari(){

    //Cada cel·la ha de tenir com a mínim 1 registre!!!!!

    /**
     * console.info(document.getElementById('migdia1').childElementCount);
     * esmorzar
        dinar
        berenar
        sopar
        migdia
     */

    let emplenades = true;
    for(let i=1; i<=5; i++){

        //Recorregut per totes les posicions
        //En cas que no hagi en totes, s'ha de parar

        if(document.getElementById('esmorzar-'+i).childElementCount == 0){
            emplenades = false;
            break;
        }

        if(document.getElementById('dinar-'+i).childElementCount == 0){
            emplenades = false;
            break;
        }

        if(document.getElementById('berenar-'+i).childElementCount == 0){
            emplenades = false;
            break;
        }

        if(document.getElementById('sopar-'+i).childElementCount == 0){
            emplenades = false;
            break;
        }

        if(document.getElementById('migdia-'+i).childElementCount == 0){
            emplenades = false;
            break;
        }

    }

    return emplenades;




}


function f_comprovaNom(){


    let nom = document.getElementById('dieta_nom').value;

    if(nom.length==0 || nom.length>45){
        console.info('Vermell');
        document.getElementById('dieta_nom').style = 'border: 1px solid red;';
        document.getElementById('sp_nom_error').style= "display: block;color:red";

        nom_ok = false;
    }else{
        document.getElementById('dieta_nom').style = 'border: 1px solid #CED4DA';
        document.getElementById('sp_nom_error').style= "display: none";

        nom_ok = true;
    }



}

function f_comprovaDescripcio(){

    let descripcio = document.getElementById('dieta_descripcion').value;

    if(descripcio.length==0){
        document.getElementById('dieta_descripcion').style = 'border: 1px solid red';
        document.getElementById('sp_descripcio_error').style = "display: block;color:red;";

        descripcio_ok = false;

    }else{
        document.getElementById('dieta_descripcion').style = 'border: 1px solid #CED4DA';
        document.getElementById('sp_descripcio_error').style = "display: none";

        descripcio_ok = true;
    }
}



function f_dragable(){


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
            
            //let id = console.info(event.target.id);
            //let fills = document.getElementById(id);
            //console.info(fills);

            //alert(event.target.id);

            
            


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
        f_dragable();
        
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

        div.innerHTML = json[i].name_dishes;

        
        table.appendChild(div);
        
    }

    


}


