
package model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


public class Data_Retro {

    @SerializedName("user")
    @Expose
    private User_Retro user;
    @SerializedName("token")
    @Expose
    private String token;

    public User_Retro getUser() {
        return user;
    }

    public void setUser(User_Retro user) {
        this.user = user;
    }

    public String getToken() {
        return token;
    }

    public void setToken(String token) {
        this.token = token;
    }

}
