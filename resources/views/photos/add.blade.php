@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Photo</h2>

    <form method="post" action="/console/photos/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input photo="text" name="title" id="title" value="{{old('title')}}" required>
            
            <!--error message if any errors occur-->
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <button photo="submit" class="w3-button w3-green">Add Photo</button>

    </form>

    <a href="/console/photos/list">Back to Photo List</a>

</section>

@endsection