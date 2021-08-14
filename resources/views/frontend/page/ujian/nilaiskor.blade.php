@extends('frontend/index')
@section('content')
    <div class="col-md-12">
        @include('frontend/navbar')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto py-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Penilaian Nilai Ujian
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th style="width:40%">TWK</th>
                                    <td style="width:20%">:</td>
                                    <th style="width:40%">80</th>
                                </tr>
                                <tr>
                                    <th>TIU</th>
                                    <td>:</td>
                                    <th>50</th>
                                </tr>
                                <tr>
                                    <th>TKP</th>
                                    <td>:</td>
                                    <th>50</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary btn-sm text-white" href="/">Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection