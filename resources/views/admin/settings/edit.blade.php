@extends("admin.template")
@section("content")
    <div class="col-md-6">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Site Ayarları</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">

                {{ Form::model($settings, ['route' => ['settings.update',$settings->id],'method' => 'put', 'files'=>true] ) }}

                <div class="form-group">
                    <label for="title">Site Başlık</label>
                    <input type="text" class="form-control" name="title" value="{{old("title",$settings->title)}}" name="title" id="title"
                           placeholder="Site Başlık">
                </div>
                <div class="form-group">
                    <label for="detail">Detay</label>
                    <textarea class="form-control" name="detail" >
                            {{$settings->detail}}
                        </textarea>
                </div>
                <div class="form-group">
                    <label for="detail">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{old("email",$settings->email)}}"
                           placeholder="detail">
                </div>

                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" value="{{$settings->facebook}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" id="twitter" name="twitter" value="{{$settings->twitter}}" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-md">Güncelle</button>

            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
    <div class="col-md-6">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Site Ayarları</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                @include('admin.inc.alert')
                @include("admin.inc.arrors");
              {!! Form::open(['route' => ['settings.update',$settings->id], 'method' => 'post']) !!}
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" id="instagram" value="{{$settings->instagram}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="about_us">Hakkımızda</label>
                        <textarea class="form-control" name="about_us" id="about_us" placeholder="Hakkımızda...">
                            {{$settings->about_us}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">Adres</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Adres...">
                            {{$settings->adress}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" id="phone" name="phone" value="{{$settings->phone}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="meta_tag">Meta Tag</label>
                        <textarea class="form-control" name="meta_tag" id="meta_tag" placeholder="Meta Tag...">
                            {{$settings->meta_tag}}
                        </textarea>
                    </div>
                {!! Form::close() !!}
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->

@endsection

@section("js")
@endsection
