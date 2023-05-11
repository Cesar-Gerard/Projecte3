package com.example.dietaapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;
import com.example.dietaapp.databinding.LoginPageBinding;
import api.ApiManager;
import model.LoginResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;

public class LoginActivity extends AppCompatActivity{


   LoginPageBinding binding;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding =LoginPageBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        //--------------------------------//

        programarBotons();

    }


    private void programarBotons() {


        binding.btnLog.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                try {

                    binding.progressBar.setVisibility(View.VISIBLE);
                    ApiManager.getInstance().login(binding.edtName.getText().toString(), binding.edtPassword.getText().toString(), new Callback<LoginResponse>() {

                        @Override
                        public void onResponse(Call<LoginResponse> call, retrofit2.Response<LoginResponse> response) {
                            
                            if(response.code()>=200 && response.code()<=300) {

                                Intent i = new Intent(LoginActivity.this, MainActivity.class);
                                User_Retro.setUser(response.body().getData().getUser());
                                User_Retro.setToken(response.body().getData().getToken());
                                startActivity(i);


                            }else{
                                cridaError();
                            }

                        }

                        @Override
                        public void onFailure(Call<LoginResponse> call, Throwable t) {

                        }
                    });

                    binding.progressBar.setVisibility(View.GONE);

                } catch (Exception e) {
                    e.printStackTrace();
                }

            }
        });
    }

    private void cridaError() {
        Toast.makeText(LoginActivity.this, "Nom o contrasenya incorrectes",Toast.LENGTH_LONG).show();
    }
}
