package adapter_dietes;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dietaapp.R;
import com.example.dietaapp.databinding.FragmentDietasBinding;

import java.util.List;

import model.Dietes;

public class MyAdapter extends RecyclerView.Adapter<MyAdapter.ViewHolder>{


    private List<Dietes> mObjects;

    public MyAdapter(List<Dietes> objects){
        mObjects = objects;
    }


    @NonNull
    @Override
    public MyAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.contingut_llista_dieta, parent, false);
        return new ViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull MyAdapter.ViewHolder holder, int position) {
        Dietes object = mObjects.get(position);
        holder.nom.setText(object.getName());
        holder.apats.setText(String.valueOf(object.getNumberMeals()));

        double resultat = Double.valueOf(object.getCalories())/1000;

        holder.calories.setText(String.valueOf(resultat)+" kcal");

    }

    @Override
    public int getItemCount() {
        return mObjects.size();
    }



    public class ViewHolder extends RecyclerView.ViewHolder{

        TextView nom;

        TextView apats;
        TextView calories;



        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            nom = itemView.findViewById(R.id.edtName);
            apats= itemView.findViewById(R.id.edtQuantitat);
            calories = itemView.findViewById(R.id.edtCalories);



        }
    }




}
