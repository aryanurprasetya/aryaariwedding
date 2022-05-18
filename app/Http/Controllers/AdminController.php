<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $guest = Guest::orderby('created_at', 'desc')->get();

        $parseData = [
            'data' => $guest
        ];
        return view('home', $parseData);
    }

    public function approve($id)
    {
        $guest = Guest::find($id);

        if ($guest == null) {
            return redirect('/home')->with('message', 'Maaf, data tidak ditemukan!');
        }

        $guest->status = 'true';

        if ($guest->save()) {
            return redirect('/home')->with('message', 'Status telah berhasil dishow');
        } else {
            return redirect('/home')->with('message', 'Status telah gagal dishow');
        }
    }

    public function decline($id)
    {
        $guest = Guest::find($id);

        if ($guest == null) {
            return redirect('/home')->with('message', 'Maaf, data tidak ditemukan!');
        }

        $guest->status = 'false';

        if ($guest->save()) {
            return redirect('/home')->with('message', 'Status telah berhasil dihide');
        } else {
            return redirect('/home')->with('message', 'Status telah gagal dihide');
        }
    }

    public function hapus($id)
    {
        $guest = Guest::find($id);

        if ($guest == null) {
            return redirect('/home')->with('message', 'Maaf, data tidak ditemukan!');
        }

        if ($guest->delete()) {
            return redirect('/home')->with('message', 'Status telah berhasil dihapus');
        } else {
            return redirect('/home')->with('message', 'Status telah gagal dihapus');
        }
    }
}
