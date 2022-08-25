@extends('layouts.ajax')

@section('content')
@php
    $api_url_1 = "http://api-sister.herokuapp.com/api/v1/";
    $api_url_2 = "http://api-sister.herokuapp.com/api/v1/";
@endphp

<button class="btn btn-primary mb-3" id="create">Tambah</button>
<table class="table table-bordered table-striped" id="dataTable" width="100%" data-url="{{ $api_url_1 }}employee">
    <thead>
        <th>No.</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Jabatan</th>
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
                        <label for="" class="label-control">Jabatan</label>
                        <select name="employee_type_id" id="employeeType" class="form-control"></select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">NIP</label>
                        <input type="text" name="nip" class="form-control" placeholder="NIP">
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">NIDN</label>
                        <input type="text" name="nidn" class="form-control" placeholder="NIDN">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">Gelar Depan</label>
                            <input type="text" name="front_degree" class="form-control" placeholder="Gelar Depan">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">Gelar Belakang</label>
                            <input type="text" name="back_degree" class="form-control" placeholder="Gelar Belakang">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Jenis Kelamin</label>
                        <select name="gender" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">No. Telp</label>
                            <input type="text" name="phone" class="form-control" placeholder="No. Telp">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">Tempat</label>
                            <input type="text" name="birthplace" class="form-control" placeholder="Tempat">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">Tanggal Lahir</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Agama</label>
                        <select name="religion" class="form-control">
                            <option value="">Pilih Agama</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Alamat</label>
                        <textarea name="address" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">Desa</label>
                            <input type="text" name="city" class="form-control" placeholder="Desa">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="" class="label-control">Kecamatan</label>
                            <input type="text" name="district" class="form-control" placeholder="Kecamatan">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Provinsi</label>
                        <input type="text" name="province" class="form-control" placeholder="Provinsi">
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Kewarganegaraan</label>
                        <input type="text" name="nationality" class="form-control" placeholder="Kewarganegaraan">
                    </div>
                    <div class="mb-3">
                        <label for="" class="label-control">Kode Pos</label>
                        <input type="text" name="postal_code" class="form-control" placeholder="Kode Pos">
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