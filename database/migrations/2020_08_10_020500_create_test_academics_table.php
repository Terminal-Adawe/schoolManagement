<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');

            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedBigInteger('subject_id');

            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->string('term');

            $table->bigInteger('test_score')->default(0);

            $table->timestamp('date_taken')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_academics');
    }
}
