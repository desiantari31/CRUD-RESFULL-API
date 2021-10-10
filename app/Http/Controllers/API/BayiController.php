<?php

namespace App\Http\Controllers\API;

use App\Models\Bayi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BayiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bayi::paginate(2);
        return response()->json($data);
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
        $validasi=$request->validate([
            'id_bayi'=>'required',
            'nama_bayi'=>'required',
            'alamat'=>'required',
            'umur_bayi'=>'required',
            'nama_ibu'=>'required',
            'bb'=>'required',
            'panjang_bayi'=>'required',
            'telp'=>'required',
            'foto'=>'required'
        ]);
        try {
            $fileName = time().$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('uploads/bayis',$fileName);
            $validasi['foto']=$path;
            $response = Bayi::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $validasi=$request->validate([
            'id_bayi'=>'required',
            'nama_bayi'=>'required',
            'alamat'=>'required',
            'umur_bayi'=>'required',
            'nama_ibu'=>'required',
            'bb'=>'required',
            'panjang_bayi'=>'required',
            'telp'=>'required',
            'foto'=>''
        ]);
        try {
            if($request->file('foto')){
                $fileName = time().$request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('uploads/bayis',$fileName);
                $validasi['foto']=$path;
            }
            $response = Bayi::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
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
        try {
            $bayi = Bayi::find($id);
            $bayi -> delete();
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
