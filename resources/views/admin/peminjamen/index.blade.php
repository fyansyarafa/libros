@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.peminjaman.title')</h3>
    @can('peminjaman_create')
    <p>
        <a href="{{ route('admin.peminjamen.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('peminjaman_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.peminjamen.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.peminjamen.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($peminjamen) > 0 ? 'datatable' : '' }} @can('peminjaman_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('peminjaman_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.peminjaman.fields.nama')</th>
                        <th>@lang('quickadmin.peminjaman.fields.judul-buku')</th>
                        <th>@lang('quickadmin.peminjaman.fields.tanggal-peminjaman')</th>
                        <th>@lang('quickadmin.peminjaman.fields.batas-waktu')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($peminjamen) > 0)
                        @foreach ($peminjamen as $peminjaman)
                            <tr data-entry-id="{{ $peminjaman->id }}">
                                @can('peminjaman_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='nama'>{{ $peminjaman->nama->name ?? '' }}</td>
                                <td field-key='judul_buku'>{{ $peminjaman->judul_buku->name ?? '' }}</td>
                                <td field-key='tanggal_peminjaman'>{{ $peminjaman->tanggal_peminjaman }}</td>
                                <td field-key='batas_waktu'>{{ $peminjaman->batas_waktu }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('peminjaman_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.peminjamen.restore', $peminjaman->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('peminjaman_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.peminjamen.perma_del', $peminjaman->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('peminjaman_view')
                                    <a href="{{ route('admin.peminjamen.show',[$peminjaman->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('peminjaman_edit')
                                    <a href="{{ route('admin.peminjamen.edit',[$peminjaman->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('peminjaman_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.peminjamen.destroy', $peminjaman->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('peminjaman_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.peminjamen.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection