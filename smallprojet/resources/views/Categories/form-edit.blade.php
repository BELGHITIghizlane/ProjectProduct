<form action="{{route('update-category',$category->id)}}" method="post" >
    @csrf
    @method('PUT')
<div class="from-group">
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control"  name="name" id="category" aria-describedby="category" value="{{old('category',$category->name)}}">
        <div id="category" class="form-text">We'll never share your category with anyone else.</div>
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>
      <div class="from-group">
        <input type="submit" class="btn btn-primary w-100" value="Modifer" ><br>
      </from>
