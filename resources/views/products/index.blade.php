@extends('products.layout')

@section('content')

<div class="row">
    <div class="col align-self-start">
        
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Type</th>
                <th>Qte</th> <!-- Nouvelle colonne pour la quantité -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($products))
                @foreach ($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td><img src="/images/{{$item->image}}" width="100px"></td>
                    <td>${{$item->price}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->Qte}}</td> <!-- Afficher la quantité -->
                    <td>
                        @auth
                            <form action="{{route('products.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button> 
                            </form>
                            <a class="btn btn-primary btn-sm" href="{{route('products.edit',$item->id)}}">Edit</a>
                        @endauth
                        <a class="btn btn-info btn-sm" href="{{route('products.show',$item->id)}}">Show</a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div> 

@endsection
