@extends('layouts.app')

@section('content')
    <div>
        <form action="{{route('requests.update', $request->id)}}" method="POST">
            @method('PUT')
            @csrf

            @can('admin')
                <label for="approved">Approve</label>
                <input type="radio" value="1" name="approved">
                <label for="Deny">Deny</label>
                <input type="radio" value="0" name="approved">
            @endcan
            <button type="submit">submit</button>
        </form>
    </div>
@endsection
