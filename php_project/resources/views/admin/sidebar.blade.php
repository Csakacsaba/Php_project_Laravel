<style>
    .navigation-menu {
        display: flex;
        justify-content: space-around;
        background-color: #ffffff;
        padding: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        margin-bottom: 10px;
    }

    .menu-item {
        text-decoration: none;
        color: #000000;
        font-size: 22px;
        font-weight: bold;
        margin: 0 10px;
        transition: color 0.3s ease;
    }

    .menu-item:hover {
        color: #000291;
    }
</style>

<div class="navigation-menu">
    <a href="{{ route('admin.home') }}" class="menu-item">🏠 Admin Page</a>
    <a href="{{ route('add.category.show') }}" class="menu-item">🌟 Add Category</a>
    <a href="{{ route('add.product.show') }}" class="menu-item">🚀 Add Product</a>
    <a href="{{ route('product.show') }}" class="menu-item">📦 Show Products</a>
    <a href="{{ route('home') }}" class="menu-item">🏠 Home Page</a>
</div>
