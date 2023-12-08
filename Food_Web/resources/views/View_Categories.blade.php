@extends("layout/Masterlayout")

@section('content')
    
@section('title')
    View  Category
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="{{url('Add_Categories')}}"class="btn btn-primary">Insert Data</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Category Id</th>
                        <th scope="col">Category Name</th>  
                        <th scope="col" style="text-align: center">Action</th>
                       
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $categories)     
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{$categories->Category_ID}} </td>
                        <td>{{$categories->Category_Name}} </td>
                        <td  style="text-align: center"><a class="btn btn-sm btn-primary" href="{{url('delete_Category/'.$categories->Category_ID)}}">Delete </a>
                        <a class="btn btn-sm btn-primary" href="{{url('update_Page/'.$categories->Category_ID)}}">Update</a></td>

                        
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
                {{-- <div class="mt-5">
                    {{$data->links()}}
                </div> --}}

        </div>
    </div>
</div>

@endsection