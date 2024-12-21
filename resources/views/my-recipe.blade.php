@extends('Components.layout2')

@section('additional-styles')
<link rel="stylesheet" href="/assets/css/my-recipe.css">
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
        <h1><b>RECIPES</b></h1>
        
        <!-- Display the count of recipes -->
        <p class="subheading">{{ $recipes->count() }} Recipes</p>

        <!-- Empty state if there are no recipes -->
        @if($recipes->isEmpty())
            <div class="empty-state">
                <img src="/assets/images/recipe.png" alt="Recipe Img">
                <h2>No recipes yet</h2>
                <p>Want to create a recipe? Just click on the "Create Recipe".</p>
                <a href="/menu2" class="explore-btn">EXPLORE RECIPES</a>
            </div>
        @else
            <div class="food-cards"> <!-- Start of the food cards container -->
                @foreach($recipes as $recipe)
                    <div class="card">
                        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}">
                        <div class="card-content">
                            <h3>{{ $recipe->name }}</h3>
                            <p>{{ Str::limit(strip_tags($recipe->description), 50) }}</p> <!-- Truncate description -->
                            <a href="{{ route('dish', ['recipeId' => $recipe->id]) }}" class="view-recipe">View Recipe</a>
                        </div>
                    </div>
                @endforeach
            </div> <!-- End of food cards container -->
        @endif
    </div>
</div>
<!--END OF MY RECIPE SECTION-->
@endsection
