package com.example.ldrp.medeeasyapp.model;

public class ReviewModel {
    private String hospitalUid;
    private String title;
    private String description;
    private String userEmail;

    public ReviewModel() {
    }

    public String getUserEmail() {
        return userEmail;
    }

    public void setUserEmail(String userEmail) {
        this.userEmail = userEmail;
    }

    public ReviewModel(String hospitalUid, String title, String description, String userEmail) {
        this.hospitalUid = hospitalUid;
        this.title = title;
        this.description = description;
        this.userEmail = userEmail;
    }

    public ReviewModel(String hospitalUid, String title, String description) {
        this.hospitalUid = hospitalUid;
        this.title = title;
        this.description = description;
    }

    public String getHospitalUid() {
        return hospitalUid;
    }

    public void setHospitalUid(String hospitalUid) {
        this.hospitalUid = hospitalUid;
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
}
