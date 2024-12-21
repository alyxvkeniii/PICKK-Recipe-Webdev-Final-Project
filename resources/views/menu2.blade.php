@extends('Components.layout2')

@section('additional-styles')
<link rel="stylesheet" href="/assets/css/menu2.css">
@endsection

@section('content')

    <!--WELCOME SECTION-->
        <section id="welcome-section">
            <div class="welcome-container">
                <img src="/assets/images/welcome.jpg" alt="welcome image">
                    <div class="text-container cute-font">
                        <h2>MENU</h2>
                        <p>Your Go-To Platform for Tried-and-True Recipes</p>
                        <a href="/my-recipe" class="button1">TRY IT FOR FREE</a>
                        <br>
                        <div class="search-container">
                            <input type="text" placeholder="Search Recipe..." class="search-input">
                            <button class="search-button" onclick="searchRecipes()">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <br>
        <section id="headline-section">
              <h2>Top Notch Recipes</h2>
                <p> Savor the Flavors of the Philippines – One Dish, One Region, One Story at a Time.</p>
        </section>  

    <!--END OF WELCOME SECTION-->
    
    <br>

    <!--FOOD CATEGORIES  SECTION-->
        <div class="food-categories">
            <div class="category" onclick="showFoods('appetizers')">
                <img src="/assets/images/appetizers.jpg" alt="Appetizers">
                <span>Appetizers</span>
            </div>
            <div class="category" onclick="showFoods('soups')">
                <img src="/assets/images/soups.jpg" alt="Soups">
                <span>Soups</span>
            </div>
            <div class="category" onclick="showFoods('main-courses')">
                <img src="/assets/images/maincourses.jpg" alt="Main Courses">
                <span>Main Courses</span>
            </div>
            <div class="category" onclick="showFoods('side-dishes')">
                <img src="/assets/images/sidedish.jpg" alt="Side Dishes">
                <span>Side Dishes</span>
            </div>
            <div class="category" onclick="showFoods('desserts')">
                <img src="/assets/images/desserts.jpg" alt="Desserts">
                <span>Desserts</span>
            </div>
            <div class="category" onclick="showFoods('beverages')">
                <img src="/assets/images/beverages.jpg" alt="Beverages">
                <span>Beverages</span>
            </div>
            <div class="category" onclick="showFoods('breakfast')">
                <img src="/assets/images/bfast.jpg" alt="Breakfast">
                <span>Breakfast</span>
            </div>
        </div>
        <div id="food-cards" class="food-cards"></div>
            <div class="buttons">
                <button onclick="alert('Make Recipes')">Start to Make Your Own Recipe</button>
                <button onclick="alert('Download Your Favorite Recipes')">Download Your Favorite Recipes</button>
            </div>
        </div>
    <!--END OF FOOD CATEGORIES  SECTION-->

    <br>

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


    <!--JAVASCRIPT-->
    <script>
        const foodData = {
            appetizers: [
    { 
        name: "Lumpiang Shanghai (Spring Rolls)", 
        img: "/assets/images/lumpia.jpg",
        description: "Crispy spring rolls filled with a savory mixture of ground pork and vegetables, perfect for dipping in sweet and sour sauce.",
        ingredients: [
            "Ground pork",
            "Garlic",
            "Onion",
            "Carrot",
            "Spring roll wrappers",
            "Salt",
            "Pepper",
            "Egg"
        ],
        instructions: [
            "Mix ground pork, garlic, onion, grated carrot, soy sauce, salt, pepper, and egg in a bowl.",
            "Place a small portion of the mixture in the center of a spring roll wrapper.",
            "Roll tightly, sealing the edges with water.",
            "Deep fry in hot oil until golden brown and crispy.",
            "Serve with sweet and sour dipping sauce."
        ]
    },
    { 
        name: "Chicharon (Fried Pork Rinds)", 
        img: "/assets/images/chicharon.jpg",
        description: "Crunchy and flavorful fried pork rinds, seasoned with salt and served with a tangy vinegar dipping sauce, making for a delightful snack.",
        ingredients: [
            "Pork skin",
            "Salt",
            "Vinegar",
            "Garlic"
        ],
        instructions: [
            "Boil the pork skin in vinegar, water, and garlic until tender.",
            "Cut into pieces and allow to dry.",
            "Deep fry the pieces until crispy.",
            "Season with salt and serve with vinegar dipping sauce."
        ]
    },
    { 
        name: "Tokwa't Baboy (Tofu and Pork)", 
        img: "/assets/images/tofu.jpg",
        description: "A hearty dish combining tender pork belly and golden fried tofu, simmered in a savory sauce of soy sauce, vinegar, and spices, offering a rich and satisfying flavor.",
        ingredients: [
            "Pork belly",
            "Tofu",
            "Soy sauce",
            "Vinegar",
            "Garlic",
            "Onion",
            "Chili",
            "Sugar"
        ],
        instructions: [
            "Boil pork belly until tender, then cut into pieces.",
            "Fry tofu until golden brown and cut into cubes.",
            "Sauté garlic, onions, and chili in a pan.",
            "Add soy sauce, vinegar, sugar, and water.",
            "Combine pork, tofu, and sauce, and simmer for a few minutes."
        ]
    },
    { 
        name: "Kilawin (Ceviche)", 
        img: "/assets/images/kilawin.jpg",
        description: "A refreshing Filipino-style ceviche made with fresh fish marinated in vinegar and calamansi juice, mixed with ginger, onions, and chili for a zesty kick.",
        ingredients: [
            "Fish (like tuna or bangus)",
            "Vinegar",
            "Calamansi or lemon",
            "Ginger",
            "Onion",
            "Chili",
            "Salt"
        ],
        instructions: [
            "Cut fish into small pieces.",
            "Marinate fish in vinegar and calamansi juice for at least an hour.",
            "Add sliced ginger, onions, and chili.",
            "Season with salt and serve chilled."
        ]
    },
    { 
        name: "Dynamite (Stuffed Chili Peppers)", 
        img: "/assets/images/dyn.jpg",
        description: "Spicy long green chili peppers stuffed with a flavorful mixture of ground pork and sautéed vegetables, deep-fried to perfection for a crunchy and savory bite.",
        ingredients: [
            "Long green chili peppers",
            "Ground pork",
            "Garlic",
            "Onion",
            "Cheese (optional)",
            "Soy sauce",
            "Pepper"
        ],
        instructions: [
            "Cut a slit in the chili peppers and remove the seeds.",
            "Sauté garlic, onion, and ground pork with soy sauce and pepper.",
            "Stuff the chili peppers with the pork mixture.",
            "Optionally, add cheese before sealing.",
            "Deep fry until golden and serve with dipping sauce."
        ]
    },
    { 
        name: "Cheese Sticks", 
        img: "/assets/images/chz.jpg",
        description: "Deliciously crispy cheese sticks wrapped in spring roll wrappers and deep-fried until golden brown, offering a gooey and cheesy center that’s perfect for snacking.",
        ingredients: [
            "Cheese (processed cheese or mozzarella)",
            "Spring roll wrappers",
            "Egg wash"
        ],
        instructions: [
            "Cut cheese into sticks.",
            "Wrap each stick in a spring roll wrapper.",
            "Seal the ends with egg wash.",
            "Deep fry until golden brown."
        ]
    },
    {
        name: "Empanada",
        img: "/assets/images/emp.jpg",
        description: "A flaky pastry filled with a savory mixture of ground pork, vegetables, and hard-boiled egg, either baked or fried to perfection.",
        ingredients: [
            "Ground pork",
            "Potatoes",
            "Carrots",
            "Onions",
            "Green peas",
            "Hard boiled egg",
            "Empanada dough"
        ],
        instructions: [
            "Sauté ground pork with onions, carrots, potatoes, and green peas.",
            "Add seasonings and cook until tender.",
            "Place filling inside empanada dough, add a slice of hard-boiled egg.",
            "Seal the edges, brush with egg wash, and bake or deep fry."
        ]
    },
    {
        name: "Calamares (Fried Squid)",
        img: "/assets/images/cal.jpg",
        description: "Crispy deep-fried squid rings seasoned with spices, served with fresh lemon wedges for a zesty kick.",
        ingredients: [
            "Squid",
            "Flour",
            "Cornstarch",
            "Egg",
            "Salt",
            "Pepper",
            "Paprika",
            "Lemon"
        ],
        instructions: [
            "Clean and slice squid into rings.",
            "Mix flour, cornstarch, salt, pepper, and paprika in a bowl.",
            "Dip squid rings in beaten egg, then coat with the flour mixture.",
            "Deep fry until golden and crispy.",
            "Serve with lemon wedges."
        ]
    },
    {
        name: "Fish Balls",
        img: "/assets/images/fishb.jpg",
        description: "Golden-fried balls made from seasoned fish paste, a popular street food best paired with sweet and spicy dipping sauces.",
        ingredients: [
            "Fish fillet (any white fish)",
            "Cornstarch",
            "Egg",
            "Garlic",
            "Onion",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Blend fish fillet with garlic, onion, salt, and pepper.",
            "Add cornstarch and egg to form a dough.",
            "Shape into small balls and deep fry until golden."
        ]
    },
    {
        name: "Ukoy (Shrimp Fritters)",
        img: "/assets/images/ok.jpg",
        description: "Crispy shrimp fritters mixed with julienned sweet potatoes and mung bean sprouts, a delightful snack or appetizer.",
        ingredients: [
            "Shrimp",
            "Sweet potato (julienned)",
            "Mung bean sprouts",
            "Flour",
            "Cornstarch",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Mix shrimp, sweet potato, and mung bean sprouts with flour and cornstarch.",
            "Season with salt and pepper.",
            "Fry spoonfuls of the mixture until crispy and golden."
        ]
    },
    ],
    soups: [
    { 
        name: "Sinigang (Sour Soup with Pork or Shrimp)", 
        img: "/assets/images/sinigang.jpg",
        description: "A tangy and savory soup featuring pork or shrimp, cooked with tamarind and a medley of fresh vegetables.",
        ingredients: [
            "Pork or shrimp",
            "Tamarind (or sinigang mix)",
            "Tomatoes",
            "Onions",
            "Radish",
            "Eggplant",
            "Long green beans",
            "Water spinach (kangkong)",
            "Fish sauce"
        ],
        instructions: [
            "Boil pork or shrimp with water, tomatoes, onions, and tamarind.",
            "Add the vegetables and cook until tender.",
            "Season with fish sauce, salt, and pepper to taste."
        ]
    },
    { 
        name: "Bulalo (Beef Shank Soup)", 
        img: "/assets/images/bulalo.jpg",
        description: "A hearty beef soup with tender shanks, corn on the cob, and fresh vegetables, perfect for a comforting meal.",
        ingredients: [
            "Beef shank",
            "Corn on the cob",
            "Potatoes",
            "Cabbage",
            "Onions",
            "Fish sauce"
        ],
        instructions: [
            "Boil beef shank until tender.",
            "Add corn, potatoes, and onions, and simmer.",
            "Add cabbage and season with fish sauce and pepper."
        ]
    },
    { 
        name: "Tinola (Chicken Ginger Soup)", 
        img: "/assets/images/tnl.jpg",
        description: "A light and aromatic chicken soup with ginger, green papaya or chayote, and fresh spinach.",
        ingredients: [
            "Chicken",
            "Ginger",
            "Onion",
            "Garlic",
            "Papaya or chayote",
            "Spinach"
        ],
        instructions: [
            "Sauté ginger, onion, and garlic.",
            "Add chicken and cook until browned.",
            "Pour in water and bring to a boil.",
            "Add papaya or chayote, and cook until tender.",
            "Add spinach and season with fish sauce."
        ]
    },
    { 
        name: "Nilaga (Boiled Beef Soup)", 
        img: "/assets/images/nlg.jpg",
        description: "A simple and wholesome beef soup with potatoes, cabbage, and corn, seasoned with fish sauce.",
        ingredients: [
            "Beef (short ribs or shank)",
            "Corn on the cob",
            "Potatoes",
            "Cabbage",
            "Onion",
            "Fish sauce"
        ],
        instructions: [
            "Boil beef in water with onion until tender.",
            "Add corn, potatoes, and cabbage.",
            "Season with fish sauce and salt to taste."
        ]
    },
    { 
        name: "Molo Soup (Pork Dumpling Soup)", 
        img: "/assets/images/molo.jpg",
        description: "A comforting soup made with pork dumplings, ginger, and a flavorful chicken broth.",
        ingredients: [
            "Ground pork",
            "Wonton wrappers",
            "Onion",
            "Garlic",
            "Fish sauce",
            "Ginger",
            "Chicken broth"
        ],
        instructions: [
            "Make dumplings by wrapping ground pork with wonton wrappers.",
            "Boil the dumplings in chicken broth with ginger, onion, and garlic.",
            "Add fish sauce and pepper to taste."
        ]
    }
    ],
    "main-courses": [
    { 
        name: "Adobo (Marinated Meat)", 
        img: "/assets/images/adobo.jpg", 
        description: "A classic Filipino dish made with marinated chicken or pork, simmered in a tangy soy-vinegar sauce with garlic and spices.",
        ingredients: [
            "Chicken or pork",
            "Soy sauce",
            "Vinegar",
            "Garlic",
            "Bay leaves",
            "Peppercorns",
            "Water"
        ],
        instructions: [
            "Marinate the meat in soy sauce, vinegar, garlic, bay leaves, and peppercorns for at least 30 minutes.",
            "Simmer the marinated meat in the sauce until tender.",
            "Serve with rice."
        ],
    },
    { 
        name: "Kare-Kare (Peanut Stew)", 
        img: "/assets/images/krkr.jpg",
        description: "A rich and creamy peanut-based stew with oxtail, vegetables, and a side of fermented shrimp paste.",
        ingredients: [
            "Oxtail or beef",
            "Peanut butter",
            "Tamarind paste",
            "Eggplant",
            "String beans",
            "Banana blossoms",
            "Bagoong (fermented shrimp paste)"
        ],
        instructions: [
            "Boil oxtail until tender.",
            "Make a peanut sauce with peanut butter, tamarind paste, and water.",
            "Add the vegetables and cook until tender.",
            "Serve with bagoong on the side."
        ]
    },
    { 
        name: "Lechon (Roast Pig)", 
        img: "/assets/images/lchn.jpg",
        description: "A centerpiece dish of Filipino celebrations, featuring a whole roasted pig with crispy skin and tender meat.",
        ingredients: [
            "Whole pig",
            "Garlic",
            "Onions",
            "Soy sauce",
            "Vinegar",
            "Bay leaves",
            "Pepper"
        ],
        instructions: [
            "Stuff the pig with garlic, onions, bay leaves, soy sauce, and vinegar.",
            "Roast over a charcoal pit for several hours, basting periodically.",
            "Serve with lechon sauce."
        ]
    },
    { 
        name: "Bistek Tagalog (Beefsteak)", 
        img: "/assets/images/bstk.jpg",
        description: "A savory beef dish marinated in soy sauce and lemon, served with caramelized onions.",
        ingredients: [
            "Beef sirloin or round",
            "Soy sauce",
            "Lemon",
            "Garlic",
            "Onions",
            "Pepper"
        ],
        instructions: [
            "Marinate the beef in soy sauce, lemon, garlic, and pepper for at least 30 minutes.",
            "Fry the beef slices until browned.",
            "Sauté onions and add them to the beef.",
            "Serve with rice."
        ]
    },
    { 
        name: "Caldereta (Stew with Tomato Sauce)", 
        img: "/assets/images/calds.jpg",
        description: "A hearty stew with beef, potatoes, carrots, and bell peppers, cooked in a savory tomato sauce.",
        ingredients: [
            "Beef",
            "Potatoes",
            "Carrots",
            "Bell peppers",
            "Tomato sauce",
            "Peas",
            "Bay leaves",
            "Garlic",
            "Onions",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Sauté garlic and onions.",
            "Add beef and cook until browned.",
            "Add tomato sauce and water, then simmer until beef is tender.",
            "Add potatoes, carrots, and bell peppers.",
            "Simmer until vegetables are tender.",
            "Season with salt, pepper, and bay leaves.",
            "Serve hot."
        ]
    },
    { 
        name: "Mechado (Beef Stew)", 
        img: "/assets/images/mechu.jpg",
        description: "A flavorful tomato-based beef stew with potatoes, carrots, and bell peppers.",
        ingredients: [
            "Beef",
            "Tomato sauce",
            "Soy sauce",
            "Garlic",
            "Onion",
            "Carrots",
            "Potatoes",
            "Bell peppers",
            "Bay leaves",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Sauté garlic and onions.",
            "Add beef and cook until browned.",
            "Add soy sauce and tomato sauce.",
            "Simmer until beef is tender.",
            "Add vegetables and cook until tender.",
            "Season with salt, pepper, and bay leaves.",
            "Serve hot."
        ]
    },
    { 
        name: "Pinakbet (Mixed Vegetables with Shrimp Paste)", 
        img: "/assets/images/kbt.jpg",
        description: "A traditional vegetable dish with bitter melon, squash, and eggplant, flavored with shrimp paste.",
        ingredients: [
            "Bitter melon",
            "Eggplant",
            "Squash",
            "String beans",
            "Okra",
            "Shrimp paste (bagoong)",
            "Tomatoes",
            "Garlic",
            "Onion",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Sauté garlic, onions, and tomatoes.",
            "Add shrimp paste and cook for a minute.",
            "Add vegetables and cook, adding water if necessary.",
            "Simmer until vegetables are tender.",
            "Season with salt and pepper.",
            "Serve hot."
        ]
    },
    { 
        name: "Inihaw na Liempo (Grilled Pork Belly)", 
        img: "/assets/images/liemps.jpg",
        description: "A smoky and juicy grilled pork belly marinated in a flavorful blend of soy sauce, calamansi, and garlic.",
        ingredients: [
            "Pork belly",
            "Soy sauce",
            "Calamansi or lemon juice",
            "Garlic",
            "Onion",
            "Vinegar",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Marinate pork belly in soy sauce, calamansi juice, garlic, onion, vinegar, salt, and pepper.",
            "Grill pork belly until cooked and slightly charred.",
            "Serve with dipping sauce."
        ]
    },
    { 
        name: "Sisig (Sizzling Pork)", 
        img: "/assets/images/sigsig.jpg",
        description: "A sizzling dish of crispy pork bits, onions, and chili, topped with a raw egg for added richness.",
        ingredients: [
            "Pork belly",
            "Pork face",
            "Onion",
            "Lemon",
            "Chili peppers",
            "Soy sauce",
            "Vinegar",
            "Salt",
            "Pepper",
            "Egg"
        ],
        instructions: [
            "Boil pork belly and pork face until tender.",
            "Chop into small pieces.",
            "Sauté onions and chili peppers.",
            "Add chopped pork and season with soy sauce, vinegar, salt, and pepper.",
            "Fry until crispy.",
            "Serve on a sizzling plate with a raw egg on top."
        ]
    },
    { 
        name: "Chicken Inasal (Grilled Chicken)", 
        img: "/assets/images/inasal.jpg",
        description: "A popular grilled chicken dish marinated in a mix of vinegar, soy sauce, calamansi, garlic, and turmeric.",
        ingredients: [
            "Chicken",
            "Vinegar",
            "Soy sauce",
            "Calamansi or lemon juice",
            "Garlic",
            "Onion",
            "Ginger",
            "Turmeric",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Marinate chicken in vinegar, soy sauce, calamansi juice, garlic, onion, ginger, turmeric, salt, and pepper.",
            "Grill chicken until cooked and slightly charred.",
            "Serve with dipping sauce."
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
    ],

    "side-dishes": [
    { 
        name: "Atchara (Pickled Papaya)", 
        img: "/assets/images/atch.jpg",
        description: "A refreshing and tangy side dish made with green papaya and pickling spices, perfect for balancing rich flavors.",
        ingredients: [
            "Green papaya",
            "Carrots",
            "Red bell peppers",
            "Vinegar",
            "Sugar",
            "Salt",
            "Garlic",
            "Ginger"
        ],
        instructions: [
            "Shred green papaya and carrots.",
            "Add red bell peppers and mix.",
            "Boil vinegar, sugar, salt, garlic, and ginger to create the pickling solution.",
            "Pour over the vegetables and let sit for a few hours before serving."
        ]
    },
    { 
        name: "Ensaladang Talong (Eggplant Salad)", 
        img: "/assets/images/egsal.jpg", 
        description: "A simple yet flavorful salad made with roasted eggplant, tomatoes, and onions, dressed with vinegar.",
        ingredients: [
            "Eggplants",
            "Tomatoes",
            "Onions",
            "Vinegar",
            "Salt",
            "Pepper"
        ],
        instructions: [
            "Roast eggplants over an open flame until skin is charred.",
            "Peel and mash eggplants.",
            "Mix with chopped tomatoes and onions.",
            "Season with vinegar, salt, and pepper.",
            "Serve cold."
        ]
    },
    { 
        name: "Burong Mangga (Pickled Mango)", 
        img: "/assets/images/mango.jpg", 
        description: "A tangy and sweet pickled mango dish that pairs well with grilled or fried dishes.",
        ingredients: [
            "Unripe mangoes",
            "Salt",
            "Sugar",
            "Vinegar"
        ],
        instructions: [
            "Slice mangoes into strips.",
            "Mix with salt, sugar, and vinegar.",
            "Let sit for a few hours before serving."
        ]
    },
    { 
        name: "Salted Egg and Tomato", 
        img: "/assets/images/saltomato.jpg", 
        description: "A classic side dish combining the salty richness of salted eggs with the fresh taste of tomatoes.",
        ingredients: [
            "Salted eggs",
            "Tomatoes"
        ],
        instructions: [
            "Peel salted eggs and slice.",
            "Slice tomatoes and mix with salted eggs.",
            "Serve as a side dish."
        ]
    },
    { 
        name: "Laing (Taro Leaves in Coconut Milk)", 
        img: "/assets/images/laing.jpg", 
        description: "A creamy and spicy side dish made from dried taro leaves cooked in coconut milk and spices.",
        ingredients: [
            "Taro leaves",
            "Coconut milk",
            "Chili peppers",
            "Shrimp paste",
            "Onion",
            "Garlic",
            "Salt"
        ],
        instructions: [
            "Sauté garlic, onions, and chili peppers.",
            "Add shrimp paste and cook for a minute.",
            "Add coconut milk and bring to a simmer.",
            "Add taro leaves and cook until tender.",
            "Season with salt and serve."
        ]
    },
    { 
        name: "Gising-Gising (Spicy Green Beans)", 
        img: "/assets/images/wakey.jpg", 
        description: "A spicy and creamy dish featuring green beans and ground pork cooked in coconut milk.",
        ingredients: [
            "Green beans",
            "Ground pork",
            "Coconut milk",
            "Chili peppers",
            "Garlic",
            "Onions",
            "Fish sauce",
            "Salt"
        ],
        instructions: [
            "Sauté garlic, onions, and ground pork.",
            "Add green beans and cook for a few minutes.",
            "Add coconut milk and chili peppers.",
            "Simmer until beans are tender.",
            "Season with fish sauce and salt."
        ]
    },
    { 
        name: "Adobong Kangkong (Water Spinach Adobo)", 
        img: "/assets/images/adobskang.jpg", 
        description: "A simple yet flavorful dish made with water spinach cooked in soy sauce, vinegar, and garlic.",
        ingredients: [
            "Water spinach (kangkong)",
            "Soy sauce",
            "Vinegar",
            "Garlic",
            "Onions",
            "Bay leaves",
            "Pepper"
        ],
        instructions: [
            "Sauté garlic and onions.",
            "Add soy sauce, vinegar, and bay leaves.",
            "Simmer and add water spinach.",
            "Cook until tender and serve."
        ]
    },
    { 
        name: "Crispy Kangkong (Fried Water Spinach)", 
        img: "/assets/images/crispkang.jpg", 
        description: "A crispy and crunchy snack or side dish made from battered and deep-fried water spinach leaves.",
        ingredients: [
            "Water spinach (kangkong)",
            "Flour",
            "Cornstarch",
            "Eggs",
            "Salt",
            "Pepper",
            "Oil for frying"
        ],
        instructions: [
            "Mix flour, cornstarch, salt, and pepper.",
            "Dip water spinach in the batter and fry until crispy.",
            "Serve with dipping sauce."
        ]
    },
    { 
        name: "Lumpiang Sariwa (Fresh Spring Rolls)", 
        img: "/assets/images/fresh.jpg", 
        description: "Fresh spring rolls filled with vegetables and shrimp or chicken, served with a sweet peanut sauce.",
        ingredients: [
            "Rice wrappers",
            "Lettuce",
            "Cucumber",
            "Carrots",
            "Shrimp or chicken",
            "Garlic",
            "Peanut sauce"
        ],
        instructions: [
            "Soak rice wrappers in water until soft.",
            "Fill with lettuce, cucumber, carrots, shrimp or chicken.",
            "Roll tightly and serve with peanut sauce."
        ]
    },
    { 
        name: "Pritong Talong (Fried Eggplant)", 
        img: "/assets/images/ome.jpg", 
        description: "A simple fried eggplant dish served with a tangy garlic vinegar dipping sauce.",
        ingredients: [
            "Eggplants",
            "Garlic",
            "Vinegar",
            "Soy sauce",
            "Oil for frying"
        ],
        instructions: [
            "Slice eggplants and fry until crispy.",
            "Serve with garlic vinegar dipping sauce."
        ]
    } 
    ],
    "desserts": [
    {
        name: "Halo-Halo (Mixed Shaved Ice Dessert)", 
        img: "/assets/images/mixmix.jpg",
        description: "A popular Filipino dessert with layers of shaved ice, sweet treats, and milk, perfect for cooling down on a hot day.",
        ingredients: [
            "Shaved ice",
            "Ube ice cream",
            "Sweetened red beans",
            "Sweetened jackfruit",
            "Leche flan",
            "Pandan jelly",
            "Sugar palm fruit",
            "Milk"
        ],
        instructions: [
            "Layer shaved ice in a glass.",
            "Add a scoop of ube ice cream.",
            "Top with sweetened red beans, jackfruit, leche flan, pandan jelly, and sugar palm fruit.",
            "Pour milk on top and mix before eating."
        ]
    },
    {
        name: "Leche Flan (Caramel Custard)", 
        img: "/assets/images/lechugas.jpg",
        description: "A rich and creamy caramel custard dessert that melts in your mouth.",
        ingredients: [
            "Eggs",
            "Condensed milk",
            "Evaporated milk",
            "Sugar",
            "Vanilla extract"
        ],
        instructions: [
            "Caramelize sugar in a pan and pour into a mold.",
            "Mix eggs, condensed milk, evaporated milk, and vanilla.",
            "Pour the mixture into the mold.",
            "Steam for 30-45 minutes until set.",
            "Let cool before serving."
        ]
    },
    {
        name: "Bibingka (Rice Cake)", 
        img: "/assets/images/bingks.jpg",
        description: "A soft and fluffy rice cake, traditionally baked in clay pots and topped with cheese or salted egg.",
        ingredients: [
            "Rice flour",
            "Coconut milk",
            "Sugar",
            "Baking powder",
            "Salt",
            "Eggs",
            "Butter",
            "Cheese (optional)",
            "Salted egg (optional)"
        ],
        instructions: [
            "Preheat oven and grease a baking pan.",
            "Mix rice flour, coconut milk, sugar, baking powder, salt, eggs, and melted butter.",
            "Pour into the baking pan and top with cheese and salted egg (optional).",
            "Bake for 30-40 minutes until golden brown."
        ]
    },
    {
        name: "Turon (Banana Spring Rolls)", 
        img: "/assets/images/rontu.jpg",
        description: "A crispy and sweet treat made from bananas rolled in spring wrappers and fried to perfection.",
        ingredients: [
            "Bananas (preferably saba)",
            "Spring roll wrappers",
            "Sugar",
            "Cinnamon (optional)",
            "Oil for frying"
        ],
        instructions: [
            "Slice bananas and roll them in sugar and cinnamon.",
            "Wrap each banana slice in a spring roll wrapper.",
            "Fry until golden brown and crispy.",
            "Serve hot."
        ]
    },
    {
        name: "Puto (Steamed Rice Cake)", 
        img: "/assets/images/putu.jpg",
        description: "Soft and fluffy steamed rice cakes that can be served plain or topped with cheese.",
        ingredients: [
            "Rice flour",
            "Sugar",
            "Baking powder",
            "Coconut milk",
            "Eggs",
            "Vanilla extract",
            "Cheese (optional)"
        ],
        instructions: [
            "Mix rice flour, sugar, baking powder, coconut milk, eggs, and vanilla.",
            "Pour the mixture into molds.",
            "Top with cheese if desired.",
            "Steam for 20-30 minutes until cooked."
        ]
    },
    {
        name: "Cassava Cake", 
        img: "/assets/images/cascake.jpg",
        description: "A dense and chewy cake made from grated cassava, perfect for special occasions.",
        ingredients: [
            "Grated cassava",
            "Coconut milk",
            "Sugar",
            "Eggs",
            "Condensed milk",
            "Cheese (optional)"
        ],
        instructions: [
            "Mix grated cassava, coconut milk, sugar, eggs, and condensed milk.",
            "Pour into a baking dish and bake at 350°F (175°C) for 40-50 minutes.",
            "Top with cheese and bake for an additional 10 minutes."
        ]
    },
    {
        name: "Buko Pandan (Young Coconut with Pandan Jelly)", 
        img: "/assets/images/bukpan.jpg",
        description: "A refreshing dessert made with young coconut strips, pandan jelly, and a sweet creamy base.",
        ingredients: [
            "Young coconut (buko)",
            "Pandan jelly",
            "Coconut milk",
            "Condensed milk",
            "Sugar"
        ],
        instructions: [
            "Cut young coconut into strips.",
            "Add pandan jelly and coconut milk.",
            "Mix with condensed milk and sugar.",
            "Chill before serving."
        ]
    },
    {
        name: "Suman (Sticky Rice in Banana Leaves)", 
        img: "/assets/images/sum.jpg",
        description: "A traditional Filipino snack made of glutinous rice wrapped in banana leaves and steamed.",
        ingredients: [
            "Glutinous rice",
            "Coconut milk",
            "Sugar",
            "Banana leaves"
        ],
        instructions: [
            "Soak glutinous rice in water for several hours.",
            "Cook rice with coconut milk and sugar.",
            "Wrap the cooked rice in banana leaves.",
            "Steam for 30-40 minutes."
        ]
    },
    {
        name: "Sapin-Sapin (Layered Rice Cake)", 
        img: "/assets/images/sap.jpg",
        description: "A colorful layered rice cake with sweet and creamy flavors, made with ube and coconut.",
        ingredients: [
            "Rice flour",
            "Coconut milk",
            "Sugar",
            "Ube extract",
            "Mango puree",
            "Food coloring (optional)"
        ],
        instructions: [
            "Prepare three separate layers using rice flour, coconut milk, sugar, ube extract, and mango puree.",
            "Layer the mixtures in a mold, alternating colors.",
            "Steam for 30-40 minutes until firm."
        ]
    },
    {
        name: "Maja Blanca (Coconut Milk Pudding)", 
        img: "/assets/images/maj.jpg",
        description: "A creamy and light coconut pudding, often topped with sweet corn or toasted coconut.",
        ingredients: [
            "Cornstarch",
            "Coconut milk",
            "Sugar",
            "Evaporated milk",
            "Sweet corn (optional)"
        ],
        instructions: [
            "Mix cornstarch, coconut milk, sugar, and evaporated milk in a saucepan.",
            "Cook over medium heat while stirring until thickened.",
            "Pour into a mold and let cool.",
            "Top with sweet corn and chill before serving."
        ]
    }
    ],

    "beverages": [
    {
        name: "Buko Juice (Coconut Juice)", 
        img: "/assets/images/bukjo.jpg",
        description: "A refreshing and natural drink made from fresh coconut juice, perfect for hydration.",
        ingredients: [
            "Fresh coconut",
            "Cold water"
        ],
        instructions: [
            "Open a fresh coconut and pour out the juice.",
            "Serve chilled with ice."
        ]
    },
    {
        name: "Calamansi Juice", 
        img: "/assets/images/caljo.jpg",
        description: "A zesty and refreshing drink made from calamansi, a popular citrus fruit in the Philippines.",
        ingredients: [
            "Calamansi (Philippine lime)",
            "Sugar",
            "Water",
            "Ice"
        ],
        instructions: [
            "Squeeze the calamansi to extract the juice.",
            "Mix with water and sugar to taste.",
            "Serve over ice."
        ]
    },
    {
        name: "Sago't Gulaman (Tapioca and Gelatin Drink)", 
        img: "/assets/images/sagjo.jpg",
        description: "A sweet and chewy beverage featuring tapioca pearls and flavored gelatin, popular at Filipino street stalls.",
        ingredients: [
            "Tapioca pearls",
            "Gelatin (flavored)",
            "Brown sugar syrup",
            "Water"
        ],
        instructions: [
            "Cook the tapioca pearls and gelatin separately according to package instructions.",
            "Mix the cooked pearls and gelatin in a tall glass.",
            "Add brown sugar syrup and water, and serve with ice."
        ]
    },
    {
        name: "Taho (Silken Tofu with Syrup)", 
        img: "/assets/images/tajo.jpg",
        description: "A warm, comforting street food drink made with silken tofu, sweet syrup, and sago pearls.",
        ingredients: [
            "Silken tofu",
            "Sugar syrup",
            "Sago pearls"
        ],
        instructions: [
            "Heat silken tofu and spoon it into a cup.",
            "Top with sugar syrup and sago pearls.",
            "Serve warm or chilled."
        ]
    },
    {
        name: "Salabat (Ginger Tea)", 
        img: "/assets/images/salbs.jpg",
        description: "A soothing tea made from fresh ginger, known for its comforting and health-boosting properties.",
        ingredients: [
            "Fresh ginger",
            "Sugar",
            "Water"
        ],
        instructions: [
            "Boil fresh ginger slices in water.",
            "Add sugar to taste and simmer for 10-15 minutes.",
            "Strain and serve hot."
        ]
    },
    {
        name: "Mango Shake", 
        img: "/assets/images/mangsh.jpg",
        description: "A creamy and delicious mango smoothie that’s a tropical treat in every sip.",
        ingredients: [
            "Mangoes",
            "Milk",
            "Sugar",
            "Ice"
        ],
        instructions: [
            "Blend fresh mangoes with milk, sugar, and ice until smooth.",
            "Serve chilled."
        ]
    },
    {
        name: "Pineapple Juice", 
        img: "/assets/images/pineju.jpg",
        description: "A vibrant and refreshing drink made from fresh pineapples, perfect for any tropical craving.",
        ingredients: [
            "Fresh pineapple",
            "Sugar",
            "Water",
            "Ice"
        ],
        instructions: [
            "Blend fresh pineapple with sugar and water.",
            "Strain and serve over ice."
        ]
    },
    {
        name: "Pandan Juice", 
        img: "/assets/images/panjo.jpg",
        description: "A fragrant and refreshing drink infused with the natural aroma of pandan leaves.",
        ingredients: [
            "Pandan leaves",
            "Sugar",
            "Water"
        ],
        instructions: [
            "Boil pandan leaves in water to extract flavor.",
            "Add sugar to taste and simmer.",
            "Serve chilled."
        ]
    },
    {
        name: "Tsokolate (Filipino Hot Chocolate)", 
        img: "/assets/images/chikolet.jpg",
        description: "A rich and traditional Filipino hot chocolate made with tablea, perfect for a cozy treat.",
        ingredients: [
            "Tablea (Filipino cacao tablets)",
            "Sugar",
            "Milk"
        ],
        instructions: [
            "Dissolve the tablea in hot water or milk.",
            "Add sugar to taste.",
            "Serve hot with a frothy texture."
        ]
    }
    ],

    "breakfast": [
    {
        name: "Tapsilog (Beef Tapa, Egg, and Rice)", 
        img: "/assets/images/tapsi.jpg",
        description: "A classic Filipino breakfast combining marinated beef tapa, a sunny-side-up egg, and garlic fried rice.",
        ingredients: [
            "Beef tapa",
            "Egg",
            "Rice",
            "Garlic (optional)",
            "Soy sauce",
            "Vinegar",
            "Sugar"
        ],
        instructions: [
            "Marinate beef in soy sauce, vinegar, and sugar for at least 30 minutes.",
            "Pan-fry the beef tapa until crispy.",
            "Fry an egg to your preferred doneness.",
            "Serve with steamed rice and garlic, if desired."
        ]
    },
    {
        name: "Longsilog (Longganisa, Egg, and Rice)", 
        img: "/assets/images/lonsi.jpg",
        description: "A sweet and savory breakfast featuring Filipino sausage, fried egg, and garlic fried rice.",
        ingredients: [
            "Longganisa (Filipino sausage)",
            "Egg",
            "Rice",
            "Garlic (optional)"
        ],
        instructions: [
            "Fry longganisa until cooked through.",
            "Fry an egg to your preferred doneness.",
            "Serve with steamed rice and garlic, if desired."
        ]
    },
    {
        name: "Tocilog (Tocino, Egg, and Rice)", 
        img: "/assets/images/toci.jpg",
        description: "A sweet breakfast treat made with caramelized tocino, a fried egg, and rice.",
        ingredients: [
            "Tocino (sweet cured pork)",
            "Egg",
            "Rice",
            "Garlic (optional)"
        ],
        instructions: [
            "Pan-fry tocino until caramelized.",
            "Fry an egg to your preferred doneness.",
            "Serve with steamed rice and garlic, if desired."
        ]
    },
    {
        name: "Daingsilog (Dried Fish, Egg, and Rice)", 
        img: "/assets/images/dayngs.jpg",
        description: "A hearty breakfast featuring crispy fried dried fish, a fried egg, and rice.",
        ingredients: [
            "Dried fish (e.g., danggit)",
            "Egg",
            "Rice",
            "Garlic (optional)"
        ],
        instructions: [
            "Fry dried fish until crispy.",
            "Fry an egg to your preferred doneness.",
            "Serve with steamed rice and garlic, if desired."
        ]
    },
    {
        name: "Champorado (Chocolate Rice Porridge)", 
        img: "/assets/images/champ.jpg",
        description: "A sweet and comforting chocolate-flavored rice porridge, perfect for rainy mornings.",
        ingredients: [
            "Glutinous rice",
            "Cacao or tablea (Filipino chocolate tablets)",
            "Sugar",
            "Milk"
        ],
        instructions: [
            "Cook glutinous rice in water until tender.",
            "Dissolve the tablea in a little hot water, then add to the rice.",
            "Add sugar to taste and cook until thickened.",
            "Serve with a drizzle of milk."
        ]
    },
    {
        name: "Arroz Caldo (Chicken Rice Porridge)", 
        img: "/assets/images/lugaws.jpg",
        description: "A warm and savory rice porridge with tender chicken, ginger, and garlic, often topped with boiled eggs.",
        ingredients: [
            "Chicken (typically drumsticks or thighs)",
            "Glutinous rice",
            "Ginger",
            "Garlic",
            "Fish sauce",
            "Green onions",
            "Hard-boiled eggs",
            "Lemon or calamansi"
        ],
        instructions: [
            "Boil chicken with ginger and garlic until tender.",
            "Add glutinous rice and simmer until rice is cooked.",
            "Season with fish sauce and top with green onions, hard-boiled eggs, and a squeeze of lemon or calamansi."
        ]
    },
    {
        name: "Pandesal (Bread Rolls)", 
        img: "/assets/images/abs.jpg",
        description: "Soft and fluffy Filipino bread rolls, a breakfast staple perfect with coffee or hot chocolate.",
        ingredients: [
            "All-purpose flour",
            "Yeast",
            "Sugar",
            "Salt",
            "Butter",
            "Eggs",
            "Warm milk"
        ],
        instructions: [
            "Mix flour, sugar, salt, and yeast.",
            "Add eggs, butter, and warm milk, then knead the dough.",
            "Let it rise, then shape into small rolls and roll in breadcrumbs.",
            "Bake until golden brown."
        ]
    },
    {
        name: "Tortang Talong (Eggplant Omelette)", 
        img: "/assets/images/omel.jpg",
        description: "A unique and flavorful eggplant omelette, a vegetarian-friendly Filipino breakfast dish.",
        ingredients: [
            "Eggplant",
            "Eggs",
            "Salt",
            "Pepper",
            "Cooking oil"
        ],
        instructions: [
            "Grill or roast eggplant until soft, then peel the skin off.",
            "Mash the eggplant and mix with beaten eggs, salt, and pepper.",
            "Fry in oil until golden brown on both sides."
        ]
    },
    {
        name: "Bangsilog (Bangus, Egg, and Rice)", 
        img: "/assets/images/bangs.jpg",
        description: "A flavorful Filipino breakfast featuring fried bangus (milkfish), an egg, and rice.",
        ingredients: [
            "Bangus (milkfish)",
            "Egg",
            "Rice",
            "Garlic (optional)"
        ],
        instructions: [
            "Fry bangus until crispy.",
            "Fry an egg to your preferred doneness.",
            "Serve with steamed rice and garlic, if desired."
        ]
    },
    {
        name: "Corned Beef and Egg", 
        img: "/assets/images/red.jpg",
        description: "A quick and satisfying breakfast of crispy corned beef, a fried egg, and steamed rice.",
        ingredients: [
            "Corned beef",
            "Egg",
            "Garlic (optional)",
            "Rice"
        ],
        instructions: [
            "Fry corned beef in a pan until slightly crispy.",
            "Fry an egg to your preferred doneness.",
            "Serve with steamed rice and garlic, if desired."
        ]
    }
    ]

    };

        function showFoods(category) {
            const foodCards = document.getElementById('food-cards');
            foodCards.innerHTML = ''; // Clear previous cards

            foodData[category].forEach((food, index) => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                <img src="${food.img}">
                <div class="card-content">
                    <h3>${food.name}</h3>
                    <button class="view-recipe" onclick="openModal('${category}', ${index})">View Recipe</button>
                 </div>
                `;
                foodCards.appendChild(card);
            });
         }

         function searchRecipes() {
            const searchInput = document.querySelector('.search-input').value.toLowerCase();
            const foodCards = document.getElementById('food-cards');
            foodCards.innerHTML = ''; // Clear previous cards

            // Loop through all categories and filter recipes
            for (const category in foodData) {
                foodData[category].forEach((food, index) => {
                    if (food.name.toLowerCase().includes(searchInput)) {
                        const card = document.createElement('div');
                        card.className = 'card';
                        card.innerHTML = `
                        <img src="${food.img}">
                        <div class="card-content">
                            <h3>${food.name}</h3>
                            <button class="view-recipe" onclick="openModal('${category}', ${index})">View Recipe</button>
                         </div>
                        `;
                        foodCards.appendChild(card);
                    }
                });
            }
        }

         // Update the openModal function to display the description
        function openModal(category, index) {
            const food = foodData[category][index];
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


        function closeModal() {
            const modal = document.getElementById('recipe-modal');
            modal.style.display = 'none';
        }

         // Add event listener to the search button
         document.querySelector('.search-button').addEventListener('click', searchRecipes);
        
        // Add event listener to the search input for 'Enter' key
        document.querySelector('.search-input').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                searchRecipes();
            }
        });
    </script>

    <!--END OF JAVASCRIPT-->

@endsection