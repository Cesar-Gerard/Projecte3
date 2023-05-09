document.addEventListener('DOMContentLoaded',f_main);



function f_main(){
   

  var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

  f_dibuixar_grafica();

  


}


function f_dibuixar_grafica(){


  let json_obj = config.vars.data_points.replace(/&quot;/ig,'"');
  
  json_obj = JSON.parse(json_obj);
  
  let arr_points = [];

  for(let i=0;i<json_obj.length;i++){
      let obj_point = {};

      obj_point.x = new Date(json_obj[i].anyo,json_obj[i].mes,json_obj[i].dia);
      obj_point.y = Number(json_obj[i].imc);
  
      arr_points.push(obj_point);
    
  }

  
  var chart = new CanvasJS.Chart("chartContainer_historic_actual",
  {
    title:{
        text: "Seguiment IMC"
    },
    axisX:{
        title: "Dia",
    },
    axisY: {
        title: "IMC",
        valueFormatString: "###.##"
    },
    data: [
      {        
          type: "column",
          dataPoints: arr_points,
          indexLabel: "{y}",
      }
    ],
    culture: "es",
  });

  chart.render();







}