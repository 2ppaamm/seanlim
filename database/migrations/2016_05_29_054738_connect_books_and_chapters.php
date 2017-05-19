<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBooksAndChapters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chapters', function (Blueprint $table) {

            $table->integer('book_id')->unsigned();

            $table->foreign('book_id')->references('id')->on('books');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapters', function (Blueprint $table) {

            $table->dropForeign('chapters_book_id_foreign');

            $table->dropColumn('book_id');
        });
    }
}
