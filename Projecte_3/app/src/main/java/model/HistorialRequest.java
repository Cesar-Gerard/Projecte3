package model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class HistorialRequest {
        private Integer id_pacient;
        private Integer diet;
        private String weigth;
        private String height;
        private String chest;
        private String leg;
        private String arm;
        private String hip;

        public HistorialRequest(Integer id_pacient, Integer diet, String weigth, String height, String chest, String leg, String arm, String hip) {
                this.id_pacient = id_pacient;
                this.diet = diet;
                this.weigth = weigth;
                this.height = height;
                this.chest = chest;
                this.leg = leg;
                this.arm = arm;
                this.hip = hip;
        }


        public Integer getId_pacient() {
                return id_pacient;
        }

        public void setId_pacient(Integer id_pacient) {
                this.id_pacient = id_pacient;
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

        public String getHeight() {
                return height;
        }

        public void setHeight(String height) {
                this.height = height;
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
