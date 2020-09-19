@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Izbornik -->
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('naslovnica') }}">Naslovnica</a></li>
                    <li class="list-group-item"><a href="{{ route('objava.prikaz') }}">Sve objave</a></li>
                    <li class="list-group-item"><a href="{{ route('komentar.prikaz') }}">Svi komentari</a></li>
            
                </ul>
            </div>

            <!-- Sadržaj -->
            <div class="col-md-9">
                @yield('sadrzaj')
            </div>
        </div>
    </div>
@endsection