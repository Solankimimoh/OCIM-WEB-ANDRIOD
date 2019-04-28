package com.example.ldrp.medeeasyapp.adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ldrp.medeeasyapp.R;
import com.example.ldrp.medeeasyapp.listener.ReportItemClickListener;
import com.example.ldrp.medeeasyapp.listener.ReviewItemClickListener;
import com.example.ldrp.medeeasyapp.model.PatientReviewModel;
import com.example.ldrp.medeeasyapp.model.ReviewModel;

import java.util.ArrayList;

public class ReviewListAdapter extends RecyclerView.Adapter<ReviewListAdapter.MyViewHolder> {


    private Context context;
    private ArrayList<ReviewModel> reviewModelArrayList;
    private ReviewItemClickListener reviewItemClickListener;

    public ReviewListAdapter(Context context, ArrayList<ReviewModel> reviewModelArrayList, ReviewItemClickListener reviewItemClickListener) {
        this.context = context;
        this.reviewModelArrayList = reviewModelArrayList;
        this.reviewItemClickListener = reviewItemClickListener;
    }

    public class MyViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private ReviewModel reviewModel;
        private TextView email;
        private TextView titleTv;
        private TextView descriptionTv;

        public MyViewHolder(@NonNull View itemView) {
            super(itemView);
            titleTv = itemView.findViewById(R.id.row_layout_review_title);
            descriptionTv = itemView.findViewById(R.id.row_layout_review_description);
            email = itemView.findViewById(R.id.row_layout_review_email);

            itemView.setOnClickListener(this);
        }

        public void setData(ReviewModel data) {
            reviewModel = data;
            email.setText(data.getUserEmail());
            titleTv.setText(data.getTitle());
            descriptionTv.setText(data.getDescription());
        }

        @Override
        public void onClick(View v) {
            if (reviewItemClickListener != null) {
                reviewItemClickListener.onReviewItemClick(reviewModel);
            }
        }
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        final View view = LayoutInflater.from(viewGroup.getContext())
                .inflate(R.layout.row_layout_review, viewGroup, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder myViewHolder, int i) {

        ReviewModel reviewModel = reviewModelArrayList.get(i);
        myViewHolder.setData(reviewModel);
        Log.e("TOTOTO", reviewModelArrayList.size() + "");

    }

    public void updateList(ArrayList<ReviewModel> reviewModels) {
        reviewModelArrayList = new ArrayList<>();
        reviewModelArrayList.addAll(reviewModels);
        notifyDataSetChanged();
    }

    @Override
    public int getItemCount() {
        return reviewModelArrayList.size();
    }

}
