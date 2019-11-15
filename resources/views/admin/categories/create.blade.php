@extends("admin.template")
@section("content")

    <div class="col-md-6">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Yeni Kategori ekle</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">

                @include('admin.inc.alert')
                @include("admin.inc.arrors")

                {{ Form::open(['route' => ['category.store'],'method' => 'post'] ) }}

                <div class="form-group">
                    <label for="up_id">Üst Kategori </label>
                    <select id="select2-demo-1" name="up_id" class="form-control"
                            data-plugin="select2">
                        @foreach($category as $item)
                            <option value="{{old("up_id")}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Kategori Başlık</label>
                    <input type="text" class="form-control" value="{{old("title")}}" name="title" id="title"
                           placeholder="Site Başlık">
                </div>
                <div class="form-group">
                    <label for="detail">Açıklama</label>
                    <textarea class="form-control" name="detail" id="detail">
                        {{old("detail")}}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-md">Ekle</button>
                <a href="{{route('category.index')}}" class="btn btn-danger btn-md pull-right">Listeye Dön</a>
                {{ Form::close() }}
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->


@endsection
@section('js')
    <script>
        $('textarea').ckeditor();
        $('.detail').ckeditor(  ); // if class is prefered.
    </script>
@endsection
