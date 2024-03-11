<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('qualification_id')->constrained('qualifications')->onDelete('cascade');
            $table->enum('drivers_license', ['Yes', 'No']);
            $table->string('current_position');
            $table->string('company_name');
            $table->integer('number_year_employed');
            $table->string('current_annual_salary_ctc');
            $table->string('previous_position')->nullable();
            $table->string('previous_company')->nullable();
            $table->date('period_from')->nullable();
            $table->date('period_to')->nullable();
            $table->integer('total_experience_in_years')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
};
