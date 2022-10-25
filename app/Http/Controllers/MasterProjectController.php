<?php

namespace App\Http\Controllers;
use App\Models\Projek; 
use App\Models\Siswa;
use Illuminate\Http\Request;
use File;

class MasterProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('admin')->except('index','show'); 
    }
    public function index()
    {
        $data = Siswa::all('id','nama');
        return view('admin/MasterProject',compact('data'));
        // return view('admin/MasterProject');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $owner_id = $request->query('siswa');
        $siswa = Siswa::find($owner_id);
        return view('admin/TambahProject', compact('siswa'));
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
            'mimes' =>'file :attribute harus bertipe jpg,jpeg,png',
        ];
        $this->validate($request,[
            'id_siswa' => 'required',
            'nama_projek' => 'required|min:5|max:25',
            'tanggal'  => 'required',
            'deskripsi'  => 'required',
            'foto'  => 'required|mimes:jpg,jpeg,png'
        ],$messages);

        //ambil informasi file yang diupload
        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img/Projek';
        $file->move($tujuan_upload,$nama_file);  

        //proses insert database
        Projek::create([
            'id_siswa' => $request->id_siswa,
            'nama_projek' => $request->nama_projek,
            'tanggal'  => $request->tanggal,
            'deskripsi'  => $request->deskripsi,
            'foto'  => $nama_file
            
        ]);
        return redirect()->route('MasterProject.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id)->project;
        // return response()->json($data);
        return view('admin.ShowProject', compact('data') );
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
            $data = Projek::find($id);
            $siswa = Siswa::find($data->id_siswa);
            return view('admin/EditProjek',compact('data','siswa'));
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
            'mimes' =>'file :attribute harus bertipe jpg,jpeg,png',
        ];
        $this->validate($request,[
            'id_siswa' => 'required',
            'nama_projek' => 'required|min:5|max:25',
            'tanggal'  => 'required',
            'deskripsi'  => 'required',
            'foto'  => 'mimes:jpg,jpeg,png'
        ],$messages);
        if($request->foto !=''){
            //Dengan Ganti Foto 
    
            //1.Hapus Foto Lama 
            $projek=Projek::find($id);
            file::delete('./template/img/Projek/'.$projek->foto);
    
            //2.ambil informasi file yang diupload
            $file = $request->file('foto');
    
            //3.rename + ambil nama file
            $nama_file = time()."_".$file->getClientOriginalName();
    
            //4.proses upload
            $tujuan_upload = './template/img/Projek';
            $file->move($tujuan_upload,$nama_file);
    
            //5.Menyimpan Ke database
            $projek->id_siswa = $request->id_siswa; //dari data siswa diganti data yang ada di form
            $projek->nama_projek = $request->nama_projek;
            $projek->tanggal = $request->tanggal;
            $projek->deskripsi = $request->deskripsi;
            $projek->foto = $nama_file;
            $projek->save();
            return redirect ('/admin/MasterProject');
    
            }else{
                //Tanpa Ganti Foto
                $projek=Projek::find($id);
                $projek->id_siswa = $request->id_siswa; //dari data siswa diganti data yang ada di form
                $projek->nama_projek = $request->nama_projek;
                $projek->tanggal = $request->tanggal;
                $projek->deskripsi = $request->deskripsi;
                $projek->save();
                return redirect ('/admin/MasterProject');
    
    
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
        //
    }
    public function hapus ($id) {
        $data=Projek::find($id);
        if($data->foto != '') {
         file::delete('./template/img/Projek/'.$data->foto);
        }
        $data->delete();
        return redirect()->route('MasterProject.index');
    }
}
