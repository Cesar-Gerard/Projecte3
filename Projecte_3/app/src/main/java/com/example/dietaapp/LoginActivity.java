package com.example.dietaapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

import api.ApiManager;
import model.LoginResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;

public class LoginActivity extends AppCompatActivity{
    Button btn_Log;
    EditText edtName;
    EditText edtPassword;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_page);

        //--------------------------------//
        edtName = findViewById(R.id.edtName);
        edtPassword= findViewById(R.id.edtPassword);
        btn_Log = findViewById(R.id.btn_Log);

        RequestQueue queue = Volley.newRequestQueue(this);
        programarBotons(queue);

    }


    private void programarBotons(final RequestQueue queue) {
        btn_Log.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                try {

                ApiManager.getInstance().login("gcesar", "2003", new Callback<LoginResponse>() {

                    @Override
                    public void onResponse(Call<LoginResponse> call, retrofit2.Response<LoginResponse> response) {


                        Intent i = new Intent(LoginActivity.this,MainActivity.class);
                        User_Retro.setUser(response.body().getData().getUser());
                        User_Retro.setToken(response.body().getData().getToken());
                        startActivity(i);
                    }

                    @Override
                    public void onFailure(Call<LoginResponse> call, Throwable t) {
                        edtName.setText("error");
                    }
                });

                } catch (Exception e) {
                    e.printStackTrace();
                }

            }
        });
    }
}
