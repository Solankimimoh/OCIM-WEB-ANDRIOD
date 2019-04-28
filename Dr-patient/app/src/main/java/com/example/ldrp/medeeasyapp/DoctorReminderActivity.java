package com.example.ldrp.medeeasyapp;

import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.app.TimePickerDialog;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.TimePicker;
import android.widget.Toast;

import com.example.ldrp.medeeasyapp.adapter.AppoinmentAdapter;
import com.example.ldrp.medeeasyapp.adapter.ReminderListAdapter;
import com.example.ldrp.medeeasyapp.app.AppConfig;
import com.example.ldrp.medeeasyapp.doctor.DoctorHomeActivity;
import com.example.ldrp.medeeasyapp.listener.AppoinmentItemClickListener;
import com.example.ldrp.medeeasyapp.listener.ReminderItemClickListener;
import com.example.ldrp.medeeasyapp.model.AppoinmentModel;
import com.example.ldrp.medeeasyapp.model.PatientReviewModel;
import com.example.ldrp.medeeasyapp.model.ReminderModel;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.Calendar;

public class DoctorReminderActivity extends AppCompatActivity implements ReminderItemClickListener, View.OnClickListener {
    private FirebaseAuth firebaseAuth;
    private FirebaseDatabase firebaseDatabase;
    private DatabaseReference databaseReference;
    private RecyclerView recyclerView;
    private ReminderListAdapter reminderListAdapter;
    private ArrayList<ReminderModel> reminderModelArrayList;

    private EditText titleEd;
    private EditText descriptionEd;
    private TextView timeTv;
    private TextView dateTv;
    private Button reminderBtn;
    private ProgressDialog progressDialog;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_doctor_reminder);
        firebaseAuth = FirebaseAuth.getInstance();
        firebaseDatabase = FirebaseDatabase.getInstance();
        databaseReference = firebaseDatabase.getReference();
        progressDialog = new ProgressDialog(DoctorReminderActivity.this);
        initView();

        recyclerView = findViewById(R.id.activity_doctor_reminder_rv);

        reminderModelArrayList = new ArrayList<>();
        reminderListAdapter = new ReminderListAdapter(DoctorReminderActivity.this, reminderModelArrayList, this);
        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(this);
        recyclerView.setAdapter(reminderListAdapter);
        recyclerView.setLayoutManager(layoutManager);


        databaseReference.child(AppConfig.FIREBASE_DB_DOCTOR_REMINDER)
                .child(firebaseAuth.getCurrentUser().getUid())
                .addValueEventListener(new ValueEventListener() {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                        reminderModelArrayList.clear();
                        for (DataSnapshot reminderModelSnapshot : dataSnapshot.getChildren()) {
                            ReminderModel reminderModel = reminderModelSnapshot.getValue(ReminderModel.class);
                            reminderModelArrayList.add(reminderModel);
                        }
                        reminderListAdapter.notifyDataSetChanged();
                    }

                    @Override
                    public void onCancelled(@NonNull DatabaseError databaseError) {

                    }
                });

    }

    private void initView() {

        titleEd = findViewById(R.id.activity_doctor_reminder_title);
        descriptionEd = findViewById(R.id.activity_doctor_reminder_description);
        reminderBtn = findViewById(R.id.activity_doctor_reminder_btn);

        timeTv = findViewById(R.id.activity_doctor_reminder_time);
        dateTv = findViewById(R.id.activity_doctor_reminder_date);

        reminderBtn.setOnClickListener(this);
        dateTv.setOnClickListener(this);
        timeTv.setOnClickListener(this);

    }

    @Override
    public void onReminderItemClick(ReminderModel reminderModel) {

    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.activity_doctor_reminder_btn:
                setReminder();
                break;

            case R.id.activity_doctor_reminder_date:
                openDatePicker();
                break;

            case R.id.activity_doctor_reminder_time:
                openTimePicker();
                break;
        }

    }

    private void openTimePicker() {
        final Calendar calendar = Calendar.getInstance();

        final int mHour = calendar.get(Calendar.HOUR);
        final int mMinute = calendar.get(Calendar.MINUTE);

        final TimePickerDialog timePickerDialog = new TimePickerDialog(DoctorReminderActivity.this, new TimePickerDialog.OnTimeSetListener() {
            @Override
            public void onTimeSet(TimePicker view, int hourOfDay, int minute) {
                timeTv.setText(hourOfDay + ":" + minute);
            }
        }, mHour, mMinute, false);

        timePickerDialog.show();
    }

    private void openDatePicker() {

        final Calendar calendar = Calendar.getInstance();
        final int mDay = calendar.get(Calendar.DAY_OF_MONTH);
        final int mMonth = calendar.get(Calendar.MONTH);
        final int mYear = calendar.get(Calendar.YEAR);

        final DatePickerDialog datePickerDialog = new DatePickerDialog(DoctorReminderActivity.this, new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                dateTv.setText(dayOfMonth + "/" + (month+1) + "/" + year);

            }
        }, mYear, mMonth, mDay);

        datePickerDialog.show();
    }

    public void setReminder() {
        progressDialog.setTitle("Reminder");
        progressDialog.setMessage("Reminder Insert......");
        progressDialog.show();

        final String title = titleEd.getText().toString().trim();
        final String description = descriptionEd.getText().toString().trim();
        final String date = dateTv.getText().toString().trim();
        final String time = timeTv.getText().toString().trim();

        if (!title.isEmpty() || !description.isEmpty() || !date.isEmpty() || !time.isEmpty()) {
            databaseReference.child(AppConfig.FIREBASE_DB_DOCTOR_REMINDER)
                    .child(firebaseAuth.getCurrentUser().getUid())
                    .push()
                    .setValue(new ReminderModel(title, description, date, time), new DatabaseReference.CompletionListener() {
                        @Override
                        public void onComplete(@Nullable DatabaseError databaseError, @NonNull DatabaseReference databaseReference) {
                            if (databaseError != null) {
                                Toast.makeText(DoctorReminderActivity.this, "Error " +
                                        databaseError.getMessage(), Toast.LENGTH_SHORT).show();
                                progressDialog.dismiss();
                            } else {
                                Toast.makeText(DoctorReminderActivity.this, "Reminder Set", Toast.LENGTH_SHORT).show();
                                progressDialog.dismiss();
                            }
                        }
                    });
        } else {
            Toast.makeText(this, "Please fill the details", Toast.LENGTH_SHORT).show();
        }

    }
}
