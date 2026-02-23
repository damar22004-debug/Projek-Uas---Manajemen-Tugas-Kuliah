package com.example.projekappmanajementugaskuliah;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory; // Pastikan pakai titik (.), bukan colon (:)

public class RetrofitClient {
    // 10.0.2.2 adalah localhost dari perspektif Android emulator
    private static final String BASE_URL = "http://10.0.2.2:8000/api/"; 
    private static Retrofit retrofit = null;

    public static TaskService getService() {
        if (retrofit == null) {
            retrofit = new Retrofit.Builder()
                    .baseUrl(BASE_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }
        return retrofit.create(TaskService.class);
    }
}