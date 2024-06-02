<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

<div>
    <div>
        <div style="width: 1000px; margin: auto;">
          <div class="d-flex justify-content-between">
            <h2 style="padding: 5;margin: 0;">Laravel</h2>
            <div>
              <a href="{{ route('product.create') }}" type="button" class="btn btn-green btn-icon-text">Create New Product</a>
            </div>
          </div>
          <div>
            <form action="{{ route('product.search') }}" method="GET">
              <div class="d-flex flex-row-reverse bd-highlight">
                <button style="" type="submit">Search</button>
                <input style="width:20%" type="text" name="search" placeholder="Search">
              </div>
            </form>
          </div>
          <div>
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Price (RM)</th>
                  <th>Details</th>
                  <th>Publish</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @if (is_countable($product) && count($product) > 0)
                    @foreach($product as $data)
                      <tr>    
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->details}}</td>
                        <td>{{$data->publish}}</td>  
                        <td>
                          <div>
                            <div class="d-flex flex-row" style="height: 30px">
                              <a href="{{ route('product.show', $data->id) }}" type="button" class="btn btn-info btn-icon-text">Show</a>
                              <a href="{{ route('product.edit', $data->id) }}" type="button" class="btn btn-primary btn-icon-text">Edit</a>
                              <form action="{{ route('product.destroy', $data->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <p>No results found.</p>
                  @endif
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>