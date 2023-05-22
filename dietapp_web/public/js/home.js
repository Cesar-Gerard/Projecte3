document.addEventListener('DOMContentLoaded',f_main);

function f_main(){

    f_dibuixaGrafica();

}


function f_dibuixaGrafica(){

    let data_points = [];


    for(let i=0; i<data_points_diets.length; i++){

        let json = data_points_diets[i].replace(/&quot;/ig,'"');
        json = JSON.parse(json);

        console.info(json);
        let json_obj = {};

        if(json.name==null){
            json_obj.label = "No segueix dieta";
        }else{
            json_obj.label = json.name;
        }
        
        json_obj.y = json.total;
    
        data_points.push(json_obj);
    }
    




    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2",
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Dietes assignades"
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}",
            dataPoints: data_points,
                
        }]
    });
    chart.render();


}