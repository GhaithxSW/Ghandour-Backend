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
        Schema::create('research_requests', function (Blueprint $table) {
            $table->id();
            $table->string('phone');

            // $table->foreignIdFor(User::class, 'user_id')
            //     ->constrained()
            //     ->onDelete('cascade');

            // $table->foreignIdFor(EducationLevel::class, 'education_level_id')
            //     ->constrained()
            //     ->onDelete('cascade');

            $table->string('research_topic');
            $table->string('teacher_name')->nullable();
            $table->string('notes')->nullable();

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
        Schema::dropIfExists('research_requests');
    }
};
