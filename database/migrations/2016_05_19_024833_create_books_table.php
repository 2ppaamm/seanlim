<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('books', function (Blueprint $table) {

            # Increments method will make a Primary, Auto-Incrementing field.
            # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();

            # The rest of the fields...
            $table->string('title');
            $table->boolean('published');
            $table->integer('chapters');
            $table->string('cover')->default("http://vignette3.wikia.nocookie.net/spore/images/6/6c/Question-mark.png/revision/latest?cb=20110427230528");
            $table->string('synopsis');
            $table->boolean('private')->default(true);

            # FYI: We're skipping the 'tags' field for now; more on that later.

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }

    
}
