<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\Reservation;
use App\Models\Fine;
use App\Models\Payment;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $librarianRole = Role::firstOrCreate(['name' => 'librarian']);
        $memberRole = Role::firstOrCreate(['name' => 'member']);

        $superAdmin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'status' => 'active',
        ])->assignRole($superAdminRole);

        $librarians = User::factory(2)->create()->each(function ($user) use ($librarianRole) {
            $user->assignRole($librarianRole);
        });

        $members = User::factory(10)->create()->each(function ($user) use ($memberRole) {
            $user->assignRole($memberRole);
        });

        $categories = Category::factory(5)->create();
        $publishers = Publisher::factory(3)->create();
        $authors = Author::factory(10)->create();

        $books = Book::factory(20)->create()->each(function ($book) use ($authors) {
            $book->authors()->attach(
                $authors->random(rand(1,3))->pluck('id')->toArray()
            );
        });

        $books->each(function ($book) use ($members) {
            $member = $members->random();
            BookUser::factory()->create([
                'user_id' => $member->id,
                'borrowable_id' => $book->id,
                'borrowable_type' => Book::class,
            ]);
        });

        $members->each(function ($member) use ($books) {
            $book = $books->random();
            Reservation::factory()->create([
                'user_id' => $member->id,
                'book_id' => $book->id,
            ]);
        });

        BookUser::all()->each(function ($borrow) {
            if(rand(0,1)) {
                $fine = Fine::factory()->create([
                    'user_id' => $borrow->user_id,
                    'borrow_id' => $borrow->id,
                    'amount' => rand(5,30),
                ]);

                Payment::factory()->create([
                    'fine_id' => $fine->id,
                    'amount' => $fine->amount,
                    'method' => 'cash',
                ]);
            }
        });
    }
}
