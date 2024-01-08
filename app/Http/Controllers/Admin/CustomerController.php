<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Pelanggan::all();

        return view('admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golongan = Golongan::all();

        // dd($golongan);
        $aktif = ['Y','N'];
        $user = User::all();

        return view('admin.customer.create', compact('golongan', 'aktif', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'golongan_id' => 'required|integer',
            'no' => 'required',
            'nama' => 'required',
            'hp' => 'required',
            'ktp' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'seri' => 'required',
            'meteran' => 'required',
            'aktif' => 'required',
            'user_id' => 'required|integer',
            'alamat' => 'required',
        ]);
    
        // Periksa apakah file KTP diunggah
        if ($request->hasFile('ktp')) {
            // Generate nama unik untuk file KTP
            $extension = $request->file('ktp')->getClientOriginalExtension();
            $namKtp = rand() . '.' . $extension;
    
            // Simpan file KTP
            $path = $request->file('ktp')->storeAs('ktp', $namKtp, 'public');
    
            // Data yang akan disimpan
            $validated = [
                'nama' => $request->nama,
                'hp' => $request->hp,
                'seri' => $request->seri,
                'aktif' => $request->aktif,
                'no' => $request->no,
                'ktp' => $namKtp,
                'golongan_id' => $request->golongan_id,
                'user_id' => Auth::user()->id,
                'meteran' => $request->meteran,
                'alamat' => $request->alamat,
            ];
    
            // Simpan data ke database
            $pelanggan = Pelanggan::create($validated);
    
            return redirect()->route('admin.customers.index');
        }
    
        return redirect()->back()->with('error', 'File KTP tidak diunggah atau tidak valid.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $p = Pelanggan::find($id);

        return view('admin.customer.show', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $p = Pelanggan::find($id);
        $golongan = Golongan::all();
        $aktif = ['Y','N'];
        $user = User::all();

        return view('admin.customer.edit', compact('p', 'golongan', 'aktif', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if ($request->file('ktp')) {
            $extension = $request->file('ktp')->getClientOriginalExtension();
            $namKtp = rand() . '.' . $extension;
            $path = $request->file('ktp')->storeAs('ktp', $namKtp, 'public');
            // $pelanggan->ktp = $namKtp;
        } else {
            $namKtp = $pelanggan->ktp;
        }


        $pelanggan = Pelanggan::find($id)->update([
            'golongan_id' => $request->golongan_id,
            'no' => $request->no,
            'nama' => $request->nama,
            'hp' => $request->hp,
            'ktp' => $namKtp,
            'seri' => $request->seri,
            'aktif' => $request->aktif,
            'user_id' => Auth::user()->id,
            'meteran' => $request->meteran,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id)->delete();

        return redirect()->route('admin.customers.index');
    }
}
