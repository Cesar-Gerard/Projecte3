package model;

public class User {
    private String Token;
    private String Nickname_User;
    private char Type_User;
    private String Name_User;
    private long id;
    private String Last_Name;

    private String email_user;


    public User(long id,String name_User,String last_Name,String nickname_User, char type_User,String email,String token) {
        Token = token;
        Nickname_User = nickname_User;
        Type_User = type_User;
        Name_User = name_User;
        this.id = id;
        Last_Name = last_Name;
        this.email_user=email;
    }

    //region $Properties
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

    public String getEmail_user() {
        return email_user;
    }

    public void setEmail_user(String email_user) {
        this.email_user = email_user;
    }
    //endregion
}
