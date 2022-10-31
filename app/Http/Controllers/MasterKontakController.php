<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use App\Models\JenisKontak;
use App\Models\Siswa;
use Illuminate\Http\Request;

class MasterKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all('id','nama');
        return view('admin/MasterContact',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $owner_id = $request->query('siswa');
        $siswa = Siswa::find($owner_id);
        $jenis_kontak = JenisKontak::all();
        return view('admin/TambahKontak',compact('siswa','jenis_kontak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'required' =>':attribute harus diisi',
        ];
        $this->validate($request,[
            'siswa_id' => 'required',
            'jenis_kontak' => 'required',
            'deskripsi'  => 'required',
        ],$messages);
        
        Kontak::create([
                'siswa_id'=> $request->siswa_id,
                'jenis_id' => $request->jenis_kontak,
                'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('MasterContact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $kontak = $data->kontak;
        // dd($kontak);
        return view('admin.ShowKontak',compact('data','kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $data = Kontak::find($id);
            $siswa = Siswa::find($data->siswa_id);
            $jenis_kontak = JenisKontak::all();
            return view('admin/EditKontak',compact('data','siswa','jenis_kontak'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages=[
            'required' =>':attribute harus diisi',
        ];
        $this->validate($request,[
            'siswa_id' => 'required',
            'jenis_kontak' => 'required',
            'deskripsi'  => 'required',
        ],$messages);

        $kontak = Kontak::find($id);
        

        $kontak->siswa_id = $request->siswa_id; 
        $kontak->jenis_id = $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        return redirect ('/admin/MasterContact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus($id){
        $data = Kontak ::find($id);
        $data->delete();
        return redirect()->route('MasterContact.index');
    }

}
