package com.example.andrearaffo.tutors;

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by Andrea Raffo on 21/11/2017.
 */

public class RegisterRequest extends StringRequest {

    private static final String REGISTER_REQUEST_URL = "https://webdev.dibris.unige.it/~S4078526/tutorsPHP/register.php";
    private Map<String, String> params;

    public RegisterRequest(String username, String email, String password, String confirmPassword, Response.Listener<String> listener) {
        super(Method.POST, REGISTER_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("Username", username);
        params.put("Email", email);
        params.put("Password", password);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
