package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

import api.Registre_api;
import model.Historial_Pacient;
import model.User;

public class CurrentPlanFragment extends Fragment {

    User info;


    //Creación de los contenedores
    EditText edtPes;
    EditText edtAlt;
    EditText edtIMC;
    EditText edtPit;
    EditText edtBraç;
    EditText edtCama;
    EditText edtCintura;


    RequestQueue queue=null;
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //Rebem el user
        info = User.getUser();

        queue = Volley.newRequestQueue(this.getContext());
        demanarHistorial(info,queue);

    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        // Inflate the layout for this fragment
        View v = inflater.inflate(R.layout.fragment_current_plan, container, false);

        edtPes = v.findViewById(R.id.edtPes);



        return v;

    }


    private void demanarHistorial(User entrada,final RequestQueue queue){


        // Llamar al método getUserData
        String url = "http://169.254.70.172/Projecte3/dietapp_ws/public/api/historial";


        Registre_api.getUserData(queue, url, entrada.getToken(),
                new Response.Listener<Historial_Pacient>() {
                    @Override
                    public void onResponse(Historial_Pacient historial) {
                        String pes = String.valueOf(historial.getWeigth());

                        edtPes.setText(pes);
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
}