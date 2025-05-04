<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Book extends Model
{
    //

    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function scopeTitle(Builder $query, string $title)
    {
        return $query->where('title', 'like', "%$title%");
    }


    public function scopePopular(Builder $query, $from = null, $to = null)
    {
        return $query->withReviewCount()->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRated(Builder $query, $from = null, $to = null)
    {
        return $query->withAvgRating()->orderBy('reviews_avg_rating', 'desc');
    }

    public function scopeMinReviews(Builder $query, int $min)
    {
        return $query->having('reviews_count', '>=', $min);
    }

    private function dateRangeFilter(Builder $query, $from = null, $to = null)
    {
        if ($from && !$to) {
            return $query->where('created_at', '>=', $from);
        } elseif (!$from && $to) {
            return $query->where('created_at', '<=', $to);
        } elseif ($from && $to) {
            return $query->whereBetween('created_at', [$from, $to]);
        }
    }

    public function scopeWithRecentReviews(Builder $query, \Closure $interval): Builder
    {
        return $query->whereHas(
            'reviews',
            function (Builder $q) use ($interval) {
                $q->whereBetween(
                    'created_at',
                    [$interval(now()), now()]
                );
            }
        );
    }

    public function scopePopularLastMonth(Builder $query)
    {
        return $query->popular(now()->subMonth(), now())
            ->highestRated(now()->subMonth(), now())
            ->minReviews(2);
    }

    public function scopePopularLast6Months(Builder $query)
    {
        return $query->popular(now()->subMonths(6), now())
            ->highestRated(now()->subMonths(6), now())
            ->minReviews(5);
    }

    public function scopeHighestRatedLastMonth(Builder $query)
    {
        return $query->highestRated(now()->subMonth(), now())
            ->popular(now()->subMonth(), now())
            ->minReviews(2);
    }

    public function scopeHighestRatedLast6Months(Builder $query)
    {
        return $query->highestRated(now()->subMonths(6), now())
            ->popular(now()->subMonths(6), now())
            ->minReviews(5);
    }

    public function scopeWithReviewCount(Builder $query, $from = null, $to = null)
    {
        return $query->withCount([
            'reviews' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ]);
    }

    public function scopeWithAvgRating(Builder $query, $from = null, $to = null)
    {
        return $query->withAvg([
            'reviews' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ], 'rating');
    }

    protected static function booted()
    {
        parent::boot();
        static::updated(function (Book $book) {
            if ($book->isDirty(['title', 'created_at'])) {
                cache()->forget('book:' . $book->id);
            }
        });

        static::deleted(function (Book $book) {
            cache()->forget('book:' . $book->id);
        });
    }
}
