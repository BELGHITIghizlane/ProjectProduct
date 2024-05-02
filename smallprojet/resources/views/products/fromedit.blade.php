<form action="{{ route('update-product', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" value="{{ old('name', $product->name) }}">
            <div class="form-text">We'll never share your name with anyone else.</div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="description" value="{{ old('description', $product->description) }}">
            <div class="form-text">We'll never share your description with anyone else.</div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="quantity" value="{{ old('quantity', $product->quantity) }}">
            <div class="form-text">We'll never share your quantity with anyone else.</div>
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="hidden" name="image" value={{$product->image}}>
            <input type="file" class="form-control" name="image" id="image" aria-describedby="image">
            @if ($product->image)
                <img width="100px" src="{{ asset($product->image) }}" alt="">
            @endif
            <div class="form-text">We'll never share your image with anyone else.</div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="mb-3">
            <label for="price" class="form-label">Price</label><br>
            <input type="number" step="0.5" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" aria-describedby="price">
            <div class="form-text">We'll never share your price with anyone else.</div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label><br>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Please choose your category</option>
                @foreach($categoreis as $category)
                    <option @if(old('category_id', $product->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary w-100" value="Modifier">
    </div>
</form>
