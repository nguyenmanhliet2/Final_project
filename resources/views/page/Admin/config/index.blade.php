@extends('share.master')
@section('content')
    <div class="row" id="admin_page">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Configuration Management</h2>
                </div>
                <div class="card-body">
                    <form action="/admin/configuration" method="post">
                        @csrf
                        @for($i = 1; $i < 6; $i++)
                        @php
                            $name = 'slide_' . $i;
                        @endphp
                        <div class="row">
                            <div class="mb-1">
                                <label>Slide {{ $i }}</label>
                                <div class="input-group">
                                    <input name={{$name}} type="text" class="form-control" id="thumbnail_{{$name}}" value="{{ ( isset($config->$name) && Str::length($config->$name) > 0) ? $config->$name : ''}} ">
                                    <input type="button" data-input="thumbnail_{{$name}}" data-preview="holder_{{$name}}" id="$name" value="Upload" class="btn btn-info">
                                </div>
                                    <img id="holder_{{$name}}" style="margin-top:15px;max-height:100px;" src=" {{ (isset($config->$name) && Str::length($config->$name) > 0) ? $config->$name : ''}} ">
                            </div>
                        </div>
                        @endfor
                        <div class="card-footer">
                            <div class="text-end ">
                                <button type="submit" class="btn btn-primary text-right"
                                    style="padding: 10px 41px;">Update Configuration</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
        <script>
            $('#lfm').filemanager('image');
        </script>
    @endsection
