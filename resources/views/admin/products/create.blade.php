@extends("admin.template")
@section("content")

    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Yeni Ürün ekle</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">

                @include('admin.inc.alert')
                @include("admin.inc.arrors")
                {{ Form::open(['route' => ['product.store'],'method' => 'post',"files"=>"true"] ) }}
                <div class="row">


                <div class="col-md-6">

                    <div class="form-group">
                        <label for="select2-demo-1">Kategoriler</label>

                        <select id="select2-demo-1" name="category_id[]" class="form-control" data-plugin="select2" multiple>
                            @foreach($categories as $category)
                                <option value="{{old("category_id",$category->id)}}">{{$category->title}}</option>
                            @endforeach
                        </select>

                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label for="title">Ürün Başlık</label>
                        <input type="text" class="form-control" value="{{old("title")}}" name="title" id="title"
                               placeholder="Site Başlık">
                    </div>
                    <div class="form-group">
                        <label for="detail">Açıklama</label>
                        <textarea class="form-control" name="detail" id="detail">
                        {{old("detail")}}
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Ürün Resmi</label>
                        <input type="file" class="form-control-file" value="{{old("image")}}" name="image" id="image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fiyati">Fiyatı</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Fiyatı"
                               value="{{ old('price') }}">
                    </div>
                    <div class="checkbox">
                        <div class="checkbox checkbox-primary">
                            <input type="hidden" name="show_slider" id="custome-checkbox1" value="0"/>
                            <input type="checkbox" name="show_slider" id="custome-checkbox1" value="1"/>
                            <label for="custome-checkbox1">Slider'da Göster</label>
                        </div>
                        <div class="checkbox checkbox-primary">
                            <input type="hidden" name="show_opportunty_of_day" id="custome-checkbox2" value="0">
                            <input type="checkbox" name="show_opportunty_of_day" id="custome-checkbox2" value="1">
                            <label for="custome-checkbox2">Günün Fırsatında Göster</label>
                        </div>
                        <div class="checkbox checkbox-primary">
                            <input type="hidden" name="show_best_seller" id="custome-checkbox3" value="0">
                            <input type="checkbox" name="show_best_seller" id="custome-checkbox3" value="1">
                            <label for="custome-checkbox3">En Çok Satan</label>
                        </div>
                        <div class="checkbox checkbox-primary">
                            <input type="hidden" name="show_discount" id="custome-checkbox4" value="0">
                            <input type="checkbox" name="show_discount" id="custome-checkbox4" value="1">
                            <label for="custome-checkbox4">İndirimli Ürünlerde Göster</label>
                        </div>

                    </div>
                </div>
                    <div class="row col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md m-l-sm">@lang("Ekle")</button>
                        </div>
                    </div>

                {{ Form::close() }}
                </div>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>


@endsection
@section('js')
    <!-- build:js ../assets/js/core.min.js -->
    <script src="/admin_assets/js/select2.full.min.js"></script>

    <script>
        $('textarea').ckeditor();
        $('.detail').ckeditor(); // if class is prefered.
    </script>
@endsection
