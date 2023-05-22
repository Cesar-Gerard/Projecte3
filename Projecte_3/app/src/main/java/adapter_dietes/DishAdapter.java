package adapter_dietes;


import android.net.Uri;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.dietaapp.R;

import java.util.List;

import api.ApiManager;
import api.ApiService;
import model.Dishes_Dieta;
import model.Ingredient;
import model.IngredientsDishResponse;
import model.User_Retro;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DishAdapter extends RecyclerView.Adapter<DishAdapter.ViewHolder>{
    private List<Dishes_Dieta> dishes;

    public DishAdapter(List<Dishes_Dieta> dishes) {
        this.dishes = dishes;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_dish, parent, false);

        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        Dishes_Dieta dish = dishes.get(position);

        holder.textViewDishName.setText(dish.getNameDish());
        holder.txvCaloriesDieta.setText(dish.getCalories() + " cal");

        Uri uri = Uri.parse("android.resource://com.example.myapp/drawable/"+dish.getImageDish());
        holder.imageViewDish.setImageURI(uri);

    }

    @Override
    public int getItemCount() {
        return dishes.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageViewDish;
        public TextView textViewDishName;
        public TextView txvCaloriesDieta;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            imageViewDish = itemView.findViewById(R.id.imageViewDish);
            textViewDishName = itemView.findViewById(R.id.textViewDishName);
            txvCaloriesDieta = itemView.findViewById(R.id.txvCaloriesDieta);
            }
    }
}
