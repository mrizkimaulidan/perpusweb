<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BookUser;
use App\User;

class JsonResponseController extends Controller
{
    public function detailBook($id)
    {
        $book = Book::find($id);

        foreach ($book as $key => $b) {
            $book['book_type_name'] = $book->book_type->name;
        }

        return response()->json(['data' => $book]);
    }

    public function detailUser($id)
    {
        $user = User::find($id);

        foreach ($user as $key => $b) {
            $user['role_type_name'] = $user->role->name;
        }

        return response()->json(['data' => $user]);
    }

    public function approvedBookBorrower($id)
    {
        $book = BookUser::find($id);

        $book->where('id', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Berhasil menyetujui peminjaman']);
        // return redirect()->route('admin.book-borrowers.index');
    }

    public function notApproveBookBorrower($id)
    {
        $book = BookUser::find($id);

        $book->where('id', $id)->update(['status' => 3]);

        return response()->json(['message' => 'Berhasil tidak menyetujui peminjaman']);
    }
}
