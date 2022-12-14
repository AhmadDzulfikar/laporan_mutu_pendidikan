<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::orderBy('name', 'ASC')->role('admin')->get();
        return view('user.admin',compact('admin'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     "gambar",
        //     "name" => 'required',
        //     "email" => 'required',
        //     "password" => 'required|min:8'
        // ]);
        // $data = new User();
        // $data->gambar = $request->gambar;
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->password = Hash::make($request->password);
        // $data->assignRole('admin');
        // if($request->gambar){
        //     $img = $request->file('gambar');
        //     $filename = $img->getClientOriginalName();

        //     if ($request->hasFile('gambar')) {
        //         $request->file('gambar')->storeAs('/user',$filename);
        //     }
        //     $data->gambar = $request->file('gambar')->getClientOriginalName();
        // }

        // $data->save();
        // toast()->success('Berhasil','Berhasil Menambah Admin')->position('top');

        // return redirect()->back();

        $validator = Validator::make($request->all(), [
            "gambar",
            "name" => 'required',
            "email" => 'required',
            "password" => 'required|min:8'
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Menambah Admin')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Menambah Admin')->position('top');
        }
        $data = new User();

        $data->gambar = $request->gambar;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->assignRole('admin');
        if($request->gambar){
            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/user',$filename);
            }
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }

        $data->save();

        return redirect()->back();
    }

    public function edit(Request $request,$id)
    {
        $data = User::where('id', $id)->firstOrFail();

        $this->validate($request, [
            "gambar",
            "name" => 'required',
            "email" => 'required',
            "password" => 'required|min:8'
        ]);

        $data = new User();
        $data->gambar = $request->gambar;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->assignRole('admin');
        if($request->gambar){
            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/user',$filename);
            }
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $data->save();
        toast()->success('Berhasil','Berhasil Mengedit Admin')->position('top');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        toast()->success('Berhasil','Berhasil Menghapus Admin')->position('top');
        
        return redirect()->back();
    }
}
