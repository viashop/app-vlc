@extends("control::app")

@section('body')
    <h1>Titulo Modeling H1</h1>

    <div>

        @foreach($users as $user)
            {{ $user->name }} <br />
        @endforeach

    </div>

    {!! $users->render() !!}

@endsection