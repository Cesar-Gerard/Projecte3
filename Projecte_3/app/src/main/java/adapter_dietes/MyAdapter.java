package adapter_dietes;

import android.app.Activity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.navigation.Navigation;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dietaapp.R;

import java.util.ArrayList;
import java.util.List;

import model.Dietes;

public class MyAdapter extends RecyclerView.Adapter<MyAdapter.ViewHolder>{


    private static List<Dietes> mObjects;
    private List<Dietes> mFilteredObjects;


    public MyAdapter(List<Dietes> objects) {
        mObjects = objects;
        mFilteredObjects = new ArrayList<>(objects);
    }



    //comportament del RecycleView al ser filtrat
    public void filtrarPorNumeroComidas(String entrada,String nom) {

        mFilteredObjects.clear();

        int numeroComidas= Integer.valueOf(entrada);

        for (Dietes dieta : mObjects) {
            if (dieta.getNumberMeals() >= numeroComidas && dieta.getName().contains(nom)) {
                mFilteredObjects.add(dieta);
            }
        }

        notifyDataSetChanged();
    }




    @NonNull
    @Override
    public MyAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.contingut_llista_dieta, parent, false);
        return new ViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull MyAdapter.ViewHolder holder, int position) {
        Dietes object = mFilteredObjects.get(position);
        holder.nom.setText(object.getName());
        holder.apats.setText(String.valueOf(object.getNumberMeals()));

        double resultat = Double.valueOf(object.getCalories())/1000;

        holder.calories.setText(String.valueOf(resultat)+" kcal");


        //Programen el comportament dels items
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Navigation.findNavController((Activity) v.getContext(),R.id.nav_host_fragment).navigate(R.id.detall_dietaFragment);
            }
        });

    }


    @Override
    public int getItemCount() {
        return mFilteredObjects.size();
    }

    public void NetejarLlista() {
        mFilteredObjects.clear();
        mFilteredObjects.addAll(mObjects); // Restaurar la lista original

        notifyDataSetChanged();

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
