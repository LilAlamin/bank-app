@extends('layout.main')

@section('container')
    <form action="" method="post" class="form-control">
        @csrf
        <input type="hidden" name="code" value="{{ $kode }}">
        <label for="" class="form-label">Kode Anggota</label>
        <br>
        <input type="text" name="kode" required>
        <br>
        <label for="" class="form-label">Nama Anggota</label>
        <br>
        <input type="text" name="nama" required>
        <br>
        <label for="" class="form-label">Alamat</label>
        <br>
        <input type="text" name="alamat" required>
        <br>
        <label for="" class="form-label">No Telepon</label>
        <br>
        <input type="text" name="no_telp" required>
        <br>
        <button type="submit" class="btn btn-primary mt-3">Edit Data</button>
    </form>
@endsection