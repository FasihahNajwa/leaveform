{{-- @if ($crud->hasAccess('approvedby')&& $entry->status == 'Disokong') --}}
@if ($crud->hasAccess('approvedby')&& $entry->status == 'Permohonan Baru' && user()->hasPermissionTo('Approved Leave Application'))
  <a href="{{ url($crud->route.'/'.$entry->getKey().'/approvedby') }}" class="btn btn-sm btn-link"><i class="la la-envelope"></i> Kelulusan</a>
@endif
