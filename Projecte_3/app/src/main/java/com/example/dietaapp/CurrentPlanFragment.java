package com.example.dietaapp;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Collections;
import java.util.Comparator;
import java.util.Date;
import java.util.List;
import java.util.Locale;
import java.util.concurrent.TimeUnit;

import api.ApiManager;
import model.ChangePasswordRequest;
import model.ChangePasswordResponse;
import model.Datum;
import model.Dietes;
import model.HistorialRequest;
import model.HistorialResponse;
import model.InsertHistorialResponse;
import model.PacientResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class CurrentPlanFragment extends Fragment {

    User_Retro user;
    FragmentCurrentPlanBinding binding;


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        binding = FragmentCurrentPlanBinding.inflate(getLayoutInflater());

        // Inflate the layout for this fragment
        View v = binding.getRoot();

        //Rebem el usuari
        user = User_Retro.getUser();


        binding.txvuser.setText("Hola " + user.getNameUser().toString());


        // Convertir Bitmap a axiu File per poder fer la conversió a imatge
        Bitmap bitmap = BitmapFactory.decodeFile(user.getImageUser());


        if (!TextUtils.isEmpty(user.getImageUser())) {
            File file = new File(user.getImageUser());
            if (file.exists()) {
                binding.imageViewavatar.setImageBitmap(bitmap);
            } else {
                binding.imageViewavatar.setImageResource(R.drawable.avatar_icon);
            }
        } else {
            binding.imageViewavatar.setImageResource(R.drawable.avatar_icon);
        }



        InfoPacientRequest();
        demanarHistorial();

        InserirHistorial();


        return v;

    }


    //Metode que crida al dialog de insercio de dades
    private void InserirHistorial() {
        binding.btnTemporal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DialegInsert();
            }
        });
    }

    //Dialog de insercio de dades
    private void DialegInsert() {
        AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
        LayoutInflater inflater = requireActivity().getLayoutInflater();
        View dialogView = inflater.inflate(R.layout.dialog_insert_historial, null);
        builder.setView(dialogView);

        EditText pes = dialogView.findViewById(R.id.edtPes);
        EditText alzada = dialogView.findViewById(R.id.edtAlzada);
        EditText braz = dialogView.findViewById(R.id.edtBraz);
        EditText cama = dialogView.findViewById(R.id.edtCama);
        EditText pit = dialogView.findViewById(R.id.edtPit);
        EditText cintura = dialogView.findViewById(R.id.edtCadera);

        builder.setPositiveButton("Aceptar", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                String pes_S = pes.getText().toString();
                String alt_S = alzada.getText().toString();
                String cama_S = cama.getText().toString();
                String braz_S = braz.getText().toString();
                String pit_S = pit.getText().toString();
                String cintura_S = cintura.getText().toString();

                if(validateDoubleFormat(alt_S)&&validateDoubleFormat(pes_S) && validateDoubleFormat(cama_S) &&validateDoubleFormat(braz_S) &&validateDoubleFormat(pit_S) &&validateDoubleFormat(cintura_S)){


                    ApiManager.getInstance().insertHistorial(User_Retro.getToken(), User_Retro.getUser().getId().toString(),String.valueOf(User_Retro.getDiet()) ,pes_S,alt_S,pit_S,cama_S,braz_S,cintura_S, new Callback<InsertHistorialResponse>() {
                        @Override
                        public void onResponse(Call<InsertHistorialResponse> call, Response<InsertHistorialResponse> response) {
                            Toast.makeText(getContext(), "Dades guardades amb èxit", Toast.LENGTH_LONG).show();
                        }

                        @Override
                        public void onFailure(Call<InsertHistorialResponse> call, Throwable t) {

                        }
                    });



                }else{
                    Toast.makeText(dialogView.getContext(), "Valors no introduits correctament",Toast.LENGTH_LONG).show();
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


    //Metode de validacio de dades de inserció
    public boolean validateDoubleFormat(String input) {
        try {
            // Reemplazar coma por punto para el separador decimal
            input = input.replace(",", ".");

            double number = Double.parseDouble(input);
            String formatted = String.format(Locale.US, "%.2f", number);
            return input.equals(formatted);
        } catch (NumberFormatException e) {
            return false;
        }
    }


    //Metode que determina depenent de la darrera data de control y es pot o no tornar a inserir dades de control
    private void DeterminarTempsBoto(Date controlDate) {
        Date fechaActual = Calendar.getInstance().getTime();

        long diferenciaDias = TimeUnit.MILLISECONDS.toDays(fechaActual.getTime() - controlDate.getTime());

        // Verificar si han pasado 7 o más días
        if (diferenciaDias >= 7) {
            // Activar el botón
            binding.btnTemporal.setEnabled(true);
        } else {
            // Desactivar el botón
            binding.btnTemporal.setEnabled(false);
        }

    }


    //Crea y gestiona la gràfica de la llibreria de github
    private void elementsGrafica(List<Datum> historial, Date fechaInicial) throws ParseException {

        List<Entry> entradas = new ArrayList<>();

        // Ordena el historial por fecha
        Collections.sort(historial, new Comparator<Datum>() {
            @Override
            public int compare(Datum o1, Datum o2) {
                try {
                    return o1.getControlDate().compareTo(o2.getControlDate());
                } catch (ParseException e) {
                    throw new RuntimeException(e);
                }
            }
        });

        // Determinem el nombre de entrades
        for (int i = 0; i < historial.size(); i++) {
            Datum entrada = historial.get(i);
            float peso = Float.valueOf(entrada.getWeigth());
            Date fechaEntrada = entrada.getControlDate();

            // Verifica si la data de la entrada esta dins del mes de la data inicial
            Calendar calendarFechaInicial = Calendar.getInstance();
            calendarFechaInicial.setTime(fechaInicial);
            Calendar calendarFechaEntrada = Calendar.getInstance();
            calendarFechaEntrada.setTime(fechaEntrada);
            if (calendarFechaEntrada.get(Calendar.MONTH) == calendarFechaInicial.get(Calendar.MONTH)) {
                float fechaEnMs = fechaEntrada.getTime();
                entradas.add(new Entry(fechaEnMs, peso));
            }
        }

        // Configura la línea de la gráfica
        LineDataSet dataSet = new LineDataSet(entradas, "Pes");
        dataSet.setColor(Color.RED);
        dataSet.setValueTextColor(Color.BLACK);

        // Desactiva les etiquetes de valors del eix x
        XAxis xAxis = binding.graficoPeso.getXAxis();
        xAxis.setDrawLabels(false);


        // Configura la gráfica
        LineData lineData = new LineData(dataSet);
        binding.graficoPeso.setData(lineData);
        binding.graficoPeso.invalidate();

        binding.graficoPeso.setTouchEnabled(false);

    }



    //Executa el get que retorna el historial del usuari com a pacient
    private void demanarHistorial() {

        ApiManager.getInstance().getHistorialWithToken(User_Retro.getToken(), user.getId().toString(), new Callback<HistorialResponse>() {
            @Override
            public void onResponse(Call<HistorialResponse> call, Response<HistorialResponse> response) {
                user.setHistorial_pacient(response.body().getData());
                try {
                    //Actualitzem els elements grafics
                    elementsGrafica(user.getHistorial_pacient(), user.getHistorial_pacient().get(response.body().getData().size()-1).getControlDate());
                    CanviColorImageViewDates(user.getHistorial_pacient().get(response.body().getData().size()-1).getControlDate());
                    DeterminarTempsBoto(user.getHistorial_pacient().get(response.body().getData().size()-1).getControlDate());
                } catch (ParseException e) {
                    throw new RuntimeException(e);
                }


                //Rebem el historial més recent per no haber de treballar amb la llista sencer
                omplircamps( response.body().getHistorial(response.body().getData().size()-1));



            }

            @Override
            public void onFailure(Call<HistorialResponse> call, Throwable t) {
                // Procesar el error aquí
            }
        });

    }


    //Executa el get que retorna la informació com a pacient del usuari
    private void InfoPacientRequest() {

        ApiManager.getInstance().getPacientWithToken(User_Retro.getToken(),user.getId().toString(), new Callback<PacientResponse>(){

            @Override
            public void onResponse(Call<PacientResponse> call, Response<PacientResponse> response) {


                user.setAddres(response.body().getData().getAddressPacient());
                user.setPhone_number(response.body().getData().getPhonePacient());
                user.setEmailUser(response.body().getData().getEmail_patient());
                User_Retro.setDiet(response.body().getData().getCurrentDiet());
                User_Retro.setUser(user);

            }

            @Override
            public void onFailure(Call<PacientResponse> call, Throwable t) {

            }
        });


    }


    //Omple els camps de la pantalla principal
    private void omplircamps(Datum actual) {

        //Omplim els camps de la dieta actual(la més recent)
        binding.edtPes.setText(actual.getWeigth()+"kg");
        binding.edtAlt.setText(actual.getHeigth()+"m");
        binding.edtPit.setText(actual.getChest()+ "cm");
        binding.edtCintura.setText(actual.getHip()+ "cm");
        binding.edtCama.setText(actual.getLeg()+ "cm");
        binding.edtBra.setText(actual.getArm()+ "cm");

        //Fem el calcul del imc

        double altura= Double.parseDouble(actual.getHeigth());
        double pes= Double.parseDouble(actual.getWeigth());

        double resultat = calcularIMC(pes, altura);
        user.setIMC(resultat);

        binding.edtIMC.setText(String.valueOf(resultat));
        binding.customRectangleView.setIMC((float) user.getIMC()); // Ajusta el valor del IMC según tus necesidades



    }

    //Calcula el IMC del pacient en base a la seva alçada i pes
    public  double calcularIMC(double peso, double altura) {


        // Calcular el índice de masa corporal (IMC)
        double imc = peso / (altura * altura);

        // Redondear el resultado a dos decimales
        imc = Math.round(imc * 100.0) / 100.0;

        // Devolver el resultado
        return imc;
    }


    //Metode que marca els dies que han passat de la dieta
    private void CanviColorImageViewDates(Date startDate){
        final int MAX_DIES=5;

        //Recollim els ImageView dins de una llista perquè sigui més fàcil de recorre
        List<ImageView> llista_image= new ArrayList<>();

        llista_image.add(binding.imageDilluns);
        llista_image.add(binding.imageDimarts);
        llista_image.add(binding.imageDimecres);
        llista_image.add(binding.imageDijous);
        llista_image.add(binding.imageDivendres);



        Calendar calendar = Calendar.getInstance();
        Date currentDate = calendar.getTime();


        long diffInMillis = currentDate.getTime()-startDate.getTime();
        int daysPassed = (int) (diffInMillis / (24 * 60 * 60 * 1000L)); // Diferencia de dies

        for (int i = 0; i < llista_image.size(); i++) {
            ImageView imageView = llista_image.get(i);
            if (i <= daysPassed) {
                // Cambia el color de fons si han passat la quantitat de dies
                imageView.setBackgroundColor(Color.GREEN);
            } else {
                // Restableix el color de fons si no han passat pro dies
                imageView.setBackgroundColor(Color.WHITE);
            }
        }

    }
}

