package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;

import com.example.dietaapp.databinding.FragmentDietasBinding;

import java.util.ArrayList;
import java.util.List;
import adapter_dietes.MyAdapter;
import api.ApiManager;
import model.Data_Pacient;
import model.Dietes;
import model.DietesResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class DietasFragment extends Fragment {


    FragmentDietasBinding binding;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        binding = FragmentDietasBinding.inflate(getLayoutInflater());

        // Inflate the layout for this fragment
        View v = binding.getRoot();
        LinearLayoutManager layoutManager = new LinearLayoutManager(requireContext());
        binding.recyclerView.setLayoutManager(layoutManager);


        RequestDietes();


        return v;
    }


    //Request de Get de dietes
    private void RequestDietes() {

        ApiManager.getInstance().getDietes(User_Retro.getToken(), new Callback<DietesResponse>() {
            @Override
            public void onResponse(Call<DietesResponse> call, Response<DietesResponse> response) {

                //Murem quina dieta es la actual del user y omplim la informació
                CurrentDiet(response.body().getData());

                //Omplim el RecycleView
                MyAdapter adapter = new MyAdapter(response.body().getData());
                binding.recyclerView.setAdapter(adapter);

            }

            @Override
            public void onFailure(Call<DietesResponse> call, Throwable t) {

            }
        });


    }


    //Comprova la Dieta corresponent a l'actual en el llistat
    private void CurrentDiet(List<Dietes> data) {



        for(Dietes entrada : data ){

            if(entrada.getIdDiet().equals(User_Retro.getDiet())){
                ompleDades(entrada);
            }

        }


    }

    //Omple les dades de la dieta actual
    private void ompleDades(Dietes entrada) {
        binding.edtDietName.setText(entrada.getName());

        double resultat = Double.valueOf(entrada.getCalories())/1000;

        binding.edtCaloriasDieta.setText(String.valueOf(resultat)+" kcal");
        binding.edtComidasDieta.setText(String.valueOf(entrada.getNumberMeals()+ " apats/dia"));
    }
}