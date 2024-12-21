@extends('Components.layout')

@section('additional-styles')
<link rel="stylesheet" href="/assets/css/menu.css">
@endsection

@section('content')

    <!--WELCOME SECTION-->
        <section id="welcome-section">
            <div class="welcome-container">
                <img src="/assets/images/welcome.jpg" alt="welcome image">
                    <div class="text-container cute-font">
                        <h2>MENU</h2>
                        <p>Your Go-To Platform for Tried-and-True Recipes</p>
                        <a href="/sign-up" class="button1">TRY IT FOR FREE</a>
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
                <button onclick="alert('Sign Up to Unlock Recipes')">Sign Up to Unlock Recipes</button>
                <button onclick="alert('Sign Up to Download Your Favorite Recipes')">Download Your Favorite Recipes</button>
            </div>
        </div>
    <!--END OF FOOD CATEGORIES  SECTION-->

    <br>

    <!--JAVASCRIPT-->
    <script>
        const foodData = {
            appetizers: [
                { name: "Lumpiang Shanghai (Spring Rolls)", img: "/assets/images/lumpia.jpg", href: "{{ route('login') }}" }, 
                { name: "Chicharon (Fried Pork Rinds)", img: "/assets/images/chicharon.jpg", href: "{{ route('login') }}" },
                { name: "Tokwa't Baboy (Tofu and Pork)", img: "/assets/images/tofu.jpg", href: "{{ route('login') }}" },
                { name: "Kilawin (Ceviche)", img: "/assets/images/kilawin.jpg", href: "{{ route('login') }}" },
                { name: "Dynamite (Stuffed Chili Peppers)", img: "/assets/images/dyn.jpg", href: "{{ route('login') }}" },
                { name: "Cheese Sticks", img: "/assets/images/chz.jpg", href: "{{ route('login') }}" },
                { name: "Empanada", img: "/assets/images/emp.jpg", href: "{{ route('login') }}" },
                { name: "Calamares (Fried Squid)", img: "/assets/images/cal.jpg", href: "{{ route('login') }}" },
                { name: "Fish Balls", img: "/assets/images/fishb.jpg", href: "{{ route('login') }}" },
                { name: "Ukoy (Shrimp Fritters)", img: "/assets/images/ok.jpg", href: "{{ route('login') }}" }
            ],
            
            soups: [
                { name: "Sinigang (Sour Soup with Pork or Shrimp)", img: "/assets/images/sinigang.jpg", href: "{{ route('login') }}" },
                { name: "Bulalo (Beef Shank Soup)", img: "/assets/images/bulalo.jpg", href: "{{ route('login') }}" },
                { name: "Tinola (Chicken Ginger Soup)", img: "/assets/images/tnl.jpg", href: "{{ route('login') }}" },
                { name: "Nilaga (Boiled Beef Soup)", img: "/assets/images/nlg.jpg", href: "{{ route('login') }}" },
                { name: "Molo Soup (Pork Dumpling Soup)", img: "/assets/images/molo.jpg", href: "{{ route('login') }}" },
                { name: "Lomi (Thick Noodle Soup)", img: "/assets/images/lml.jpg", href: "{{ route('login') }}" },
                { name: "Batchoy (Pork and Noodle Soup)", img: "/assets/images/btchy.jpg", href: "{{ route('login') }}" },
                { name: "La Paz Batchoy (Iloilo's Special Noodle Soup)", img: "/assets/images/lpzB.jpg", href: "{{ route('login') }}" },
                { name: "KBL (Kadios, Baboy, Langka)", img: "/assets/images/kbl.jpg", href: "{{ route('login') }}" },
                { name: "Misua (Misua Noodle Soup)", img: "/assets/images/missu.jpg", href: "{{ route('login') }}" }
            ],
  
            'main-courses': [
                { name: "Adobo (Marinated Meat)", img: "/assets/images/adobo.jpg", href: "{{ route('login') }}" },
                { name: "Kare-Kare (Peanut Stew)", img: "/assets/images/krkr.jpg", href: "{{ route('login') }}" },
                { name: "Lechon (Roast Pig)", img: "/assets/images/lchn.jpg", href: "{{ route('login') }}" },
                { name: "Bistek Tagalog (Beefsteak)", img: "/assets/images/bstk.jpg", href: "{{ route('login') }}" },
                { name: "Caldereta (Stew with Tomato Sauce)", img: "/assets/images/calds.jpg", href: "{{ route('login') }}" },
                { name: "Mechado (Beef Stew)", img: "/assets/images/mechu.jpg", href: "{{ route('login') }}" },
                { name: "Pinakbet (Mixed Vegetables with Shrimp Paste)", img: "/assets/images/kbt.jpg", href: "{{ route('login') }}" },
                { name: "Inihaw na Liempo (Grilled Pork Belly)", img: "/assets/images/liemps.jpg", href: "{{ route('login') }}" },
                { name: "Sisig (Sizzling Pork)", img: "/assets/images/sigsig.jpg", href: "{{ route('login') }}" },
                { name: "Chicken Inasal (Grilled Chicken)", img: "/assets/images/inasal.jpg", href: "{{ route('login') }}" }
            ],
    
            'side-dishes': [ 
                { name: "Atchara (Pickled Papaya)", img: "/assets/images/atch.jpg", href: "{{ route('login') }}" },      
                { name: "Ensaladang Talong (Eggplant Salad)", img: "/assets/images/egsal.jpg", href: "{{ route('login') }}" },       
                { name: "Burong Mangga (Pickled Mango)", img: "/assets/images/mango.jpg", href: "{{ route('login') }}" },      
                { name: "Salted Egg and Tomato", img: "/assets/images/saltomato.jpg", href: "{{ route('login') }}" },        
                { name: "Laing (Taro Leaves in Coconut Milk)", img: "/assets/images/laing.jpg", href: "{{ route('login') }}" },        
                { name: "Gising-Gising (Spicy Green Beans)", img: "/assets/images/wakey.jpg", href: "{{ route('login') }}" },        
                { name: "Adobong Kangkong (Water Spinach Adobo)", img: "/assets/images/adobskang.jpg", href: "{{ route('login') }}" },        
                { name: "Crispy Kangkong (Fried Water Spinach)", img: "/assets/images/crispkang.jpg", href: "{{ route('login') }}" },        
                { name: "Lumpiang Sariwa (Fresh Spring Rolls)", img: "/assets/images/fresh.jpg", href: "{{ route('login') }}" },        
                { name: "Pritong Talong (Fried Eggplant)", img: "/assets/images/ome.jpg", href: "{{ route('login') }}" }
    
            ],
    
            desserts: [
                { name: "Halo-Halo (Mixed Shaved Ice Dessert)", img: "/assets/images/mixmix.jpg", href: "{{ route('login') }}" },        
                { name: "Leche Flan (Caramel Custard)", img: "/assets/images/lechugas.jpg", href: "{{ route('login') }}" },        
                { name: "Bibingka (Rice Cake)", img: "/assets/images/bingks.jpg", href: "{{ route('login') }}" },        
                { name: "Turon (Banana Spring Rolls)", img: "/assets/images/rontu.jpg", href: "{{ route('login') }}" },        
                { name: "Puto (Steamed Rice Cake)", img: "/assets/images/putu.jpg", href: "{{ route('login') }}" },        
                { name: "Cassava Cake", img: "/assets/images/cascake.jpg", href: "{{ route('login') }}" },        
                { name: "Buko Pandan (Young Coconut with Pandan Jelly)", img: "/assets/images/bukpan.jpg", href: "{{ route('login') }}" },        
                { name: "Suman (Sticky Rice in Banana Leaves)", img: "/assets/images/sum.jpg", href: "{{ route('login') }}" },       
                { name: "Sapin-Sapin (Layered Rice Cake)", img: "/assets/images/sap.jpg", href: "{{ route('login') }}" },        
                { name: "Maja Blanca (Coconut Milk Pudding)", img: "/assets/images/maj.jpg", href: "{{ route('login') }}" }
            ],
    
            beverages: [
                { name: "Buko Juice (Coconut Juice)", img: "/assets/images/bukjo.jpg", href: "{{ route('login') }}" },        
                { name: "Calamansi Juice", img: "/assets/images/caljo.jpg", href: "{{ route('login') }}" },        
                { name: "Sago't Gulaman (Tapioca and Gelatin Drink)", img: "/assets/images/sagjo.jpg", href: "{{ route('login') }}" },        
                { name: "Taho (Silken Tofu with Syrup)", img: "/assets/images/tajo.jpg", href: "{{ route('login') }}" },        
                { name: "Salabat (Ginger Tea)", img: "/assets/images/salbs.jpg", href: "{{ route('login') }}" },        
                { name: "Mango Shake", img: "/assets/images/mangsh.jpg", href: "{{ route('login') }}" },        
                { name: "Pineapple Juice", img: "/assets/images/pineju.jpg", href: "{{ route('login') }}" },        
                { name: "Pandan Juice", img: "/assets/images/panjo.jpg", href: "{{ route('login') }}" },        
                { name: "Tsokolate (Filipino Hot Chocolate)", img: "/assets/images/chikolet.jpg", href: "{{ route('login') }}" }
            ],
    
            breakfast: [      
                { name: "Tapsilog (Beef Tapa, Egg, and Rice)", img: "/assets/images/tapsi.jpg", href: "{{ route('login') }}" },        
                { name: "Longsilog (Longganisa, Egg, and Rice)", img: "/assets/images/lonsi.jpg", href: "{{ route('login') }}" },        
                { name: "Tocilog (Tocino, Egg, and Rice)", img: "/assets/images/toci.jpg", href: "{{ route('login') }}" },        
                { name: "Daingsilog (Dried Fish, Egg, and Rice)", img: "/assets/images/dayngs.jpg", href: "{{ route('login') }}" },        
                { name: "Champorado (Chocolate Rice Porridge)", img: "/assets/images/champ.jpg", href: "{{ route('login') }}" },        
                { name: "Arroz Caldo (Chicken Rice Porridge)", img: "/assets/images/lugaws.jpg", href: "{{ route('login') }}" },        
                { name: "Pandesal (Bread Rolls)", img: "/assets/images/abs.jpg", href: "{{ route('login') }}" },        
                { name: "Tortang Talong (Eggplant Omelette)", img: "/assets/images/omel.jpg", href: "{{ route('login') }}" },        
                { name: "Bangsilog (Bangus, Egg, and Rice)", img: "/assets/images/bangs.jpg", href: "{{ route('login') }}" },        
                { name: "Corned Beef and Egg", img: "/assets/images/red.jpg", href: "{{ route('login') }}" }    
            ]
        };

        function showFoods(category) {
        const foodCards = document.getElementById('food-cards');
        foodCards.innerHTML = ''; // Clear previous cards

        foodData[category].forEach(food => {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
                <img src="${food.img}">
                <div class="card-content">
                    <h3>${food.name}</h3>
                    <a href="${food.href}" class="view-recipe">View Recipe</a>
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
                            <a href="${food.href}" class="view-recipe">View Recipe</a>
                         </div>
                        `;
                        foodCards.appendChild(card);
                    }
                });
            }
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