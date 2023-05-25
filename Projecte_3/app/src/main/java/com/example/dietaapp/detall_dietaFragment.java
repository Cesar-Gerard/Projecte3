package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.Toast;

import com.example.dietaapp.databinding.FragmentDetallDietaBinding;

import java.util.List;

import adapter_dietes.DishAdapter;
import adapter_dietes.IngredientAdapter;
import api.ApiManager;
import model.Dietes;
import model.Dishes_Dieta;
import model.Dishes_DietaResponse;
import model.Ingredient;
import model.IngredientsDishResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class detall_dietaFragment extends Fragment implements DishAdapter.DishSelectedListener {

     FragmentDetallDietaBinding binding;
     Dietes dieta;
    private IngredientAdapter ingredientAdapter;

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



    //Omple els camps amb les dades requerides
    private void omplirDades() {
        //Nom de la Dieta
        binding.txvDietaName.setText(dieta.getName());


        //Calories de la dieta
        double resultat= Double.valueOf(dieta.getCalories())/1000;
        binding.txvCaloriesDieta.setText(String.valueOf(resultat)+" kcal");


        //Descripcio de la dieta
        binding.edtDescription.setText(dieta.getDescription());

        //Apats de la dieta
        Dishes_DietaRequest();


    }


    //Request al Web Service que demana tots els plats de una dieta
    private void Dishes_DietaRequest() {
        ApiManager.getInstance().getDishes(User_Retro.getToken(), dieta.getIdDiet().toString(), new Callback<Dishes_DietaResponse>() {
            @Override
            public void onResponse(Call<Dishes_DietaResponse> call, Response<Dishes_DietaResponse> response) {
                recycleviews(response.body().getData());
                controldeApats(response.body().getData());
            }

            @Override
            public void onFailure(Call<Dishes_DietaResponse> call, Throwable t) {
                Toast.makeText(getContext(), "No s'han pogut carregar els plats, torna a intentar-ho",Toast.LENGTH_LONG).show();
            }
        });


    }


    //Determina els apats que té una dieta segons el codi d'apat dels plats d'aquesta
    private void controldeApats(List<Dishes_Dieta> data) {
        for(Dishes_Dieta entrada : data){
            switch (entrada.getMeal()){
                case 1:
                    binding.radioEsmorzar.setChecked(true);
                    break;

                case 2:
                    binding.radioMigDia.setChecked(true);
                    break;

                case 3:
                    binding.radioDinar.setChecked(true);
                    break;

                case 4:
                    binding.radioBerenar.setChecked(true);
                    break;

                case 5:
                    binding.radioSopar.setChecked(true);
                    break;

            }
        }
    }


    //Assignació i configuració dels recycleview amb el seu contingut y adapters corresponents
    private void recycleviews(List<Dishes_Dieta> data) {

        LinearLayoutManager layoutManager = new LinearLayoutManager(getContext());
        binding.recyclerView.setLayoutManager(layoutManager);

        DishAdapter adapter = new DishAdapter(data, this);
        binding.recyclerView.setAdapter(adapter);


        LinearLayoutManager layoutManager2= new LinearLayoutManager(getContext());
        binding.recyclerView2.setLayoutManager(layoutManager2);

        ingredientAdapter = new IngredientAdapter();
        binding.recyclerView2.setAdapter(ingredientAdapter);

    }


    //Metode que gestiona el event onClick del Adapter dels plats per poder rescatar el item seleccionat y poder fer-lo servir
    @Override
    public void onDishSelected(Dishes_Dieta seleccionat) {

        ApiManager.getInstance().getIngredientsDish(User_Retro.getToken(), String.valueOf(seleccionat.getIdDishes()), new Callback<IngredientsDishResponse>() {
            @Override
            public void onResponse(Call<IngredientsDishResponse> call, Response<IngredientsDishResponse> response) {
                List<Ingredient> llista = response.body().getData();
                ingredientAdapter.setIngredients(llista);

            }

            @Override
            public void onFailure(Call<IngredientsDishResponse> call, Throwable t) {

            }
        });
    }
}