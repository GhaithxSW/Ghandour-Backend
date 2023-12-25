<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('research_topic');
            $table->string('teacher_name');
            $table->string('research_papers_count');
            $table->string('research_lang');
            $table->string('delivery_date');
            $table->foreignIdFor(User::class, 'user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('education_level');
            $table->string('grade')->nullable();
            $table->string('school_university')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
