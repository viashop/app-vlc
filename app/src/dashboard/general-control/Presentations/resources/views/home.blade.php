@extends("Control::app")

@section('body')
    <h1>Titulo General Control H1</h1>

    <div>

        @foreach($users as $user)
            {{ $user->name }} <br />
        @endforeach

    </div>

    {!! $users->render() !!}

@endsection