package api;

import org.json.JSONException;
import org.json.JSONObject;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;


import java.util.HashMap;
import java.util.Map;

import model.User;


public class Registre_api {


    /*public static void hacerSolicitud(RequestQueue queue, final EditText edtName) {
        String url = "http://169.254.70.172/Projecte3/dietapp_ws/public/api/diets";

        JsonObjectRequest request = new JsonObjectRequest(
                Request.Method.GET,
                url,
                null,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            String name = null;
                            JSONArray results = response.getJSONArray("data");
                            for(int i =0; i<results.length();i++){
                                JSONObject ob = results.getJSONObject(i);

                                name = ob.getString("name");
                            }


                            User pokemon = new User(name);
                            edtName.setText(pokemon.getNickname_User());
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        error.printStackTrace();
                    }
                }
        );

        queue.add(request);
    }
*/


    //Request de inici de sessió
    public static void postRequest(RequestQueue queue, String url, String nickname, String password, final Response.Listener<User> listener, final Response.ErrorListener errorListener) {
        Map<String, String> params = new HashMap<>();
        params.put("nickname_user", nickname);
        params.put("password", password);

        StringRequest request = new StringRequest(
                Request.Method.POST,
                url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonResponse = new JSONObject(response);

                            JSONObject data = jsonResponse.getJSONObject("data");

                            //Token user
                            String token = data.getString("token");
                            JSONObject user = data.getJSONObject("user");

                            //Recollim la informació del usuari
                            long id= user.getLong("id");
                            String name_user = user.getString("name_user");
                            String lastname_user=user.getString("lastname_user");
                            String nickname_user=user.getString("nickname_user");
                            char type_user=user.getString("type_user").charAt(0);
                            String email_user=user.getString("email_user");

                            //Creem un objecte User amb la infoemació

                            User login = new User(id,name_user,lastname_user,nickname_user,type_user,email_user,token);


                            listener.onResponse(login); // Devolver el valor del token al listener
                        } catch (JSONException e) {
                            errorListener.onErrorResponse(new VolleyError("Error al analizar la respuesta"));
                        }
                    }
                },
                errorListener
        ) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                return params;
            }
        };

        queue.add(request);
    }


}
