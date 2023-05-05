package com.example.dietaapp;

import android.os.Build;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;
import com.example.dietaapp.databinding.ActivityMainBinding;
import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;

import java.time.LocalDate;
import java.time.YearMonth;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;

import model.User;

public class CurrentPlanFragment extends Fragment{

    User info;



    FragmentCurrentPlanBinding binding;
    private LocalDate selectedDate;


    RequestQueue queue=null;
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);




        //demanarHistorial(info,queue);

    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        binding = FragmentCurrentPlanBinding.inflate(getLayoutInflater());



        info = User.getUser();

        queue = Volley.newRequestQueue(this.getContext());


        // Inflate the layout for this fragment
        View v = binding.getRoot();


        return v;

    }






    /*private void demanarHistorial(User entrada,final RequestQueue queue){


        // Llamar al método getUserData
        String url = "http://169.254.70.172/Projecte3/dietapp_ws/public/api/historial";


        Registre_api.getUserData(queue, url, entrada.getToken(),
                new Response.Listener<Historial_Pacient>() {
                    @Override
                    public void onResponse(Historial_Pacient historial) {
                        String pes = String.valueOf(historial.getWeigth());

                        binding.edtPes.setText(pes);
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        // Manejar el error de la solicitud
                        // ...
                    }
                });
    }
    */










}