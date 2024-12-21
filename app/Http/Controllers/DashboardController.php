<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the appropriate dashboard with data based on the user's role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * Show the user dashboard with data.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $welcomeSection = [
            'title' => 'Welcome to PICKK\'S Recipe',
            'subtitle' => 'Your Go-To Platform for Tried-and-True Recipes',
        ];

        $aboutSection = [
            'title' => 'About PICKK Recipe!',
            'siteName' => 'PICKK Recipe',  
            'content' => 'PICKK Recipe is a Filipino recipe sharing site where food lovers can post recipes from anywhere on the web.',
            'cta' => 'To save and', 
            'linkText' => 'share content', 
            'linkUrl' => '/my-recipe',
            'image' => 'filipino-foods.jpg',
            'altText' => 'Right Image',
        ];

        $celebrateSection = [
            'image' => 'celebrate.jpg',
            'altText' => 'celebrate',
            'title' => 'Welcoming PICKK Recipe!',
            'description' => 'Celebrate with us by throwing a fantastic party! Check out our article to explore recipes perfect for any occasion.',
            'link' => '/menu2',
            'buttonText' => 'THROW A PARTY',
        ];
    
        $discoverSection = [
            'image' => 'discover.jpg',
            'altText' => 'discover',
            'title' => 'Discover Personalized Filipino Recipes with PICKK Recipe',
            'description' => '
            PICKK Recipe is cooking up something special! The platform learns your tastes, preferences, and cooking habits, offering personalized recipe recommendations. Whether youre craving a classic Filipino dish or something new, PICKK Recipe suggests recipes tailored to your flavor profile. From comforting favorites to exciting culinary surprises, explore dishes that match your mood and satisfy your cravings. Get started today and discover meals that are perfect for you!',
            'link' => '/menu2',
            'buttonText' => 'GET STARTED',
        ];
    
        $createRecipeSection = [
            'image' => 'create-recipe.jpg',
            'altText' => 'create-recipe',
            'title' => 'Share your Created Recipes!',
            'description' => 
             'We know you love creating your own delicious Filipino dishes or modifying recipes to suit your taste. Now, theres even better news: You can share your culinary creations with friends and family through your favorite social media platforms! Whether you’ve put your unique spin on a classic recipe or made something entirely new, spreading the joy of cooking has never been easier. Share your recipes today and inspire others to cook up something special!',
            'link' => '/my-recipe',
            'buttonText' => 'CREATE AND SHARE TODAY',
        ];
    
        $discoverTrendingSection = [
            'image' => 'trending.jpg',
            'altText' => 'trending-recipes',
            'title' => 'Discover Trending Filipino Recipes!',
            'description' => 'Stay on top of the latest Filipino food trends with PICKK Recipe! Now, you can explore a curated collection of trending recipes, from modern twists on traditional dishes to new flavor combinations that everyone is talking about. Whether you’re looking to try something new or recreate the hottest dish in Filipino cuisine, you’ll find fresh inspiration to fuel your culinary adventures. Don’t miss out on what’s cooking – check out the trending recipes today!',
            'link' => '/menu2',
            'buttonText' => 'CHECK OUT',
        ];
    
        $explorePickkSection = [
            'image' => 'explore.jpg',
            'altText' => 'explore-recipes',
            'title' => 'Explore all our Filipino Recipes',
            'description' => 'Discover over 500+ tested recipes with innovative guided cooking functionality.',
            'link' => '/menu2',
            'buttonText' => 'DISCOVER',
        ];
    
        return view('dashboard', compact(
            'celebrateSection',
            'discoverSection',
            'createRecipeSection',
            'discoverTrendingSection',
            'explorePickkSection',
            'welcomeSection',
            'aboutSection'
        ));
    }
}