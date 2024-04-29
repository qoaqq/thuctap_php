<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $nhanvien = NhanVien::filter()->get();
        $query = NhanVien::query();

        if(isset($request->search) && ($request->search != null)) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $nhanvien = $query->paginate(5);

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:nhanvien,email',
            'tel' => [
                'required',
                'string',
                'max:14',
                'regex:/^\d{1,4}-\d{1,4}-\d{1,4}$/'
            ]
        ], [
            'tel.regex' => 'The tel format is invalid. It should be in the format: xxxx-xxxx-xxxx.'
        ]);

        $nhanvien = new NhanVien();
        $nhanvien->name = strip_tags($request->name);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:nhanvien,email',
            'tel' => [
                'required',
                'string',
                'max:14',
                'regex:/^\d{1,4}-\d{1,4}-\d{1,4}$/'
            ]
        ], [
            'tel.regex' => 'The tel format is invalid. It should be in the format: xxxx-xxxx-xxxx.'
        ]);

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
