@extends('layouts.admin')

@section('sadrzaj')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Sve objave</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{ route('objava.dodaj') }}" class="btn btn-primary">Nova objava</a>
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
                                <th>Naslov</th>
                                <th>Sadržaj</th>
                                <th>Autor</th>
                                <th>Akcije</th>
                            </tr>

                            @foreach($objave as $objava)
                                <tr>
                                    <td>{{ $objava->naslov }}</td>
                                    <td>{{ $objava->sadrzaj }}</td>
                                    <td>{{ $objava->autor->name }}</td> <!-- Ovo je moguće jer smo definirali relaciju "autor" unutar datoteke Objava.class -->
                                    <td>
                                        <a href="{{ route('objava.uredi', $objava->id) }}">Uredi</a>
                                        |
                                        <a href="{{ route('objava.izbrisi', $objava->id) }}">Izbriši</a>
                                    </td>
                                </tr>
                            @endforeach

                            @if(sizeof($objave) == 0)
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