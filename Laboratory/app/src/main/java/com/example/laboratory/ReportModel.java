package com.example.laboratory;

public class ReportModel {

    private String patientUUID;
    private String title;
    private String description;
    private String fileUrl;
    private String date;


    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public ReportModel( String title, String description, String fileUrl, String date) {
        this.title = title;
        this.description = description;
        this.fileUrl = fileUrl;
        this.date = date;
    }

    public ReportModel(String patientUUID, String title, String description, String fileUrl, String date) {
        this.patientUUID = patientUUID;
        this.title = title;
        this.description = description;
        this.fileUrl = fileUrl;
        this.date = date;
    }

    public ReportModel(String title, String description, String fileUrl) {
        this.title = title;
        this.description = description;
        this.fileUrl = fileUrl;
    }

    public ReportModel() {
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

    public String getFileUrl() {
        return fileUrl;
    }

    public void setFileUrl(String fileUrl) {
        this.fileUrl = fileUrl;
    }
}
