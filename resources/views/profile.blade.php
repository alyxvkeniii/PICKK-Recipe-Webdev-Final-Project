<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/profile.css">
</head>

<body>
    <!-- HEADER -->
    <header>

        <div class="logo">
            <img src="/assets/images/logo.png" alt="Logo">
        </div>

        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}" class="nav-btn"><b>Explore</b></a></li>
                <li><a href="{{ route('my-recipe') }}" class="nav-btn"><b>My Recipes</b></a></li>
                <li><a href="{{ route('menu2') }}" class="nav-btn"><b>Menu</b></a></li>
                <li><a href="{{ route('faq2') }}" class="nav-btn"><b>FAQ</b></a></li>

                <li class="dropdown">
                    <a href="#" class="nav-btn1"><b>More</b></a>
                    <div class="dropdown-content">
                        <a href="{{ route('profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>                            
                    </div>
                </li>
            </ul>
        </nav>

    </header>
    <!-- END OF HEADER -->

    <div class="container profile-container">

        <section id="header-text">
            <div class="header-faq-text">
                <h3>Profile Management</h3>
                <p>Here, you can update and customize their personal information, such as profile picture, bio, contact details</p>
            </div>
        </section>
        
        <!-- Profile Section -->
        <div class="row">
            <!-- Left Side: Profile Picture -->
            <div class="col-md-4 text-center">
                <div class="card p-3">
                    <img id="profile-pic" src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture mb-3">
                    <h5 id="username">{{ $user->username }}</h5>
                    <p id="profile-description">Short description here</p>
                    <form id="picture-form">
                        <label for="file-input" class="button1">Choose Picture</label>
                        <input id="file-input" type="file" accept="image/*" class="d-none">
                        <button type="submit" class="button0">Save</button>
                    </form>
                </div>
            </div>

            <!-- Right Side: User Information -->
            <div class="col-md-8">
                <div class="card p-3">
                    <h5>User Information</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Full Name:</strong> <span id="user-name">Name</span></li>
                        <li class="list-group-item"><strong>Location:</strong> <span id="user-location">Unknown</span></li>
                        <li class="list-group-item"><strong>Gender:</strong> <span id="user-gender">Not specified</span></li>
                        <li class="list-group-item"><strong>Email:</strong> <span id="user-email">{{ $user->email }}</span></li> 
                        <li class="list-group-item"><strong>Joined:</strong> <span id="user-joined">{{ $user->created_at->format('Y-m-d H:i:s') }}</span></li>  
                    </ul>
                    <button id="edit-profile-btn" class="button2" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Profile -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-profile-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" class="form-control" value="John Doe">
                        </div>
                        <div class="mb-3">
    <label for="location" class="form-label">Location</label>
    <select id="location" class="form-select">
        <option value="" selected>Choose your region</option>
        <!-- Philippines and its regions -->
        <option value="NCR" {{ old('location', $user->location) == 'NCR' ? 'selected' : '' }}>National Capital Region (NCR)</option>
        <option value="CAR" {{ old('location', $user->location) == 'CAR' ? 'selected' : '' }}>Cordillera Administrative Region</option>
        <option value="Region I" {{ old('location', $user->location) == 'Region I' ? 'selected' : '' }}>Ilocos Region</option>
        <option value="Region II" {{ old('location', $user->location) == 'Region II' ? 'selected' : '' }}>Cagayan Valley</option>
        <option value="Region III" {{ old('location', $user->location) == 'Region III' ? 'selected' : '' }}>Central Luzon</option>
        <option value="Region IV-A" {{ old('location', $user->location) == 'Region IV-A' ? 'selected' : '' }}>CALABARZON</option>
        <option value="Region IV-B" {{ old('location', $user->location) == 'Region IV-B' ? 'selected' : '' }}>MIMAROPA</option>
        <option value="Region V" {{ old('location', $user->location) == 'Region V' ? 'selected' : '' }}>Bicol Region</option>
        <option value="Region VI" {{ old('location', $user->location) == 'Region VI' ? 'selected' : '' }}>Western Visayas</option>
        <option value="Region VII" {{ old('location', $user->location) == 'Region VII' ? 'selected' : '' }}>Central Visayas</option>
        <option value="Region VIII" {{ old('location', $user->location) == 'Region VIII' ? 'selected' : '' }}>Eastern Visayas</option>
        <option value="Region IX" {{ old('location', $user->location) == 'Region IX' ? 'selected' : '' }}>Zamboanga Peninsula</option>
        <option value="Region X" {{ old('location', $user->location) == 'Region X' ? 'selected' : '' }}>Northern Mindanao</option>
        <option value="Region XI" {{ old('location', $user->location) == 'Region XI' ? 'selected' : '' }}>Davao Region</option>
        <option value="Region XII" {{ old('location', $user->location) == 'Region XII' ? 'selected' : '' }}>SOCCSKSARGEN</option>
        <option value="Region XIII" {{ old('location', $user->location) == 'Region XIII' ? 'selected' : '' }}>Caraga</option>
        <option value="BARMM" {{ old('location', $user->location) == 'BARMM' ? 'selected' : '' }}>Bangsamoro Autonomous Region in Muslim Mindanao</option>
    </select>
</div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" class="form-select">
                                <option value="Not specified" selected>Not specified</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email (Read-only)</label>
                            <input type="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea id="description" class="form-control" rows="3">Short description here</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="username-edit" class="form-label">Username</label>
                            <input type="text" id="username-edit" class="form-control" value="{{ $user->username }}" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Load persisted data from localStorage
        document.addEventListener('DOMContentLoaded', () => {
            const storedName = localStorage.getItem('userName');
            const storedLocation = localStorage.getItem('userLocation');
            const storedGender = localStorage.getItem('userGender');
            const storedDescription = localStorage.getItem('profileDescription');
            const storedProfilePic = localStorage.getItem('profilePic');
            const storedUsername = localStorage.getItem('username');

            if (storedName) document.getElementById('user-name').textContent = storedName;
            if (storedLocation) document.getElementById('user-location').textContent = storedLocation;
            if (storedGender) document.getElementById('user-gender').textContent = storedGender;
            if (storedDescription) document.getElementById('profile-description').textContent = storedDescription;
            if (storedProfilePic) document.getElementById('profile-pic').src = storedProfilePic;
            if (storedUsername) document.getElementById('username').textContent = storedUsername;
        });

        // Handle profile picture upload
        const fileInput = document.getElementById('file-input');
        const profilePic = document.getElementById('profile-pic');
        const pictureForm = document.getElementById('picture-form');

        pictureForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    profilePic.src = reader.result;
                    localStorage.setItem('profilePic', reader.result); // Save to localStorage
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle profile editing
        const editProfileForm = document.getElementById('edit-profile-form');
        const userName = document.getElementById('user-name');
        const userLocation = document.getElementById('user-location');
        const userGender = document.getElementById('user-gender');
        const profileDescription = document.getElementById('profile-description');
        const usernameField = document.getElementById('username');
        const nameInput = document.getElementById('name');
        const locationInput = document.getElementById('location');
        const genderInput = document.getElementById('gender');
        const descriptionInput = document.getElementById('description');
        const usernameEditInput = document.getElementById('username-edit');

        editProfileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            userName.textContent = nameInput.value;
            userLocation.textContent = locationInput.value;
            userGender.textContent = genderInput.value;
            profileDescription.textContent = descriptionInput.value;
            usernameField.textContent = usernameEditInput.value;

            // Save to localStorage
            localStorage.setItem('userName', nameInput.value);
            localStorage.setItem('userLocation', locationInput.value);
            localStorage.setItem('userGender', genderInput.value);
            localStorage.setItem('profileDescription', descriptionInput.value);
            localStorage.setItem('username', usernameEditInput.value);

            const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
            modal.hide();
        });
    </script>
</body>

</html> 
