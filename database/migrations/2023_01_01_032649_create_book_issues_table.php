<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reader_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained();
            $table->timestamp('issue_date');
            $table->timestamp('return_date')->nullable();
            $table->string('issue_status')->nullable();
            $table->timestamp('return_day')->nullable();
            $table->string('fine')->nullable();
            $table->string('fine_status')->nullable();
            $table->string('fine_paid_date')->nullable();
            $table->string('fine_paid_by')->nullable();
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
        Schema::dropIfExists('book_issues');
    }
}
