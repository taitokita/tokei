<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bijo; 

class BijosController extends Controller
{
    public function index()
    {
        $bijos = Bijo::all();
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

            $bijos = $user->bijos()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'bijos' => $bijos,
            ];
            $data += $this->counts($user);

            return view('bijos.index', [
            'bijos' => $bijos,
            $data
            ]);


        }else {
            return view('welcome', [
            'bijos' => $bijos,
        ]);
    }
        
        
    }

    public function create()
    {
        $bijo = new Bijo;

        return view('bijos.create', [
            'bijo' => $bijo,
        ]);
    }

    public function store(Request $request)
    {
               
       $this->validate($request, [
            'master' => 'required|max:10', 
            'status' => 'required|max:10', 
            'content' => 'required|max:191',
        ]);

//        $filepath = $request->file('image')->store('public/items/photos');
        $filepath = $request->file('photo')->store('photo');
        $bijo = new Bijo;
        $bijo->master = $request->master;
        $bijo->status = $request->status;
        $bijo->content = $request->content;
        $bijo->user_id = \Auth::user()->id;
        $bijo->path = $filepath; 
        $bijo->type = 'like';
        //$bijo->id =  $like['Bijo']['bijoId'];
        $bijo->save();
        
        // $table->increments('id');
        //     $table->timestamps();
        //     $table->string('status');
        //     $table->string('content');
        //     $table->string('master');
        //     $table->string('path');
        //     //$table->string('id');
        //     $table->string('name');
        //     $table->string('type')->index();
        //     $table->integer('user_id')->unsigned()->index();
        
//        $request->user()->bijo()->create([
 //           'content' => $request->content,
  //      ]);


        return redirect('bijos');

    }

    public function show($id)
    {
        $bijo = Bijo::find($id);
        //$like_users = $bijo->like_users;

        return view('bijos.show', [
            'bijo' => $bijo,
            //'like_users' => $like_users,
        ]);
    }

    public function edit($id)
    {
        $bijo = Bijo::find($id);

        return view('bijos.edit', [
            'bijo' => $bijo,
        ]);
    }

    public function update(Request $request, $id)
    {   
        $bijo = \App\Bijo::find($id);
        $this->validate($request, [
            'master' => 'required|max:10', 
            'status' => 'required|max:10', 
            'content' => 'required|max:191',
        ]);
        
        if (\Auth::user()->id === $bijo->user_id)

        $bijo = Bijo::find($id);
        $bijo->master = $request->master;
        $bijo->status = $request->status;
        $bijo->content = $request->content;
        $bijo->save();

        return redirect('/');

    }

    public function destroy($id)
    {
        $bijo = \App\Bijo::find($id);

        if (\Auth::user()->id === $bijo->user_id) {
            $bijo->delete();
        }
        return redirect('/');
    }

}