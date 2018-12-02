@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.peminjaman.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.peminjaman.fields.nama')</th>
                            <td field-key='nama'>{{ $peminjaman->nama->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.peminjaman.fields.judul-buku')</th>
                            <td field-key='judul_buku'>{{ $peminjaman->judul_buku->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.peminjaman.fields.tanggal-peminjaman')</th>
                            <td field-key='tanggal_peminjaman'>{{ $peminjaman->tanggal_peminjaman }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.peminjaman.fields.batas-waktu')</th>
                            <td field-key='batas_waktu'>{{ $peminjaman->batas_waktu }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.peminjamen.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
