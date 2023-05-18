
package model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;


public class Datum {

    @SerializedName("start_date")
    @Expose
    private String startDate;

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

    @SerializedName("control_date")
    @Expose
    private String controlDate;

    @SerializedName("status")
    @Expose
    private String status;


    public String getStartDate() {
        return startDate;
    }

    public void setStartDate(String startDate) {
        this.startDate = startDate;
    }


    public Date getControlDate() throws ParseException {
        Date date1=new SimpleDateFormat("yyyy-MM-dd").parse(controlDate);

        return date1;
    }

    public void setControlDate(String controlDate) {
        this.controlDate = controlDate;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
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
