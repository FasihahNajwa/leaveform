{{-- @if ($crud->hasAccess('supportedby')&& $entry->status == 'Permohonan Baru') --}}
@if ($crud->hasAccess('supportedby')&& $entry->status == 'Diluluskan' && user()->hasPermissionTo('Supported Leave Application'))
  <a href="{{ url($crud->route.'/'.$entry->getKey().'/supportedby') }}" class="btn btn-sm btn-link"><i class="la la-envelope"></i> Disokong</a>
@endif