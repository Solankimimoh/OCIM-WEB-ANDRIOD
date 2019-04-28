package com.example.ldrp.medeeasyapp;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;

import com.example.ldrp.medeeasyapp.adapter.DoctorListAdapter;
import com.example.ldrp.medeeasyapp.adapter.HospitalListAdapter;
import com.example.ldrp.medeeasyapp.app.AppConfig;
import com.example.ldrp.medeeasyapp.listener.DoctorItemClickListener;
import com.example.ldrp.medeeasyapp.listener.HospitalItemClickListener;
import com.example.ldrp.medeeasyapp.model.DoctorModel;
import com.example.ldrp.medeeasyapp.model.HospitalModel;
import com.example.ldrp.medeeasyapp.patient.BookAppoinmentActivity;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class HospitalListActivity extends AppCompatActivity implements DoctorItemClickListener {

    private ArrayList<DoctorModel> doctorModelArrayList;
    private DoctorListAdapter doctorListAdapter;
    private FirebaseDatabase firebaseDatabase;
    private DatabaseReference databaseReference;
    private FirebaseAuth firebaseAuth;
    private RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hospital_list);

        firebaseAuth = FirebaseAuth.getInstance();
        firebaseDatabase = FirebaseDatabase.getInstance();
        databaseReference = firebaseDatabase.getReference();

        recyclerView = findViewById(R.id.activity_hospital_list_rv);

        doctorModelArrayList = new ArrayList<>();
        doctorListAdapter = new DoctorListAdapter(HospitalListActivity.this,
                doctorModelArrayList, this);
        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(this);
        recyclerView.setAdapter(doctorListAdapter);
        recyclerView.setLayoutManager(layoutManager);

        Intent intent = getIntent();
        final String pushKey = intent.getStringExtra(AppConfig.KEY_HOSPITAL_UID);

        databaseReference
                .child(AppConfig.FIREBASE_DB_DOCTOR)
                .addValueEventListener(new ValueEventListener() {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                        for (DataSnapshot doctorModels : dataSnapshot.getChildren()) {
                            DoctorModel doctorModel = doctorModels.getValue(DoctorModel.class);
                            if (doctorModel.getHospitalUID().equals(pushKey)) {
                                doctorModel.setUid(doctorModels.getKey());
                                doctorModelArrayList.add(doctorModel);

                            }
                        }
                        doctorListAdapter.notifyDataSetChanged();
                    }

                    @Override
                    public void onCancelled(@NonNull DatabaseError databaseError) {

                    }
                });

    }


    @Override
    public void onDoctorItemClick(DoctorModel doctorModel, View view) {
        final Intent gotoBookAppointment = new Intent(HospitalListActivity.this,
                BookAppoinmentActivity.class);
        gotoBookAppointment.putExtra(AppConfig.KEY_DOCTOR_UID, doctorModel.getUid());
        startActivity(gotoBookAppointment);
    }
}
