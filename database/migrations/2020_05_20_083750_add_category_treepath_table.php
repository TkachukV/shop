<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryTreepathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_treepath', function (Blueprint $table) {
            $table->uuid('ancestor');
            $table->uuid('descendant');

            $table->foreign('ancestor')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('category')
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
        Schema::dropIfExists('category_treepath');
    }
}
