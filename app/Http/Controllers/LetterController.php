<?php

namespace App\Http\Controllers;
use App\Models\Letter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Letter_type;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letter = Letter::all();

        
        return view('letter.index', compact('letter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $letter = Letter_type::all();

        $user = User::where('role', 'guru')->get(['id', 'name']);

        return view('letter.create', compact('letter', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'letter_type_id' => 'required',
            'letter_perihal' => 'required',
            'recipients' => 'required',
            'content' => 'required',
            'attachment',
            'notulis' => 'required',
        ]);

        $arrayDistinct = array_count_values($request->recipients);
        $arrayAssoc = [];
    
        foreach ($arrayDistinct as $id => $count) {
            $user = User::find($id);
            // Periksa apakah pengguna ditemukan sebelum mengakses properti 'name'

            if ($user) {
                $arrayItem = [
                    "id" => $id,
                    "name" => $user->name,
                ];

                array_push($arrayAssoc, $arrayItem);
            }
        }
    
    
        // dd($request->all(), $arrayAssoc);

        Letter::create([
            'letter_type_id' => $request->letter_type_id,
            'letter_perihal' => $request->letter_perihal,
            'recipients' => $arrayAssoc,
            'content' => $request->content,
            'attachment' => $request->attacment,
            'notulis' => $request->notulis,
        ]);

        return redirect()->route('letter.home')->with('success', 'Berhasil menambahkan data klasifikasi surat');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $letter2 = Letter_type::all();
        // $letter = Letter::widht('ntls', 'klasifikasi')->findOrFail($id);
        // $guru = User::where('role, guru')->get(['id', 'name']);
        
        // return view('letter.edit', compact('letter', 'guru', 'letter2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letter $letter)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letter $letter)
    {
        //
    }

    // public function exportExcel()
    // {
    //     $file_name = 'data_klasifikasi' . '.xlsx';
    //     return Excel::download(new ExportLetter, $file_name);
    // }
}