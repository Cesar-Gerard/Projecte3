
package model;


import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


public class PacientResponse {

    @SerializedName("data")
    @Expose
    private Data_Pacient data;

    public Data_Pacient getData() {
        return data;
    }

    public void setData(Data_Pacient data) {
        this.data = data;
    }

}
