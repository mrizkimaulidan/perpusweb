<?php

namespace App\Http\Controllers\Admin\API;

use App\BookType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Success',
            'data' => BookType::find($id)
        ], Response::HTTP_OK);
    }
}
