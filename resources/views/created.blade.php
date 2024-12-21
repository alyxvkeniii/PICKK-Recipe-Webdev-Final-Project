@extends('Components.layout2')

@section('additional-styles')
<link rel="stylesheet" href="/assets/css/created.css">
@endsection

@section('content')
<!--MY RECIPE SECTION-->
<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Collections</h2>
        <div class="tabs">
            <a href="/my-recipe" class="created">All</a>
            <a href="/created" class="created">Created</a>
            <a href="/favorites" class="favorites">Favorites</a>
        </div>
        <div class="nav">
            <div class="item active">
                <div class="icon">🔖</div>
                <span><a href="/favorites" class="favorites">Favorites</a></span>
            </div>
            <div class="item">
                <div class="icon">🖌️</div>
                <span><a href="/created" class="created">Created recipes</a></span>
            </div>
        </div>
        <a href="/add-recipe" class="create-btn">CREATE RECIPE</a>
    </div>

    <!-- Main content -->
    <div class="content">
        <h1><b>CREATED RECIPES</b></h1>
        
        <!-- Display recipes in a card layout -->
        <div class="food-cards">
            @foreach($recipes as $recipe)
                <div class="card">
                    <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}">
                    <div class="card-content">
                        <h3>{{ $recipe->name }}</h3>
                        <a href="{{ route('dish', ['recipeId' => $recipe->id]) }}" class="view-recipe">View Recipe</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--END OF MY RECIPE SECTION-->
@endsection
