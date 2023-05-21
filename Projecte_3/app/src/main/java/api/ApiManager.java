package api;

import model.ChangePasswordRequest;
import model.ChangePasswordResponse;
import model.ChangeUserRequest;
import model.ChangeUserResponse;
import model.DietesResponse;
import model.Dishes_DietaResponse;
import model.HistorialResponse;
import model.LoginResponse;
import model.PacientResponse;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class ApiManager {

    private static final String BASE_URL="http://169.254.70.172/Projecte3/dietapp_ws/public/api/";
    private static ApiManager mInstance;
    private ApiService mApiService;


    private ApiManager(){
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(BASE_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        mApiService=retrofit.create(ApiService.class);
    }

    public static synchronized ApiManager getInstance(){
        if(mInstance == null){
            mInstance = new ApiManager();
        }

        return mInstance;
    }

    public void login(String nicknameUser, String password, Callback<LoginResponse> callback ){
        Call<LoginResponse> call = mApiService.login(nicknameUser, password);
        call.enqueue(callback);
    }

    public void getHistorialWithToken(String token, String parametro, Callback<HistorialResponse> callback) {

        Call<HistorialResponse> call = mApiService.getHistorialWithToken("Bearer " + token, parametro);
        call.enqueue(callback);
    }


    public void getPacientWithToken(String token, String parametro, Callback<PacientResponse> callback) {

        Call<PacientResponse> call = mApiService.getPacientWithToken("Bearer " + token, parametro);
        call.enqueue(callback);
    }

    public void getDietes(String token, Callback<DietesResponse> callback){
        Call<DietesResponse> call = mApiService.getDietes("Bearer "+ token);
        call.enqueue(callback);
    }


    public void updatePassword(String token, ChangePasswordRequest change, Callback<ChangePasswordResponse> callback){
        Call<ChangePasswordResponse> call = mApiService.updatePassword("Bearer " + token,change);
        call.enqueue(callback);
    }

    public void updateUser(String token, ChangeUserRequest change, Callback<ChangeUserResponse>callback){
        Call<ChangeUserResponse> call = mApiService.updateUser("Bearer " + token,change);
        call.enqueue(callback);
    }


    public void getDishes(String token, String parameter, Callback<Dishes_DietaResponse> callback){
        Call<Dishes_DietaResponse> call = mApiService.getDishes("Bearer "+token, parameter);
        call.enqueue(callback);

    }

}
