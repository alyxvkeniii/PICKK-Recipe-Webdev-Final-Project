@extends('Components.layout')

@section('additional-styles')
<link rel="stylesheet" href="/assets/css/home.css">
@endsection

@section('content')
        <!--WELCOME SECTION-->
        <section id="welcome-section">
            <div class="welcome-container">
                <img src="/assets/images/welcome.jpg" alt="welcome image">
                    <div class="text-container cute-font">
                        <h2>Join PICKK Recipe!</h2>
                        <p>Your Go-To Platform for Tried-and-True Recipes</p>
                        <a href="/sign-up" class="button1">TRY IT FOR FREE</a>
                    </div>
            </div>
        </section>
        <!--END OF WELCOME SECTION-->

        <!--SECTION OF GET TO KNOW PICKK-->
        <section id="about-section">
            <div class="about-container">
                    <div class="about-text-container">
                        <h2 style="color: #d13469;">About PICKK Recipe!</h2>
                        <p><b>PICKK Recipe</b> is a filipino recipe sharing site where food lovers can post recipes from anywhere on the web. Use it to discover a new favorite food blog—or figure out what's for dinner tonight.</p><br>
                        <p>To save and share content, <a href="/sign-up" class="see-more">create a account</a> and start posting today.</p>
                        
                    </div>
            </div>
    
            <div class="image-container">
                <img src="/assets/images/filipino-foods.jpg" alt="Right Image">
            </div>
        </section>
        <!--END SECTION OF GET TO KNOW PICKK-->

        <!-- EXPLORE SECTION -->
        <section id="latestPICKK-section">
                <div class="latest-container">
                    <div class="title">
                        <h2>Latest PICKK Recipe</h2>
                        <a href="/menu" class="see-more">See more &gt;&gt;&gt;</a>
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

        <!--CELEBRATE PICKK SECTION-->
        <section id="celebrate-section">
            <div class="celebrate-container">
                <img src="/assets/images/celebrate.jpg" alt="celebrate image">
                    <div class="celeb-text-container">
                        <h2>Welcoming PICKK Recipe!</h2>
                        <p>Celebrate with us by throwing a fantastic party! Check out our article to explore recipes perfect for any occasion.</p>
                        <a href="/menu" class="button2">THROW A PARTY</a>
                    </div>
            </div>
        </section>
        <!--END OF CELEBRATE PICKK SECTION-->

        <!--SECTION OF DISCOVER PICKK-->
         <section id="discover-section">

            <div class="image-container">
                <img src="/assets/images/discover.jpg" alt="Left Image">
            </div>

            <div class="discover-container">
                    <div class="discover-text-container">
                        <h2 style="color: #d13469;">Discover Personalized Filipino Recipes with PICKK Recipe</h2>
                        <p>PICKK Recipe is cooking up something special! The platform learns your tastes, preferences, and cooking habits, 
                            offering personalized recipe recommendations. Whether you're craving a classic Filipino dish or something new, 
                            PICKK Recipe suggests recipes tailored to your flavor profile. From comforting favorites to exciting culinary surprises, 
                            explore dishes that match your mood and satisfy your cravings. Get started today and discover meals that are perfect for you!</p>  
                            <a href="/menu" class="button3">GET STARTED</a>      
                    </div>
            </div>
        </section>
        <!--END SECTION OF DISCOVER PICKK-->

        <!--SECTION OF CREATE RECIPE WITH PICKK-->
         <section id="discover-section">

            <div class="discover-container">
                    <div class="discover-text-container">
                        <h2 style="color: #d13469;">NEW: Share your Created Recipes!</h2>
                        <p>We know you love creating your own delicious Filipino dishes or modifying recipes to suit your taste. Now, there's even better 
                            news: You can share your culinary creations with friends and family through your favorite social media platforms! Whether you’ve 
                            put your unique spin on a classic recipe or made something entirely new, spreading the joy of cooking has never been easier. 
                            Share your recipes today and inspire others to cook up something special!</p>  
                            <a href="/sign-up" class="button3">CREATE AND SHARE TODAY</a>      
                    </div>
            </div>

            <div class="image-container">
                <img src="/assets/images/create-recipe.jpg" alt="Left Image">
            </div>

        </section>
        <!--END SECTION OF CREATE RECIPE WITH PICKK-->

        <!--SECTION OF DISCOVER PICKK-->
         <section id="discover-section">

            <div class="image-container">
                <img src="/assets/images/trending.jpg" alt="Left Image">
            </div>

            <div class="discover-container">
                    <div class="discover-text-container">
                        <h2 style="color: #d13469;">NEW: Discover Trending Filipino Recipes!</h2>
                        <p>Stay on top of the latest Filipino food trends with PICKK Recipe! Now, you can explore a curated collection of trending recipes, 
                            from modern twists on traditional dishes to new flavor combinations that everyone is talking about. Whether you’re looking to try 
                            something new or recreate the hottest dish in Filipino cuisine, you’ll find fresh inspiration to fuel your culinary adventures. 
                            Don’t miss out on what’s cooking – check out the trending recipes today!</p>  
                            <a href="/menu" class="button3">CHECK OUT</a>      
                    </div>
            </div>
        </section>
        <!--END SECTION OF DISCOVER PICKK-->

        <!--EXPLORE PICKK SECTION-->
        <section id="celebrate-section">
            <div class="celebrate-container">
                <img src="/assets/images/explore.jpg" alt="explore image">
                    <div class="celeb-text-container">
                        <h2>Explore all our Filipino Recipes</h2>
                        <p>Discover all PICKK's Recipe has to offer, with over 500+ tested recipes all with innovative Guided Cooking functionality.</p>
                        <a href="/menu" class="button2">DISCOVER</a>
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

