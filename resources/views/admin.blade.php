<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set character encoding for the document -->
    <meta charset="UTF-8">
    
    <!-- Set the viewport for responsive design on different devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Set the page title -->
    <title>Admin Dashboard</title>
    
    <!-- Link to the CSS stylesheet for styling the page -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navigation bar at the top of the page -->
    <nav class="navbar">
        <!-- Display the page title -->
        <h1>Admin Dashboard</h1>
        
        <!-- Logout form for signing out -->
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            <!-- CSRF token for security -->
            @csrf
            <!-- Submit button to sign out -->
            <button type="submit" class="signout-btn">Sign Out</button>
        </form>
    </nav>

    <!-- Main content section -->
    <section class="content">
        <!-- Table displaying user data -->
        <table class="user-table">
            <thead>
                <tr>
                    <!-- Column headers for user details -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Recipes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each user and display their information in a table row -->
                @foreach ($users as $user)
                    <tr>
                        <!-- User's name linked to their recipes page -->
                        <td><a href="{{ route('admin.users.recipes', $user) }}" class="user-link">{{ $user->name }}</a></td>
                        
                        <!-- Display user's email address -->
                        <td>{{ $user->email }}</td>
                        
                        <!-- Display count of the user's recipes -->
                        <td>{{ $user->recipes->count() }}</td>
                        
                        <!-- Form to delete the user -->
                        <td>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                <!-- CSRF token and method spoofing to DELETE for security -->
                                @csrf
                                @method('DELETE')
                                
                                <!-- Delete button with a confirmation dialog -->
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user and their recipes?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>