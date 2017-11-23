package com.example.andrearaffo.tutors;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;
import android.widget.TextView;

public class UserAreaActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_area);

        final EditText username = (EditText) findViewById(R.id.usernameTextEdit);
        final EditText email = (EditText) findViewById(R.id.emailTextEdit);

    }
}
