@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Photo</h2>

    <form method="post" action="/console/photos/add" novalidate class="w3-margin-bottom">

        @csrf

        <!--Title-->
        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="title" name="title" id="title" value="{{old('title')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <!--ISO-->
        <div class="w3-margin-bottom">
            <label for="iso">ISO:</label>
            <input type="text" name="iso" id="iso" value="{{old('iso')}}">

            @if ($errors->first('iso'))
                <br>
                <span class="w3-text-red">{{$errors->first('iso')}}</span>
            @endif
        </div>

        <!--AV-->
        <div class="w3-margin-bottom">
            <label for="av">AV:</label>
            <input type="text" name="av" id="av" value="{{old('av')}}">

            @if ($errors->first('av'))
                <br>
                <span class="w3-text-red">{{$errors->first('av')}}</span>
            @endif
        </div>

        <!--SS-->
        <div class="w3-margin-bottom">
            <label for="ss">SS:</label>
            <input type="text" name="ss" id="ss" value="{{old('ss')}}">

            @if ($errors->first('ss'))
                <br>
                <span class="w3-text-red">{{$errors->first('ss')}}</span>
            @endif
        </div>

        <!--Notes-->
        <div class="w3-margin-bottom">
            <label for="note">Note:</label>
            <textarea name="note" id="note" required>{{old('note')}}</textarea>

            @if ($errors->first('note'))
                <br>
                <span class="w3-text-red">{{$errors->first('note')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="collection_id">Collection:</label>
            <select name="collection_id" id="collection_id">
                <option></option>
                @foreach ($collections as $collection)
                    <option value="{{$collection->id}}"
                        {{$collection->id == old('collection_id') ? 'selected' : ''}}>
                        {{$collection->title}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('collection_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('collection_id')}}</span>
            @endif
        </div>

        <button collection="submit" class="w3-button w3-green">Add Photo</button>

    </form>

    <a href="/console/photos/list">Back to Photo List</a>

</section>

@endsection