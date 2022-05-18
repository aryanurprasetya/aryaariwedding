<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $r)
    {
        $guest = Guest::where('status', 'true')->orderby('created_at', 'desc')->get();

        $parseData = [
            'data' => $guest,
            'nama' => $r->nama,
            'title' => "Arya And Ari Wedding"
        ];

        return view('welcome', $parseData);
    }

    public function wish_proses(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'wishes' => 'required'
        ]);

        $tambah = Guest::create([
            'name' => $r->name,
            'wishes' => $r->wishes
        ]);

        if ($tambah) {
            return redirect('/')->with($this->messageSweetAlert('success', 'Terima Kasih!', 'Sukses dan sehat selalu ya '.$r->name.'.. Terimakasih atas doa restu kamu!'));
        } else {
            return redirect('/')->with($this->messageSweetAlert('error', 'Yahh, error!', 'Maafin Kita ya, ada sedikit kesalahan. Ga perlu nunggu berhasil input kok untuk dateng ke acara kita '.$r->name.'! :)'));
        }
    }
}
