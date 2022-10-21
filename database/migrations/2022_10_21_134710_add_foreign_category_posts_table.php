<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');
            // $table->unsignedBigInteger('category_id')->after('slug');


            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            // $table->foreign('category_id')->references('id')->on('categories');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            //elimino relazione tra tabella 'category' e tabella 'posts'
            $table->dropForeign(['category_id']);

            //elimino colonna
            $table->dropColumn('category_id');


        });
    }
}
