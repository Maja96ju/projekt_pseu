@extends('layouts.admin')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Nova objava</h3>
                            </div>
                            <div class="col-md-3" style="text-align: right;">
                                <a href="{{ route('objava.prikaz') }}" class="btn btn-danger">Vrati se</a>
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

                            <form action="{{ route('objava.dodaj') }}" method="POST">
                                <!-- Svaka forma mora imati CSRF token! -->

                                @csrf

                                <div class="form-group">
                                    <label for="naslov">Naslov *</label>
                                    <input name="naslov" type="text" class="form-control" placeholder="Unesi naslov">
                                </div>

                                <div class="form-group">
                                    <label for="sadrzaj">Sadržaj *</label>
                                    <textarea name="sadrzaj" rows="5" class="form-control"
                                              placeholder="Unesi sadržaj"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="istaknuta">Istaknuto *</label>
                                    <select class="form-control" name="istaknuta">
                                        <option value="0">Ne</option>
                                        <option value="1">Da</option>
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