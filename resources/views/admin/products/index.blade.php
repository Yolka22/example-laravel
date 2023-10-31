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

@section('content')
    <h2>Новинки</h2>
    <div class="row">
        @foreach ($latestProducts as $product)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('path-to-product-image/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Ціна: {{ $product->price }}</p>
                        <p class="card-text">Кількість: {{ $product->amount }}</p>
                        <a href="{{ route('products.show', ['product' => $product->slug]) }}" class="btn btn-primary">Докладніше</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
