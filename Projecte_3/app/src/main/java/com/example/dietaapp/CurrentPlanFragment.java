package com.example.dietaapp;

import android.os.Build;
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
import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;

import org.json.JSONObject;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

import api.Registre_api;
import model.Historial_Pacient;
import model.User;

public class CurrentPlanFragment extends Fragment {

    User info;



    FragmentCurrentPlanBinding binding;
    private LocalDate selectedDate;


    RequestQueue queue=null;
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {


        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
            selectedDate= LocalDate.now();
            setMonthView();
        }


        /*
        //Rebem el user
        info = User.getUser();

        queue = Volley.newRequestQueue(this.getContext());
        demanarHistorial(info,queue);

*/
        // Inflate the layout for this fragment
        View v = inflater.inflate(R.layout.fragment_current_plan, container, false);





        return v;

    }

    private void setMonthView() {
        binding.monthYear.setText();
    }

    private String monthYearFromDate(LocalDate date){
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("MMMM yyyy");
    }

    private void demanarHistorial(User entrada,final RequestQueue queue){


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

    public void previousMonthAction(View view) {
    }

    public void nextMonthAction(View view) {
    }
}