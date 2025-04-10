@extends('dashboard')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->products->count()}}</td>
                        <td>
                            <span class="badge {{$item->status == 0 ? 'badge-danger' : 'badge-success'}}">
                                {{$item->status == 0 ? 'Không tồn tại': 'Hiển thị'}}
                            </span>
                        </td>
                    
                    </tr>
                @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>
</div>
@endsection