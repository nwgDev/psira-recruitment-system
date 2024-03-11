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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('job_description');
            $table->enum('business_unit', ['ICT', 'Human Capital', 'Law Enforcement', 'Finance']);
            $table->string('manager_name');
            $table->string('manager_email');
            $table->integer('required_experience_in_years');
            $table->foreignId('qualification_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('drivers_license')->default(0); // 0 for No, 1 for Yes
            $table->date('opening_date');
            $table->date('closing_date');
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
        Schema::dropIfExists('posts');
    }
};
