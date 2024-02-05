@extends('products.layout')


@section('content')


<div class="row">
    <div class="col align-self-start">
      <a href="{{route('products.index')}}" class="btn btn-dark "  style="margin: 3px">All Products</a>  <br/>    
    </div>
</div> <br/>

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ( $errors->all() as $item )
        <li>{{$item}}</li>
        
        @endforeach
    </ul>

  </div>
    
@endif

<div class="containner p-5">
    <!-- action radi tkhzan li dak chi li f store fl controller  -->
    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Name"
                value="{{$product->name}}"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea class="form-control" name="description"  rows="3" placeholder="//">{{$product->description}}</textarea>
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="number" class="form-control"  name="price" placeholder="DH"  value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <img src="/images/{{$product->image}}" width="200px">
            <label for="" class="form-label">Image</label>
            <input
                type="file"
                class="form-control"
                name="image"
                placeholder=""
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Type</label>
            <select name="type" class="form-control" value='{{$product->type}}'>
                <option value="electronique">Electronique</option>
                <option value="informatique">Informatique</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
 
        
    </form>
</div>
    
@endsection