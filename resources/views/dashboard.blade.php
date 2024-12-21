@extends('Components.layout2')

@section('additional-styles')
<link rel="stylesheet" href="/assets/css/dashboard.css">
@endsection

@section('content')
        <!--WELCOME SECTION-->
        <section id="welcome-section">
            <div class="welcome-container">
                <img src="/assets/images/welcome.jpg" alt="welcome image">
                <div class="text-container cute-font">
                    <h2>{{ $welcomeSection['title'] }}</h2>
                    <p>{{ $welcomeSection['subtitle'] }}</p>
                    <br>
                    <p>What would you like to cook today?</p>
                    <a href="/my-recipe" class="button1">TRY IT FOR FREE</a>
                </div>
            </div>
        </section>
    <!--END OF WELCOME SECTION-->

    <!--SECTION OF GET TO KNOW PICKK-->
            <section id="about-section">
                <div class="about-container">
                    <div class="about-text-container">
                        <h2 style="color: #d13469;">{{ $aboutSection['title'] }}</h2>
                        <p><b>PICKK Recipe</b> is a Filipino recipe sharing site where food lovers can post recipes from anywhere on the web. Use it to discover a new favorite food blog—or figure out what's for dinner tonight.</p><br>
                        <p>{{ $aboutSection['cta'] }} <a href="{{ $aboutSection['linkUrl'] }}" class="see-more">{{ $aboutSection['linkText'] }}</a> and start posting today.</p>
                    </div>
                </div>

                <div class="image-container">
                    <img src="/assets/images/{{ $aboutSection['image'] }}" alt="{{ $aboutSection['altText'] }}">
                </div>
            </section>
    <!--END SECTION OF GET TO KNOW PICKK-->

    <!-- EXPLORE SECTION -->
        <section id="latestPICKK-section">
                <div class="latest-container">
                    <div class="title">
                        <h2>Latest PICKK Recipe</h2>
                        <a href="/menu2" class="see-more">See more &gt;&gt;&gt;</a>
                    </div>

                    <!-- Four Recipe Cards -->
                    <div id="food-cards" class="food-cards">
                        <!-- Recipe cards will be dynamically populated here -->
                    </div>
                </div>

                <!-- Recipe Modal -->
                <div id="recipe-modal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <h2>Recipe Title</h2>
                        </div>
                        <div class="modal-body">
                            <img src="" alt="Recipe Image">
                            <p>Recipe details will be displayed here.</p>
                        </div>
                        <div class="modal-footer">
                            <button onclick="closeModal()">Close</button>
                        </div>
                    </div>
                </div>
        </section>
    <!-- END OF EXPLORE SECTION -->

    <!-- CELEBRATE PICKK SECTION -->
        <section id="celebrate-section">
            <div class="celebrate-container">
                <img src="/assets/images/{{ $celebrateSection['image'] }}" alt="{{ $celebrateSection['altText'] }} image">
                <div class="celeb-text-container">
                    <h2>{{ $celebrateSection['title'] }}</h2>
                    <p>{{ $celebrateSection['description'] }}</p>
                    <a href="{{ $celebrateSection['link'] }}" class="button2">{{ $celebrateSection['buttonText'] }}</a>
                </div>
            </div>
        </section>
    <!-- END OF CELEBRATE PICKK SECTION -->

    <!-- SECTION OF DISCOVER PICKK -->
            <section id="discover-section">

            <div class="image-container">
                <img src="/assets/images/{{ $discoverSection['image'] }}" alt="{{ $discoverSection['altText'] }} image">
            </div>

            <div class="discover-container">
                <div class="discover-text-container">
                    <h2 style="color: #d13469;">{{ $discoverSection['title'] }}</h2>
                    <p>{{ $discoverSection['description'] }}</p>  
                    <a href="{{ $discoverSection['link'] }}" class="button3">{{ $discoverSection['buttonText'] }}</a>      
                </div>
            </div>

            </section>
    <!-- END OF DISCOVER PICKK SECTION -->

    <!-- SECTION OF CREATE RECIPE WITH PICKK -->
        <section id="create-recipe-section">
            <div class="create-recipe-container">
                <div class="create-recipe-text-container">
                    <h2 style="color: #d13469;">{{ $createRecipeSection['title'] }}</h2>
                    <p>{{ $createRecipeSection['description'] }}</p>
                    <a href="{{ $createRecipeSection['link'] }}" class="button3">{{ $createRecipeSection['buttonText'] }}</a>
                </div>
            </div>

            <div class="image-container">
            <img src="/assets/images/{{ $createRecipeSection['image'] }}" alt="{{ $createRecipeSection['altText'] }}" class="move-left-image">
            </div>
        </section>
    <!-- END OF CREATE RECIPE WITH PICKK SECTION -->

    <!-- SECTION OF DISCOVER PICKK -->
        <section id="discover-section">

        <div class="image-container">
            <img src="/assets/images/{{ $discoverTrendingSection['image'] }}" alt="{{ $discoverTrendingSection['altText'] }}">
        </div>

        <div class="discover-container">
            <div class="discover-text-container">
                <h2 style="color: #d13469;">{{ $discoverTrendingSection['title'] }}</h2>
                <p>{{ $discoverTrendingSection['description'] }}</p>  
                <a href="{{ $discoverTrendingSection['link'] }}" class="button3">{{ $discoverTrendingSection['buttonText'] }}</a>      
            </div>
        </div>

        </section>
    <!-- END OF DISCOVER PICKK SECTION -->
        
    <!-- EXPLORE PICKK SECTION -->
        <section id="celebrate-section">
            <div class="celebrate-container">
                <img src="/assets/images/{{ $explorePickkSection['image'] }}" alt="{{ $explorePickkSection['altText'] }}">
                <div class="celeb-text-container">
                    <h2>{{ $explorePickkSection['title'] }}</h2>
                    <p>{{ $explorePickkSection['description'] }}</p>
                    <a href="{{ $explorePickkSection['link'] }}" class="button2">{{ $explorePickkSection['buttonText'] }}</a>
                </div>
            </div>
        </section>

    <!--END OF CELEBRATE PICKK SECTION-->

    <!--JAVASCRIPT-->
    <script>
        const foodData = {
    appetizers: [
        { 
            name: "Adobo (Chicken or Pork Adobo)", 
            img: "/assets/images/adobo.jpg",
            description: "A classic Filipino dish made with marinated chicken or pork, cooked in a tangy soy sauce, vinegar, garlic, and bay leaves, giving it a savory, slightly tangy flavor.",
            ingredients: [
                "Chicken or pork",
                "Soy sauce",
                "Vinegar",
                "Garlic",
                "Onion",
                "Bay leaves",
                "Peppercorns",
                "Salt",
                "Sugar"
            ],
            instructions: [
                "Marinate chicken or pork in soy sauce, vinegar, garlic, onion, bay leaves, and peppercorns for at least 30 minutes.",
                "Sauté garlic and onion in oil until fragrant.",
                "Add the marinated meat and cook until browned.",
                "Add the marinade, simmer until meat is tender, and the sauce reduces.",
                "Season with salt and sugar to taste, then serve."
            ]
        },
        { 
            name: "Caldereta (Beef Caldereta)", 
            img: "/assets/images/caldereta.jpg",
            description: "A hearty beef stew with a rich tomato-based sauce, simmered with vegetables like potatoes, carrots, and bell peppers, flavored with liver spread and spices for a comforting dish.",
            ingredients: [
                "Beef stew meat",
                "Tomato sauce",
                "Liver spread",
                "Potatoes",
                "Carrots",
                "Bell peppers",
                "Onion",
                "Garlic",
                "Bay leaves",
                "Salt",
                "Pepper"
            ],
            instructions: [
                "Brown beef stew meat in oil, then set aside.",
                "Sauté garlic and onion until softened.",
                "Add beef, tomato sauce, liver spread, and bay leaves, and simmer until beef is tender.",
                "Add potatoes, carrots, and bell peppers, cooking until vegetables are tender.",
                "Season with salt and pepper, and serve hot."
            ]
        },
        { 
            name: "Bicol Express", 
            img: "/assets/images/bicol_express.jpg",
            description: "A spicy Filipino dish made with pork, shrimp, and vegetables simmered in coconut milk and flavored with chili peppers for a rich and fiery taste.",
            ingredients: [
                "Pork belly",
                "Shrimp",
                "Coconut milk",
                "Chili peppers",
                "Garlic",
                "Onion",
                "Shrimp paste",
                "Fish sauce",
                "Salt"
            ],
            instructions: [
                "Sauté garlic and onion in oil until fragrant.",
                "Add pork belly and cook until browned.",
                "Add shrimp paste and fish sauce, then pour in coconut milk.",
                "Simmer until pork is tender and the sauce thickens.",
                "Add shrimp and chili peppers, cook for a few more minutes.",
                "Season with salt to taste, then serve with rice."
            ]
        },
        { 
            name: "Kare-Kare (Oxtail Stew)", 
            img: "/assets/images/krkr.jpg",
            description: "A Filipino oxtail stew made with a creamy peanut sauce, often served with vegetables like banana heart, eggplant, and string beans, and traditionally accompanied by bagoong (fermented shrimp paste).",
            ingredients: [
                "Oxtail",
                "Peanut butter",
                "Banana heart",
                "Eggplant",
                "String beans",
                "Onion",
                "Garlic",
                "Peanut sauce",
                "Bagoong (fermented shrimp paste)",
                "Salt"
            ],
            instructions: [
                "Boil oxtail in water until tender, then set aside.",
                "Sauté garlic and onion in oil until softened.",
                "Add peanut butter and peanut sauce, then stir to combine.",
                "Add the cooked oxtail and simmer until the sauce thickens.",
                "Add the vegetables (banana heart, eggplant, string beans) and cook until tender.",
                "Serve with bagoong on the side."
            ]
        }
    ]
};


function showFoods() {
    const foodCards = document.getElementById('food-cards');
    foodCards.innerHTML = ''; // Clear previous cards

    foodData.appetizers.forEach((food, index) => {
        const card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = `
            <img src="${food.img}" alt="${food.name}">
            <div class="card-content">
                <h3>${food.name}</h3>
                <button class="view-recipe" onclick="openModal(${index})">View Recipe</button>
            </div>
        `;
        foodCards.appendChild(card);
    });
}

// Initialize the cards when the page loads
window.onload = function() {
    showFoods();
};

// Function to open the modal with recipe details
function openModal(index) {
    const food = foodData.appetizers[index];
    const modal = document.getElementById('recipe-modal');
    modal.querySelector('.modal-header h2').textContent = food.name;
    modal.querySelector('.modal-body img').src = food.img;

    // Display description, ingredients, and instructions
    let ingredientsList = '<ul>';
    food.ingredients.forEach(ingredient => {
        ingredientsList += `<li>${ingredient}</li>`;
    });
    ingredientsList += '</ul>';

    let instructionsList = '<ol>';
    food.instructions.forEach(instruction => {
        instructionsList += `<li>${instruction}</li>`;
    });
    instructionsList += '</ol>';

    modal.querySelector('.modal-body p').innerHTML = `
        <strong>Description:</strong> ${food.description}<br>
        <strong>Ingredients:</strong> ${ingredientsList}
        <strong>Instructions:</strong> ${instructionsList}
    `;

    modal.style.display = 'block';
}

// Close the modal
function closeModal() {
    const modal = document.getElementById('recipe-modal');
    modal.style.display = 'none';
}

    </script>

    <!--END OF JAVASCRIPT-->

@endsection
