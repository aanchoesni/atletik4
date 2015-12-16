@if (Sentry::getUser()->hasPermission('admin'))
@include('dashboard.indexadmin')
@endif

@if (Sentry::getUser()->hasPermission('panitia'))
@include('dashboard.indexpanitia')
@endif

@if (Sentry::getUser()->hasPermission('user'))
@include('dashboard.indexuser')
@endif
