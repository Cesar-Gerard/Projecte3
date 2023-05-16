package com.example.dietaapp;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.PorterDuff;
import android.net.Uri;
import android.os.Bundle;

import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.provider.MediaStore;
import android.view.LayoutInflater;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.Toast;

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

    private static final int REQUEST_IMAGE_PICKER = 100;

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
        
        //Programem el contingut del imagepicker
        imagepicker();

        //Programem el comportament del canvi de contrasenya
        butoContrasenya();

        if(user.getProfile_image()!=null){
            binding.imageView3.setImageURI(user.getProfile_image());
        }

        return v;
    }

    private void butoContrasenya() {
        binding.button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showChangePasswordDialog();
            }
        });

    }

    private void imagepicker() {
        binding.btnChangeImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openImagePicker();
            }
        });



    }

    private void openImagePicker() {
        Intent intent = new Intent(Intent.ACTION_PICK, MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
        startActivityForResult(intent, REQUEST_IMAGE_PICKER);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == REQUEST_IMAGE_PICKER && resultCode == Activity.RESULT_OK && data != null) {
            Uri selectedImage = data.getData();
            binding.imageView3.setImageURI(selectedImage);

            User_Retro user = User_Retro.getUser();

            user.setProfile_image(selectedImage);
            User_Retro.setUser(user);
        }
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
        binding.edtNutri.setText(User_Retro.getNutricionist());

    }


    //Comportament del dialeg del canvi de contraseña
    private void showChangePasswordDialog() {
        AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
        LayoutInflater inflater = requireActivity().getLayoutInflater();
        View dialogView = inflater.inflate(R.layout.dialog_change_password, null);
        builder.setView(dialogView);

        EditText oldPasswordEditText = dialogView.findViewById(R.id.edit_text_old_password);
        EditText newPasswordEditText = dialogView.findViewById(R.id.edit_text_new_password);
        EditText confirmNewPasswordEditText = dialogView.findViewById(R.id.edit_text_confirm_new_password);

        builder.setPositiveButton("Aceptar", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                String oldPassword = oldPasswordEditText.getText().toString();
                String newPassword = newPasswordEditText.getText().toString();
                String confirmNewPassword = confirmNewPasswordEditText.getText().toString();

                // Verificar las contraseñas ingresadas y realizar la lógica correspondiente
                if (isPasswordValid(oldPassword) && isPasswordValid(newPassword) && newPassword.equals(confirmNewPassword)) {
                    // Lógica para cambiar la contraseña
                    // ...
                } else {
                    Toast.makeText(getActivity(), "Las contraseñas no coinciden o no son válidas", Toast.LENGTH_SHORT).show();
                }
            }
        });

        builder.setNegativeButton("Cancelar", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });

        AlertDialog dialog = builder.create();
        dialog.show();
    }

    private boolean isPasswordValid(String password) {
        // Realizar la validación de la contraseña según tus criterios
        // Por ejemplo, verificar la longitud mínima, caracteres especiales, etc.
        return password.length() >= 6;
    }

}