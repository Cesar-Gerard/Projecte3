package com.example.dietaapp;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.ContentResolver;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.graphics.PorterDuff;
import android.net.Uri;
import android.os.Bundle;

import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import android.provider.MediaStore;
import android.text.TextUtils;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.Toast;

import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;
import com.example.dietaapp.databinding.FragmentUserProfileBinding;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import api.ApiManager;
import api.ApiService;
import model.ChangePasswordRequest;
import model.ChangePasswordResponse;
import model.ChangeUserRequest;
import model.ChangeUserResponse;
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


        //Programem el funcionament dels botons
        preparabotons();


        // Convertir Bitmap a arxiu File
        Bitmap bitmap = BitmapFactory.decodeFile(user.getImageUser());


        if (!TextUtils.isEmpty(user.getImageUser())) {
            File file = new File(user.getImageUser());
            if (file.exists()) {
                binding.imageProfile.setImageBitmap(bitmap);
            } else {
                binding.imageProfile.setImageResource(R.drawable.avatar_icon);
            }
        } else {
            binding.imageProfile.setImageResource(R.drawable.avatar_icon);
        }


        return v;
    }

    //Programació del funcionament dels diferents botons de la pantalla
    private void preparabotons() {
        //Programem el comportament del canvi de contrasenya
        butoContrasenya();

        //Programem el comportament del boto de desar els canvis
        butoGuardarCanvis();
    }

    //Comportament del boto de canviar la contrasenya
    private void butoContrasenya() {
        binding.button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showChangePasswordDialog();
            }
        });

    }


    //Comportament del canvi de foto de perfil
    private void imagepicker() {
        binding.btnChangeImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openImagePicker();
            }
        });



    }

    //Metode que obre la galerioa de imatges
    private void openImagePicker() {
        Intent intent = new Intent(Intent.ACTION_PICK, MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
        startActivityForResult(intent, REQUEST_IMAGE_PICKER);
    }

    //Metode que reb la imatge y la formata per guardarla en la base de dades y en el objecte usuari
    @Override
    public void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == REQUEST_IMAGE_PICKER && resultCode == Activity.RESULT_OK && data != null) {
            Uri selectedImage = data.getData();



            File folder = getContext().getFilesDir();
            File arxiu = new File(folder, "nom.png");
            Bitmap mImageBitmap = null;


            try {
                InputStream inputStream = this.getContext().getContentResolver().openInputStream(selectedImage);
                mImageBitmap = BitmapFactory.decodeStream(inputStream);
                FileOutputStream outputStream = new FileOutputStream(arxiu);
                mImageBitmap.compress(Bitmap.CompressFormat.PNG, 100, outputStream);
                outputStream.close();

                String pathString = arxiu.getAbsolutePath();
                user.setImageUser(pathString);
                User_Retro.setUser(user);
            } catch (FileNotFoundException e) {
                throw new RuntimeException(e);
            } catch (IOException e) {
                throw new RuntimeException(e);
            }




            Bitmap bitmap = BitmapFactory.decodeFile(user.getImageUser());
            binding.imageProfile.setImageBitmap(bitmap);




            ChangeUserRequest change= new ChangeUserRequest(String.valueOf(user.getId()), user.getNameUser(), user.getLastnameUser(),user.getPhone_number(),user.getAddres(),user.getImageUser());


            ApiManager.getInstance().updateUser(User_Retro.getToken(), change, new Callback<ChangeUserResponse>() {
                @Override
                public void onResponse(Call<ChangeUserResponse> call, Response<ChangeUserResponse> response) {
                    Toast.makeText(getView().getContext(), "Foto actualitzada",Toast.LENGTH_LONG).show();

                }

                @Override
                public void onFailure(Call<ChangeUserResponse> call, Throwable t) {
                    Toast.makeText(getView().getContext(), "No s'ha pogut actualitzar la foto de perfil",Toast.LENGTH_LONG).show();
                }
            });


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

                if(isPasswordValid(newPassword) && confirmNewPassword.equals(newPassword)){
                    ChangePasswordRequest change = new ChangePasswordRequest(user.getNicknameUser(),oldPassword,newPassword);




                    ApiManager.getInstance().updatePassword(User_Retro.getToken(), change, new Callback<ChangePasswordResponse>() {
                        @Override
                        public void onResponse(Call<ChangePasswordResponse> call, Response<ChangePasswordResponse> response) {
                            Toast.makeText(dialogView.getContext(), "Contrasenya actualitzada",Toast.LENGTH_LONG).show();

                        }

                        @Override
                        public void onFailure(Call<ChangePasswordResponse> call, Throwable t) {
                            Toast.makeText(dialogView.getContext(), "No s'ha pogut fer la modificació",Toast.LENGTH_LONG).show();

                        }
                    });
                }else{
                    Toast.makeText(dialogView.getContext(), "La contrasenya nova no compleix amb els requeriments",Toast.LENGTH_LONG).show();
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

    //Metode que valida els requeriments de contrasenya
    private boolean isPasswordValid(String contrasena) {

            if (contrasena.length() < 6) {
                return false;
            }

            Pattern minusculaPattern = Pattern.compile("[a-z]");
            Matcher minusculaMatcher = minusculaPattern.matcher(contrasena);
            if (!minusculaMatcher.find()) {
                return false;
            }

            Pattern mayusculaPattern = Pattern.compile("[A-Z]");
            Matcher mayusculaMatcher = mayusculaPattern.matcher(contrasena);
            if (!mayusculaMatcher.find()) {
                return false;
            }

            Pattern numeroPattern = Pattern.compile("[0-9]");
            Matcher numeroMatcher = numeroPattern.matcher(contrasena);
            if (!numeroMatcher.find()) {
                return false;
            }

            Pattern especialPattern = Pattern.compile("[!@#$%^&*(),.?\":{}|<>]");
            Matcher especialMatcher = especialPattern.matcher(contrasena);
            if (!especialMatcher.find()) {
                return false;
            }

            return true;


    }

    //Programació del comportament del boto de desar els canvis
    private void butoGuardarCanvis() {

        binding.btnSaveChanges.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                ChangeUserRequest canvi = new ChangeUserRequest(String.valueOf(user.getId()), user.getNameUser(), user.getLastnameUser(), "+34 "+ binding.edtPhone.getText().toString(), binding.edtStreet.getText().toString(), user.getImageUser());


                ApiManager.getInstance().updateUser(User_Retro.getToken(), canvi, new Callback<ChangeUserResponse>() {

                    @Override
                    public void onResponse(Call<ChangeUserResponse> call, Response<ChangeUserResponse> response) {
                        Toast.makeText(getContext(), "Canvis desats amb èxit",Toast.LENGTH_LONG).show();


                        user.setAddres(binding.edtStreet.getText().toString());
                        user.setPhone_number("+34 "+ binding.edtPhone.getText().toString());
                    }

                    @Override
                    public void onFailure(Call<ChangeUserResponse> call, Throwable t) {

                        Toast.makeText(getContext(), "No s'han pogut fer els canvis",Toast.LENGTH_LONG).show();
                    }
                });
            }
        });

    }



}