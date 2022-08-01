@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Photos</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>Title</th>
            <th>ISO</th>
            <th>AV</th>
            <th>SS</th>
            <th>Notes</th>
            <th>Collection</th>
            <th>Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($photos as $photo)
            <tr>
                <td>
                    @if ($photo->image)
                        <img src="{{asset('storage/'.$photo->image)}}" width="200">
                    @endif
                </td>
                <td>{{$photo->title}}</td>
                <td>{{$photo->iso}}</td>
                <td>{{$photo->av}}</td>
                <td>{{$photo->ss}}</td>
                <td>{{$photo->notes}}</td>
                <td>{{$photo->collection->title}}</td>
                <td>{{$photo->created_at->format('M j, Y')}}</td>
                <td><a href="/console/photos/image/{{$photo->id}}">Image</a></td>
                <td><a href="/console/photos/edit/{{$photo->id}}">Edit</a></td>
                <td><a href="/console/photos/delete/{{$photo->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/photos/add" class="w3-button w3-green">New Photo</a>

</section>

@endsection