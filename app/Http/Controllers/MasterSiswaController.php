<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use File;
use Illuminate\Http\Request;

class MasterSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin')->except('index','show');
     }
     
    public function index()
    {
        $data = Siswa::all();
        return view('admin/MasterSiswa',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/TambahSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ambil informasi file yang diupload
        // $file = $request->file('foto');
        // print_r($file);die;
    
        $messages=[
            'required' =>':attribute harus diisi',
            'min' =>':attribute minimal :min karakter',
            'max' =>':attribute maksimal :max karakter',
            'mimes' =>'file :attribute harus bertipe jpg,jpeg,png'
        ];
        $this->validate($request,[
            'nama' => 'required|min:5|max:25',
            'jenis_kelamin'  => 'required',
            'email'  => 'required',
            'alamat'  => 'required|min:5',
            'about'  => 'required|min:50',
            'foto'  => 'required|mimes:jpg,jpeg,png'
        ],$messages);
        //ambil informasi file yang diupload
        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //proses insert database
        Siswa::create([
            'nama' => $request->nama,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'email'  => $request->email,
            'alamat'  => $request->alamat,
            'about'  => $request->about,
            'foto'  => $nama_file
        ]);
        return redirect('/admin/MasterSiswa');
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
        // return $data;
        $kontak = $data->kontak;
        $projek = $data->project;
        return view('admin/ShowSiswa',compact('data','kontak','projek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::find($id);
        return view('admin/EditSiswa',compact('data'));
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
            'min' =>':attribute minimal :min karakter',
            'max' =>':attribute maksimal :max karakter',
            'mimes' =>'file :attribute harus bertipe jpg,jpeg,png'
        ];
        $this->validate($request,[
            'nama' => 'required|min:5|max:25',
            'jenis_kelamin'  => 'required',
            'email'  => 'required',
            'alamat'  => 'required|min:5',
            'about'  => 'required|min:50',
            'foto'  => 'mimes:jpg,jpeg,png'
        ],$messages);

        if($request->foto !=''){
        //Dengan Ganti Foto 

        //1.Hapus Foto Lama 
        $siswa=Siswa::find($id);
        file::delete('./template/img/'.$siswa->foto);

        //2.ambil informasi file yang diupload
        $file = $request->file('foto');

        //3.rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //4.proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //5.Menyimpan Ke database
        $siswa->nama = $request->nama; //dari data siswa diganti data yang ada di form
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->email = $request->email;
        $siswa->alamat = $request->alamat;
        $siswa->about = $request->about;
        $siswa->foto = $nama_file;
        $siswa->save();
        return redirect ('/admin/MasterSiswa');

        }else{
            //Tanpa Ganti Foto
            $siswa=Siswa::find($id);
            $siswa->nama = $request->nama; //dari data siswa diganti data yang ada di form
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->save();
            return redirect ('/admin/MasterSiswa');


        }
           
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function hapus($id)
    {
       $data=Siswa::find($id);
       if($data->foto != '') {
        file::delete('./template/img/'.$data->foto);
       }
       $data->delete();
       return redirect('/admin/MasterSiswa');
    }
}
