@extends("layout/Masterlayout")

@section('content')
    
@section('title')
    View  Users
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
               {{-- <a href="{{url('Add_Product')}}"class="btn btn-primary">Insert Data</a> --}}
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">User Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>     
                        <th scope="col">DOB </th>
                        <th scope="col">Status </th>
                        <th scope="col">Account Creation </th>
                        {{-- <th scope="col" colspan="2" style="text-align: center">Action</th> --}}
                     
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)     
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{$user->User_Id}} </td>
                        <td>{{$user->User_Name}} </td>
                        <td>{{$user->User_Email}} </td>
                        <td>{{$user->User_Gender}} </td>
                        <td>{{$user->User_DOB}} </td>
                        <td>{{$user->User_Status}} </td>
                        <td>{{$user->created_at}} </td>
                        {{-- <td><a class="btn btn-sm btn-primary" href="{{url('delete_Product/'.$product->Product_Id)}}">Delete </a></td> --}}
                        {{-- <td><a class="btn btn-sm btn-primary" href="{{url('edit_product/'.$product->Product_Id)}}">Edit</a></td> --}}
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
                <div class="mt-5">
                    {{$users->links('pagination::bootstrap-5')}}
                </div>

        </div>
    </div>
</div>

@endsection