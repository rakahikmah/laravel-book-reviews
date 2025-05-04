<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

/**
 * @method \Illuminate\Routing\Controller middleware($middleware, array $options = [])
 */
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:reviews')->only(['store']);
    }

    public function create(Book $book)
    {
        return view('books.reviews.create', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|max:1000',
        ]);

        $book->reviews()->create($data);

        return redirect()->route('books.show', $book);
    }
}
