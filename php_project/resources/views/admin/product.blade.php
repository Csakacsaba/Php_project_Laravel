@include('admin.sidebar')
@vite('resources/css/add_product.css')
<body>
<div class="container">
    <div class="content">
        <div class="update-product-form">
            @include('alert_message')
            <div class="form-container">
                <h1 class="font_size">Add Product</h1>
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label>Product Title</label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
                    </div>

                    <div class="div_design">
                        <label>Product Description</label>
                        <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
                    </div>

                    <div class="div_design">
                        <label>Price</label>
                        <input class="text_color" type="number" name="price" placeholder="Write price" required="">
                    </div>

                    <div class="div_design">
                        <label>Discount Price</label>
                        <input class="text_color" type="number" name="dis_price" placeholder="Write a discount price if you want it">
                    </div>

                    <div class="div_design">
                        <label>Product Quantity</label>
                        <input class="text_color" type="number" name="quantity" min="0" placeholder="Write a quantity" required="" required="">
                    </div>

                    <div class="div_design">
                        <label>Product Category</label>
                        <select class="text_color" name="category" id="" required="">
                            <option value="" selected="">Add a category here</option>
                            @foreach($categories as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design image">
                        <label>Product Image Here</label>
                        <input class="text_color" type="file" name="image" id="imageInput" required="">
                    </div>

                    <div id="preview"></div>

                    <div class="div_design">
                        <input type="submit" value="Add Product" class="btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

