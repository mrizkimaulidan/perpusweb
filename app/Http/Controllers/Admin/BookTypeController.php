<?php

namespace App\Http\Controllers\Admin;

use App\BookType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_types = BookType::all();

        return view('admin.book-types.index', compact('book_types'));
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
        $book_type = new BookType();
        $book_type->name = $request->name;
        $book_type->description = $request->description;
        $book_type->save();

        return redirect()->route('admin.book-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book_type = BookType::find($id);

        return response()->json(['data' => $book_type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book_type = BookType::find($id);

        return response()->json(['data' => $book_type]);
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
        $book_type = BookType::find($id);

        $book_type->name = $request->name;
        $book_type->description = $request->description;
        $book_type->save();

        return response()->json(['data' => $book_type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookType::find($id)->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
