
package model;


import android.net.Uri;

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


    private static String _nutricionist;

    public static String getNutricionist(){
        return _nutricionist;
    }

    public static void setNutricionist(String entrada){_nutricionist = entrada;}


    //--------------------------------------------------------

    private static int _currentdiet;

    public static int getDiet(){
        return _currentdiet;
    }

    public static void setDiet(int entrada){_currentdiet = entrada;}


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


    private String phone_number;

    private String addres;

    private Uri profile_image;

    private double IMC;




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


    public String getPhone_number() {
        return phone_number;
    }

    public void setPhone_number(String phone_number) {
        this.phone_number = phone_number;
    }

    public String getAddres() {
        return addres;
    }

    public void setAddres(String addres) {
        this.addres = addres;
    }

    public Uri getProfile_image() {
        return profile_image;
    }

    public void setProfile_image(Uri profile_image) {
        this.profile_image = profile_image;
    }

    public double getIMC() {
        return IMC;
    }

    public void setIMC(double IMC) {
        this.IMC = IMC;
    }
}
