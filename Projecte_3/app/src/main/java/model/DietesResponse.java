
package model;

import java.util.List;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


public class DietesResponse {

    @SerializedName("data")
    @Expose
    private List<Dietes> data;

    public List<Dietes> getData() {
        return data;
    }

    public void setData(List<Dietes> data) {
        this.data = data;
    }

}
