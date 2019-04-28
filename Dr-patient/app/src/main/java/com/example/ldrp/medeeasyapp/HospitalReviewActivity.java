package com.example.ldrp.medeeasyapp;

import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.ldrp.medeeasyapp.adapter.PresciptionListAdapter;
import com.example.ldrp.medeeasyapp.adapter.ReviewListAdapter;
import com.example.ldrp.medeeasyapp.app.AppConfig;
import com.example.ldrp.medeeasyapp.listener.ReviewItemClickListener;
import com.example.ldrp.medeeasyapp.model.HospitalModel;
import com.example.ldrp.medeeasyapp.model.ReviewModel;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class HospitalReviewActivity extends AppCompatActivity implements View.OnClickListener, AdapterView.OnItemSelectedListener, ReviewItemClickListener {

    private EditText titleEd;
    private EditText descriptionEd;
    private Button addBtn;
    private Spinner hospitalSpinner;
    private RecyclerView recyclerView;
    private ArrayList<String> hospitalStringArrayList;
    private ArrayList<HospitalModel> hospitalModelArrayList;
    private FirebaseAuth firebaseAuth;
    private FirebaseDatabase firebaseDatabase;
    private DatabaseReference databaseReference;
    private String pushKey = "";

    private ArrayList<ReviewModel> reviewModelArrayList;
    private ReviewListAdapter reviewListAdapter;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hospital_review);

        firebaseAuth = FirebaseAuth.getInstance();
        firebaseDatabase = FirebaseDatabase.getInstance();
        databaseReference = firebaseDatabase.getReference();
        titleEd = findViewById(R.id.review_title);
        descriptionEd = findViewById(R.id.review_description);
        addBtn = findViewById(R.id.review_add_btn);
        hospitalSpinner = findViewById(R.id.review_hospita_list);
        recyclerView = findViewById(R.id.review_list_rv);
        hospitalStringArrayList = new ArrayList<>();
        hospitalModelArrayList = new ArrayList<>();
        addBtn.setOnClickListener(this);
        hospitalSpinner.setOnItemSelectedListener(this);
        reviewModelArrayList = new ArrayList<>();
        hospitalStringArrayList.add("All");

        final ArrayAdapter<String> stringArrayAdapter = new ArrayAdapter<>(HospitalReviewActivity.this, android.R.layout.simple_list_item_1, hospitalStringArrayList);
        hospitalSpinner.setAdapter(stringArrayAdapter);

        databaseReference.child(AppConfig.FIREBASE_DB_HOSPITAL)
                .addValueEventListener(new ValueEventListener() {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                        for (DataSnapshot hospitalSnapshot : dataSnapshot.getChildren()) {
                            HospitalModel hospitalModel = hospitalSnapshot.getValue(HospitalModel.class);

                            hospitalModel.setPushkey(hospitalSnapshot.getKey());
                            hospitalStringArrayList.add(hospitalModel.getName());
                            hospitalModelArrayList.add(hospitalModel);
                        }
                    }

                    @Override
                    public void onCancelled(@NonNull DatabaseError databaseError) {

                    }
                });

        databaseReference.child(AppConfig.FIREBASE_DB_HOSPITAL_REVIEW)
                .addValueEventListener(new ValueEventListener() {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                        reviewModelArrayList.clear();
                        for (DataSnapshot reviewSnapshot : dataSnapshot.getChildren()) {
                            ReviewModel reviewModel = reviewSnapshot.getValue(ReviewModel.class);
                            reviewModelArrayList.add(reviewModel);
                            Log.e("TOTO", reviewModelArrayList + "");
                        }
                        reviewListAdapter.notifyDataSetChanged();
                    }

                    @Override
                    public void onCancelled(@NonNull DatabaseError databaseError) {

                    }
                });

        reviewModelArrayList = new ArrayList<>();
        reviewListAdapter = new ReviewListAdapter(HospitalReviewActivity.this, reviewModelArrayList, this);
        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(this);
        recyclerView.setAdapter(reviewListAdapter);
        recyclerView.setLayoutManager(layoutManager);

    }


    @Override
    public void onClick(View v) {

        final String title = titleEd.getText().toString().trim();
        final String description = descriptionEd.getText().toString().trim();
        if (!title.isEmpty() || !description.isEmpty()) {
            if (!pushKey.equals("ALL")) {
                databaseReference.child(AppConfig.FIREBASE_DB_HOSPITAL_REVIEW)
                        .push()
                        .setValue(new ReviewModel(pushKey, title, description, firebaseAuth.getCurrentUser().getEmail()), new DatabaseReference.CompletionListener() {
                            @Override
                            public void onComplete(@Nullable DatabaseError databaseError, @NonNull DatabaseReference databaseReference) {
                                if (databaseError != null) {
                                    Toast.makeText(HospitalReviewActivity.this, "error" + databaseError.getMessage(), Toast.LENGTH_SHORT).show();
                                } else {
                                    Toast.makeText(HospitalReviewActivity.this, "Inserted", Toast.LENGTH_SHORT).show();
                                titleEd.setText("");
                                descriptionEd.setText("");
                                }
                            }
                        });
            } else {
                Toast.makeText(this, "Please select hospital ", Toast.LENGTH_SHORT).show();

            }

        } else {
            Toast.makeText(this, "Please Fill details", Toast.LENGTH_SHORT).show();
        }

    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

        if (reviewModelArrayList.size() > 0) {
            Toast.makeText(this, "NO" + position, Toast.LENGTH_SHORT).show();
            if (position == 0) {
                pushKey = "ALL";
                reviewListAdapter.updateList(reviewModelArrayList);
                reviewListAdapter.notifyDataSetChanged();
            } else {
                pushKey = hospitalModelArrayList.get(position - 1).getPushkey();
                ArrayList<ReviewModel> reviewModels = new ArrayList<>();
                for (int i = 0; i < reviewModelArrayList.size(); i++) {
                    if (reviewModelArrayList.get(i).getHospitalUid().equals(pushKey)) {
                        reviewModels.add(reviewModelArrayList.get(i));
                    }
                }
                reviewListAdapter.updateList(reviewModels);
                reviewListAdapter.notifyDataSetChanged();

            }
        } else {

            if (position == 0) {
                pushKey = "ALL";
            } else {
                pushKey = hospitalModelArrayList.get(position - 1).getPushkey();
            }
        }

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

    @Override
    public void onReviewItemClick(ReviewModel reviewModel) {

    }
}
