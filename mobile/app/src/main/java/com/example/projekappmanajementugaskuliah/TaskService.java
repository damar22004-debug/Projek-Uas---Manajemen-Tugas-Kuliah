package com.example.projekappmanajementugaskuliah;

import java.util.List;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface TaskService {
    @FormUrlEncoded
    @POST("register")
    Call<Void> registerUser(@Field("name") String name, @Field("email") String email, @Field("password") String password);

    @FormUrlEncoded
    @POST("login")
    Call<Void> loginUser(@Field("email") String email, @Field("password") String password);

    @GET("tasks")
    Call<List<Task>> getTasks(); // Memperbaiki error di MainActivity

    @FormUrlEncoded
    @POST("tasks")
    Call<Void> addTask(@Field("title") String title, @Field("description") String desc); // Memperbaiki error di AddTaskActivity
}