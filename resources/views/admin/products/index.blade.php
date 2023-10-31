@extends('admin.templates.index')

@section('title-page', 'Products')

@section('content')
    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <input type="text" name="name" value="{{ $product->name }}">
                    </td>
                    <td>
                        <input type="text" name="price" value="{{ $product->price }}">
                    </td>
                    <td>
                        <input type="text" name="amount" value="{{ $product->amount }}">
                    </td>
                    <td>
                        <form action="/admin/products/update/{{ $product->id }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary">Применить изменения</button>
                        </form>
                        <form action="/admin/products/{{$product->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
