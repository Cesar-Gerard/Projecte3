document.addEventListener('DOMContentLoaded',f_main);


function f_main(){

    f_dragable();



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