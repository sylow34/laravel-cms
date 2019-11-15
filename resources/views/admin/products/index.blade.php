@extends("admin.template")
@section("content")
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <!-- DOM dataTable -->
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title m-b-md">Ürünler</h4>
                            <div class="col-md-4">

                                     {{ Form::open(['route' => 'product.search', 'method' => 'post']) }}
                                {{--    {{ csrf_field() }}--}}
                                    <div class="form-group">
                                        <input type="text" name="search" placeholder="{{__("Ürün Ara")}}"
                                               value="{{ old('search') }}" class="form-control">
                                    </div>

                                    <button class="btn btn-primary pull-left btn-sm"><i class="fa fa-search-plus"></i>
                                        {{__("Ara")}}
                                    </button>
                                {{ Form::close() }}
                            </div>
                            <a href="{{route("product.create")}}" class="btn btn-success pull-right btn-sm"><i
                                    class="fa fa-plus"></i> Ekle</a>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-striped"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Ürün Başlık</th>
                                        <th>Kategori</th>
                                        <th>Ürün Açıklama</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Ürün Başlık</th>
                                        <th>Kategori</th>
                                        <th>Ürün Açıklama</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if (count($product) == 0)
                                        <tr><td colspan="7" class="text-center">Kayıt bulunamadı!</td></tr>
                                    @endif
                                    @foreach($product as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->category->title}}</td>
                                            <td>{!! str_limit($item->detail,50)  !!}</td>
                                            <td>
                                                {{ ($item->created_at)->format('m.d.Y H:i') }} </td>
                                            <td>
                                                <a href="{{route("product.edit",$item->id)}}"
                                                   class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i>
                                                    Güncelle</a>
                                            </td>
                                            <td>
                                                {{ Form::open(['route' => ['product.destroy', $item->id], 'method' => 'delete']) }}
                                                <button type="submit" onclick="confirm('Emin misiniz?')"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Sil
                                                </button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$product->links()}}
                            </div>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->

        </section><!-- .app-content -->
    </div><!-- .wrap -->
@endsection

@section("css")
@endsection

@section("js")
@endsection


