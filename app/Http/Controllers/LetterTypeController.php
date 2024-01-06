<?php

namespace App\Http\Controllers;
use App\Exports\ExportLetter;
use App\Models\Letter_type;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $tipe = Letter_type::all();
        return view('tipe/.index', compact('tipe'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_type' => 'required|min:4',
        ]);
    
        // Hitung jumlah data yang sudah ada di database
        $existingCount = Letter_type::count();
    
        // Buat kode surat baru dengan format 'letter_code-count'
        $letterCode = $request->letter_code . '-' . ($existingCount + 1);
    
        Letter_type::create([
            'letter_code' => $letterCode,
            'name_type' => $request->name_type,
        ]);

        return redirect()->route('tipe.surat')->with('success', 'Berhasil menambahkan data klasifikasi surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter_type $letter_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipe = Letter_type::find($id);

        return view('tipe.edit', compact('tipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
    'name_type' => 'required|min:4',
]);

// Hitung jumlah data yang sudah ada di database
$existingCount = Letter_type::where('id', $id)->value('letter_code');

// Buat kode surat baru dengan format 'letter_code-count'
$letterCode = $request->letter_code . '-' . substr($existingCount, 6, 7);

Letter_type::where('id', $id)->update([
    'letter_code' => $letterCode,
    'name_type' => $request->name_type,
]);



        return redirect()->route('tipe.surat')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Letter_type::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil Menghapus data!');
    }

    public function exportExcel()
    {
        $file_name = 'data_klasifikasi' . '.xlsx';
        return Excel::download(new ExportLetter, $file_name);
    }
}


