<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'isbn', 'description', 'category_id', 'publisher_id', 'published_year'
    ];

    public function borrows()
    {
        return $this->hasMany(BookUser::class, 'borrowable_id')
                    ->where('borrowable_type', Book::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'Author');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
