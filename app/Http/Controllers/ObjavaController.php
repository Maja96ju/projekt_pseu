<?php

namespace App\Http\Controllers;

use App\Objava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjavaController extends Controller
{
    public function prikaziSveObjave()
    {
        $data = Objava::orderBy('id', 'desc')->get();

        return view('objava.pregled')
            ->with('objave', $data);
    }

    public function izbrisi($id)
    {
        $objava = Objava::find($id);
        $objava->delete();

        return redirect()->route('objava.prikaz');
    }

    public function prikaziFormu()
    {
        return view('objava.dodaj');
    }

    public function prikaziFormuUredi($id)
    {
        $objava = Objava::find($id);

        return view('objava.uredi')
            ->with('objava', $objava);
    }

    public function dodaj(Request $request)
    {
        $objava = new Objava();
        $objava->fill($request->all());
        $objava->autor_id = Auth::user()->id;
        $objava->save();

        return redirect()->route('objava.prikaz');
    }

    public function uredi(Request $request, $id)
    {
        $objava = Objava::find($id);
        $objava->fill($request->all());
        $objava->autor_id = Auth::user()->id;
        $objava->save();

        return redirect()->route('objava.prikaz');
    }
}
