@extends("admin.template")
@section("content")

    <div class="col-md-6">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title"> Ürün Güncelle</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">


                {{ Form::open(['route' => ['product.update',$data->id],'method' => 'put',"files"=>"true"] ) }}

                <div class="form-group">
                    <label for="title">Kategori Başlık</label>
                    <input type="text" class="form-control" value="{{old("title",$data->title)}}" name="title"
                           id="title"
                           placeholder="Site Başlık">
                </div>
                <div class="form-group">
                    <label for="detail">Açıklama</label>
                    <textarea class="form-control" name="detail" id="detail" data-class="detail"
                              placeholder="Your comment...">
                            {{old("detail",$data->detail)}}
                        </textarea>
                </div>

                <div class="form-group">
                    <label for="title">Ürün Resmi</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>

                    @if($data->image !="")
                    <div class="media-left">
                        <div class="avatar avatar-sm avatar-circle">
                            <img src="{{asset($data->image)}}"  class="img-rounded" >
                        </div>
                    </div>
                    @endif

                <div class="checkbox">
                    <label>
                        <input type="hidden" name="show_slider" value="0">
                        <input type="checkbox" name="show_slider" value="1" {{ old('show_slider', $entry->productDetail->show_slider) ? 'checked' : '' }}> Slider'da Göster
                    </label>
                    <label>
                        <input type="hidden" name="show_opportunty_of_day" value="0">
                        <input type="checkbox" name="show_opportunty_of_day" value="1" {{ old('show_opportunty_of_day', $entry->productDetail->show_opportunty_of_day) ? 'checked' : '' }}> Günün Fırsatında Göster
                    </label>
                    <label>
                        <input type="hidden" name="show_best_seller" value="0">
                        <input type="checkbox" name="show_best_seller" value="1" {{ old('show_best_seller', $entry->productDetail->show_best_seller) ? 'checked' : '' }}> En Çok Satan
                    </label>
                    <label>
                        <input type="hidden" name="show_discount" value="0">
                        <input type="checkbox" name="show_discount" value="1" {{ old('show_discount', $entry->detay->show_discount) ? 'checked' : '' }}> İndirimli Ürünlerde Göster
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
                {{ Form::close() }}
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->


@endsection

@section('js')

    <script>
        $('.detail').ckeditor(); // if class is prefered.
    </script>
@endsection
