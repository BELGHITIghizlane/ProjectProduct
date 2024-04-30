<form action="{{route('update-product',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="from-group">
        <div class="mb-3">
            <label for="Name" class="form-label"> Name</label>
            <input type="text" class="form-control" name="name" aria-describedby="name" value="{{old('name',$product->name)}}" >
            <div id="emailHelp" class="form-text">We'll never share your name with anyone else.</div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
          </div>

      <div class="from-group">
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="description" class="form-control"  name ="description" id="name" aria-describedby="description" value="{{old('description',$product->description)}}">
            <div id="description" class="form-text">We'll never share your description with anyone else.</div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>



      <div class="from-group">
        <div class="mb-3">
            <label for="quantiti" class="form-label">Quantiti</label>
            <input type="number" class="form-control"  name="quantity" id="quantity" aria-describedby="quantity" value="{{old('quantiti',$product->quantity)}}">
            <div id="emailHelp" class="form-text">We'll never share your quantity with anyone else.</div>
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>



      <div class="from-group">
        <div class="mb-3">
            <label for="name" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="name" aria-describedby="image" value="{{old('image',$product->image)}}">
            <div id="emailHelp" class="form-text">We'll never share your image with anyone else.</div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

      <div class="from-group">
        <div class="mb-3">
            <label for="price" class="form-label">Price</label><br>
            <input type="number"step="0.5" name="price" id="price" class="from-control" value="{{old('price',$product->price)}}" aria-describedby="price">
            <div id="emailHelp" class="form-text">We'll never share your price with anyone else.</div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

          <div class="mb-3">
            <label for="category_id" class="form-label">Category</label><br>
            <select name='category_id' id ='category_id' class="from-select1"  >
                <option value="">please choose your category</option>
                @foreach($categoreis as $category)
                    <option  @selected(old('category_id',$product->category_id)===$category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <BR>

  <div class="from-group">
    <input type="submit" class="btn btn-primary w-100" value="Modifier" ><br>
  </div>
</form>

