@extends ('layout.console')

@section ('content')

<!--input delete message-->
<?php if(session()->has('message')):  ?>

    <div class="w3-padding w3-margin-top w3-margin-bottom">
        <div class="w3-red w3-center w3-padding">
            <?= session()->get('message') ?>
        </div>
    </div>

<?php endif; ?>


<!--start of Manage Photo section-->
<section class="w3-padding">

    <h2>Manage Photos</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($photos as $photo): ?>
            <tr>
                <td>{{$photo->title}}</td>
                <td><a href="/console/photos/edit/{{$photo->id}}">Edit</a></td>
                <td><a href="/console/photos/delete/{{$photo->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/photos/add" class="w3-button w3-green">New Photo</a>

</section>

@endsection