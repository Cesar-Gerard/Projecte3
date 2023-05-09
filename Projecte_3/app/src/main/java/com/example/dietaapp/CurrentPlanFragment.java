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

        binding.edtPes.setText(User_Retro.getToken());


        return v;

    }


    private void demanarHistorial() {

        ApiManager.getInstance().getHistorialWithToken(User_Retro.getToken().toString(), user.getId().toString(), new Callback<HistorialResponse>() {
            @Override
            public void onResponse(Call<HistorialResponse> call, Response<HistorialResponse> response) {
                binding.edtPes.setText("hola");
            }

            @Override
            public void onFailure(Call<HistorialResponse> call, Throwable t) {
                // Procesar el error aquí
            }
        });

    }
}

