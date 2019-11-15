<?php

namespace App\Http\Controllers\Admin\Category;

use App\CategoryModel;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryModel::orderBy('id', 'desc')->paginate(10);
        return view("admin.categories.index", compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryModel::all();
        request()->flash();
        return view("admin.categories.create", compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            "title" => "required",
        ]);

        $data = $request->except("_token");
        $data["slug"] = mHelper::permalink($data["title"]);

        $insert = CategoryModel::create($data);
        if ($insert) {
            return redirect()->back()
                ->with("status", "success")
                ->with("message", "Kayıt başarıyla oluşturuldu");
        } else {
            return redirect()->back()
                ->with("status", "danger")
                ->with("message", "Kayıt eklemede hata oluştu !!!");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (CategoryModel::where(["id" => $id])->count() > 0) {

            $data = CategoryModel::where(["id" => $id])->first(); // firstOrFail
            $categories = CategoryModel::all();

            return view("admin.categories.edit", compact("data", "categories"));
        } else {
            return redirect()->back()
                ->with("status", "danger")
                ->with("message", "Böyle bir kayıt bulunamadı !!!");
        }

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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            "title" => "required",
        ]);

        $data = $request->except("_token", "_method");

        $data["slug"] = mHelper::permalink($data["title"]);
        $update = CategoryModel::where(["id" => $id])->update($data);


        if ($update) {
            return redirect()->back()
                ->with("status", "success")
                ->with("message", "Kayıt başarıyla güncellendi");
        } else {
            return redirect()->back()
                ->with("status", "danger")
                ->with("message", "Kayıt güncellemede hata oluştu !!!");
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
        if (CategoryModel::where(["id" => $id])->count() > 0) {

            $delete = CategoryModel::where(["id"=>$id])->delete();
            if ($delete) {
                return redirect()->back()
                    ->with("status", "success")
                    ->with("message", "Kayıt başarıyla silindi");
            } else {
                return redirect()->back()
                    ->with("status", "danger")
                    ->with("message", "Kayıt silmede hata oluştu !!!");
            }
        } else {
            return redirect()->back()
                ->with("status", "danger")
                ->with("message", "Böyle bir kayıt bulunamadı !!!");
        }
    }
}
