document.addEventListener('DOMContentLoaded',f_main);




function f_main(){

    /**
     * btn_mostrar_filtre
     * btn_amagar_filtre
     */
    document.getElementById('btn_mostrar_filtre').addEventListener('click',f_mostraFiltres);
    document.getElementById('btn_amagar_filtre').addEventListener('click',f_amagaFiltres);

    document.getElementById('btn_amagar_filtre').style.display = "none";

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