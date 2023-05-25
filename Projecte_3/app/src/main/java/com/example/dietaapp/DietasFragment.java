package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.navigation.Navigation;
import androidx.recyclerview.widget.LinearLayoutManager;

import android.text.Editable;
import android.text.TextWatcher;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Adapter;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Toast;

import com.example.dietaapp.databinding.FragmentDietasBinding;

import java.util.ArrayList;
import java.util.List;
import java.util.Timer;
import java.util.TimerTask;

import adapter_dietes.MyAdapter;
import api.ApiManager;
import model.Data_Pacient;
import model.Dietes;
import model.DietesResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class DietasFragment extends Fragment  {


    FragmentDietasBinding binding;
    MyAdapter adapter;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        binding = FragmentDietasBinding.inflate(getLayoutInflater());

        // Inflate the layout for this fragment
        View v = binding.getRoot();
        LinearLayoutManager layoutManager = new LinearLayoutManager(requireContext());
        binding.recyclerView.setLayoutManager(layoutManager);


        RequestDietes();
        programarfiltre();
        clickCardView();




        return v;
    }


    //Metode que gestiona el event onClick de la  CardView de dieta actual
    private void clickCardView() {
       binding.myCardView.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View v) {
               Navigation.findNavController(v).navigate(R.id.action_global_detall_dietaFragment);
           }
       });


    }


    //Getsiona i eomple el contingut del spinner
    private void omplirSpinner() {

        //Omplim els spinners amb les correspondents dades


        List<String> spinnerItems = new ArrayList<>();
        spinnerItems.add("5");
        spinnerItems.add("4");
        spinnerItems.add("3");


        ArrayAdapter<String> adapter = new ArrayAdapter<>(getContext(), android.R.layout.simple_spinner_item, spinnerItems);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);


        binding.spinnerApats.setAdapter(adapter);
    }


    //Request al WebService que retorna totes les dietes existents
    private void RequestDietes() {

        ApiManager.getInstance().getDietes(User_Retro.getToken(), new Callback<DietesResponse>() {
            @Override
            public void onResponse(Call<DietesResponse> call, Response<DietesResponse> response) {

                //Murem quina dieta es la actual del user y omplim la informació
                CurrentDiet(response.body().getData());

                //Omplim el RecycleView
                adapter = new MyAdapter(response.body().getData());
                binding.recyclerView.setAdapter(adapter);


                omplirSpinner();



            }

            @Override
            public void onFailure(Call<DietesResponse> call, Throwable t) {
                Toast.makeText(getContext(), "No s'han pogut carregar les dietes, torna a intentar-ho",Toast.LENGTH_LONG).show();
            }
        });


    }


    //Metode que gestiona la programació del filtre de les dietes per nom y nombre de apats
    private void programarfiltre() {

        //Comportament del boto de cerca
        binding.btnCerca.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String selectedItem = binding.spinnerApats.getSelectedItem().toString();


                String nom =  binding.busquedanom.getText().toString();
                adapter.filtrarPorNumeroComidas(selectedItem,nom);
            }
        });


        //Comportament del boto de Neteja
        binding.btnNetejar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                adapter.NetejarLlista();
                binding.busquedanom.setText("");
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

        //Guardem la dieta actual per el seu ús posterior
        Dietes.set_dieta(entrada);


        binding.edtDietName.setText(entrada.getName());

        double resultat = Double.valueOf(entrada.getCalories())/1000;

        binding.edtCaloriasDieta.setText(String.valueOf(resultat)+" kcal");
        binding.edtComidasDieta.setText(String.valueOf(entrada.getNumberMeals()+ " apats*dia"));

    }
}