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

        /* Custom styles for the approval badge */
        .badge {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
            text-transform: uppercase;
        }

        /* Blue badge for pending status */
        .badge-warning {
            background-color: #007bff; /* Blue */
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .badge-warning:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.1); /* Slight zoom effect */
        }

        /* Green badge for approved status */
        .badge-success {
            background-color: #28a745; /* Green */
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .badge-success:hover {
            background-color: #218838; /* Darker green on hover */
            transform: scale(1.1); /* Slight zoom effect */
        }
    </style>
@endsection

@section('content')
    <!--MY RECIPE SECTION-->
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
            <h1><b>Recipe Management</b></h1>

            <!-- Recipe Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>User</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Ingredients</th>
                            <th>Instructions</th>
                            <th>Categories</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recipes as $recipe)
                            <tr>
                                <td>{{ $recipe->id }}</td>
                                <td>{{ $recipe->name }}</td>
                                <td>{{ $recipe->user ? $recipe->user->username : 'Unknown' }}</td>
                                <td><img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" width="50" height="50"></td>
                                <td>{{ Str::limit(strip_tags($recipe->description), 50) }}</td>
                                <td>{{ Str::limit(strip_tags($recipe->ingredients), 50) }}</td>
                                <td>{{ Str::limit(strip_tags($recipe->instructions), 50) }}</td>
                                <td>{{ $recipe->categories }}</td>
                                <td>
                                    @if($recipe->status == 'pending') <!-- Check if status is 'pending' -->
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($recipe->status == 'approved') <!-- Check if status is 'approved' -->
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-secondary">Unknown</span>
                                    @endif
                                </td>

                                <!-- Action Buttons (Approve & Delete) -->
                                <td>
                                    <div class="action-buttons">
                                        @if($recipe->status == 'pending') <!-- Only show approve button if 'pending' -->
                                            <form action="{{ route('admin.approve', $recipe->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success" title="Approve">
                                                    <i class="fas fa-check"></i> <!-- Font Awesome check icon -->
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Delete button -->
                                        <form action="{{ route('admin.delete', $recipe->id) }}" method="POST" style="display:inline;">
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
    <!--END OF MY RECIPE SECTION-->
@endsection
