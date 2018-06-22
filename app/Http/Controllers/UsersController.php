<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Bijo;

class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $count_like = $user->like_bijos()->count();
        $bijos = \DB::table('bijos')->join('bijo_user', 'bijos.id', '=', 'bijo_user.bijo_id')->select('bijos.*')->where('bijo_user.user_id', $user->id)->distinct()->paginate(20);

        return view('users.show', [
            'user' => $user,
            'bijos' => $bijos,
            'count_like' => $count_like,
            // 'count_have' => $count_have,
        ]);
    }
}