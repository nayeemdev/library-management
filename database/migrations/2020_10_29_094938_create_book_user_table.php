<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_copy_id');
            $table->string('status');
            $table->unsignedBigInteger('loan_request_id')->nullable();
            $table->unsignedBigInteger('return_request_id')->nullable();
            $table->timestamp('lend_at')->nullable();
            $table->timestamp('loan_expire_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_copy_id')->references('id')->on('book_copies')->onDelete('cascade');
            $table->foreign('loan_request_id')->references('id')->on('loan_requests')->onDelete('cascade');
            $table->foreign('return_request_id')->references('id')->on('return_requests')->onDelete('cascade');

            $table->index(['book_copy_id', 'status']);
            $table->index(['loan_expire_at', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_user', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'book_copy_id', 'loan_request_id', 'return_request_id']);
        });

        Schema::dropIfExists('book_user');
    }
}
