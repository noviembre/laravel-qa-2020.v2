<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAnswersInQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan make:migration rename_answers_in_questions_table --table=questions
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            #----- enter the name of the rename column, and the new name column
            $table->renameColumn('answers', 'answers_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            // here is the opposite
            $table->renameColumn('answers_count', 'answers');
        });
    }
}
