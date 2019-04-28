package com.example.ldrp.medeeasyapp.model;

public class LaboratoryAppoinmentModel {


    private String purpose;
    private String date;
    private String time;
    private String remarks;
    private boolean status;

    public LaboratoryAppoinmentModel() {
    }

    public LaboratoryAppoinmentModel(String purpose, String date, String time, String remarks, boolean status) {
        this.purpose = purpose;
        this.date = date;
        this.time = time;
        this.remarks = remarks;
        this.status = status;
    }


    public String getPurpose() {
        return purpose;
    }

    public void setPurpose(String purpose) {
        this.purpose = purpose;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public String getRemarks() {
        return remarks;
    }

    public void setRemarks(String remarks) {
        this.remarks = remarks;
    }

    public boolean isStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }
}
