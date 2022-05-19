@extends('layout.main')
@push('title')
    <title>Dashboard</title>
@endpush
@section('main-content')
    <a href="https://api.whatsapp.com/send?phone=918238613191&amp;text=Dear%20Sir,%20Please%20share%20your%20New%20Products%20and%20best%20price%20in%20my%20whatsapp%20Number.%20Thank%20you" class="sticy-icon transition" target="_blank" onclick="ga('send', 'event', 'whatsapp-tracking', 'click');">
<i class="fa fa-whatsapp" aria-hidden="true"></i>
</a>
@endsection
