@extends("layout/Masterlayout")

@section('content')
    
@section('title')
    View  Product
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
               <a href="{{url('Add_Product')}}"class="btn btn-primary">Insert Data</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Product_Id</th>
                        <th scope="col">Product_Name</th>
                        <th scope="col">Product_Price</th>
                        <th scope="col">Product_Qty</th>
                        <th scope="col">Product_Image</th>     
                        <th scope="col">Product_code</th>
                        <th scope="col">Categor_Name</th>
                        <th scope="col" colspan="2" style="text-align: center">Action</th>
                     
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $product)     
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{$product->Product_Id}} </td>
                        <td>{{$product->Product_Name}} </td>
                        <td>{{$product->Product_Price}} </td>
                        <td>{{$product->Product_Qty}} </td>
                        <td> <img src="{{ asset('storage/images/'.$product->Product_Image) }}" style="width:80px;height:80px"></td> 
                        <td>{{$product->Product_code}} </td>
                        <td>{{$product->Category_Name}} </td>
                        <td><a class="btn btn-sm btn-primary" href="{{url('delete_Product/'.$product->Product_Id)}}">Delete </a></td>
                        <td><a class="btn btn-sm btn-primary" href="{{url('edit_product/'.$product->Product_Id)}}">Edit</a></td>
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
                <div class="mt-5">
                    {{$data->links('pagination::bootstrap-5')}}
                </div>

        </div>
    </div>
</div>

@endsection