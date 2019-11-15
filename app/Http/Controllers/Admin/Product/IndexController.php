<?php

namespace App\Http\Controllers\Admin\Product;

use App\CategoryModel;
use App\ProductDetailModel;
use App\ProductModel;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\ImageUploadHelper;
use File;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $search = request('search');
        if (request()->filled('search')) {
            request()->flash();
            $search = request('search');
            $product = ProductModel::where('title', 'like', "%$search%")
                ->orWhere('id', 'like', "$search")
                ->orderByDesc('id')
                ->paginate(10)
                ->appends('search', $search);
           //->appends(['aranan' => $aranan, 'ust_id' => $ust_id]);
        } else {
            request()->flush();
            $product = ProductModel::orderBy('id', 'desc')->paginate(10);
        }

        return view("admin.products.index", compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $product = ProductModel::all();
        $categories = CategoryModel::all();

        return view("admin.products.create", compact("categories"));
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
        request()->flash();
        $data = $request->only("title","detail","price","image");

        $data["slug"] = mHelper::permalink($data["title"]);
        $data["image"] = ImageUploadHelper::singleUpload(rand(1, 90000), "product", $request->file("image"));
        $detail = $request->only("show_slider","show_opportunity_of_day","show_best_seller","show_discount");
        $insert = ProductModel::create($data);

        if ($insert) {
            $insert->productDetail()->create($detail);
            $category = request('category_id');
            $insert->category()->attach($category);

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
        if (ProductModel::where(["id" => $id])->count() > 0) {

            $data = ProductModel::where(["id" => $id])->firstOrFail();

            $products = ProductModel::all();

            return view("admin.products.edit", compact("data", "products"));
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


        $count = ProductModel::where(["id" => $id])->count();

        if ($count > 0) {
            $data = ProductModel::where(["id" => $id])->first();
            $all = $request->except("_token", "_method");

            $all["slug"] = mHelper::permalink($all["title"]);
            request()->merge(['slug' => $all['slug']]);

            $all["image"] = ImageUploadHelper::singleUploadUpdate(rand(1, 90000), "product", $request->file("image"), $data, "image");
            $update = ProductModel::where(["id" => $id])->update($all);

            if ($update) {
                return redirect()->back()
                    ->with("status", "success")
                    ->with("message", "Kayıt başarıyla güncellendi");
            } else {
                return redirect()->back()
                    ->with("status", "danger")
                    ->with("message", "Kayıt güncellemede hata oluştu !!!");
            }
        } else {
            return redirect()->back()
                ->with("status", "danger")
                ->with("message", "Kayıt bulunamadı !!!");
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
        if (ProductModel::where(["id" => $id])->count() > 0) {

            $data = ProductModel::where(["id" => $id])->first();
            $delete = ProductModel::where(["id" => $id])->delete();

            File::delete($data->image);
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
