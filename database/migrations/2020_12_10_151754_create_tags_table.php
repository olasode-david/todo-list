<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('gname_id');
            $table->string('name');
            $table->timestamps();
                    $table->foreign('gname_id')
                          ->references('id')
                          ->on('groupnames')
                          ->onDelete('cascade');
        });

        Schema::create('grouptodolists_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grouptodolists_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

               $table->unique(['grouptodolists_id', 'tag_id']);

                    $table->foreign('grouptodolists_id')
                          ->references('id')
                          ->on('grouptodolists')
                          ->onDelete('cascade');

                    $table->foreign('tag_id')
                          ->references('id')
                          ->on('tags')
                          ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
