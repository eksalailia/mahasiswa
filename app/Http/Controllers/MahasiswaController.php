<?php
namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){ // Jika ingin melakukan pencarian nama
            $mahasiswas = Mahasiswa::where('Nama', 'like', "%".$request->search."%")->paginate(5);
        } else { // Jika tidak melakukan pencarian nama
            //fungsi eloquent menampilkan data menggunakan pagination
            $mahasiswas = Mahasiswa::paginate(5); // Pagination menampilkan 5 data
        }
        return view('mahasiswas.index', compact('mahasiswas'));
        // // $posts = Mahasiswa::orderBy('Nim','desc')->paginate(6);
        // // with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswas.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'Nim'=> 'required',
        'Nama'=>'required',
        'Kelas'=>'required',
        'Jurusan'=>'required',
        'No_Handphone'=>'required',
        'Email'=>'required',
        'Tanggal_Lahir'=>'required',
    ]);
    Mahasiswa::create($request->all());
    return redirect()-> route('mahasiswas.index')
        ->with('success','Mahasiswa Berhasil Ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        $mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        $mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        $request->validate([
            'Nim'=> 'required',
            'Nama'=>'required',
            'Kelas'=>'required',
            'Jurusan'=>'required',
            'No_Handphone'=>'required',
            'Email'=>'required',
            'Tanggal_Lahir'=>'required',
        ]);
    
        Mahasiswa::find($Nim)->update($request->all());
        return redirect()-> route('mahasiswas.index')
            ->with('success','Mahasiswa Berhasil Diupdate');
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        Mahasiswa::find($Nim)->delete();
            return redirect()->route('mahasiswas.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
};
