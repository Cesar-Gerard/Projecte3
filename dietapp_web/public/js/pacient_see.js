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


  f_dibuixar_grafica_actual();
  f_dibuixar_grafica_anteriors();
  f_dibuixar_grafica_anteriors_body();

  $(document).ready(function(){
    $('input[type=radio]').click(function(){
        f_gestioRadios(this.value);
    });
  });


  document.getElementById('canvia_dieta').addEventListener('click',f_canviaDieta);

}


function f_canviaDieta(){

  //config.vars.pacient
  let dieta_sel = document.querySelector('input[name="radio"]:checked').value;

  $.ajax({
      url: config.routes.zone_diet_assigna,
      data:{
          'dieta' : dieta_sel,
          'pacient' : config.vars.pacient,
          '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      type: 'POST'
  }).done(function (e)
  {

      if(e==-1){
          Swal.fire(
              'Canvia de dieta',
              "El canvi de dieta no s'ha pogut efectuar",
              'error'
          );
      }else{
          Swal.fire(
              'Canvia de dieta',
              "El canvi de dieta s'ha efectuat correctament",
              'success'
          );
          //Tancar modal
      }
  });

  alert(dieta_sel);

}


function f_gestioRadios(){


  document.getElementById('canvia_dieta').disabled = false;

    //Peiticó ajax



}


function f_dibuixar_grafica_anteriors_body(){

  
  for(let i=0;i<data_points_historics.length;i++){

    let json_obj = data_points_historics_chest[i].replace(/&quot;/ig,'"');
    let json_obj_leg = data_points_historics_leg[i].replace(/&quot;/ig,'"');
    let json_obj_arm = data_points_historics_arm[i].replace(/&quot;/ig,'"');
    let json_obj_hip = data_points_historics_hip[i].replace(/&quot;/ig,'"');
    
  
    json_obj = JSON.parse(json_obj);
    json_obj_leg = JSON.parse(json_obj_leg);
    json_obj_arm = JSON.parse(json_obj_arm);
    json_obj_hip = JSON.parse(json_obj_hip);
    
    
    let arr_points = [];
    let arr_points_leg = [];
    let arr_points_arm = [];
    let arr_points_hip = [];
  

    //Chest
    for(let i=0;i<json_obj.length;i++){
        let obj_point = {};
        obj_point.x = new Date(json_obj[i].anyo,json_obj[i].mes-1,json_obj[i].dia);
        obj_point.y = Number(json_obj[i].chest);
    
        arr_points.push(obj_point);
    }

    //Leg
    for(let i=0;i<json_obj_leg.length;i++){
      
      let obj_point = {};
      obj_point.x = new Date(json_obj_leg[i].anyo,json_obj_leg[i].mes-1,json_obj_leg[i].dia);
      obj_point.y = Number(json_obj_leg[i].leg);
      arr_points_leg.push(obj_point);
    }

    //Arm
    for(let i=0;i<json_obj_arm.length;i++){
      let obj_point = {};
      obj_point.x = new Date(json_obj_arm[i].anyo,json_obj_arm[i].mes-1,json_obj_arm[i].dia);
      console.info(json_obj_arm[i].arm);
      obj_point.y = Number(json_obj_arm[i].arm);
      arr_points_arm.push(obj_point);

    }

    //Hip
    for(let i=0;i<json_obj_hip.length;i++){

      let obj_point = {};
      obj_point.x = new Date(json_obj_hip[i].anyo,json_obj_hip[i].mes-1,json_obj_hip[i].dia);

      obj_point.y = Number(json_obj_hip[i].hip);
      arr_points_hip.push(obj_point);


    }


  
    
    var chart = new CanvasJS.Chart("chartContainer_historic_acabat_body"+i,
    {
      title:{
          text: "Seguiment mesures del pacient"
      },
      axisX:{
          title: "Dia",
      },
      axisY: {
          title: "Mesures",
          valueFormatString: "###.##"
      },

      legend:{
        cursor: "pointer",
        fontSize: 16,
        itemclick: toggleDataSeries
      },

      toolTip:{
        shared: true
      },

      data: [
      
        {
          name: "Pit",
          type: "spline",
          showInLegend: true,
          dataPoints: arr_points,
        },
        {
          name: "Arm",
          type: "spline",
          showInLegend: true,
          dataPoints: arr_points_leg,
        },
        {
          name: "Leg",
          type: "spline",
          showInLegend: true,
          dataPoints: arr_points_arm,
        },
        {
          name: "Hip",
          type: "spline",
          showInLegend: true,
          dataPoints: arr_points_hip,
        }

      ],

  
      culture: "es",
    });
  
    chart.render();

    function toggleDataSeries(e){
      if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      }
      else{
        e.dataSeries.visible = true;
      }
      chart.render();
    }


  }




}





function f_dibuixar_grafica_anteriors(){


  for(let i=0;i<data_points_historics.length;i++){




    let json_obj = data_points_historics[i].replace(/&quot;/ig,'"');
  
    json_obj = JSON.parse(json_obj);
    
    let arr_points = [];
  
    for(let i=0;i<json_obj.length;i++){
        let obj_point = {};
        obj_point.x = new Date(json_obj[i].anyo,json_obj[i].mes-1,json_obj[i].dia);
        obj_point.y = Number(json_obj[i].imc);
    
        arr_points.push(obj_point);
      
    }
  
    
    var chart = new CanvasJS.Chart("chartContainer_historic_acabat"+i,
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

}


function f_dibuixar_grafica_actual(){


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