<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;


    protected $fillable = [
        'rating',
        'review',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::updated(function (Review $review) {
            // Cek jika rating berubah sebelum menghapus cache
            if ($review->isDirty('rating')) {
                cache()->forget('book:' . $review->book_id);
            }
        });

        static::deleted(function (Review $review) {
            cache()->forget('book:' . $review->book_id);
        });

        static::created(function (Review $review) {
            cache()->forget('book:' . $review->book_id);
        });
    }
}
