package com.example.ldrp.medeeasyapp.adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.ldrp.medeeasyapp.R;
import com.example.ldrp.medeeasyapp.listener.DoctorItemClickListener;
import com.example.ldrp.medeeasyapp.listener.HospitalItemClickListener;
import com.example.ldrp.medeeasyapp.model.DoctorModel;
import com.example.ldrp.medeeasyapp.model.HospitalModel;

import java.util.ArrayList;

public class HospitalListAdapter extends RecyclerView.Adapter<HospitalListAdapter.MyViewHolder> {


    private Context context;
    private ArrayList<HospitalModel> hospitalModelArrayList;
    private HospitalItemClickListener hospitalItemClickListener;


    public HospitalListAdapter(Context context, ArrayList<HospitalModel> hospitalModelArrayList, HospitalItemClickListener hospitalItemClickListener) {
        this.context = context;
        this.hospitalModelArrayList = hospitalModelArrayList;
        this.hospitalItemClickListener = hospitalItemClickListener;
    }

    public void updateList(ArrayList<HospitalModel> searchArrayList) {
        hospitalModelArrayList = new ArrayList<>();
        hospitalModelArrayList.addAll(searchArrayList);
        notifyDataSetChanged();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private HospitalModel hospitalModel;
        private TextView addressTv;
        private TextView ambulancephoneTv;
        private TextView bedTv;
        private TextView caretypeTv;
        private TextView categoryTv;
        private TextView emailTv;
        private TextView emergencynumberTv;
        private TextView faxnumberTv;
        private TextView helplineTv;
        private TextView licenceTv;
        private TextView medicineTv;
        private TextView mobileTv;
        private TextView nameTv;
        private TextView passwordTv;
        private TextView servicesTv;
        private TextView timeTv;
        private TextView tollfreeTv;
        private TextView websiteTv;
        private ImageView img;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);
            nameTv = itemView.findViewById(R.id.row_layout_hospital_name);
            emailTv = itemView.findViewById(R.id.row_layout_hospital_email);
            mobileTv = itemView.findViewById(R.id.row_layout_hospital_mobile);
            addressTv = itemView.findViewById(R.id.row_layout_hospital_address);
            categoryTv = itemView.findViewById(R.id.row_layout_hospital_category);
            websiteTv = itemView.findViewById(R.id.row_layout_hospital_website);
            img = itemView.findViewById(R.id.row_layout_hospital_img);

            itemView.setOnClickListener(this);
        }

        public void setData(HospitalModel hospitalModel) {
            this.hospitalModel = hospitalModel;
            nameTv.setText(hospitalModel.getName());
            emailTv.setText(hospitalModel.getEmail());
            mobileTv.setText(hospitalModel.getMobile());
            addressTv.setText(hospitalModel.getAddress());
            categoryTv.setText(hospitalModel.getCaretype());
            websiteTv.setText(hospitalModel.getWebsite());
            Glide.with(context)
                    .load(hospitalModel.getPhotoUrl())
                    .placeholder(R.mipmap.ic_launcher_round)
                    .into(img);
        }

        @Override
        public void onClick(View v) {
            if (hospitalItemClickListener != null) {
                hospitalItemClickListener.onHospitalItemClick(hospitalModel, v);
            }
        }
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        final View view = LayoutInflater.from(viewGroup.getContext())
                .inflate(R.layout.row_layout_hospital_list, viewGroup, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder myViewHolder, int i) {

        HospitalModel hospitalModel = hospitalModelArrayList.get(i);
        myViewHolder.setData(hospitalModel);
    }

    @Override
    public int getItemCount() {
        return hospitalModelArrayList.size();
    }

}
