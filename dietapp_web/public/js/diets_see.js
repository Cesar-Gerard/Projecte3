document.addEventListener('DOMContentLoaded',f_main);


function f_main(){

    f_dragable();

    try{
        document.getElementById('edita-dieta').addEventListener('click',f_editaDieta);
    }catch(e){}
    
    document.getElementById('dishes_text').addEventListener('input',f_buscaDishes);

    try{
        document.getElementById('clone-dieta').addEventListener('click',f_clonaDieta);
    }catch(e){}
    

}


function f_clonaDieta(){

    let nom = document.getElementById('dieta_nom').value;
    let descripcio = document.getElementById('dieta_descripcion').value;
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
        url: config.routes.zone_diet_clone,
        data:{
            'dieta' : dieta,
            'id_dieta' : config.vars.id_dieta,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {
        ;
        if(e!=1){
            Swal.fire(
                'Clonar dieta',
                "S'ha produït un error al clonar la dieta",
                'error'
            );
        }else{
            Swal.fire(
                'Clonar dieta',
                "La dieta s'ha clonat correctament",
                'success'
            );
            document.getElementById('dieta_calories').value = e.calories/1000;
        }
    });


}


function f_editaDieta(){


    let nom = document.getElementById('dieta_nom').value;
    let descripcio = document.getElementById('dieta_descripcion').value;
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
        url: config.routes.zone_diet_edit,
        data:{
            'dieta' : dieta,
            'id_dieta' : config.vars.id_dieta,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        type: 'POST'
    }).done(function (e)
    {
        ;
        if(e.status!=1){
            Swal.fire(
                'Editar dieta',
                "Els canvis de la dieta no s'han pogut guardar correctament",
                'error'
            );
        }else{
            Swal.fire(
                'Editar dieta',
                "Els canvis de la dieta s'han enregistrat correctament",
                'success'
            );
            document.getElementById('dieta_calories').value = e.calories/1000;
        }
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

        div.innerHTML = json[i].name_dish;

        
        table.appendChild(div);
        
    }

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