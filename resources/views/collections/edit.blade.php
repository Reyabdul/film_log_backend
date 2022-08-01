@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Collection</h2>

    <form method="post" action="/console/collections/edit/{{$collection->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title', $collection->title)}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="film">Film:</label>
            <input type="text" name="film" id="film" value="{{old('film', $collection->film)}}" required>
            
            @if ($errors->first('film'))
                <br>
                <span class="w3-text-red">{{$errors->first('film')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Collection</button>

    </form>

    <a href="/console/collections/list">Back to Collection List</a>

</section>

@endsection