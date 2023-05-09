package api;

import model.HistorialResponse;
import model.LoginResponse;
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



}
