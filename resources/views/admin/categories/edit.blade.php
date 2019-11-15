@extends("admin.template")
@section("content")

    <div class="col-md-6">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title"> Kategori Güncelle</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">

                @include('admin.inc.alert')
                @include("admin.inc.arrors");

                    {{ Form::open(['route' => ['category.update',$data->id],'method' => 'put'] ) }}

                    <div class="form-group">
                        <label for="up_id">Üst Kategori </label>
                        <select id="select2-demo-1" name="up_id" class="form-control select2-hidden-accessible"
                                data-plugin="select2" tabindex="-1" aria-hidden="true">

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ App\Helper\mHelper::selectOptions($category->id,$data->up_id) }}>{{$category->title}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Kategori Başlık</label>
                        <input type="text" class="form-control" value="{{old("title",$data->title)}}" name="title"
                               id="title"
                               placeholder="Site Başlık">
                    </div>
                    <div class="form-group">
                        <label for="detail">Açıklama</label>
                        <textarea class="form-control" name="detail" id="detail" class="detail" placeholder="Your comment...">
                            {{old("detail",$data->detail)}}
                        </textarea>
                    </div>



                    <button type="submit" class="btn btn-primary btn-md">Güncelle</button>
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
