package api;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;


import java.util.Date;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.Map;

import model.Historial_Pacient;
import model.User;


public class Registre_api {



    //Request de inici de sessió
    public static void postLoginRequest(RequestQueue queue, String url, String nickname, String password, final Response.Listener<User> listener, final Response.ErrorListener errorListener) {
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


//Request del historial del pacient mes recent
    public static void getUserData(RequestQueue queue, String url, String token, final Response.Listener<Historial_Pacient> listener, final Response.ErrorListener errorListener) {
        JsonObjectRequest request = new JsonObjectRequest(
                Request.Method.GET,
                url,
                null,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            JSONArray data = response.getJSONArray("data");

                            JSONObject entrada = data.getJSONObject(0);

                            long id = entrada.getLong("id");
                            String date = entrada.getString("date");
                            long diet = entrada.getLong("diet");
                            long id_pacient = entrada.getLong("id_pacient");
                            double weigth= entrada.getDouble("weigth");
                            double heigth=entrada.getDouble("heigth");
                            double chest= entrada.getDouble("chest");
                            double leg= entrada.getDouble("leg");
                            double arm = entrada.getDouble("arm");
                            double hip = entrada.getDouble("hip");

                            Date date1 = new Date(date);
                            GregorianCalendar finaldate = new GregorianCalendar();
                            finaldate.setGregorianChange(date1);

                            Historial_Pacient historial = new Historial_Pacient(id,finaldate,diet,id_pacient,weigth,heigth,chest,leg,arm,hip);



                            listener.onResponse(historial);

                        } catch (JSONException e) {
                            errorListener.onErrorResponse(new VolleyError("Error al analizar la respuesta"));
                        }


                    }
                },
                errorListener
        ) {
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                Map<String, String> headers = new HashMap<>();
                headers.put("Authorization", "Bearer " + token);
                return headers;
            }
        };

        queue.add(request);
    }




}
