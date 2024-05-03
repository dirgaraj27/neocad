<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('doctor_name');
            $table->string('gender');
            $table->string('patient_name');
            $table->foreignId('service_type_id')->constrained('service_types')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string('due_date')->nullable();
            $table->string('tooth')->nullable();
            $table->string('stump_shade');
            $table->string('final_shade');
            $table->string('case_type');
            $table->string('pickup');
            $table->string('pickup_note')->nullable();
            $table->string('pickup_date')->nullable();
            $table->text('doctor_note');
            $table->string('image')->nullable();
            $table->decimal('total_cost', 8, 2);
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
