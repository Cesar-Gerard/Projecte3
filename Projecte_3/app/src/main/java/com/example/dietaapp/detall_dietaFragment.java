package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.example.dietaapp.databinding.FragmentDetallDietaBinding;

import java.util.List;

import api.ApiManager;
import model.Dietes;
import model.Dishes_Dieta;
import model.Dishes_DietaResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class detall_dietaFragment extends Fragment {

     FragmentDetallDietaBinding binding;
     Dietes dieta;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        binding = FragmentDetallDietaBinding.inflate(getLayoutInflater());

        // Inflate the layout for this fragment
        View v = binding.getRoot();

        //Rebem la dieta que ens hem passat de la pantalla anterior
        dieta=Dietes.get_dieta();


        //Omplim les dades
        omplirDades();



        return v;
    }

    private void omplirDades() {
        //Nom de la Dieta
        binding.txvDietaName.setText(dieta.getName());


        //Calories de la dieta
        double resultat= Double.valueOf(dieta.getCalories())/1000;
        binding.txvCaloriesDieta.setText(String.valueOf(resultat)+" kcal");

        //Apats de la dieta
        Dishes_DietaRequest();


    }

    private void Dishes_DietaRequest() {
        ApiManager.getInstance().getDishes(User_Retro.getToken(), dieta.getIdDiet().toString(), new Callback<Dishes_DietaResponse>() {
            @Override
            public void onResponse(Call<Dishes_DietaResponse> call, Response<Dishes_DietaResponse> response) {
                controldeApats(response.body().getData());
            }

            @Override
            public void onFailure(Call<Dishes_DietaResponse> call, Throwable t) {
                Toast.makeText(getContext(), "No s'han pogut carregar els plats, torna a intentar-ho",Toast.LENGTH_LONG).show();
            }
        });


    }

    private void controldeApats(List<Dishes_Dieta> data) {

        for(Dishes_Dieta entrada : data){



        }


    }
}