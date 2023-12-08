@extends("layout/Masterlayout")


@section('title')
    Add Categories
@endsection
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row ">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Categories </h6>
                <form action="{{url('Add_Categories')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="Category_Name" class="form-control" id="floatingInput" placeholder="Product Name">
                                <label for="floatingInput">Category Name </label>
                                <span class="text-danger">@error('Category_Name') {{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="insert_data" class="btn btn-primary">Insert Data </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

