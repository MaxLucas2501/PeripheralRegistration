@extends('layouts.app')

@section('content')
    <div>
        <form method="post" action="{{route('requests.store')}}">
            @csrf
            <p>Choose a device for the request</p>
            <select name="peripheral_id">
                @foreach($peripheralGroups as $name => $peripherals)
                    <optgroup label="{{$name}}">
                        @foreach($peripherals as $peripheral)
                            <option value="{{ $peripheral->id }}">
                                [{{$peripheral->vendor}}] {{ $peripheral->name }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            <button type="submit">
                submit
            </button>
        </form>
    </div>
@endsection
