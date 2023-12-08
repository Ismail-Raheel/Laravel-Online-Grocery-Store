@extends("layout/Masterlayout")


@section('title')
{{$title}}
@endsection
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row ">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">{{$title}} </h6>
               
                <form action="{{$url}}" method="post" enctype="multipart/form-data">
                    @csrf
                
                 <div class="row">
                    <div class="col-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="Product_Name" class="form-control" id="floatingInput" placeholder="Product Name" value="{{ optional($product)->Product_Name }}">
                        <span class="text-danger">@error('Product_Name'){{$message}}@enderror</span>
                        <label for="floatingInput">Product Name </label>
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="Product_Price" class="form-control" id="floatingInput" placeholder="Product Price"   value="{{ optional($product)->Product_Price }}">
                        <span class="text-danger">@error('Product_Price'){{$message}}@enderror</span>
                        <label for="floatingInput">Product Price  </label>
                    </div>
                    </div>
            
             
                    <div class="col-3">
                    <div class="form-floating mb-3">
                    <input type="number" name="Product_Qty" class="form-control" id="floatingInput" placeholder="Product Qty"  value="{{ optional($product)->Product_Qty }}">
                    <span class="text-danger">@error('Product_Qty'){{$message}}@enderror</span>
                    <label for="floatingInput">Product Qty </label>

                    </div>
                    </div>

                    <div class="col-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="Product_code" class="form-control" id="floatingInput" placeholder="Product code"   value="{{ optional($product)->Product_code }}">
                            <label for="floatingInput">Product Code  </label>
                            <span class="text-danger">@error('Product_code'){{$message}}@enderror</span>
                        </div>
                    </div>
                   
                    </div>

      


                <div class="form-floating mb-2">
                    <textarea class="form-control" name="Product_Des" placeholder="Leave a comment here"
                        id="floatingTextarea" style="height: 150px;">{{ optional($product)->Product_Des }}</textarea>
                        <span class="text-danger">@error('Product_Des'){{$message}}@enderror</span>
                    <label for="floatingTextarea">Comments</label>
                  
                </div>
          


                <div class="row">
                <div class="col-8">
                <div class="mb-3">
                    <label for="floatingInput">Main Image  </label>
                    <input class="form-control bg-dark" name="image" type="file" id="formFileMultiple" value="{{ optional($product)->Product_Image }}">
                    <input class="form-control bg-dark" name="image-old" type="hidden" value="{{ optional($product)->Product_Image }}">
                    <span class="text-danger">@error('image'){{$message}}@enderror</span>
                </div>
                </div>
                <div class="col-4">
                <div class="form-floating mb-3">
                <select name="Category_Id" id="languages" class="form-control bg-dark" >
                    @foreach ($categories as $category)     
                    <option value="{{ optional($category)->Category_ID}}">{{ optional($category)->Category_Name}}</option>
                    @endforeach
                </select>
                <label for="floatingInput">Product Category  </label>
                </div>
                </div>
           
 

                </div>

                    <h4 style="text-align: center">Product Descount</h4>


                    <div class="row">
                    <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="Discount_Price"   class="form-control" id="floatingInput" value="{{optional($product)->Discount_Price}}">
                        <label for="floatingInput">Discount Price </label>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="datetime-local" name="Discount_Date"   value="{{ optional($product)->Discount_Date}}"   class="form-control"  id="floatingInput">
                        <label for="floatingInput">Discount Date  </label>
                    </div>
                    </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{$title}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

