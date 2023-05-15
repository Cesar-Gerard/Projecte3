
package model;


import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


public class Dietes {

    @SerializedName("id_diet")
    @Expose
    private Integer idDiet;
    @SerializedName("name")
    @Expose
    private String name;
    @SerializedName("calories")
    @Expose
    private String calories;
    @SerializedName("number_meals")
    @Expose
    private Integer numberMeals;
    @SerializedName("description")
    @Expose
    private String description;
    @SerializedName("tipus_dieta")
    @Expose
    private Integer tipusDieta;

    public Integer getIdDiet() {
        return idDiet;
    }

    public void setIdDiet(Integer idDiet) {
        this.idDiet = idDiet;
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

    public Integer getNumberMeals() {
        return numberMeals;
    }

    public void setNumberMeals(Integer numberMeals) {
        this.numberMeals = numberMeals;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Integer getTipusDieta() {
        return tipusDieta;
    }

    public void setTipusDieta(Integer tipusDieta) {
        this.tipusDieta = tipusDieta;
    }

}
