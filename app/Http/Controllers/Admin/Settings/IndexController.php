<?php

namespace App\Http\Controllers\Admin\Settings;

use App\SettingsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Session::flush();
        // $request->session()->flush();
        //   dd($request->all());
        //   dd( Session::all() );
        $settings = SettingsModel::find(1)->first();

        return view("admin.settings.edit", compact("settings"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //   return view("admin.settings.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = SettingsModel::find($id)->first();
        //        echo $settings->gokhan;
        //        //exit();
        return view("admin.settings.edit", compact("settings"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), array(
            'title' => 'required',
            'detail' => 'required',
        ));


        $settings = SettingsModel::find($id);

        $settings->title = request('title');
        $settings->detail = request('detail');
        $settings->email = request('email');

        $settings->facebook = request('facebook');
        $settings->twitter = request('twitter');
        $settings->instagram = request('instagram');
        $settings->about_us = request('about_us');
        $settings->address = request('address');
        $settings->phone = request('phone');

        if (request()->hasFile('logo')) {

            $this->validate(request(), ['logo' => 'image|mimes:png,jpg,jpeg,gif|max:2048']);

            /*	$resim->extension = resim uzantısını alır
                $resim->getclientOrijinalName() = resmin orjinal ismini alır
                rasgele isim üretir = hashName();*/

            $image = request()->file('logo');
            $file_name = 'logo' . '-' . time() . '.' . $image->extension();

            if ($image->isValid()) {

                $target_folder = 'uplaods/dosyalar';
                $image_folder = $target_folder . '/' . $file_name;
                $image->move($target_folder, $file_name);
                $settings->logo = $image_folder;
            }
        }


        if ($settings->save()) {
            return redirect()->back()
                ->with("status", "success")
                ->with("message", "Kayıt başarıyla güncellendi");
        } else {
            return redirect()->back()
                ->with("status", "danger")
                ->with("message", "Kayıt eklemede hata oluştu !!!");
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
