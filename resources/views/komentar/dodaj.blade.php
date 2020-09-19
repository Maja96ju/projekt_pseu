@extends('layouts.admin')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Novi komentar</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{ route('komentar.prikaz') }}" class="btn btn-danger">Vrati se</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">

                            <form action="{{ route('komentar.dodaj') }}" method="POST">
                                <!-- Svaka forma mora imati CSRF token! -->

                                @csrf

                                <div class="form-group">
                                    <label for="sadrzaj">Sadržaj *</label>
                                    <textarea name="sadrzaj" rows="5" class="form-control"
                                              placeholder="Unesi sadržaj"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="objava_id">Objava *</label>
                                    <select class="form-control" name="objava_id">
                                        @foreach ($sve_objave as $objava)
                                            <option value="{{ $objava->id }}">{{ $objava->naslov }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Spremi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection