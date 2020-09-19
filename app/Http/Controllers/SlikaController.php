<?php

namespace App\Http\Controllers;

use App\Objava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlikaController extends Controller
{
    public function prikaziSveObjave()
    {
        $data = Objava::all();

        return view('objave')
            ->with('objave', $data);
    }

    public function izbrisi($id)
    {
        $objava = Objava::find($id);
        $objava->delete();

        return redirect()->route('objave.prikaz');
    }

    public function prikaziFormu()
    {
        return view('objave_dodaj');
    }

    public function prikaziFormuUredi($id)
    {
        $objava = Objava::find($id);

        return view('objave_uredi')
            ->with('objava_id', $id)
            ->with('objava', $objava);
    }

    public function dodaj(Request $request)
    {
        $objava = new Objava();
        $objava->fill($request->all());
        $objava->autor = Auth::user()->name; // 'Neki autor';
        $objava->save();

        return redirect()->route('objave.prikaz');
    }

    public function uredi(Request $request, $id)
    {
        $objava = Objava::find($id);
        $objava->fill($request->all());
        $objava->autor = Auth::user()->name; // 'Neki autor';
        $objava->save();

        return redirect()->route('objave.prikaz');
    }
}
