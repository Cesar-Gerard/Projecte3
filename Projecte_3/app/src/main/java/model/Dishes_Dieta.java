package model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class Dishes_Dieta {


        @SerializedName("id_dishes")
        @Expose
        private Integer idDishes;
        @SerializedName("name_dish")
        @Expose
        private String nameDish;
        @SerializedName("calories")
        @Expose
        private String calories;
        @SerializedName("image_dish")
        @Expose
        private String imageDish;
        @SerializedName("meal")
        @Expose
        private Integer meal;

        public Integer getIdDishes() {
            return idDishes;
        }

        public void setIdDishes(Integer idDishes) {
            this.idDishes = idDishes;
        }

        public String getNameDish() {
            return nameDish;
        }

        public void setNameDish(String nameDish) {
            this.nameDish = nameDish;
        }

        public String getCalories() {
            return calories;
        }

        public void setCalories(String calories) {
            this.calories = calories;
        }

        public String getImageDish() {
            return imageDish;
        }

        public void setImageDish(String imageDish) {
            this.imageDish = imageDish;
        }

    public Integer getMeal() {
        return meal;
    }

    public void setMeal(Integer meal) {
        this.meal = meal;
    }
}
