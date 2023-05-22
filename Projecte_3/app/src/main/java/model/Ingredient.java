package model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class Ingredient {
    @SerializedName("id_ingredient")
    @Expose
    private Integer idIngredient;
    @SerializedName("name")
    @Expose
    private String name;
    @SerializedName("calories")
    @Expose
    private String calories;
    @SerializedName("calories_unit")
    @Expose
    private Integer caloriesUnit;

    public Integer getIdIngredient() {
        return idIngredient;
    }

    public void setIdIngredient(Integer idIngredient) {
        this.idIngredient = idIngredient;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getCalories() {
        return calories;
    }

    public void setCalories(String calories) {
        this.calories = calories;
    }

    public Integer getCaloriesUnit() {
        return caloriesUnit;
    }

    public void setCaloriesUnit(Integer caloriesUnit) {
        this.caloriesUnit = caloriesUnit;
    }
}
