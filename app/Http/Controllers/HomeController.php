<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return response()->view('home', [
            'title' => 'Halaman Home',
            'murids' => Murid::all()       
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        if($request->has('tambah_submit'))
        {
            $validated = $request->validate([
                'nama' => ['required'],
                'umur' => ['required', 'integer'],
                'gender' => ['required', 'in:Laki-Laki,Perempuan']
            ]);

            $nama = $validated['nama'];

            Murid::create($validated);

            return redirect('/')->with('flash', [
                'status' => 'success',
                'message' => "Murid $nama Berhasil Ditambah"
            ]);
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function edit(Request $request): Response|RedirectResponse
    {
        $id = $request->input('id');
        
        $murid = Murid::where('id', $id)->get()[0];

        return response()->view('edit', [
            'title' => 'Halaman Edit',
            'murid' => $murid
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        if($request->has('update_submit'))
        {
            $validated = $request->validate([
                'nama' => ['required'],
                'umur' => ['required', 'integer'],
                'gender' => ['required', 'in:Laki-Laki,Perempuan']
            ]);

            $nama = $validated['nama'];

            $id = $request->input('id');

            Murid::where('id', $id)->update($validated);

            return redirect('/')->with('flash', [
                'status' => 'success',
                'message' => "Murid $nama Berhasil Di Update"
            ]);
        }
        else
        {
            return redirect()->back();
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        if($request->has('delete_submit'))
        {
            $id = $request->input('id');

            $murid = Murid::where('id', $id)->first();
            
            $nama = $murid['nama'];
            
            $murid->delete();

            return redirect('/')->with('flash', [
                'status' => 'success',
                'message' => "Murid $nama Berhasil Dihapus"
            ]);
        }
        else 
        {
            return redirect()->back();
        }
    }
}
