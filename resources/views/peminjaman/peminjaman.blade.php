@extends('layout.main')

@section('container')
<a href="/peminjaman/tambah"><button class="btn btn-primary mb-2">Pinjam</button></a>

<table class="table table-bordered border-secondary">
    <tr class="table table-dark">
        <th>Id</th>
        <th>Nama Nasabah</th>
        <th>Jumlah Pinjam</th>
        <th>Tanggal_Pinjam</th>
        <th>Tanggal_Kembali</th>
        <th>Aksi</th>
    </tr>
    @if(count($data)==0)
    <tr>
        <td colspan="6">
            Data Tidak Ditemukan
        </td>
    </tr>
    @endif

    @foreach ($data as $dat)
        <tr>
            <td>{{ $dat ->id }}</td>
            <td>{{ $dat ->nama }}</td>
            <td>Rp{{ $dat ->jumlah_pinjam }}</td>
            <td>{{ $dat ->tanggal_pinjam }}</td>
            <td>{{ $dat ->tanggal_kembali }}</td>
            <td><a href="/peminjaman/pengembalian?id={{ $dat->id }}"><button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
              </svg></button></a></td>
        </tr>
    @endforeach
</table>

@if ($tambah)
    <h4>Data Berhasil Ditambahkan</h4>
@endif
@endsection