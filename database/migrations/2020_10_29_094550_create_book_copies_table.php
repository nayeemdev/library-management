<?php

use App\Models\BookCopy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_copies', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->unsignedBigInteger('book_id');
            $table->string('edition')->nullable();
            $table->string('condition')->default(BookCopy::BOOK_NEW);
            $table->string('description')->nullable();
            $table->timestamp('published_date')->nullable();
            $table->boolean('is_available')->default(true);
            $table->unsignedBigInteger('added_by');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_copies', function (Blueprint $table) {
            $table->dropForeign(['book_id', 'added_by']);
        });

        Schema::dropIfExists('book_copies');
    }
}
