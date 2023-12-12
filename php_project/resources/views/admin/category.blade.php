@include('admin.sidebar')

@vite('resources/css/add_category.css')

<div class="background">
    <div class="container">
        <div class="table-container">
            @include('alert_message')
            <div class="add-category-container">
                <h2 class="h2-font">Add Category</h2>
                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    <input class="input-field" type="text" name="category" placeholder="Write the category name">
                    <input type="submit" class="submit-button" name="submit" value="Add Category">
                </form>
            </div>

            <table>
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <a onclick="return confirm('Are you sure to Delete This')" href="{{url('delete_category', $category->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
