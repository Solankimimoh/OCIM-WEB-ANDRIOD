package com.example.ldrp.medeeasyapp.model;

public class PatientReviewModel {


    private String patientUUID;
    private String title;
    private String description;
    private String date;


    public PatientReviewModel() {
    }

    public PatientReviewModel(String patientUUID, String title, String description, String date) {
        this.patientUUID = patientUUID;
        this.title = title;
        this.description = description;
        this.date = date;
    }

    public PatientReviewModel(String title, String description, String date) {
        this.title = title;
        this.description = description;
        this.date = date;
    }


    public String getPatientUUID() {
        return patientUUID;
    }

    public void setPatientUUID(String patientUUID) {
        this.patientUUID = patientUUID;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }
}
