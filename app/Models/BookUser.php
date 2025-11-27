<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookUser extends Model
{
    use HasFactory;

    protected $table = 'book_user';

    protected $fillable = [
        'user_id',
        'borrowable_id',
        'borrowable_type',
        'borrowed_at',
        'due_date',
        'returned_at',
        'status'
    ];

    // Polymorphic relationship (Book, Magazine, Manga, etc.)
    public function borrowable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fines()
    {
        return $this->hasMany(Fine::class, 'borrow_id');
    }
}
