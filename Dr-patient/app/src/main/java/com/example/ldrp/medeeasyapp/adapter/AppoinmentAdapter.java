package com.example.ldrp.medeeasyapp.adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ldrp.medeeasyapp.R;
import com.example.ldrp.medeeasyapp.listener.AppoinmentItemClickListener;
import com.example.ldrp.medeeasyapp.listener.DoctorItemClickListener;
import com.example.ldrp.medeeasyapp.model.AppoinmentModel;
import com.example.ldrp.medeeasyapp.model.DoctorModel;

import java.util.ArrayList;

public class AppoinmentAdapter extends RecyclerView.Adapter<AppoinmentAdapter.MyViewHolder> {


    private Context context;
    private ArrayList<AppoinmentModel> appoinmentModelArrayList;
    private AppoinmentItemClickListener appoinmentItemClickListener;

    public AppoinmentAdapter(Context context, ArrayList<AppoinmentModel> appoinmentModelArrayList, AppoinmentItemClickListener appoinmentItemClickListener) {
        this.context = context;
        this.appoinmentModelArrayList = appoinmentModelArrayList;
        this.appoinmentItemClickListener = appoinmentItemClickListener;
    }

    public void updateList(ArrayList<AppoinmentModel> searchArrayList) {
        appoinmentModelArrayList = new ArrayList<>();
        appoinmentModelArrayList.addAll(searchArrayList);
        notifyDataSetChanged();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private AppoinmentModel appoinmentModel;
        private TextView nameTv;
        private TextView emailTv;
        private TextView mobileTv;
        private TextView purposeTv;
        private TextView dateTv;
        private TextView timeTv;
        private TextView remarksTv;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);
            nameTv = itemView.findViewById(R.id.row_layout_appoinment_patient_name);
            emailTv = itemView.findViewById(R.id.row_layout_appoinment_patient_email);
            mobileTv = itemView.findViewById(R.id.row_layout_appoinment_patient_mobile);
            purposeTv = itemView.findViewById(R.id.row_layout_appoinment_patient_purpose);
            dateTv = itemView.findViewById(R.id.row_layout_appoinment_patient_date);
            timeTv = itemView.findViewById(R.id.row_layout_appoinment_patient_time);
            remarksTv = itemView.findViewById(R.id.row_layout_appoinment_patient_remarks);

            itemView.setOnClickListener(this);
        }

        public void setData(AppoinmentModel appoinmentModel) {
            this.appoinmentModel = appoinmentModel;
            nameTv.setText(appoinmentModel.getPatientModel().getName());
            emailTv.setText(appoinmentModel.getPatientModel().getEmail());
            mobileTv.setText(appoinmentModel.getPatientModel().getMobile());
            purposeTv.setText(appoinmentModel.getPurpose());
            dateTv.setText(appoinmentModel.getDate());
            timeTv.setText(appoinmentModel.getTime());
            remarksTv.setText(appoinmentModel.getRemarks());
        }

        @Override
        public void onClick(View v) {
            if (appoinmentItemClickListener != null) {
                appoinmentItemClickListener.onAppoinmentItemClick(appoinmentModel, v);
            }
        }
    }

    @NonNull
    @Override
    public AppoinmentAdapter.MyViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        final View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.row_layout_appoinment_list, viewGroup, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull AppoinmentAdapter.MyViewHolder myViewHolder, int i) {

        AppoinmentModel appoinmentModel = appoinmentModelArrayList.get(i);
        myViewHolder.setData(appoinmentModel);
    }

    @Override
    public int getItemCount() {
        return appoinmentModelArrayList.size();
    }

}
