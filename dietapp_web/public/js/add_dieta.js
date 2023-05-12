document.addEventListener('DOMContentLoaded',f_main);


function f_main(){


    document.getElementById('prova').addEventListener('click',f_detecta);


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



function f_detecta(){

    console.info(document.getElementById('migdia1').childElementCount);


}