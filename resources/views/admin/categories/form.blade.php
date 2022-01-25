
    @csrf
    @method(isset($category) ? 'PUT' : 'POST')

    <div class="row">
        <div class="col">
            <label for="Name">Name</label>
            <input type="hidden" name="id" value="{{ $category ? $category->id : ''}}">
            <input type="text"  name="name" id="name12" value="{{ $category ? $category->name :  '' }}" class="form-control" placeholder="Enter Category">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="Description">Description</label>
            <input type="text" name="description" id="desc" class="form-control" value="{{ $category ? $category->description : '' }}" placeholder="Enter Description" >
        </div>
    </div>
    <button type="submmit" class="mt-2 btn btn-primary">{{ $category ? 'Update' : 'Create' }}</button>
</form>

  

@include('partials.error')
