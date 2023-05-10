package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.android.volley.RequestQueue;
import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;

import java.time.LocalDate;

import api.ApiManager;
import model.Datum;
import model.HistorialResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class CurrentPlanFragment extends Fragment {

    User_Retro user;



    FragmentCurrentPlanBinding binding;
    private LocalDate selectedDate;


    RequestQueue queue = null;

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


        demanarHistorial();


        return v;

    }


    private void demanarHistorial() {

        ApiManager.getInstance().getHistorialWithToken(User_Retro.getToken(), user.getId().toString(), new Callback<HistorialResponse>() {
            @Override
            public void onResponse(Call<HistorialResponse> call, Response<HistorialResponse> response) {
                user.setHistorial_pacient(response.body().getData());

                //Rebem el historial més recent per no haber de treballar amb la llista sencer
                omplircamps( response.body().getHistorial(0));

            }

            @Override
            public void onFailure(Call<HistorialResponse> call, Throwable t) {
                // Procesar el error aquí
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

