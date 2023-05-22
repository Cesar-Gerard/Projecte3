package adapter_dietes;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dietaapp.R;

import java.util.ArrayList;
import java.util.List;

import model.Ingredient;

public class IngredientAdapter extends RecyclerView.Adapter<IngredientAdapter.ViewHolder> {


    private List<Ingredient> ingredientList;

    public IngredientAdapter() {
        this.ingredientList = new ArrayList<>();
    }

    public void setIngredients(List<Ingredient> ingredients) {
        this.ingredientList = ingredients;
        notifyDataSetChanged();

    }

    @NonNull
    @Override
    public IngredientAdapter.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view= LayoutInflater.from(parent.getContext()).inflate(R.layout.item_ingredient,parent,false);

        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull IngredientAdapter.ViewHolder holder, int position) {
            Ingredient ingredient = ingredientList.get(position);

            holder.txtName.setText(ingredient.getName());
            holder.txtQuantitat.setText("N/S");
            holder.txtCalorias.setText(ingredient.getCalories()+ " cal");
    }

    @Override
    public int getItemCount() {
        if(ingredientList!=null){
            return ingredientList.size();
        }else{
            return 0;
        }

    }

    public class ViewHolder extends RecyclerView.ViewHolder {

      TextView txtName;
      TextView txtQuantitat;
      TextView txtCalorias;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);

            txtName=itemView.findViewById(R.id.ingredientName2);
            txtQuantitat=itemView.findViewById(R.id.ingredientQuantitat2);
            txtCalorias=itemView.findViewById(R.id.ingredientCalories2);

        }
    }
}
