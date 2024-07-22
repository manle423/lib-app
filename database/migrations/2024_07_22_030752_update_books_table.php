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
        //
        Schema::table('books', function (Blueprint $table) {
            //
            $table->renameColumn('author', 'author_id');
            $table->unsignedBigInteger('author_id')->change();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('books', function (Blueprint $table) {
            // $table->dropForeign('author_id');
            $table->string('author_id')->change();
            $table->renameColumn('author_id', 'author');
        });
    }
};
