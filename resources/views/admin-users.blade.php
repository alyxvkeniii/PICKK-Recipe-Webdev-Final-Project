@extends('Components.admin-nav')

@section('additional-styles')
    <link rel="stylesheet" href="/assets/css/my-recipe.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        /* Make buttons appear horizontally */
        .action-buttons {
            display: flex;
            gap: 10px; /* Adds space between the buttons */
        }
        .nav .item {
            margin-bottom: 10px;
        }

        /* Custom styles for the user status badge */
        .badge {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
            text-transform: uppercase;
        }

        /* Blue badge for active status */
        .badge-active {
            background-color: #28a745; /* Green */
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .badge-active:hover {
            background-color: #218838; /* Darker green on hover */
            transform: scale(1.1); /* Slight zoom effect */
        }

        /* Gray badge for inactive status */
        .badge-inactive {
            background-color: #6c757d; /* Gray */
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .badge-inactive:hover {
            background-color: #5a6268; /* Darker gray on hover */
            transform: scale(1.1); /* Slight zoom effect */
        }
    </style>
@endsection

@section('content')
    <!-- Admin Users Section -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <div class="nav">
                <div class="item active">
                    <div class="icon">🔖</div>
                    <span><a href="/admin-users" class="created">Users</a></span>
                </div>
                <div class="item active">
                    <div class="icon">🍽️</div> <!-- Recipe icon -->
                    <span><a href="/admin" class="created">Recipes</a></span>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <h1><b>User Management</b></h1>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Users Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == 1)
                                        <span class="badge badge-active">Admin</span>
                                    @else
                                        <span class="badge badge-inactive">User</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <!-- Delete button -->
                                        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash"></i> <!-- Font Awesome trash icon -->
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END OF USER MANAGEMENT SECTION -->
@endsection
