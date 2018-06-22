<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Bijo;

class BijoUserController extends Controller
{
    public function like()
    {
        $bijoId = request()->bijoId;

        // Search bijos from "bijoId"
        $rws_bijo = $rws_response->getData()['Bijos'][0]['Bijo'];

        // create Bijo, or get Bijo if an bijo is found
        $bijo = Bijo::firstOrCreate([
            'id' => $rws_bijo['bijoId'],
            'status' => $rws_bijo['bijoStatus'],
            'content' => $rws_bijo['bijoContent'],
            // remove "?_ex=128x128" because its size is defined
            'image' => str_replace('', $rws_bijo['mediumImageUrls'][0]['imageUrl']),
        ]);

        \Auth::user()->like($bijo->id);

        return redirect()->back();
    }

    public function dont_like()
    {
        $bijoId = request()->bijoId;

        if (\Auth::user()->is_likeing($bijoId)) {
            $bijoId = Bijo::where('id', $bijoId)->first()->id;
            \Auth::user()->dont_like($bijoId);
        }
        return redirect()->back();
    }
}