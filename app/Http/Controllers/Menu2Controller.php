<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Menu2Controller extends Controller
{
    public function index()
    {
        // Simulated data for the menu
        $data = [
            'welcome' => [
                'image' => '/assets/images/welcome.jpg',
                'title' => 'MENU',
                'subtitle' => 'Your Go-To Platform for Tried-and-True Recipes',
            ],
            'headline' => [
                'title' => 'Top Notch Recipes',
                'description' => 'Savor the Flavors of the Philippines – One Dish, One Region, One Story at a Time.',
            ],
            'food_categories' => [
                'appetizers' => [
                    'image' => '/assets/images/appetizers.jpg',
                    'label' => 'Appetizers',
                ],
                'soups' => [
                    'image' => '/assets/images/soups.jpg',
                    'label' => 'Soups',
                ],
                'main-courses' => [
                    'image' => '/assets/images/maincourses.jpg',
                    'label' => 'Main Courses',
                ],
                'side-dishes' => [
                    'image' => '/assets/images/sidedish.jpg',
                    'label' => 'Side Dishes',
                ],
                'desserts' => [
                    'image' => '/assets/images/desserts.jpg',
                    'label' => 'Desserts',
                ],
                'beverages' => [
                    'image' => '/assets/images/beverages.jpg',
                    'label' => 'Beverages',
                ],
                'breakfast' => [
                    'image' => '/assets/images/bfast.jpg',
                    'label' => 'Breakfast',
                ],
            ],
            'food_data' => [
                'appetizers' => [
                    ['name' => "Lumpiang Shanghai (Spring Rolls)", 'img' => "/assets/images/lumpia.jpg"],
                    ['name' => "Chicharon (Fried Pork Rinds)", 'img' => "/assets/images/chicharon.jpg"],
                    ['name' => "Tokwa't Baboy (Tofu and Pork)", 'img' => "/assets/images/tofu.jpg"],
                    ['name' => "Kilawin (Ceviche)", 'img' => "/assets/images/kilawin.jpg"],
                    ['name' => "Dynamite (Stuffed Chili Peppers)", 'img' => "/assets/images/dyn.jpg"],
                    ['name' => "Cheese Sticks", 'img' => "/assets/images/chz.jpg"],
                    ['name' => "Empanada", 'img' => "/assets/images/emp.jpg"],
                    ['name' => "Calamares (Fried Squid)", 'img' => "/assets/images/cal.jpg"],
                    ['name' => "Fish Balls", 'img' => "/assets/images/fishb.jpg"],
                    ['name' => "Ukoy (Shrimp Fritters)", 'img' => "/assets/images/ok.jpg"],
           
                ],
                'soups' => [
                    ['name' => "Sinigang (Sour Soup with Pork or Shrimp)", 'img' => "/assets/images/sinigang.jpg"],
                    ['name' => "Bulalo (Beef Shank Soup)", 'img' => "/assets/images/bulalo.jpg"],
                    ['name' => "Tinola (Chicken Ginger Soup)", 'img' => "/assets/images/tnl.jpg"],
                    ['name' => "Nilaga (Boiled Beef Soup)", 'img' => "/assets/images/nlg.jpg"],
                    ['name' => "Molo Soup (Pork Dumpling Soup)", 'img' => "/assets/images/molo.jpg"],
                    ['name' => "Lomi (Thick Noodle Soup)", 'img' =>"/assets/images/lml.jpg"],
                    ['name' => "Batchoy (Pork and Noodle Soup)", 'img' => "/assets/images/btchy.jpg"],
                    ['name' => "La Paz Batchoy (Iloilo's Special Noodle Soup)", 'img' => "/assets/images/lpzB.jpg"],
                    ['name' => "KBL (Kadios, Baboy, Langka)", 'img' => "/assets/images/kbl.jpg"],
                    ['name' => "Misua (Misua Noodle Soup)", 'img' => "/assets/images/missu.jpg"],
                   
                ],
                'main-courses' => [
                    ['name' => "Adobo (Marinated Meat)", 'img' => "/assets/images/adobo.jpg"],
                    ['name' => "Kare-Kare (Peanut Stew)", 'img' => "/assets/images/krkr.jpg"],
                    ['name' => "Lechon (Roast Pig)", 'img' => "/assets/images/lchn.jpg"],
                    ['name' => "Bistek Tagalog (Beefsteak)", 'img' => "/assets/images/bstk.jpg"],
                    ['name' => "Caldereta (Stew with Tomato Sauce)", 'img' => "/assets/images/calds.jpg"],
                    ['name' => "Mechado (Beef Stew)", 'img' => "/assets/images/mechu.jpg"],
                    ['name' => "Pinakbet (Mixed Vegetables with Shrimp Paste)", 'img' =>"/assets/images/kbt.jpg"],
                    ['name' => "Inihaw na Liempo (Grilled Pork Belly)", 'img' =>"/assets/images/liemps.jpg"],
                    ['name' => "Sisig (Sizzling Pork)", 'img' =>  "/assets/images/sigsig.jpg"],
                    ['name' => "Chicken Inasal (Grilled Chicken)", 'img' => "/assets/images/inasal.jpg"],

                ],
                'side-dishes' => [
                    ['name' => "Atchara (Pickled Papaya)", 'img' => "/assets/images/atch.jpg"],
                    ['name' => "Ensaladang Talong (Eggplant Salad)", 'img' => "/assets/images/egsal.jpg"],
                    ['name' => "Burong Mangga (Pickled Mango)", 'img' => "/assets/images/mango.jpg"],
                    ['name' => "Salted Egg and Tomato", 'img' => "/assets/images/saltomato.jpg"],
                    ['name' => "Laing (Taro Leaves in Coconut Milk)", 'img' => "/assets/images/laing.jpg"],
                    ['name' => "Gising-Gising (Spicy Green Beans)", 'img' => "/assets/images/wakey.jpg" ],
                    ['name' => "Adobong Kangkong (Water Spinach Adobo)", 'img' => "/assets/images/adobskang.jpg"],
                    ['name' => "Crispy Kangkong (Fried Water Spinach)", 'img' =>"/assets/images/crispkang.jpg"],
                    ['name' => "Lumpiang Sariwa (Fresh Spring Rolls)", 'img' =>"/assets/images/fresh.jpg"],
                    ['name' => "Pritong Talong (Fried Eggplant)", 'img' => "/assets/images/ome.jpg"],
                    
                ],
                'desserts' => [
                    ['name' => "Halo-Halo (Mixed Shaved Ice Dessert)", 'img' => "/assets/images/mixmix.jpg"],
                    ['name' => "Leche Flan (Caramel Custard)", 'img' => "/assets/images/lechugas.jpg"],
                    ['name' => "Bibingka (Rice Cake)", 'img' => "/assets/images/bingks.jpg"],
                    ['name' => "Turon (Banana Spring Rolls)", 'img' => "/assets/images/rontu.jpg"],
                    ['name' => "Puto (Steamed Rice Cake)", 'img' => "/assets/images/putu.jpg"],
                    ['name' => "Cassava Cake", 'img' => "/assets/images/cascake.jpg" ],
                    ['name' => "Buko Pandan (Young Coconut with Pandan Jelly)", 'img' => "/assets/images/bukpan.jpg"],
                    ['name' => "Suman (Sticky Rice in Banana Leaves)", 'img' =>"/assets/images/sum.jpg"],
                    ['name' => "Sapin-Sapin (Layered Rice Cake)", 'img' =>"/assets/images/sap.jpg"],
                    ['name' => "Maja Blanca (Coconut Milk Pudding)", 'img' => "/assets/images/maj.jpg"],
   
                ],
                'beverages' => [
                    ['name' => "Buko Juice (Coconut Juice)", 'img' => "/assets/images/bukjo.jpg"],
                    ['name' => "Calamansi Juice", 'img' => "/assets/images/caljo.jpg"],
                    ['name' => "Sago't Gulaman (Tapioca and Gelatin Drink)", 'img' =>"/assets/images/sagjo.jpg"],
                    ['name' => "Taho (Silken Tofu with Syrup)", 'img' => "/assets/images/tajo.jpg"],
                    ['name' => "Salabat (Ginger Tea)", 'img' => "/assets/images/salbs.jpg"],
                    ['name' => "Mango Shake", 'img' =>"/assets/images/mangsh.jpg"],
                    ['name' => "Pineapple Juice", 'img' => "/assets/images/pineju.jpg" ],
                    ['name' => "Pandan Juice", 'img' =>"/assets/images/panjo.jpg"],
                    ['name' =>  "Tsokolate (Filipino Hot Chocolate)", 'img' =>"/assets/images/chikolet.jpg"],
            
                ],
                'breakfast' => [
                    ['name' => "Tapsilog (Beef Tapa, Egg, and Rice)", 'img' => "/assets/images/tapsi.jpg"],
                    // Add more items as necessary
                    ['name' => "Longsilog (Longganisa, Egg, and Rice)", 'img' => "/assets/images/lonsi.jpg"],
                    ['name' => "Tocilog (Tocino, Egg, and Rice)", 'img' => "/assets/images/toci.jpg"],
                    ['name' => "Daingsilog (Dried Fish, Egg, and Rice)", 'img' =>"/assets/images/dayngs.jpg"],
                    ['name' => "Champorado (Chocolate Rice Porridge)", 'img' => "/assets/images/champ.jpg"],
                    ['name' => "Arroz Caldo (Chicken Rice Porridge)", 'img' => "/assets/images/lugaws.jpg"],
                    ['name' => "Pandesal (Bread Rolls)", 'img' => "/assets/images/abs.jpg"],
                    ['name' => "Tortang Talong (Eggplant Omelette)", 'img' => "/assets/images/omel.jpg" ],
                    ['name' => "Bangsilog (Bangus, Egg, and Rice)", 'img' => "/assets/images/bangs.jpg"],
                    ['name' => "Corned Beef and Egg", 'img' => "/assets/images/red.jpg"],

               
                ],
            ],
        ];

        return view('menu2', compact('data'));
    }
}