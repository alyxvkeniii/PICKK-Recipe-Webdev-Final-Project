@extends('Components.layout2')

@section('title', 'Add Recipe')

@section('additional-styles')
    <link rel="stylesheet" href="/assets/css/add-recipe.css">
@endsection

@section('content')
<meta name="csrf-token" content="abc123xyz">

    <div class="wrapper">
    
    <section id="header-text">
        <div class="header-add-recipe-text">
            <h1><button class="add-btn">+</button>ADD RECIPE</h1>
            <p>Uploading personal recipes is easy! Add yours to your favorites, share with friends, family, or the PICKK'S Recipe community.</p>
        </div>
    </section>

    <section id="recipe-form">
        <div class="form-container">
            <form id="addrecipe" method="POST" action="{{ route('my-recipe') }}">
                @csrf

                <!-- Recipe Input -->
                <div class="recipe-details">
                    <!-- Left Column for Recipe Title and Description -->
                    <div class="left-section">
                        <div class="form-group">
                            <label for="recipetitle"><strong>Recipe Title</strong></label>
                            <input type="text" id="recipetitle" name="recipetitle" placeholder="Give your recipe a title" required>
                        </div>

                        <div class="form-group">
                            <label for="description"><strong>Description</strong></label>
                            <textarea id="description" name="description" placeholder="Share the story behind your recipe and what makes it special." rows="5"></textarea>
                        </div>
                    </div>

                    <!-- Right Column for Photo Upload -->
                    <div class="right-section">
                        <label for="photo"><strong>Photo</strong></label>
                        <div class="photo-upload">
                            <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
                            <div class="photo-preview">
                                <img src="/assets/images/adobo.jpg" alt="Your photo here">
                                <p>Use JPEG or PNG. Must be at least 960 x 960. Max file size: 30MB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Select Category -->
                <div class="category-selector">
                        <label for="category"><h4>Select a category:</h4></label>
                        <select id="category" name="category">
                            <option value="appetizers">Appetizers</option>
                            <option value="soups">Soups</option>
                            <option value="main-courses">Main Courses</option>
                            <option value="side-dishes">Side Dishes</option>
                            <option value="desserts">Desserts</option>
                            <option value="beverages">Beverages</option>
                            <option value="breakfast">Breakfast</option>
                        </select>
                </div>

                <!-- Ingredients Input -->
                <div class="ingredients-section">
                    <h5>Ingredients</h5>
                    <p>Enter one ingredient per line. Include the quantity (i.e. tablespoons, cloves) and any special preparation (i.e. minced, crushed, chopped). Use optional headers to organize the different parts of the recipe (i.e. Marinade, Sauce, Toppings).</p>

                    <div class="ingredients-inputs">
                            <div class="ingredient-entry">
                                <textarea id="ingredient" type="text" placeholder="e.g. 1/2 cup soy sauce" class="wsywyg"></textarea>
                            </div>
                    </div>
                </div>

                <!-- Instructions Input -->
                <div class="instruction-section">
                    <h5>Instructions</h5>
                    <p>Enter step-by-step instructions for the recipe. Start with any prep work (i.e., marinating, chopping) and move through the cooking process. Provide clear, concise directions for each step, and include cooking times, temperature, and any special tips if needed.</p>

                    <div class="instruction-inputs">
                            <div class="instruction-entry">
                                <textarea id="instruction" type="text" placeholder="Step 1 description...." class="wsywyg"></textarea>
                            </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn">SUBMIT RECIPE</button>
            </form>
        </div>
    </section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    let editorInstances = {}; // Object to store multiple editor instances

    // Initialize CKEditor for ingredients
    ClassicEditor.create(document.querySelector("#ingredient"), {
        toolbar: [
            "heading",
            "|",
            "bold",
            "italic",
            "|",
            "bulletedList",
            "numberedList",
            "|",
            "blockQuote",
            "outdent",
            "indent",
            "|",
            "undo",
            "redo",
        ],
    })
    .then((editor) => {
        editorInstances.ingredients = editor; // Save the editor instance
        editor.editing.view.change((writer) => {
            writer.setStyle("height", "390px", editor.editing.view.document.getRoot());
            editor.ui.view.element.style.width = "90%";
        });
    })
    .catch((error) => {
        console.error("Error initializing ingredient editor:", error);
    });

    // Initialize CKEditor for instructions
    ClassicEditor.create(document.querySelector("#instruction"), {
        toolbar: [
            "heading",
            "|",
            "bold",
            "italic",
            "|",
            "bulletedList",
            "numberedList",
            "|",
            "blockQuote",
            "outdent",
            "indent",
            "|",
            "undo",
            "redo",
        ],
    })
    .then((editor) => {
        editorInstances.instructions = editor; // Save the editor instance
        editor.editing.view.change((writer) => {
            writer.setStyle("height", "390px", editor.editing.view.document.getRoot());
            editor.ui.view.element.style.width = "90%";
        });
    })
    .catch((error) => {
        console.error("Error initializing instructions editor:", error);
    });

    // Handle add recipe form submission via AJAX
    const addRecipeForm = document.querySelector("#addrecipe");
    addRecipeForm.addEventListener("submit", async (event) => {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(addRecipeForm); // Collect form data

        // Append CKEditor data to the form
        if (editorInstances.ingredients) {
            formData.append("ingredients", editorInstances.ingredients.getData());
        }
        if (editorInstances.instructions) {
            formData.append("instructions", editorInstances.instructions.getData());
        }

        try {
            console.log("Form data before submission:", formData);

            const response = await fetch(addRecipeForm.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: formData,
            });

            const result = await response.json();

            if (response.ok) {
                alert("Recipe added successfully!");
                console.log(result); // Optional: Handle the result as needed
                addRecipeForm.reset(); // Clear the form after submission
                // Reset CKEditor content
                editorInstances.ingredients.setData("");
                editorInstances.instructions.setData("");
            } else {
                alert("Error adding recipe.");
                console.error(result.errors); // Log validation errors
            }
        } catch (error) {
            console.error("Error submitting form:", error);
            alert("An unexpected error occurred.");
        }
    });

    // Handle logout form submission
    const logoutForm = document.querySelector("#logout-form");
    const logoutButton = document.querySelector("a[href='{{ route('logout') }}']");
    logoutButton.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent default logout navigation
        logoutForm.submit(); // Trigger the logout form submission manually
    });
});

</script>