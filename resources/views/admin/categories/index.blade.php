@extends("admin.template")
@section("content")
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <!-- DOM dataTable -->
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Kategoriler</h4>
                            <a href="{{route('category.create')}}" class="btn btn-warning pull-right btn-sm"><i class="fa fa-plus"></i> Ekle</a>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-striped"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Kategori Başlık</th>
                                        <th>Kategori Türü</th>
                                        <th>Kategori Açıklama</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Kategori Başlık</th>
                                        <th>Kategori Türü</th>
                                        <th>Kategori Açıklama</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Düzenle</th>
                                        <th>Sil</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($category as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                @if(!empty($item->up_id))
                                                    Alt Kategori
                                                @else
                                                    Üst Kategori
                                                @endif
                                            </td>
                                            <td>{!! str_limit($item->detail,50)  !!}</td>
                                            <td>
                                                {{ ($item->created_at)->format('m.d.Y H:i') }} </td>
                                            <td>
                                                <a href="{{route("category.edit",$item->id)}}"
                                                   class="btn btn-primary btn-sm"> Güncelle</a>
                                            </td>
                                            <td>
                                                 {{ Form::open(['route' => ['category.destroy', $item->id], 'method' => 'delete']) }}
                                                <button type="submit" onclick="confirm('Emin misiniz?')" class="btn btn-danger btn-sm">Sil</button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$category->links()}}
                            </div>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->

        </section><!-- .app-content -->
    </div><!-- .wrap -->
@endsection

@section('js')

    <script>
        $('textarea').ckeditor();
        $('.detail').ckeditor(  ); // if class is prefered.
    </script>
@endsection


