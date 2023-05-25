package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.dietaapp.databinding.FragmentHistorialBinding;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Locale;

import adapter_dietes.HistorialAdapter;
import model.Datum;
import model.User_Retro;

public class HistorialFragment extends Fragment implements HistorialAdapter.HistorialSelectedListener{


    FragmentHistorialBinding binding;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        binding= FragmentHistorialBinding.inflate(getLayoutInflater());
        View v = binding.getRoot();



        //Relacionem el recycleview amb el seu adapter
        LinearLayoutManager layoutManager = new LinearLayoutManager(getContext());
        binding.recyclehistorial.setLayoutManager(layoutManager);

        HistorialAdapter adapter = new HistorialAdapter(User_Retro.getUser().getHistorial_pacient(),this);
        binding.recyclehistorial.setAdapter(adapter);

        return v;

    }


    //Metode que gestiona la seleccio de un item en el recycleview de historial y mostra el resultat fora d'aquest
    @Override
    public void onHistorialSelected(Datum seleccionat) {

        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd", Locale.getDefault());

        try {
            String formattedDate = dateFormat.format(seleccionat.getControlDate());
           binding.edtDataIniciHistorial.setText(formattedDate);
        } catch (ParseException e) {
            throw new RuntimeException(e);
        }


        binding.edtPesRegistrat.setText(seleccionat.getWeigth()+ " kg");
        binding.edtBraz.setText(seleccionat.getArm()+ " cm");
        binding.edtPit.setText(seleccionat.getChest()+ " cm");
        binding.edtCama.setText(seleccionat.getLeg()+ " cm");
        binding.edtCintura.setText(seleccionat.getHip()+ " cm");


        double resultat = calcularIMC(Double.valueOf(seleccionat.getWeigth()),Double.valueOf(seleccionat.getHeigth()));

        binding.customRectangleView.setIMC((float) resultat);



    }


    //Merode que calcula el IMC segons el pes i l'alçada de una persona
    public  double calcularIMC(double peso, double altura) {


        // Calcular el índice de masa corporal (IMC)
        double imc = peso / (altura * altura);

        // Redondear el resultado a dos decimales
        imc = Math.round(imc * 100.0) / 100.0;

        // Devolver el resultado
        return imc;
    }
}