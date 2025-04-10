@extends('dashboard')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Price</th>
                <th>Category</th>
                <th><button type="button" class="btn btn-primary">Add New</button></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->category->name ?? 'N/A'}}</td>
                <td>
                    <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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