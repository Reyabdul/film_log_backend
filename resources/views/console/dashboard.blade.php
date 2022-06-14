<!--Sourced code from layout.console-->
@extends ('layout.console')

@section ('content')
<section class="w3-padding">
    <ul>
        <li><a href="/console/users/list">Manage Users</a></li>
        <li><a href="/console/collections/list">Mange Collections</a></li>
        <li><a href="/console/photos/list">Manage Photos</a></li>
        <li><a href="/console/logout">Logout</a></li>
    </ul>
</section>
        
@endsection