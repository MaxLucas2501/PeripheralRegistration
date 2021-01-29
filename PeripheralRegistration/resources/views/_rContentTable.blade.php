<div class="d-flex">
    <div class="justify-content-center border border-dark rounded-lg mx-auto">
        <table class="table table-bordered">
            <tr style="font-weight: bold;" class="border-bottom">
                <th scope="col">record #</th>
                <th scope="col">owner</th>
                <th scope="col">name</th>
                <th scope="col">approved</th>
                <th scope="col">approved at</th>
                <th scope="col">approved by</th>
                <th scope="col">actions</th>
            </tr>
            @foreach($requests as $request)
                <tr>
                    <th scope="row">{{$request->id}}</th>
                    <td>{{$request->user->name}}</td>
                    <td>{{$request->peripheral->name}}</td>
                    <td>{{$request->approved}}</td>
                    <td>{{$request->approved_at}}</td>
                    <td>{{$request->approved_by}}</td>
                    @if((int)Auth::id() === $request->user->id || Auth::user()->hasRole('admin'))
                        <td id="actionWidth">
                            <a href="{{url('/requests/'.$request->id)}}">
                                <button class="actionButton">edit</button>
                            </a>
                            <form method="POST" action="{{url('/requests/'.$request->id)}}">
                                @method('delete')
                                @csrf
                                <button class="actionButton">delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
</div>
