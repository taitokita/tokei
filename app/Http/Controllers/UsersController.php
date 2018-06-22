<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Bijo;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $count_like = $user->like_bijos()->count();
        $bijos = \DB::table('bijos')->join('bijo_user', 'bijos.id', '=', 'bijo_user.bijo_id')->select('bijos.*')->where('bijo_user.user_id', $user->id)->distinct()->paginate(20);
        $data = [
            'user' => $user,
            'bijos' => $bijos,
        ];
        $data += $this->counts($user);

        return view('users.show', [
            'user' => $user,
            'bijos' => $bijos,
            'count_like' => $count_like,
        ]);
    }
    
     public function favoriteings($id)
    {
        $user = User::find($id);
        $bijos = $user->bijos()->orderBy('created_at', 'desc')->paginate(10);
        $favoriteings = $bijo->favoriteings()->paginate(10);
        

        $data = [
            'user' => $user,
            'users' => $favoriteings,
            'favoriteings' => $favoriteings,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
}