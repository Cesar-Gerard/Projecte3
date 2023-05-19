package model;

import android.net.Uri;

public class ChangeUserRequest {
    private String id;
    private String name_user;
    private String lastname_user;
    private String phone_pacient;
    private String address_pacient;
    private String image_user;

    public ChangeUserRequest(String id, String name_user, String lastname_user, String phone_pacient, String address_pacient, String image_user) {
        this.id = id;
        this.name_user = name_user;
        this.lastname_user = lastname_user;
        this.phone_pacient = phone_pacient;
        this.address_pacient = address_pacient;
        this.image_user = image_user;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getName_user() {
        return name_user;
    }

    public void setName_user(String name_user) {
        this.name_user = name_user;
    }

    public String getLastname_user() {
        return lastname_user;
    }

    public void setLastname_user(String lastname_user) {
        this.lastname_user = lastname_user;
    }

    public String getPhone_pacient() {
        return phone_pacient;
    }

    public void setPhone_pacient(String phone_pacient) {
        this.phone_pacient = phone_pacient;
    }

    public String getAddress_pacient() {
        return address_pacient;
    }

    public void setAddress_pacient(String address_pacient) {
        this.address_pacient = address_pacient;
    }

    public String getImage_user() {
        return image_user;
    }

    public void setImage_user(String image_user) {
        this.image_user = image_user;
    }
}
