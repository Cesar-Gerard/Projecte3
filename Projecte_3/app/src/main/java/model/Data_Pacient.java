
package model;


import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;





public class Data_Pacient {

    @SerializedName("id_pacient")
    @Expose
    private Integer idPacient;
    @SerializedName("assigned_nutricionist")
    @Expose
    private Integer assignedNutricionist;
    @SerializedName("phone_patient")
    @Expose
    private String phonePacient;
    @SerializedName("address_patient")
    @Expose
    private String addressPacient;
    @SerializedName("current_diet")
    @Expose
    private Integer currentDiet;

    public Integer getIdPacient() {
        return idPacient;
    }

    public void setIdPacient(Integer idPacient) {
        this.idPacient = idPacient;
    }

    public Integer getAssignedNutricionist() {
        return assignedNutricionist;
    }

    public void setAssignedNutricionist(Integer assignedNutricionist) {
        this.assignedNutricionist = assignedNutricionist;
    }

    public String getPhonePacient() {
        return phonePacient;
    }

    public void setPhonePacient(String phonePacient) {
        this.phonePacient = phonePacient;
    }

    public String getAddressPacient() {
        return addressPacient;
    }

    public void setAddressPacient(String addressPacient) {
        this.addressPacient = addressPacient;
    }

    public Integer getCurrentDiet() {
        return currentDiet;
    }

    public void setCurrentDiet(Integer currentDiet) {
        this.currentDiet = currentDiet;
    }

}
