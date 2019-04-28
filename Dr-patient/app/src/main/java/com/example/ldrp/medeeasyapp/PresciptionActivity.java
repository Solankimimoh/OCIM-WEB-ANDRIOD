package com.example.ldrp.medeeasyapp;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.ldrp.medeeasyapp.adapter.AppoinmentAdapter;
import com.example.ldrp.medeeasyapp.adapter.PresciptionListAdapter;
import com.example.ldrp.medeeasyapp.app.AppConfig;
import com.example.ldrp.medeeasyapp.doctor.DoctorHomeActivity;
import com.example.ldrp.medeeasyapp.listener.AppoinmentItemClickListener;
import com.example.ldrp.medeeasyapp.listener.PrescriptionItemClickListener;
import com.example.ldrp.medeeasyapp.model.AppoinmentModel;
import com.example.ldrp.medeeasyapp.model.PrescriptionModel;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;

import java.io.File;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Collection;
import java.util.Collections;
import java.util.Date;
import java.util.UUID;

public class PresciptionActivity extends AppCompatActivity implements PrescriptionItemClickListener, View.OnClickListener {


    private static final int PICK_IMG_CODE = 200;
    private FirebaseAuth firebaseAuth;
    private FirebaseDatabase firebaseDatabase;
    private FirebaseStorage firebaseStorage;
    private StorageReference storageReference;
    private DatabaseReference databaseReference;
    private RecyclerView recyclerView;
    private PresciptionListAdapter presciptionListAdapter;
    private ArrayList<PrescriptionModel> prescriptionModelArrayList;

    private EditText titleEd;
    private EditText descriptionEd;
    private Button imageChooseBtn;
    private Button uploadBtn;
    private ProgressDialog progressDialog;


    private Intent intent;
    private Uri selectedFileIntent;
    private String uuid;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_presciption);

        firebaseAuth = FirebaseAuth.getInstance();
        firebaseDatabase = FirebaseDatabase.getInstance();
        databaseReference = firebaseDatabase.getReference();
        firebaseStorage = FirebaseStorage.getInstance();
        storageReference = firebaseStorage.getReference();
        intent = getIntent();
        progressDialog = new ProgressDialog(PresciptionActivity.this);
        initView();

        recyclerView = findViewById(R.id.activity_presciption_rv);

        prescriptionModelArrayList = new ArrayList<>();
        presciptionListAdapter = new PresciptionListAdapter(PresciptionActivity.this, prescriptionModelArrayList, this);
        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(this);
        recyclerView.setAdapter(presciptionListAdapter);
        recyclerView.setLayoutManager(layoutManager);

        uuid = intent.getStringExtra(AppConfig.KEY_PATIENT_UID);


        databaseReference.child(AppConfig.FIREBASE_DB_APPOINMENT).child(firebaseAuth.getCurrentUser().getUid())
                .child(uuid)
                .child(AppConfig.FIREBASE_DB_PRESCRIPTION)
                .addValueEventListener(new ValueEventListener() {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                        prescriptionModelArrayList.clear();
                        for (DataSnapshot prescriptionModelSnapshot : dataSnapshot.getChildren()) {
                            PrescriptionModel prescriptionModel = prescriptionModelSnapshot.getValue(PrescriptionModel.class);
                            prescriptionModelArrayList.add(prescriptionModel);
                        }
                        Collections.reverse(prescriptionModelArrayList);
                        presciptionListAdapter.notifyDataSetChanged();
                    }

                    @Override
                    public void onCancelled(@NonNull DatabaseError databaseError) {

                    }
                });


    }

    private void initView() {
        titleEd = findViewById(R.id.activity_presciption_title);
        descriptionEd = findViewById(R.id.activity_presciption_instruction);
        imageChooseBtn = findViewById(R.id.activity_presciption_image_choose);
        uploadBtn = findViewById(R.id.activity_presciption_upload);

        imageChooseBtn.setOnClickListener(this);
        uploadBtn.setOnClickListener(this);

    }


    @Override
    public void onPrescriptionItemClick(PrescriptionModel prescriptionModel) {
        Intent intent = new Intent(Intent.ACTION_VIEW);
        intent.setData(Uri.parse(prescriptionModel.getImgUrl()));
        startActivity(intent);
    }


    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.activity_presciption_image_choose:

                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M && ContextCompat.checkSelfPermission(this,
                        android.Manifest.permission.READ_EXTERNAL_STORAGE)
                        != PackageManager.PERMISSION_GRANTED) {

                    ActivityCompat.requestPermissions(this, new String[]{android.Manifest.permission.READ_EXTERNAL_STORAGE, android.Manifest.permission.WRITE_EXTERNAL_STORAGE}, 1);
                    return;
                } //creating an intent for file chooser
                Intent intent = new Intent();
                intent.setType("image/*");
                intent.setAction(Intent.ACTION_GET_CONTENT);
                startActivityForResult(Intent.createChooser(intent, "Select Picture"), PICK_IMG_CODE);

                break;
            case R.id.activity_presciption_upload:
                Toast.makeText(this, "sadasd", Toast.LENGTH_SHORT).show();
                uploadImage();
                break;
        }
    }

    private void uploadImage() {

        if (selectedFileIntent != null) {
            progressDialog.setTitle("Prescription Upload");
            progressDialog.setMessage("file uploading....");
            progressDialog.show();
            final StorageReference sRef = storageReference.child("prescription/" + UUID.randomUUID());

            sRef.putFile(selectedFileIntent)
                    .addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>() {
                        @Override
                        public void onSuccess(UploadTask.TaskSnapshot taskSnapshot) {

                            sRef.getDownloadUrl().addOnSuccessListener(new OnSuccessListener<Uri>() {
                                @Override
                                public void onSuccess(Uri uri) {

                                    insertDataIntoDatabase(uri.toString());
                                }
                            });
                        }
                    })
                    .addOnFailureListener(new OnFailureListener() {
                        @Override
                        public void onFailure(@NonNull Exception e) {

                        }
                    });

        } else {
            Toast.makeText(this, "Not Image Choose", Toast.LENGTH_SHORT).show();
        }

    }

    private void insertDataIntoDatabase(String url) {

        progressDialog.setMessage("Data inserting...");

        final String title = titleEd.getText().toString().trim();
        final String description = descriptionEd.getText().toString().trim();

        if (title.isEmpty() || description.isEmpty()) {
            Toast.makeText(this, "Not Filled the Data", Toast.LENGTH_SHORT).show();
            progressDialog.dismiss();
        } else {
            Date date = Calendar.getInstance().getTime();
            SimpleDateFormat df = new SimpleDateFormat("dd-MMM-yyyy");
            String formattedDate = df.format(date);
            databaseReference.child(AppConfig.FIREBASE_DB_APPOINMENT)
                    .child(firebaseAuth.getCurrentUser().getUid())
                    .child(uuid)
                    .child(AppConfig.FIREBASE_DB_PRESCRIPTION)
                    .push()
                    .setValue(new PrescriptionModel(title, description, url, formattedDate), new DatabaseReference.CompletionListener() {
                        @Override
                        public void onComplete(@Nullable DatabaseError databaseError, @NonNull DatabaseReference databaseReference) {
                            if (databaseError != null) {
                                Toast.makeText(PresciptionActivity.this, "Error " +
                                        databaseError.getMessage(), Toast.LENGTH_SHORT).show();
                                progressDialog.dismiss();
                            } else {
                                Toast.makeText(PresciptionActivity.this, "Prescirption upload", Toast.LENGTH_SHORT).show();
                                progressDialog.dismiss();
                            }
                        }
                    });
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        //when the user choses the file
        if (requestCode == PICK_IMG_CODE && resultCode == RESULT_OK && data != null && data.getData() != null) {
            //if a file is selected
            if (data.getData() != null) {
                //uploading the file
                File file = new File(data.getData().getPathSegments().toString());
                selectedFileIntent = data.getData();

                imageChooseBtn.setText(file.getName().substring(0, file.getName().length() - 1));
            } else {
                Toast.makeText(this, "No file chosen", Toast.LENGTH_SHORT).show();
            }
        }
    }


}
