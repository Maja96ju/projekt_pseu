<?php

namespace App\Http\Controllers;

use App\Komentar;
use App\Objava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function prikaziSveKomentare()
    {
        $data = Komentar::orderBy('id', 'desc')->get();

        return view('komentar.pregled')
            ->with('komentari', $data);
    }

    public function izbrisi($id)
    {
        $komentar = Komentar::find($id);
        $komentar->delete();

        return redirect()->route('komentar.prikaz');
    }

    public function prikaziFormu()
    {
        $data = Objava::select('id', 'naslov')->orderBy('id', 'desc')->get();

        return view('komentar.dodaj')
            ->with('sve_objave', $data);
    }

    public function prikaziFormuUredi($id)
    {
        $data = Objava::all();
        $komentar = Komentar::find($id);

        return view('komentar.uredi')
            ->with('komentar', $komentar)
            ->with('sve_objave', $data);;
    }

    public function dodaj(Request $request)
    {
        $komentar = new Komentar();
        $komentar->fill($request->all());
        $komentar->korisnik_id = Auth::user()->id;
        $komentar->save();

        return redirect()->route('komentar.prikaz');
    }

    public function uredi(Request $request, $id)
    {
        $komentar = Komentar::find($id);
        $komentar->fill($request->all());
        $komentar->korisnik_id = Auth::user()->id;
        $komentar->save();

        return redirect()->route('komentar.prikaz');
    }
}
