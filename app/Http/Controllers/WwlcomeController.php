<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Bijo;

class WelcomeController extends Controller
{
    public function index()
    {
        $bijos = Bijo::orderBy('updated_at', 'desc')->paginate(20);
        return view('welcome', [
            'bijos' => $bijos,
        ]);
    }
}
