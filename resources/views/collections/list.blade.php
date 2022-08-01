@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Collections</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th> 
            <th>Name</th>
            <th>Film</th>
            <th>Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($collections as $collection): ?>
            <tr>
                <td>
                    @if ($collection->image)
                        <img src="{{asset('storage/'.$collection->image)}}" width="200">
                    @endif
                </td>
                <td>{{$collection->title}}</td>
                <td>{{$collection->film}}</td>
                <td>{{$collection->created_at->format('M j, Y')}}</td>
                <td><a href="/console/collections/image/{{$collection->id}}">Image</a></td>
                <td><a href="/console/collections/edit/{{$collection->id}}">Edit</a></td>
                <td><a href="/console/collections/delete/{{$collection->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/collections/add" class="w3-button w3-green">New Collections</a>

</section>

@endsection