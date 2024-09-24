@php
use \Illuminate\Support\Facades;
$isAdminRoute=Route::is('admin_dashboard');
$isProductRoute=Route::is('product.*');
$isCategoriesRoute=Route::is('category.*');
$defultClass = 'list-group-item list-group-item';
@endphp
<div class="list-group">
            <a @class([$defultClass , 'active' => $isAdminRoute , 'list-group-item-secondary']) href="{{ route('admin_dashboard') }}">Admin Operations</a>
            <a @class([$defultClass , 'active' => $isProductRoute ,'list-group-item-secondary']) href="{{ route('product.index') }}">Products</a>
            <a @class([$defultClass , 'active' => $isCategoriesRoute , 'list-group-item-secondary']) href="{{ route('category.index') }}" >Categories</a>
        </div>

