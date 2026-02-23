package com.example.projekappmanajementugaskuliah;

import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class AddTaskActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_task);

        EditText etName = findViewById(R.id.et_task_name);
        EditText etDesc = findViewById(R.id.et_task_desc);
        Button btnSave = findViewById(R.id.btn_save_task);

        btnSave.setOnClickListener(v -> {
            String name = etName.getText().toString();
            String desc = etDesc.getText().toString();

            // Panggil Retrofit buat simpan ke database
            RetrofitClient.getService().addTask(name, desc).enqueue(new Callback<Void>() {
                @Override
                public void onResponse(Call<Void> call, Response<Void> response) {
                    if (response.isSuccessful()) {
                        Toast.makeText(AddTaskActivity.this, "Tugas Berhasil Disimpan!", Toast.LENGTH_SHORT).show();
                        finish(); // Tutup halaman ini, balik ke dashboard
                    }
                }
                @Override
                public void onFailure(Call<Void> call, Throwable t) {
                    Toast.makeText(AddTaskActivity.this, "Gagal: " + t.getMessage(), Toast.LENGTH_SHORT).show();
                }
            });
        });
    }
}