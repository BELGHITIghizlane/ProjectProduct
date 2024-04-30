<form action="{{route('store-category')}}" method="post" enctype="multipart/form-data">
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

        <input type="submit" class="btn btn-primary w-100" value="Add" ><br>
      </from>
