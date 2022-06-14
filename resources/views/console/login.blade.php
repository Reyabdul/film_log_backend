
@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <!--'post' is used when filling forms and sending it outwards-->
    <form action="/console/login" method="post" novalidate>

        <!--'csrf' is a Laravel security that prevents cross script hacking in forms ('https://laravel.com/docs/9.x/csrf') -->
        <!--@csrf-->
        <?= csrf_field() ?>

        <div class="w3-margin-bottom">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required>
            
            @if ($errors->first('email'))
                <br>
                <span class="w3-text-red">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            @if ($errors->first('password'))
                <br>
                <span class="w3-text-red">{{$errors->first('password')}}</span>
            @endif
            
        </div>

        <button type="submit">Log In</button>

    </form>

</section>

@endsection