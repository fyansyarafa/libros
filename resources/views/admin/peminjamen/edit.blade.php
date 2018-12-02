@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.peminjaman.title')</h3>
    
    {!! Form::model($peminjaman, ['method' => 'PUT', 'route' => ['admin.peminjamen.update', $peminjaman->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nama_id', trans('quickadmin.peminjaman.fields.nama').'', ['class' => 'control-label']) !!}
                    {!! Form::select('nama_id', $namas, old('nama_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nama_id'))
                        <p class="help-block">
                            {{ $errors->first('nama_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('judul_buku_id', trans('quickadmin.peminjaman.fields.judul-buku').'', ['class' => 'control-label']) !!}
                    {!! Form::select('judul_buku_id', $judul_bukus, old('judul_buku_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('judul_buku_id'))
                        <p class="help-block">
                            {{ $errors->first('judul_buku_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tanggal_peminjaman', trans('quickadmin.peminjaman.fields.tanggal-peminjaman').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('tanggal_peminjaman', old('tanggal_peminjaman'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tanggal_peminjaman'))
                        <p class="help-block">
                            {{ $errors->first('tanggal_peminjaman') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('batas_waktu', trans('quickadmin.peminjaman.fields.batas-waktu').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('batas_waktu', old('batas_waktu'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('batas_waktu'))
                        <p class="help-block">
                            {{ $errors->first('batas_waktu') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop