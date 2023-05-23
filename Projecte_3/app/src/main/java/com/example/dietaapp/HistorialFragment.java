package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.dietaapp.databinding.FragmentHistorialBinding;

import adapter_dietes.HistorialAdapter;
import model.User_Retro;

public class HistorialFragment extends Fragment {


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

        HistorialAdapter adapter = new HistorialAdapter(User_Retro.getUser().getHistorial_pacient());
        binding.recyclehistorial.setAdapter(adapter);

        return v;

    }
}