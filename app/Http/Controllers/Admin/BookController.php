<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\BookType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\UploadController;
use File;

class BookController extends Controller
{
    private $helpers;

    /**
     * Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->helpers = new UploadController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $book_types = BookType::all();
        return view('admin.books.index', compact('books', 'book_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $location = 'assets/images/books/';

        $book = new Book();
        $book->book_type_id = $request->book_type_id;
        $book->book_number = 'BUKU-' . rand(10, 90) . rand(101, 199) . rand(200, 999);
        $book->image = $this->helpers->imageUpload($image, $location);
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->date_of_added = $request->date_of_added;
        $book->languages = $request->languages;
        $book->save();

        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $book_types = BookType::all();

        return view('admin.books.edit', compact('book', 'book_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $location = 'assets/images/books/';
        $book = Book::find($id);

        if (!empty($image)) {
            if (File::exists($book->image)) {
                File::delete($book->image);
            }
        }

        if ($image !== null) {
            $book->image = $this->helpers->imageUpload($image, $location);
        }

        $book->book_type_id = $request->book_type_id;
        $book->book_number = $request->book_number;
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->date_of_added = $request->date_of_added;
        $book->languages = $request->languages;
        $book->save();

        return view('admin.books.show', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $path = public_path($book->image);

        if (File::exists($path)) {
            File::delete($path);
        }

        $book->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
