@extends('Components.layout2')

@section('additional-styles')
<link rel="stylesheet" href="/assets/css/dish.css">
@endsection

@section('content')
<!--SECTION OF GET TO KNOW PICKK-->
<section id="about-section">
    <div class="about-container">
        <div class="about-text-container">
            <h2 style="color: #d13469;"> {{ $recipe->name }}</h2>
            <p><b> {{ $recipe->name }}</b> {{ $recipe->description }}</p><br>

            @if (Auth::check())
                @if ($isFavorited)
                    <!-- Button to Remove from Favorites -->
                    <form action="{{ route('favorite.remove') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                        <button type="submit" class="button2" style="background-color: #d13469; color: white;">Remove from Favorites</button>
                    </form>
                @else
                    <!-- Button to Add to Favorites -->
                    <form action="{{ route('favorite.add') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                        <button type="submit" class="button2" style="background-color: #4CAF50; color: white;">Add to Favorites</button>
                    </form>
                @endif
            @else
                <p class="login-message">You must be logged in to save this recipe.</p>
            @endif
        </div>
    </div>

    <div class="image-container">
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" style="max-width: 300px;">
    </div>
</section>
<!--END SECTION OF GET TO KNOW PICKK-->

<!--SECTION OF INGREDIENTS and INSTRUCTIONS-->
<section id="ingredients-section">
    <div class="ingredients-container">
        <div class="ingredients-text-container">
            <h2 style="color: #d13469;">Ingredients</h2>
            {!! $recipe->ingredients !!}
        </div>
    </div>

    <div class="ingredients-container">
        <div class="ingredients-text-container">
            <h2 style="color: #d13469;">Instructions</h2>
            <div class="ingredients">
                {!! $recipe->instructions !!}
            </div>
        </div>
    </div>
</section>
<!--END SECTION OF INGREDIENTS and INSTRUCTIONS-->

<!--COMMENTS SECTION OF PICKK-->
<section id="comment-section">
    <div id="comment-container">
        <h3>Add a New Comment</h3>
        
        <!-- Comment Form -->
        <form id="comment-form" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
            <div>
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" placeholder="Type your comment" required></textarea>
            </div>
    
            <div>
                @guest
                    <p class="login-message">You must be logged in to comment.</p>
                @else
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="button2">Post Comment</button>
                @endguest
            </div>
        </form>
    </div>
    
    <!-- Success Message Placeholder -->
    <div id="success-message" style="display: none; color: green;">
        Comment posted successfully!
    </div>
    
    <!-- Error Message Placeholder -->
    <div id="error-message" style="display: none; color: red;">
        Something went wrong. Please try again.
    </div>
</section>
<!--END OF COMMENTS SECTION OF PICKK-->

<section id="comment-section">
    @foreach ($comments as $comment)
        <div class="comment">
            <div class="profile-pic">
                <img src="/assets/images/default-pfp.jpg" alt="User profile picture">
            </div>
            <div class="comment-content">
                <p class="username">{{ $comment->username }}</p>
                <p class="text">{{ $comment->comment }}</p>
            </div>
        </div>
    @endforeach
</section>

<!--EXPLORE PICKK SECTION-->
<section id="celebrate-section">
    <div class="celebrate-container">
        <img src="/assets/images/explore.jpg" alt="Explore Recipes">
        <div class="celeb-text-container">
            <h2>Explore all our Filipino Recipes</h2>
            <p>Discover all PICKK's recipes with over 500+ tested dishes, featuring innovative Guided Cooking functionality.</p>
            <a href="/menu2" class="button2">DISCOVER</a>
        </div>
    </div>
</section>
<!--END OF EXPLORE PICKK SECTION-->
@endsection
