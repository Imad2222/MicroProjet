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
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if(!empty($products))
            @foreach ($products as $item)
             <tr class="table-primary">
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td><img src="/images/{{$item->image}}" width="200px"></td>
                <td>{{$item->price}}</td>
                <td>{{$item->description}}</td>
                <td>
                    @auth

                    <form action="{{route('products.destroy',$item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button> 
                    </form>
                    <a class="btn btn-primary" href="{{route('products.edit',$item->id)}}">Edit</a>

                    @endauth

                    <a class="btn btn-info" href="{{route('products.show',$item->id)}}">Show</a>
                </td>
            </tr>
            @endforeach
            @endif
            
           
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
    
    
    
</div> 

    
@endsection