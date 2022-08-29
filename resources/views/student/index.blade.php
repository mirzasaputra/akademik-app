@extends('layouts.ajax')

@section('content')
@php
    $api_url_1 = "http://192.168.43.129:8000/api/v1/";
    $api_url_2 = "http://192.168.43.37:8000/api/";
@endphp

<button class="btn btn-primary mb-3" id="create">Tambah</button>
<table class="table table-bordered table-striped" id="dataTable" width="100%" data-url="{{ $api_url_2 }}mahasiswa">
    <thead>
        <th>No.</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th></th>
    </thead>
</table>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" data-request="ajax">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="label-control">NIM</label>
                        <input type="text" name="NIM" class="form-control" placeholder="NIM">
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Nama</label>
                        <input type="text" name="Nama" class="form-control" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Alamat</label>
                        <textarea name="Alamat" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection