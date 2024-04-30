<form action="{{route('store-product')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="from-group">
    <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" aria-describedby="name" value="{{old('name')}}" >
        <div id="emailHelp" class="form-text">We'll never share your name with anyone else.</div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>

  <div class="from-group">
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="description" class="form-control"  name ="description" id="name" aria-describedby="description">
        <div id="description" class="form-text">We'll never share your description with anyone else.</div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>

  <div class="from-group">
    <div class="mb-3">
        <label for="quantiti" class="form-label">Quantiti</label>
        <input type="number" class="form-control"  name="quantity" id="quantity" aria-describedby="quantity" value="{{old('quantiti')}}">
        <div id="emailHelp" class="form-text">We'll never share your quantity with anyone else.</div>
        @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>


  <div class="from-group">
    <div class="mb-3">
        <label for="name" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="name" aria-describedby="image">
        <div id="emailHelp" class="form-text">We'll never share your image with anyone else.</div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>

  <div class="from-group">
    <div class="mb-3">
        <label for="price" class="form-label">Price</label><br>
        <input type="number"  step="0.5" name="price" id="price" class="from-control" value="{{old('price')}}" aria-describedby="price">
        <div id="emailHelp" class="form-text">We'll never share your price with anyone else.</div>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>
      {{-- <div class="from-group">
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="texte" class="form-control"  name="category" id="category" aria-describedby="category" value="{{old('category')}}">
            <div id="category" class="form-text">We'll never share your category with anyone else.</div>
            @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div> --}}
          <div class="mb-3">
            <label for="category" class="form-label">Category</label><br>
            <select name='category' id ='category' class="from-select"  >
                <option value="">please choose your category</option>
                @foreach($categoreis as $category)
                    <option"{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <BR>
  <div class="from-group">

        <input type="submit" class="btn btn-primary w-100" value="Add" ><br>
</form>
