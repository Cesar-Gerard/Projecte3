package com.example.dietaapp;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;
import com.example.dietaapp.databinding.FragmentUserProfileBinding;

import api.ApiManager;
import model.HistorialResponse;
import model.PacientResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class user_profile extends Fragment {

    User_Retro user;
    FragmentUserProfileBinding binding;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        binding = FragmentUserProfileBinding.inflate(getLayoutInflater());
        View v = binding.getRoot();

        //Rebem el usuari
        user =User_Retro.getUser();


        //carreguem les dades;
        omplirDadesPerfil();

        return v;
    }




    //Omple els camps dels EditText y els textos
    private void omplirDadesPerfil() {
        //Modifiquem els textos en base a la info del user
        binding.textNom.setText(user.getNameUser()+" "+user.getLastnameUser());
        binding.txvEmail.setText(user.getEmailUser());

        //Omplim els editText
        binding.edtNickname.setText(user.getNicknameUser());
        binding.edtStreet.setText(user.getAddres());
        binding.edtPhone.setText(user.getPhone_number());
        binding.edtNutri.setText(String.valueOf(user.getNutricionist()));




    }
}