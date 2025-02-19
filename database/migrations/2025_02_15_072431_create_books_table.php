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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->string('title');
            $table->text('description');
            $table->date('publish_date');
            $table->bigInteger('price');
            $table->integer('stock');   
            // $table->foreignId('author_id')->constrained(
            //     table: 'users',
            //     indexName: 'books_author_id'
            // )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
