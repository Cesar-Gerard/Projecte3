package model;

import java.util.GregorianCalendar;

public class Historial_Pacient {
    //region $Atributs
    private long id_historial;
    private GregorianCalendar date;
    private long diet;
    private long id_pacient;
    private double weigth;
    private double heigth;
    private double chest;
    private double leg;
    private double arm;
    private double hip;
//endregion

    //Constructor


    public Historial_Pacient(long id_historial, GregorianCalendar date, long diet, long id_pacient, double weigth, double heigth, double chest, double leg, double arm, double hip) {
        this.id_historial = id_historial;
        this.date = date;
        this.diet = diet;
        this.id_pacient = id_pacient;
        this.weigth = weigth;
        this.heigth = heigth;
        this.chest = chest;
        this.leg = leg;
        this.arm = arm;
        this.hip = hip;
    }

    // region $Properties

    public long getId_historial() {
        return id_historial;
    }

    public void setId_historial(long id_historial) {
        this.id_historial = id_historial;
    }

    public GregorianCalendar getDate() {
        return date;
    }

    public void setDate(GregorianCalendar date) {
        this.date = date;
    }

    public long getDiet() {
        return diet;
    }

    public void setDiet(long diet) {
        this.diet = diet;
    }

    public long getId_pacient() {
        return id_pacient;
    }

    public void setId_pacient(long id_pacient) {
        this.id_pacient = id_pacient;
    }

    public double getWeigth() {
        return weigth;
    }

    public void setWeigth(double weigth) {
        this.weigth = weigth;
    }

    public double getHeigth() {
        return heigth;
    }

    public void setHeigth(double heigth) {
        this.heigth = heigth;
    }

    public double getChest() {
        return chest;
    }

    public void setChest(double chest) {
        this.chest = chest;
    }

    public double getLeg() {
        return leg;
    }

    public void setLeg(double leg) {
        this.leg = leg;
    }

    public double getArm() {
        return arm;
    }

    public void setArm(double arm) {
        this.arm = arm;
    }

    public double getHip() {
        return hip;
    }

    public void setHip(double hip) {
        this.hip = hip;
    }

    //endregion
}
