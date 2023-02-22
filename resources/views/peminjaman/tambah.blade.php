@extends('layout.main')

@section('container')
    
<form action="" method="post" class="form-control">
    @csrf
    <label for="" class="form-label">Kode Nasabah</label>
    <br>
    <select name="kode_nasabah" id="" required>
        @foreach ($nasabah as $nas)
            <option value="{{ $nas ->kode }}">{{ $nas->kode }}</option>
        @endforeach
    </select>
    <br>
    <label for="" class="form-label">Jumlah Pinjam</label>
    <br>
    <input type="text" name="jumlah_pinjam">
    <br>
    <label for="" class="form-label">Tanggal Pinjam</label>
    <br>
    <input type="date" name="tanggal_pinjam" id="" required>
    <br>
    <label for="" class="form-label">Tanggal Kembali</label>
    <br>
    <input type="date" name="tanggal_kembali" required>
    <br>
    <button type="submit" class="btn btn-primary mt-2">Pinjam</button>
</form>
@endsection