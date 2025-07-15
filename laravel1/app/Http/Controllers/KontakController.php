<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
public function index()
{
    return view('kontak.form');
}

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        // Data untuk email view
        $data = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'pesan' => $validated['pesan'],
        ];
        
        // Kirim email
        Mail::send('email.contact', $data, function ($message) use ($data) {
            $message->to('adinugroho12131415@gmail.com')
                ->subject('Pesan dari Montoon')
                ->from(config('mail.from.address'), $data['nama']);
        });

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}