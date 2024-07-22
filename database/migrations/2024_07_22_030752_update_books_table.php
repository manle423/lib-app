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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('author_id', 'author');
            $table->string('author_id')->change();
        });
    }
};
