<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('auther_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('publisher_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('status')->default('Y');
            $table->integer('published_year');
            $table->date('entry_date');
            $table->integer('price');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->date('lost_date')->nullable();
            $table->date('stock_date')->nullable();
            $table->string('stock_reason')->nullable();
            $table->integer('stock_user_id')->nullable();
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
        Schema::dropIfExists('books');
    }
}
