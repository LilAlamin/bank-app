<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class peminjamancontroller extends Controller
{
    public function list_peminjam(Request $req){
        $title = "Peminjaman";
        $data = DB::select("select peminjaman.id,nasabah.nama,peminjaman.jumlah_pinjam,peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali from peminjaman
        inner join nasabah on nasabah.kode = peminjaman.kode_nasabah");
        return view("peminjaman.peminjaman",['data'=>$data,'title'=>$title,'tambah'=>$req->tambah? true : false]);
    }
    public function form_tambah(){
        $nasabah = DB::select("select kode from nasabah");
        $title = "Peminjaman";
        return view("peminjaman.tambah",['title'=>$title,'nasabah'=>$nasabah]);
    }
    public function tambah_pinjam(Request $req){
        DB::insert("insert into peminjaman values(null,?,?,?,?)",
        [$req->kode_nasabah,$req->jumlah_pinjam,$req->tanggal_pinjam,$req->tanggal_kembali]);
        return redirect("/peminjaman?tambah=1");
    }
    public function pengembalian(Request $req){
        $peminjaman = DB::select("select timestampdiff(day,tanggal_kembali,now()) As bedo,tanggal_pinjam,kode_nasabah,jumlah_pinjam from peminjaman where id=?",
    [$req->id]);
    $peminjaman=$peminjaman[0];
    $bedo = $peminjaman->bedo;
    $denda = 0;
    if($bedo > 0){
        $denda = 15000 *$bedo;
    }
    DB::insert("insert into pengembalian values(null,?,?,?,date(now()),?)",
    [$peminjaman->kode_nasabah,$peminjaman->jumlah_pinjam,$peminjaman->tanggal_pinjam,$denda]);
    DB::delete("delete from peminjaman where id=?",[$req->id]);
    return redirect("/pengembalian");
    }

    public function list_kembali(){
        $title = "Pengembalian";
        $data=DB::select("select pengembalian.jumlah_pinjam,nasabah.nama,pengembalian.tanggal_pinjam,pengembalian.tanggal_kembali,pengembalian.denda,
        pengembalian.jumlah_pinjam + pengembalian.denda as total
        from pengembalian
        inner join nasabah on nasabah.kode=pengembalian.kode_nasabah");
        return view("peminjaman.pengembalian",['data'=>$data,'title'=>$title]);
    }
}
