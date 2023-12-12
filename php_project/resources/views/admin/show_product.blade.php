@include('admin.sidebar')
@vite('resources/css/show_product.css')
<div class="container">
    <div class="content">
        <div class="product-list">
            <h2 class="h2-fontsize">All Products</h2>
            <table class="center">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Product Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                @foreach($products as $product)
                    <tr class="table-row">
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>
                            <img style="width: 100px; height: 100px" src="/product/{{ $product->image }}" alt="Image not available">
                        </td>
                        <td>
                            <form action="{{ route('delete.product', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" >Delete</button>
                            </form>
                        </td>
                        <td>
                            <a class="" href="{{ url('update_product', $product->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
