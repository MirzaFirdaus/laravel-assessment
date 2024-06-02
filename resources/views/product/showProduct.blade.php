<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

<div style="width: 1000px; margin: auto;">
    <div class="d-flex justify-content-between">
      <h2 style="padding: 5;margin: 0;">Show Product</h2>
        <div>
            <a href={{ route('product.index') }} type="button" class="btn btn-primary btn-icon-text">Back</a>
          </div>
    </div>
    <div>
        <div>
            <p>Name: {{ $data->name }}</p>
        </div>
        <div>
            <p>Price: {{ $data->price }}</p>
        </div>
        <div>
            <p>Details: {{ $data->details }}</p>
        </div>
        <div>
            <p>Publish: {{ $data->publish }}</p>
        </div>
    </div>
</div>