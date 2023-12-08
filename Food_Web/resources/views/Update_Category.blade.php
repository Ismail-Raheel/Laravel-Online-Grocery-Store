@extends("layout/Masterlayout")


@section('title')
    Edit Categories
@endsection
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row ">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Categories </h6>
                <form action="{{url('Update_Category/'.$data->Category_ID)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" name="Category_Name" class="form-control" id="floatingInput" placeholder="Category_Name" value="{{$data->Category_Name}}">
                                <label for="floatingInput">Category Name </label> 
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="insert_data" class="btn btn-primary">Update Data </button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

