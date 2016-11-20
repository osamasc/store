<form class="form" action="{{ route('new.pro')}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="col-md-8">
    <div class="form-group">
      <label for="name">Product Name:</label>
      <input type="text" class="form-control" name="name" placeholder="type name here">
    </div>

    <div class="form-group">
      <label for="short_desc">Product Short Description:</label>
      <textarea name="short_desc" rows="4" cols="20" class="form-control" placeholder="type description here"></textarea>
    </div>

    <div class="form-group">
      <label for="long_desc">Product Long Description:</label>
      <textarea name="long_desc" rows="10" cols="20" class="form-control" placeholder="type description here"></textarea>
    </div>

    <div class="form-group">
      <label for="">Price</label>
      <input type="text" class="form-control" name="price"  placeholder="type Price here">
    </div>

    <div class="form-group">
      <label for="catigory_id">Category</label>
        <select class="form-control" name="catigory_id">
          @foreach ( $catigories as $catigory)
              <option value="{{ $catigory->id}}">{{ $catigory->catigory_name}}</option>
          @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="brand">Brand</label>
        <select class="form-control" name="brand_id">
        @foreach ($brands as $brand)
          <option class="form-control" value="{{ $brand->id}}">{{ $brand->brand_name}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
      <label for="limited">Amount</label>
      <select name="limited" class="form-control">
        @for ($x = 1; $x <= 50; $x++) {
            <option value="{{ $x}}"> {{ $x}}</option>
        }
        @endfor

      </select>
    </div>

    <div class="form-group">
      <label for="location">Location</label>
      <select class="form-control" name="location_id">
          @foreach ($cities as $city)
            <option value="{{ $city->id}}">{{ $city->name}}</option>
          @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status">
        <option value="new">New</option>
        <option value="used">Used</option>
      </select>
    </div>

    <div class="form-group">
      <label for="">Product Image</label>
      <input type="file" class="form-control" name="image">
    </div>
      <input type="submit" class="button" value="Request">
  </div>

</form>
