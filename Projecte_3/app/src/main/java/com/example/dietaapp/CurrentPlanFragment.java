package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;

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

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //Rebem el user
        info = User.getUser();

    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_current_plan, container, false);

        //Connectem elements


    }
}