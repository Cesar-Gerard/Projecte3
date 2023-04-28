package model;

public class User {
    private String Token;
    private String Nickname_User;
    private char Type_User;
    private String Name_User;
    private long id;
    private String Last_Name;


    public User(String nickname_User) {

        Nickname_User = nickname_User;

    }

    public String getToken() {
        return Token;
    }

    public void setToken(String token) {
        Token = token;
    }

    public String getNickname_User() {
        return Nickname_User;
    }

    public void setNickname_User(String nickname_User) {
        Nickname_User = nickname_User;
    }

    public char getType_User() {
        return Type_User;
    }

    public void setType_User(char type_User) {
        Type_User = type_User;
    }

    public String getName_User() {
        return Name_User;
    }

    public void setName_User(String name_User) {
        Name_User = name_User;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getLast_Name() {
        return Last_Name;
    }

    public void setLast_Name(String last_Name) {
        Last_Name = last_Name;
    }
}
