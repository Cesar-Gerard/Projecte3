package api;

import model.HistorialResponse;
import model.LoginResponse;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Header;
import retrofit2.http.Headers;
import retrofit2.http.POST;
import retrofit2.http.Path;

public interface ApiService {

    @FormUrlEncoded
    @Headers("Accept: application/json")
    @POST("login")
    Call<LoginResponse> login(@Field("nickname_user") String nicknameUser, @Field("password") String password);


    @Headers("Accept: application/json")
    @GET("historial/{parametro}")
    Call<HistorialResponse> getHistorialWithToken(@Header("Authorization") String token, @Path("parametro") String parametro);


}
