package model;

public class ChangePasswordRequest {
    private String username;
    private String password_antiga;
    private String password_nova;

    public ChangePasswordRequest(String username, String password_antiga, String password_nova) {
        this.username = username;
        this.password_antiga = password_antiga;
        this.password_nova = password_nova;
    }

    // Getter y Setter para los campos

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPasswordAntiga() {
        return password_antiga;
    }

    public void setPasswordAntiga(String password_antiga) {
        this.password_antiga = password_antiga;
    }

    public String getPasswordNova() {
        return password_nova;
    }

    public void setPasswordNova(String password_nova) {
        this.password_nova = password_nova;
    }
}
