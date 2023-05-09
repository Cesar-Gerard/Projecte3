
package model;


import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


public class LoginResponse {

    @SerializedName("data")
    @Expose
    private Data_Retro data;

    public Data_Retro getData() {
        return data;
    }

    public void setData(Data_Retro data) {
        this.data = data;
    }

}
