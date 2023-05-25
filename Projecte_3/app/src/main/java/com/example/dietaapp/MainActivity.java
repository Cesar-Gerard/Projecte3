package com.example.dietaapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.view.GravityCompat;
import androidx.navigation.Navigation;

import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.os.Build;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;

import com.example.dietaapp.databinding.ActivityMainBinding;
import com.google.android.material.navigation.NavigationView;

public class MainActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {




    ActivityMainBinding binding;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivityMainBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        androidx.appcompat.widget.Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        NavigationView navigationview = findViewById(R.id.nav_view);
        navigationview.setNavigationItemSelectedListener(this);

        ActionBarDrawerToggle toogle = new ActionBarDrawerToggle(this, binding.drawerLayout, toolbar, R.string.open_nav,R.string.close_nav);

        binding.drawerLayout.addDrawerListener(toogle);
        toogle.syncState();


    }



    @Override
    public void onBackPressed() {
        if(binding.drawerLayout.isDrawerOpen(GravityCompat.START)){
            binding.drawerLayout.closeDrawer(GravityCompat.START);
        }else{
            super.onBackPressed();
        }
    }





    //Sistema de navegació entre els fragments
    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {

        if(item.getItemId()==R.id.nav_home){
            Navigation.findNavController(this, R.id.nav_host_fragment).navigate(R.id.action_global_currentPlanFragment);

        }else if(item.getItemId()==R.id.nav_user){

            Navigation.findNavController(this, R.id.nav_host_fragment).navigate(R.id.action_global_user_profile);
        }

        else if(item.getItemId()==R.id.nav_diets){
            Navigation.findNavController(this,R.id.nav_host_fragment).navigate(R.id.action_global_dietasFragment);
        }

        else if(item.getItemId()==R.id.nav_logout){
            finishAffinity();

        }else if(item.getItemId()== R.id.navhistorial){
            Navigation.findNavController(this,R.id.nav_host_fragment).navigate(R.id.action_global_historialFragment);
        }

        binding.drawerLayout.closeDrawer(GravityCompat.START);
       return true;
    }



    //Metode de crida del drawerLayout per incompatibilitat de les capes dels layouts
    public void btnmenu_onClick(View view) {
        binding.drawerLayout.open();
    }
}