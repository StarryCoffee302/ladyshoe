<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Shoe;
class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return $pembayaran;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_sepatu = Shoe::where('id', $request->id_sepatu)->first();
        $harga_total = $request->jumlah*$data_sepatu->harga;

        $data = Pembayaran::create([
            "id_sepatu" => $request->id_sepatu,
            "jumlah" => $request->jumlah,
            "harga_total" => $harga_total,
        ]);

        return response([
            'success' => 201,
            'message' => 'data berhasil diinputkan',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = pembayaran::find($id);
        if ($pembayaran) {
            return response([
                'status' => 200,
                'data' => $pembayaran
            ], 200);
        } else {
            return response([
                'status' => 404,
                'message' => 'id atas ' . $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pembayaran = pembayaran::find($id)->update($request->all());
        if ($pembayaran){
            return response([
                'status' => 200,
                "message" => "Data berhasil diubah",
                'data' => $pembayaran,
            ]);
        } else{
            return response([
                'status' => 400,
                'message' => 'Data gagal diubah'   
            ], 400);
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
        $pembayaran = pembayaran::where('id', $id)->first();
        if($pembayaran){
            $pembayaran->delete();
            return response([
                'status' => 200,
                'message' => 'Data berhasil dihapus'
            ]);
        } else{
            return response([
                'status' => 400,
                'message' => 'Data tidak ditemukan'   
            ]);
        }
    }
}
