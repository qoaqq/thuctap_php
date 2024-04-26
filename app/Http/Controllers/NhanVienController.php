<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nhanvien = NhanVien::all();
        return view('nhanvien.list', compact('nhanvien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('nhanvien.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nhanvien = new NhanVien();
        $nhanvien->name = $request->name;
        $nhanvien->email = $request->email;
        $nhanvien->tel = $request->tel;

        $nhanvien->save();

        return redirect('nhanvien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $nhanvien = NhanVien::find($id);
        return view('nhanvien.edit', compact('nhanvien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $nhanvien = NhanVien::find($id);
        $nhanvien->name = $request->name;
        $nhanvien->email = $request->email;
        $nhanvien->tel = $request->tel;

        $nhanvien->save();

        return redirect('nhanvien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $nhanvien = NhanVien::find($id);
        $nhanvien->delete();

        return redirect('nhanvien');
    }
}
