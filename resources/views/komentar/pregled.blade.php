@extends('layouts.admin')

@section('sadrzaj')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Svi komentari</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{ route('komentar.dodaj') }}" class="btn btn-primary">Novi komentar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Objava</th>
                                <th>Sadržaj</th>
                                <th>Autor</th>
                                <th>Akcije</th>
                            </tr>

                            @foreach($komentari as $komentar)
                                <tr>
                                    <td><a href="{{ route('objava.uredi', $komentar->objava_id) }}">{{ $komentar->objava->naslov }}</a></td>
                                    <td>{{ $komentar->sadrzaj }}</td>
                                    <td>{{ $komentar->autor->name }}</td>
                                    <td>
                                        <a href="{{ route('komentar.uredi', $komentar->id) }}">Uredi</a>
                                        |
                                        <a href="{{ route('komentar.izbrisi', $komentar->id) }}">Izbriši</a>
                                    </td>
                                </tr>
                            @endforeach

                            @if(sizeof($komentari) == 0)
                                <tr style="text-align: center;">
                                    <td colspan="4">Nažalost, ne postoji ni jedan zapis u bazi!</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection