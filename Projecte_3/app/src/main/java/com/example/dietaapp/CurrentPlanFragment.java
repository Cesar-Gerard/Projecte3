package com.example.dietaapp;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.util.Base64;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import com.example.dietaapp.databinding.FragmentCurrentPlanBinding;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;

import java.io.File;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Collections;
import java.util.Comparator;
import java.util.Date;
import java.util.List;
import api.ApiManager;
import model.Datum;
import model.HistorialResponse;
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

        Bitmap bitmap = BitmapFactory.decodeFile(user.getImageUser());
        binding.imageViewavatar.setImageBitmap(bitmap);

        InfoPacientRequest();
        demanarHistorial();



        return v;

    }



    //Crea y gestiona la gràfica
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

        // Construye la lista de entradas
        for (int i = 0; i < historial.size(); i++) {
            Datum entrada = historial.get(i);
            float peso = Float.valueOf(entrada.getWeigth());
            Date fechaEntrada = entrada.getControlDate();

            // Verifica si la fecha de la entrada está dentro del mes de la fecha inicial
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
        LineDataSet dataSet = new LineDataSet(entradas, "Peso");
        dataSet.setColor(Color.RED);
        dataSet.setValueTextColor(Color.BLACK);

        // Desactivar las etiquetas de los valores en el eje X
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

                } catch (ParseException e) {
                    throw new RuntimeException(e);
                }


                //Rebem el historial més recent per no haber de treballar amb la llista sencer
                omplircamps( response.body().getHistorial(3));



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
        int daysPassed = (int) (diffInMillis / (24 * 60 * 60 * 1000L)); // Obtener la diferencia en días

        for (int i = 0; i < llista_image.size(); i++) {
            ImageView imageView = llista_image.get(i);
            if (i <= daysPassed) {
                // Cambiar el color de fondo si ha pasado el número de días correspondiente
                imageView.setBackgroundColor(Color.GREEN);
            } else {
                // Restablecer el color de fondo
                imageView.setBackgroundColor(Color.WHITE);
            }
        }

    }
}

