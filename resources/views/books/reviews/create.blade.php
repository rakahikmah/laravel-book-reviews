@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="mb-10 text-2xl font-bold">Add review for {{ $book->title }}</h1>

        <form action="{{ route('books.reviews.store', $book) }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="review" class="block mb-2 text-sm font-medium text-gray-700">Review</label>
                <textarea name="review" id="review" required  class="input w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" rows="5"></textarea>
            </div>

            <div class="mb-6">
                <label for="rating" class="block mb-2 text-sm font-medium text-gray-700">Rating</label>
                <select name="rating" id="rating" class="input w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="" selected disabled>Select a rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Submit</button>
            </div>
        </form>
    </div>

@endsection
