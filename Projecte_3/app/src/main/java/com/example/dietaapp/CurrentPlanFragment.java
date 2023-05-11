package com.example.dietaapp;

import android.graphics.Color;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.RequestQueue;
import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;
import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;

import java.time.LocalDate;
import java.util.ArrayList;

import api.ApiManager;
import model.Datum;
import model.HistorialResponse;
import model.PacientResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class CurrentPlanFragment extends Fragment {

    User_Retro user;

    FragmentCurrentPlanBinding binding;


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        binding = FragmentCurrentPlanBinding.inflate(getLayoutInflater());

        // Inflate the layout for this fragment
        View v = binding.getRoot();

        //Rebem el usuari
        user = User_Retro.getUser();


        binding.txvuser.setText("Hola " + user.getNameUser().toString());


        InfoPacientRequest();
        demanarHistorial();




        return v;

    }

    private void elementsGrafica(Datum actual) {


        // Configurar el gráfico
        binding.graficoPeso.setDragEnabled(true);
        binding.graficoPeso.setScaleEnabled(true);



        // Actualizar el gráfico cuando se hace clic en el botón

                // Obtener los valores ingresados por el usuario
                float pesoIni = Float.parseFloat(actual.getWeigth());
                float pesoFin = Float.parseFloat(actual.getWeigth())-10;

                // Crear los datos para el gráfico
                ArrayList<Entry> datos = new ArrayList<>();
                datos.add(new Entry(0, pesoIni));
                datos.add(new Entry(1, pesoFin));

                // Crear el conjunto de datos y agregar los valores
                LineDataSet conjuntoDatos = new LineDataSet(datos, "Progreso del peso");

                // Configurar el conjunto de datos
                conjuntoDatos.setLineWidth(2);
                conjuntoDatos.setCircleRadius(6);
                conjuntoDatos.setCircleColor(Color.BLUE);
                conjuntoDatos.setColor(Color.BLUE);

                // Crear el conjunto de datos y agregarlo al gráfico
                LineData datosLinea = new LineData(conjuntoDatos);
                binding.graficoPeso.setData(datosLinea);

                // Actualizar el gráfico
                binding.graficoPeso.invalidate();



    }


    private void demanarHistorial() {

        ApiManager.getInstance().getHistorialWithToken(User_Retro.getToken(), user.getId().toString(), new Callback<HistorialResponse>() {
            @Override
            public void onResponse(Call<HistorialResponse> call, Response<HistorialResponse> response) {
                user.setHistorial_pacient(response.body().getData());
                elementsGrafica(response.body().getHistorial(0));


                //Rebem el historial més recent per no haber de treballar amb la llista sencer
                omplircamps( response.body().getHistorial(0));

            }

            @Override
            public void onFailure(Call<HistorialResponse> call, Throwable t) {
                // Procesar el error aquí
            }
        });

    }


    //Rebem la info de pacient del user
    private void InfoPacientRequest() {

        ApiManager.getInstance().getPacientWithToken(User_Retro.getToken(),user.getId().toString(), new Callback<PacientResponse>(){

            @Override
            public void onResponse(Call<PacientResponse> call, Response<PacientResponse> response) {

                user.setNutricionist(response.body().getData().getAssignedNutricionist());
                user.setAddres(response.body().getData().getAddressPacient());
                user.setPhone_number(response.body().getData().getPhonePacient());

                User_Retro.setUser(user);

            }

            @Override
            public void onFailure(Call<PacientResponse> call, Throwable t) {

            }
        });


    }


    //Omple els camps de la pantalla principal
    private void omplircamps(Datum actual) {

        //Omplim els camps de la dieta actual(la més recent)
        binding.edtPes.setText(actual.getWeigth()+"kg");
        binding.edtAlt.setText(actual.getHeigth()+"m");
        binding.edtPit.setText(actual.getChest()+ "cm");
        binding.edtCintura.setText(actual.getHip()+ "cm");
        binding.edtCama.setText(actual.getLeg()+ "cm");
        binding.edtBra.setText(actual.getArm()+ "cm");

        //Fem el calcul del imc

        double altura= Double.parseDouble(actual.getHeigth());
        double pes= Double.parseDouble(actual.getWeigth());

        double resultat = calcularIMC(pes, altura);

        binding.edtIMC.setText(String.valueOf(resultat));


    }

    //Calcula el IMC del pacient en base a la seva alçada i pes
    public  double calcularIMC(double peso, double altura) {


        // Calcular el índice de masa corporal (IMC)
        double imc = peso / (altura * altura);

        // Redondear el resultado a dos decimales
        imc = Math.round(imc * 100.0) / 100.0;

        // Devolver el resultado
        return imc;
    }

}

