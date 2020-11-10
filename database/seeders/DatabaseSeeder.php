<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use App\Models\BookCopy;
use App\Models\BookUser;
use App\Models\LoanRequest;
use App\Models\Publication;
use Illuminate\Support\Str;
use App\Models\ReturnRequest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'id' => 1,
            'name' =>'Demo Librarian',
            'email' => 'librarian@demo.com',
            'phone' => '016855741554',
            'role' => 'librarian',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        User::factory()->count(10)->create();
        Publication::factory()->count(20)->create();
        Genre::factory()->count(20)->create();
        Author::factory()->count(20)->create();
        BookCopy::factory()->count(30)->create();

        foreach (Book::get() as $key => $book) {
            DB::table('author_book')->insert([
                'book_id' => $book->id,
                'author_id' => Author::inRandomOrder()->first()->id
            ]);

            DB::table('book_genre')->insert([
                'book_id' => $book->id,
                'genre_id' => Genre::inRandomOrder()->first()->id
            ]);
        }

        LoanRequest::factory()->count(10)->create();
        ReturnRequest::factory()->count(10)->create();

        foreach (LoanRequest::get() as $key => $req) {
            BookUser::create([
                'user_id' => $req->user_id,
                'book_copy_id' => rand(1, 30),
                'status' => 'loan_requested',
                'loan_request_id' => $req->id,
            ]);
        }

        foreach (ReturnRequest::get() as $key => $req) {
            BookUser::create([
                'user_id' => $req->user_id,
                'book_copy_id' => rand(1, 30),
                'status' => 'return_requested',
                'return_request_id' => $req->id,
            ]);
        }
    }
}
