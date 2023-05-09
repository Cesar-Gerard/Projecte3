
package model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


public class Datum {

    @SerializedName("id_historial")
    @Expose
    private Integer idHistorial;
    @SerializedName("date")
    @Expose
    private String date;
    @SerializedName("id_pacient")
    @Expose
    private Integer idPacient;
    @SerializedName("diet")
    @Expose
    private Integer diet;
    @SerializedName("weigth")
    @Expose
    private String weigth;
    @SerializedName("heigth")
    @Expose
    private String heigth;
    @SerializedName("chest")
    @Expose
    private String chest;
    @SerializedName("leg")
    @Expose
    private String leg;
    @SerializedName("arm")
    @Expose
    private String arm;
    @SerializedName("hip")
    @Expose
    private String hip;

    public Integer getIdHistorial() {
        return idHistorial;
    }

    public void setIdHistorial(Integer idHistorial) {
        this.idHistorial = idHistorial;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public Integer getIdPacient() {
        return idPacient;
    }

    public void setIdPacient(Integer idPacient) {
        this.idPacient = idPacient;
    }

    public Integer getDiet() {
        return diet;
    }

    public void setDiet(Integer diet) {
        this.diet = diet;
    }

    public String getWeigth() {
        return weigth;
    }

    public void setWeigth(String weigth) {
        this.weigth = weigth;
    }

    public String getHeigth() {
        return heigth;
    }

    public void setHeigth(String heigth) {
        this.heigth = heigth;
    }

    public String getChest() {
        return chest;
    }

    public void setChest(String chest) {
        this.chest = chest;
    }

    public String getLeg() {
        return leg;
    }

    public void setLeg(String leg) {
        this.leg = leg;
    }

    public String getArm() {
        return arm;
    }

    public void setArm(String arm) {
        this.arm = arm;
    }

    public String getHip() {
        return hip;
    }

    public void setHip(String hip) {
        this.hip = hip;
    }

}
