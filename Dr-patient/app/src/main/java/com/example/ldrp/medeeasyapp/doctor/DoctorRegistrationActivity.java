package com.example.ldrp.medeeasyapp.doctor;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.ldrp.medeeasyapp.R;
import com.example.ldrp.medeeasyapp.app.AppConfig;
import com.example.ldrp.medeeasyapp.model.DoctorModel;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class DoctorRegistrationActivity extends AppCompatActivity implements View.OnClickListener {


    private EditText nameEd;
    private EditText emailEd;
    private EditText passwordEd;
    private EditText mobileEd;
    private EditText addressEd;
    private EditText licenseEd;
    private EditText educationEd;
    private EditText typesEd;
    private Button doctorSingupBtn;
    private Button chooseLicensebtn;

    private ProgressDialog progressDialog;

    private FirebaseAuth firebaseAuth;
    private FirebaseDatabase firebaseDatabase;
    private DatabaseReference databaseReference;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_doctor_registration);
        firebaseAuth = FirebaseAuth.getInstance();
        firebaseDatabase = FirebaseDatabase.getInstance();
        databaseReference = firebaseDatabase.getReference();
        initView();

    }

    private void initView() {

        nameEd = findViewById(R.id.activity_doctor_registration_name_ed);
        emailEd = findViewById(R.id.activity_doctor_registration_email_ed);
        passwordEd = findViewById(R.id.activity_doctor_registration_password_ed);
        mobileEd = findViewById(R.id.activity_doctor_registration_mobile_ed);
        addressEd = findViewById(R.id.activity_doctor_registration_address_ed);
        licenseEd = findViewById(R.id.activity_doctor_registration_license_ed);
        educationEd = findViewById(R.id.activity_doctor_registration_educatuion_ed);
        typesEd = findViewById(R.id.activity_doctor_registration_types);

        progressDialog = new ProgressDialog(DoctorRegistrationActivity.this);

        doctorSingupBtn = findViewById(R.id.activity_signup_signup_btn);
        chooseLicensebtn = findViewById(R.id.activity_signup_signup_choose_license);
        doctorSingupBtn.setOnClickListener(this);
        chooseLicensebtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M && ContextCompat.checkSelfPermission(DoctorRegistrationActivity.this,
                        android.Manifest.permission.READ_EXTERNAL_STORAGE)
                        != PackageManager.PERMISSION_GRANTED) {

                    ActivityCompat.requestPermissions(DoctorRegistrationActivity.this, new String[]{android.Manifest.permission.READ_EXTERNAL_STORAGE, android.Manifest.permission.WRITE_EXTERNAL_STORAGE}, 1);
                    return;
                } //creating an intent for file chooser
                Intent intent = new Intent();
                intent.setType("image/*");
                intent.setAction(Intent.ACTION_GET_CONTENT);
                startActivityForResult(Intent.createChooser(intent, "Select Picture"), 100);

            }
        });


    }

    @Override
    public void onClick(View v) {

        progressDialog.setTitle("Account Create");
        progressDialog.setMessage("Account Creating...");
        progressDialog.show();
        final String name = nameEd.getText().toString().trim();
        final String email = emailEd.getText().toString().trim();
        final String password = passwordEd.getText().toString().trim();
        final String mobile = mobileEd.getText().toString().trim();
        final String address = addressEd.getText().toString().trim();
        final String license = licenseEd.getText().toString().trim();
        final String education = educationEd.getText().toString().trim();
        final String types = typesEd.getText().toString().trim();

        if (name.isEmpty() || email.isEmpty() || password.isEmpty()
                || mobile.isEmpty() || address.isEmpty() || license.isEmpty() ||
                education.isEmpty() || types.isEmpty()) {
            Toast.makeText(this, "Please fill the details", Toast.LENGTH_SHORT).show();
            progressDialog.dismiss();
        } else {

            if (passwordEd.getText().toString().length() < 8 || !isValidPassword(passwordEd.getText().toString())) {

                progressDialog.dismiss();
                Toast.makeText(this, "Please enter 8 char and match password policy", Toast.LENGTH_SHORT).show();
            } else {

                firebaseAuth.createUserWithEmailAndPassword(email, password)
                        .addOnCompleteListener(DoctorRegistrationActivity.this, new OnCompleteListener<AuthResult>() {
                            @Override
                            public void onComplete(@NonNull Task<AuthResult> task) {
                                if (task.isSuccessful()) {
                                    insertInToDatabase(name, email, password, mobile, address, license, education, types);
                                    progressDialog.dismiss();
                                } else {
                                    progressDialog.dismiss();
                                    Toast.makeText(DoctorRegistrationActivity.this, "Error " + task.getException(), Toast.LENGTH_SHORT).show();
                                }

                            }
                        });
            }

        }


    }

    public static boolean isValidPassword(final String password) {

        Pattern pattern;
        Matcher matcher;
        final String PASSWORD_PATTERN = "^(?=.*[0-9])(?=.*[A-Z])(?=.*[@#$%^&+=!])(?=\\S+$).{4,}$";
        pattern = Pattern.compile(PASSWORD_PATTERN);
        matcher = pattern.matcher(password);

        return matcher.matches();

    }

    private void insertInToDatabase(String name, String email, String password, String mobile, String address, String license, String education, String types) {

        progressDialog.setMessage("Data inserting...");

        databaseReference.child(AppConfig.FIREBASE_DB_DOCTOR)
                .child(firebaseAuth.getCurrentUser().getUid())
                .setValue(new DoctorModel(name, email, password, mobile,
                        address, license, education, types), new DatabaseReference.CompletionListener() {
                    @Override
                    public void onComplete(@Nullable DatabaseError databaseError, @NonNull DatabaseReference databaseReference) {
                        if (databaseError != null) {
                            progressDialog.dismiss();
                            Toast.makeText(DoctorRegistrationActivity.this, "Error " + databaseError.getDetails(), Toast.LENGTH_SHORT).show();
                        } else {
                            progressDialog.dismiss();
                            Toast.makeText(DoctorRegistrationActivity.this, "Doctor Profile Created", Toast.LENGTH_SHORT).show();
                            finish();
                        }
                    }
                });
    }
}
