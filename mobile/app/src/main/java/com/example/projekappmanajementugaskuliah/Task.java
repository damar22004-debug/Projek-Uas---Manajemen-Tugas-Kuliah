package com.example.projekappmanajementugaskuliah;

import com.google.gson.annotations.SerializedName;

public class Task {
    // Variabel ini harus sama dengan nama kolom di database Laravel lo
    @SerializedName("id")
    private int id;

    @SerializedName("name")
    private String name;

    @SerializedName("description")
    private String description;

    // Getter untuk mengambil data di Adapter
    public String getName() {
        return name;
    }

    public String getDescription() {
        return description;
    }
}