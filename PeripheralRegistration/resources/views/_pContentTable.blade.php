<div class="d-flex">
    <div class="justify-content-center border border-dark rounded-lg mx-auto">
        <table class="table table-bordered">
            <tr style="font-weight: bold; " class="border-bottom ">
                <th scope="col">record #</th>
                <th scope="col">owner</th>
                <th scope="col">name</th>
                <th scope="col">vendor</th>
                <th scope="col">type</th>
                <th scope="col">serial_number</th>
                <th scope="col">sku</th>
                <th scope="col">ean</th>
                <th scope="col">max_id</th>
                <th scope="col">internal_number</th>
                @if(Auth::user()->hasRole('admin'))
                    <th scope="col">actions</th>
                @endif
            </tr>
            @foreach($data as $peripheral)
                <tr>
                    <th scope="row">{{$peripheral->id}}</th>
                    <td>
                        @if($peripheral->user !== null)
                            {{$peripheral->user->name}}
                        @else
                            ---
                        @endif
                    </td>
                    <td>{{$peripheral->name}}</td>
                    <td>{{$peripheral->vendor}}</td>
                    <td>{{$peripheral->type}}</td>
                    <td>{{$peripheral->serial_number}}</td>
                    <td>{{$peripheral->sku}}</td>
                    <td>{{$peripheral->ean}}</td>
                    <td>{{$peripheral->max_id}}</td>
                    <td>{{$peripheral->internal_number}}</td>
                    @if(Auth::user()->hasRole('admin'))
                        <td id="actionWidth">
                            <a href="{{url('/peripherals/'.$peripheral->id.'/edit')}}">
                                <button class="actionButton">edit</button>
                            </a>
                            <form method="POST" action="{{url('/peripherals/'.$peripheral->id)}}">
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
