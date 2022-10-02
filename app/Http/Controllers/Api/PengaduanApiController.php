<?php

namespace App\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\Response;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Helpers\Helper;
use DataTables;
use Validator;

class PengaduanApiController extends Controller
{
    public function json(Request $request){
        // $data = Skrk::select('*');
        if ($request->ajax()) {
            $data = Pengaduan::select('*');
            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        // $gid = $data->gid;
                        // dd($gid);
                        $view = route('show', $data);
                        $btn = '<input type="hidden" name="id" id="id" value="'.$data->id.'">';
                        $btn = $btn . '<a href="'.$view.'" onclick="show_json('.$data->id.')" data-id="'.$data->id.'" class="edit btn btn-info btn-sm mr-2 mb-2">
                        View
                        </a>';
                        $btn = $btn . '<a href="javascript:void(0)" onclick="edit_json('.$data->id.')" data-id="'.$data->id.'" data-toggle="modal" data-target="#modal-lg" class="edit btn btn-primary btn-sm mr-2 mb-2">
                        Update
                        </a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('home1');
        // return response()->json($data);
    }

    public function show_json($id)
    {
        $aspects = Pengaduan::find($id);
        // dd($aspects);
        return response()->json($aspects);
    }

    public function store_json(Request $request)
    {
        // dd(Pengaduan::where('id', $request->id)->exists());
        // $last3 = DB::table('pengaduan')->latest('id')->select('id')->first();
        // dd($last3->id);
        if ($request->hasFile('file_dokumen')) {
            if (Storage::exists('public/file_dokumen/'.$request->emp_file_dokumen)) {
                Storage::delete('public/file_dokumen/'.$request->emp_file_dokumen);
            }
            $image = $request->file('file_dokumen');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/file_dokumen', $fileName);
        }else {
            $fileName = $request->emp_file_dokumen;
        }
        if ($request->hasFile('file_lapangan')) {
            if (Storage::exists('public/file_lapangan/'.$request->emp_file_lapangan)) {
                Storage::delete('public/file_lapangan/'.$request->emp_file_lapangan);
            }
            $image2 = $request->file('file_lapangan');
            $fileName2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->storeAs('public/file_lapangan', $fileName2);
        }else {
            $fileName2 = $request->emp_file_lapangan;
        }
        if (Pengaduan::where('id', $request->id)->exists()) {
            $pengaduan = Pengaduan::findOrFail($request->id);
            $pengaduan->nama_pengadu = $request->nama_pengadu;
            $pengaduan->alamat_pengadu = $request->alamat_pengadu;
            $pengaduan->nama_teradu = $request->nama_teradu;
            $pengaduan->alamat_teradu = $request->alamat_teradu;
            $pengaduan->kelurahan = $request->kelurahan;
            $pengaduan->kecamatan = $request->kecamatan;
            $pengaduan->no_skrk = $request->no_skrk;
            $pengaduan->no_imb = $request->no_imb;
            $pengaduan->latitude = $request->latitude;
            $pengaduan->longitude = $request->longitude;
            $pengaduan->keterangan = $request->keterangan;
            $pengaduan->status_pengaduan = $request->status_pengaduan;
            $pengaduan->file_dokumen = $fileName;
            $pengaduan->file_lapangan = $fileName2;
            $pengaduan->save();
        }else {
            // Pengaduan::updateOrCreate([
            // Pengaduan::update([
            //     'id' => $request->id
            // ],
            // [
            //     'nama_pengadu' => $request->nama_pengadu,
            //     'alamat_pengadu' => $request->alamat_pengadu,
            //     'nama_teradu' => $request->nama_teradu,
            //     'alamat_teradu' => $request->alamat_teradu,
            //     'kelurahan' => $request->kelurahan,
            //     'kecamatan' => $request->kecamatan,
            //     'no_skrk' => $request->no_skrk,
            // ]);
            // $id = IdGenerator::generate(['table' => 'pengaduan', 'length' => 6, 'prefix' => 0]);
            // dd(Helper::IDGenerator(new Pengaduan,'id',5));
            // $validator = Validator::make($request->all(), [
            //     'id' => 'required|digits:5',
            // ]);
            Pengaduan::create([
            // Product::update([
                
            // ],
            // [
                'id' => Helper::IDGenerator(new Pengaduan,'id',5),
                // 'id' => $id,
                'nama_pengadu' => $request->nama_pengadu,
                'alamat_pengadu' => $request->alamat_pengadu,
                'nama_teradu' => $request->nama_teradu,
                'alamat_teradu' => $request->alamat_teradu,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'no_skrk' => $request->no_skrk,
                'no_imb' => $request->no_imb,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'keterangan' => $request->keterangan,
                'status_pengaduan' => $request->status_pengaduan,
                'file_dokumen' => $request->$fileName,
                'file_lapangan' => $request->$fileName2,
            ]);
        }       

        return response()->json(['success'=>'Data Pengaduan saved successfully.']);
    }
    public function delete_json($id)
    {
        Pengaduan::find($id)->delete();
      
        return response()->json(['success'=>'Data Pengaduan deleted successfully.']);
    }
}
