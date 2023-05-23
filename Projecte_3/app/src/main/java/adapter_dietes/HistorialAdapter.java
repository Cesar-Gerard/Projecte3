package adapter_dietes;

import android.text.Layout;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dietaapp.R;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.List;
import java.util.Locale;

import api.ApiManager;
import model.Datum;
import model.Dietes;
import model.DietesResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class HistorialAdapter extends RecyclerView.Adapter<HistorialAdapter.ViewHolder>{

    private List<Datum> llista_historial;


    public interface HistorialSelectedListener{

        public void OHistorialSelected(Datum seleccionat);

    }


    public HistorialAdapter(List<Datum> llista_historial) {
        this.llista_historial = llista_historial;
    }

    @NonNull
    @Override
    public HistorialAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_historial,parent,false);

        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull HistorialAdapter.ViewHolder holder, int position) {
        Datum historial = llista_historial.get(position);

        holder.edtPes.setText(historial.getWeigth().toString()+" kg");



        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd", Locale.getDefault());

        try {
            String formattedDate = dateFormat.format(historial.getControlDate());
            holder.edtData.setText(formattedDate);
        } catch (ParseException e) {
            throw new RuntimeException(e);
        }


        ApiManager.getInstance().getDietes(User_Retro.getToken(), new Callback<DietesResponse>() {
            @Override
            public void onResponse(Call<DietesResponse> call, Response<DietesResponse> response) {
                for(Dietes entrada : response.body().getData()){
                    if(entrada.getIdDiet()==historial.getDiet()){
                        holder.edtNom.setText(entrada.getName());
                    }
                }
            }

            @Override
            public void onFailure(Call<DietesResponse> call, Throwable t) {

            }
        });





    }

    @Override
    public int getItemCount() {
        return llista_historial.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {


        public EditText edtNom;
        public EditText edtData;
        public EditText edtPes;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            edtNom= itemView.findViewById(R.id.edtDieta);
            edtData= itemView.findViewById(R.id.edtData);
            edtPes= itemView.findViewById(R.id.edtPes);

        }
    }
}
