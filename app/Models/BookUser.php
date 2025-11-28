<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Services\BorrowService;

class BookUser extends Pivot
{
    use HasFactory;

    protected $table = 'book_user';
    public $incrementing = true; 
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'borrowable_id',
        'borrowable_type',
        'borrowed_at',
        'due_date',
        'returned_at',
        'status',
    ];

    protected $casts = [
        'borrowed_at' => 'datetime',
        'due_date' => 'datetime',
        'returned_at' => 'datetime',
    ];

    // Polymorphic relation
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

    protected static function booted()
    {
        static::saved(function (BookUser $borrow) {
            // Avoid parsing borrowable_type as a date
            if ($borrow->wasChanged('returned_at') && $borrow->returned_at) {
                app(BorrowService::class)->processReturn($borrow);
                $borrow->updateQuietly(['status' => 'returned']);
            }

            if (!$borrow->returned_at && $borrow->due_date && now()->greaterThan($borrow->due_date)) {
                $borrow->updateQuietly(['status' => 'overdue']);
            }
        });
    }
}
