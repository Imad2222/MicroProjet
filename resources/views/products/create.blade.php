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
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Name"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea class="form-control" name="description"  rows="3" placeholder="//"></textarea>
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="number" class="form-control"  name="price" placeholder="$"  >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input
                type="file"
                class="form-control"
                name="image"
                placeholder=""
            />
        </div>

        <button type="submit" class="btn btn-warning">Submit</button>
 
        
    </form>
</div>
    
@endsection