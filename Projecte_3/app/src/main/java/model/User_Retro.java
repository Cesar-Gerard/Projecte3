
package model;


import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;


public class User_Retro {

    private static User_Retro _user;
    public static User_Retro getUser(){
        return _user;

    };

    public static void setUser(User_Retro entrada){
        _user = entrada;
    }

    //--------------------------------------------------------

    private static String _token;

    public static String getToken(){
        return _token;
    }

    public static void setToken(String entrada){_token = entrada;}


    //--------------------------------------------------------


    @SerializedName("id")
    @Expose
    private Integer id;
    @SerializedName("name_user")
    @Expose
    private String nameUser;
    @SerializedName("lastname_user")
    @Expose
    private String lastnameUser;
    @SerializedName("nickname_user")
    @Expose
    private String nicknameUser;
    @SerializedName("type_user")
    @Expose
    private String typeUser;
    @SerializedName("email_user")
    @Expose
    private String emailUser;

    private List<Datum> historial_pacient;


    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getNameUser() {
        return nameUser;
    }

    public void setNameUser(String nameUser) {
        this.nameUser = nameUser;
    }

    public String getLastnameUser() {
        return lastnameUser;
    }

    public void setLastnameUser(String lastnameUser) {
        this.lastnameUser = lastnameUser;
    }

    public String getNicknameUser() {
        return nicknameUser;
    }

    public void setNicknameUser(String nicknameUser) {
        this.nicknameUser = nicknameUser;
    }

    public String getTypeUser() {
        return typeUser;
    }

    public void setTypeUser(String typeUser) {
        this.typeUser = typeUser;
    }

    public String getEmailUser() {
        return emailUser;
    }

    public void setEmailUser(String emailUser) {
        this.emailUser = emailUser;
    }

    public List<Datum> getHistorial_pacient() {
        return historial_pacient;
    }

    public void setHistorial_pacient(List<Datum> historial_pacient) {
        this.historial_pacient = historial_pacient;
    }
}
