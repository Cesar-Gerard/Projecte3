package com.example.dietaapp;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import api.Registre_api;
import model.User;

public class MainActivity extends AppCompatActivity {

    Button btn_Log;
    EditText edtName;
    EditText edtPassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

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
                //Registre_api.hacerSolicitud(queue, edtName);

                    String url = "http://169.254.70.172/Projecte3/dietapp_ws/public/api/login";
                    String nickname = "gcesar";//edtName.getText().toString().trim();
                    String password = "2003";//edtPassword.getText().toString().trim();

                    Registre_api.postRequest(queue, url, nickname, password, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            edtName.setText(response);
                        }
                    }, new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            edtName.setText("Error");
                        }
                    });

            }
        });
    }
}