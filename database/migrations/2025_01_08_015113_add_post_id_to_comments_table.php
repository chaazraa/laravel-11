<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::table('comments', function (Blueprint $table) {
    //         $table->unsignedBigInteger('post_id')->after('id');
    //         $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
//     public function down()
//     {
//         Schema::table('comments', function (Blueprint $table) {
//             $table->dropForeign(['post_id']);
//             $table->dropColumn('post_id');
//         });
//     }
};
