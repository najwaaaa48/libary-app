<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validated();

        // Print the validated data
        echo '<pre>';
        print_r($validatedData);
        echo '</pre>';
    }
}
