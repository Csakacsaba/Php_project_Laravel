@include('admin.sidebar')
@vite('resources/css/update_product.css')

<div class="container">
    <div class="content">
        <div class="update-product-form">
            @include('alert_message')
            <div class="form-container">
                <h1 class="font-size">Update Product</h1>
                <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label>Product Title</label>
                        <input class="text-color" type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">
                    </div>

                    <div class="div_design">
                        <label>Product Description</label>
                        <input class="text-color" type="text" name="description" placeholder="Write a description" required="" value="{{$product->description}}">
                    </div>

                    <div class="div_design">
                        <label>Price</label>
                        <input class="text-color" type="number" name="price" placeholder="Write price" required="" value="{{$product->price}}">
                    </div>

                    <div class="div_design">
                        <label>Discount Price</label>
                        <input class="text-color" type="number" name="dis_price" placeholder="Write a discount price if you want it" value="{{$product->discount}}">
                    </div>

                    <div class="div_design">
                        <label>Product Quantity</label>
                        <input class="text-color" type="number" name="quantity" min="0" placeholder="Write a quantity" required="" value="{{$product->quantity}}">
                    </div>

                    <div class="div_design">
                        <label>Product Category</label>
                        <select class="text-color" name="category" id="" required="">
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label for="">Current product image</label>
                        <img style="margin: auto" height="100px" width="100px" src="/product/{{$product->image}}" alt="">
                    </div>

                    <div class="div_design">
                        <label for="">Change product image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_design">
                        <img src="" alt="">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Update Product" class="btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
