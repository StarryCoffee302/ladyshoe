<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoe = Shoe::all();
        return $shoe;
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
        $table = Shoe::create($request->all());

        return response([
            'message' => 'data berhasil diinputkan',
            'data' => $table
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
        $shoe = shoe::find($id);
        if ($shoe) {
            return response([
                'status' => 200,
                'data' => $shoe
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shoe = Shoe::find($id)->update($request->all());
        if ($shoe){
            return response([
                'status' => 200,
                'message' => "data berhasil diubah",
                'data' => $shoe
            ]);
        } 
        else{  
            return response ([
                "status" => 400,
                "message" => "Data gagal diubah",
            ]); 
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
        $shoe = shoe::where('id', $id)->first();
        if($shoe){
            $shoe->delete();
            return response([
                'status' => 200,
                'message' => 'data berhasil dihapus'
            ],200);
        } else{
            return response([
                'status' => 400,
                'message' => $id . ' tidak ditemukan'   
            ], 400);
        }
    }
}
