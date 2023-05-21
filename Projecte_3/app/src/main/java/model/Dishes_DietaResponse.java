package model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Dishes_DietaResponse {
    @SerializedName("data")
    @Expose
    private List<Dishes_Dieta> data;

    public List<Dishes_Dieta> getData() {
        return data;
    }

    public void setData(List<Dishes_Dieta> data) {
        this.data = data;
    }
}
