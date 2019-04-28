package com.example.ldrp.medeeasyapp.model;

public class HospitalModel {

    private String pushkey;
    private String address;
    private String ambulancephone;
    private String bed;
    private String caretype;
    private String category;
    private String email;
    private String emergencynumber;
    private String faxnumber;
    private String helpline;
    private String licence;
    private String medicine;
    private String mobile;
    private String name;
    private String password;
    private String services;
    private String time;
    private String tollfree;
    private boolean verify;
    private String website;
    private String photoUrl;

    public String getPhotoUrl() {
        return photoUrl;
    }

    public void setPhotoUrl(String photoUrl) {
        this.photoUrl = photoUrl;
    }

    public boolean isVerify() {
        return verify;
    }

    public HospitalModel() {
    }

    public String getPushkey() {
        return pushkey;
    }

    public void setPushkey(String pushkey) {
        this.pushkey = pushkey;
    }



    public HospitalModel(String address, String ambulancephone, String bed, String caretype, String category, String email, String emergencynumber, String faxnumber, String helpline, String licence, String medicine, String mobile, String name, String password, String services, String time, String tollfree, boolean verify, String website) {
        this.address = address;
        this.ambulancephone = ambulancephone;
        this.bed = bed;
        this.caretype = caretype;
        this.category = category;
        this.email = email;
        this.emergencynumber = emergencynumber;
        this.faxnumber = faxnumber;
        this.helpline = helpline;
        this.licence = licence;
        this.medicine = medicine;
        this.mobile = mobile;
        this.name = name;
        this.password = password;
        this.services = services;
        this.time = time;
        this.tollfree = tollfree;
        this.verify = verify;
        this.website = website;
    }


    // Getter Methods

    public String getAddress() {
        return address;
    }

    public String getAmbulancephone() {
        return ambulancephone;
    }

    public String getBed() {
        return bed;
    }

    public String getCaretype() {
        return caretype;
    }

    public String getCategory() {
        return category;
    }

    public String getEmail() {
        return email;
    }

    public String getEmergencynumber() {
        return emergencynumber;
    }

    public String getFaxnumber() {
        return faxnumber;
    }

    public String getHelpline() {
        return helpline;
    }

    public String getLicence() {
        return licence;
    }

    public String getMedicine() {
        return medicine;
    }

    public String getMobile() {
        return mobile;
    }

    public String getName() {
        return name;
    }

    public String getPassword() {
        return password;
    }

    public String getServices() {
        return services;
    }

    public String getTime() {
        return time;
    }

    public String getTollfree() {
        return tollfree;
    }


    public String getWebsite() {
        return website;
    }

    // Setter Methods

    public void setAddress(String address) {
        this.address = address;
    }

    public void setAmbulancephone(String ambulancephone) {
        this.ambulancephone = ambulancephone;
    }

    public void setBed(String bed) {
        this.bed = bed;
    }

    public void setCaretype(String caretype) {
        this.caretype = caretype;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setEmergencynumber(String emergencynumber) {
        this.emergencynumber = emergencynumber;
    }

    public void setFaxnumber(String faxnumber) {
        this.faxnumber = faxnumber;
    }

    public void setHelpline(String helpline) {
        this.helpline = helpline;
    }

    public void setLicence(String licence) {
        this.licence = licence;
    }

    public void setMedicine(String medicine) {
        this.medicine = medicine;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public void setServices(String services) {
        this.services = services;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public void setTollfree(String tollfree) {
        this.tollfree = tollfree;
    }


    public void setWebsite(String website) {
        this.website = website;
    }


}
