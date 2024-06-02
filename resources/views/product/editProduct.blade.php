<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

<div style="width: 1000px; margin: auto;">
    <div class="d-flex justify-content-between">
      <h2 style="padding: 5;margin: 0;" style="text-align:left;">Add New Product</h2>
        <div>
            <a href={{ route('product.index') }} type="button" class="btn btn-primary btn-icon-text">Back</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:crimson">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form action="{{ route('product.update', $data->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <p>Name: </p>
                <input
                    type="text"
                    name="name"
                    placeholder="Name"
                    value="{{ $data->name }}"
                    class="block w-56 rounded-md py-1.5 px-2 ring-1 ring-inset ring-gray-400 focus:text-gray-800"
                    
                />
            </div>
            <div>
                <p>Price: </p>
                <input
                    type="text"
                    name="price"
                    placeholder="99.90"
                    value="{{ $data->price }}"
                    class="block w-56 rounded-md py-1.5 px-2 ring-1 ring-inset ring-gray-400 focus:text-gray-800"
                    
                />
            </div>
            <div>
                <p>Details: </p>
                <textarea
                    style="resize:vertical; height:100px"
                    type="text"
                    name="details"
                    placeholder="Detail"
                   
                    class="block w-56 rounded-md py-1.5 px-2 ring-1 ring-inset ring-gray-400 focus:text-gray-800"
                    
                >{{ $data->details }}</textarea>
            </div>
            <div>
                <p>Publish: </p>
                <input style="width:auto" type="radio" id="Yes" name="publish"               
                {{ $data->publish == 'Yes' ? 'checked' : '' }}            
                value="Yes">
                <label for="html">Yes</label><br>
                <input style="width:auto" type="radio" id="No" name="publish"
                {{ $data->publish == 'No' ? 'checked' : '' }}
                value="No">
                <label for="css">No</label>
            </div>
            <div>
                <button style="display: block; margin: auto; width: 100px;" type="submit" class="btn btn-primary btn-icon-text">Submit</button>
            </div>
        </form>
    </div>
</div>