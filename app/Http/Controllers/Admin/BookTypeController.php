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
        BookType::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.book-types.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $book_type->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.book-types.index')->with('success', 'Data berhasil diubah!');
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

        return redirect()->route('admin.book-types.index')->with('success', 'Data berhasil dihapus!');
    }
}
