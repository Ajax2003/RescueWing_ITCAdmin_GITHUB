<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RescueWing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7SCeXn5DVi2u/m4RwXq4m4zPoxh8bOe" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    @laravelPWA
</head>

<body class ="bg-blue-900">
    <div class ="relative min-h-screen md:flex">
         <!-- mobile menu bar -->
        <div class="bg-blue-800 text-white font-bold text-lg flex justify-between md:hidden">
            <!-- logo -->
            <i class="bi bi-app-indicator flex items-center space-x-2 px-4"></i>
            <a href="#" class="block p-4 text-white font-bold">RescueWing</a>
            
             <!-- mobile menu button -->
             <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white focus:text-blue-900">
                <i class="bi bi-list h-5 w-5"></i>
             </button>
        </div>
            <!-- sidebar -->
        <div class="sidebar bg-white text-blue-900 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out overflow-y-auto">
            <!-- logo -->
            <a href="#" class="text-blue-900 flex items-center space-x-2 px-4">
                <i class="bi bi-app-indicator w-8 h-8"></i>
                <span class ="text-2xl font-extrabold">RescueWing</span>
            </a>
            
            <div>
                <hr class="border-1 border-blue-800 p-2"></hr>
                <h2 class="text-blue-900 font-bold px-10"> {{Auth::user()->name ?? ''}}</h2>
                <span class="text-blue-900 px-10">Admin</span>
            </div>
            <!-- nav -->
            <nav>  
              <hr class="border-1 border-blue-800"></hr>
                <!-- Management Text -->
                <h3 class="py-2.5 px-4 text-blue-900 text-[20px] font-semibold">Management</h3>
                    <!-- SubMenu-Dashboard -->
                    <a href="{{ url('admin/dashboard') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <i class="bi bi-speedometer"></i> Dashboard
                    </a>
                    <!-- SubMenu Administration  -->
                   <a href="{{ url('/admin') }}" class="bg-blue-600 text-white block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-person-fill"></i> User Management
                   </a>
                   <a href="{{ url('admin/archive') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                    <i class="bi bi-archive-fill"></i></i> Archive 
                   </a>
                <h3 class="py-2.5 px-4 text-blue-900 text-[20px] font-semibold">Account</h3>
                     <!-- SubMenu-Profile -->
                   <a href="{{ url('/adminprofile') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-person-circle"></i> Profile
                   </a>
                    <!-- SubMenu-Settings -->
                     <!-- SubMenu-Logout -->
                    <!--
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                     @csrf 
                     @method('DELETE')
                     <div class="flex items-center space-x-4">
                         <button class="btn btn-danger py-2 px-36 pl-4 text-blue-900 text-md text-left border border-white rounded-md bg-white transition duration-200 hover:bg-red-800 hover:text-white hover:border-red-800" type="submit">
                         <i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form> -->

                
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                       <x-responsive-nav-link :href="route('logout')" 
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            {{ __('Log Out') }}
                       </x-responsive-nav-link>
                   </form>
          </nav>
        </div>
        <!-- User information and current date -->
        <div class="bg-blue-900 flex-1 p-10 text-2xl font-bold">
        <header>
        <div class="flex items-center space-x-4">
          <span class="text-lg font-semibold text-white">Welcome, {{Auth::user()->name ?? ''}}</span>
          <span class="text-sm text-gray-300">Today: {{ now()->format('l, F j, Y') }}</span>   
        </header>
        
        <!-- Top of main content section -->
        <main class="bg-blue-900 flex-1 overflow-x-hidden overflow-y-auto">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-zinc-700 dark:text-zinc-200 text-sm font-medium">Management</h3>
                <h3 class="text-zinc-700 dark:text-zinc-200 text-3xl font-medium">List of Users - Active Users</h3>
                <div class ="text-end">
                  <a href ="{{ route('user.create') }}" class="btn btn-primary px-4 py-2 mt-8 bg-white text-blue-900 border border-white text-[15px] hover:bg-blue-700 hover:text-white hover:border-blue-700 hover:bg-opacity-85">
                  <i class="bi bi-plus-square-fill px-1"></i>Add New User</a>
                </div>
                 <!-- Display success message if available -->
                @if (session('success'))
                <div class ="alert alert-success text-white text-[-20px]"> 
                  {{ session ('success')}}
                </div>
                @endif 
                <!-- Display error message if available -->
                @if (session('error'))
                <div class ="alert alert-danger text-white text-[-20px]"> 
                  {{ session ('error')}}
                </div>
                @endif 
                <!-- Search input field -->
                    <div class="flex items-center mb-4">
                        <label for="searchInput" class="mr-2 text-white">Search:</label>
                        <input type="text" id="searchInput" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1" placeholder="Search by name or email">
                    </div>
                <div class="mt-8">
                    <!-- Start of main content -->
                  <div class="bg-white shadow rounded-lg p-6 overflow-x-auto"> <!-- Table container -->
                    <div class="flex items-center border border-blue-900 border-2 rounded-lg">
                            <table class="table table-hover w-full mb-60 table-md overflow-x-auto" id="userTableBody"> <!-- Table container -->
                              <thead class="text-white rounded-md">
                                  <tr class="bg-blue-900"> <!-- Table header row -->
                                      <th class="px-4 py-2 text-left text-[15px]">#</th>     <!-- Column headers -->
                                      <th class="px-4 py-2 text-left text-[15px]">Username</th>
                                      <th class="px-4 py-2 text-left text-[15px]">Name</th>
                                      <th class="px-12 py-2 text-left text-[15px]">Email</th>
                                      <th class="px-4 py-2 text-left text-[15px]">UserType</th>
                                      <th class="px-4 py-2 text-left text-[15px]">Action</th>
                                  </tr>
                              </thead>
                          <tbody>
                          <?php $counter = 0; ?>
                            @forelse($users->sortBy('id') as $index => $row)
                                <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">{{++$counter }}</td>
                                  <td class="px-4 py-2 text-left">{{$row->username}}</td>
                                  <td class="px-4 py-2 text-left">{{$row->name}}</td>
                                  <td class="px-4 py-2 text-left">{{$row->email}}</td>
                                  <td class="px-4 py-2 text-left">{{$row->usertype}}</td>                    
                                  </td>
                                  <td class="px-4 py-2">
                                    <a href="{{ route('user.edit', ['id' => $row->id]) }}" class="btn btn-primary bg-blue-900 text-white px-8 py-1 justify-center hover:bg-blue-600 rounded-lg">Edit</a>
                                    <a href="{{ route('user.softdelete', $row->id) }}" class="btn btn-primary bg-orange-500 text-white  px-4 py-1 justify-center hover:bg-orange-600 rounded-lg">Archive</a>
                                    <form action="{{ route('user.delete', $row->id) }}" method="POST" id="delete-form-{{ $row->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger bg-red-700 text-white px-5 justify-center hover:bg-red-600 rounded-lg" onClick="confirmDeleteUser({{ $row->id }})">Delete</button>
                                    </form>
                                  </td>
                              </tr>
                              @empty 
                              <tr>
                                <td colspan="5">No Users Found</td>
                              </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
               </div>
          </main>
      </div>
</body>
<script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
<script>
  // Grabbing necessary elements
  const btn = document.querySelector('.mobile-menu-button');
  const sidebar = document.querySelector('.sidebar');

  // Adding event listener for the click event on the mobile menu button
  btn.addEventListener('click', () => {
      // Toggling the '-translate-x-full' class on the sidebar element
      sidebar.classList.toggle("-translate-x-full");
  });

  // Function to confirm user deletion
  function confirmDeleteUser(userId) {
    // Displaying a confirmation dialog
    if (confirm("Are you sure you want to delete user " + userId + "?")) {
      // Submitting the delete form for the specified user ID
      document.getElementById('delete-form-' + userId).submit();
    }
  }
     // Add an event listener to the search input field that triggers whenever its value changes
    searchInput.addEventListener('input', function() {
    // Get the search term from the input field, trim leading and trailing whitespaces, and convert to lowercase
    const searchTerm = searchInput.value.trim().toLowerCase();

    // Select all table rows within the tbody element
    const tableRows = userTableBody.querySelectorAll('tbody tr');

    // Iterate over each table row
    for (const row of tableRows) {
        // Select all table cells (td elements) within the current row
        const cells = row.querySelectorAll('td');

        // Check if the row contains at least four cells (for name, email, user type, and action)
        if (cells.length >= 5) {
            // Extract the text content of the name, email, and user type cells, trim leading and trailing whitespaces, and convert to lowercase
            const username = cells[1].textContent.trim().toLowerCase(); // Userame cell is at index 1
            const name = cells[2].textContent.trim().toLowerCase(); // Name cell is at index 2
            const email = cells[3].textContent.trim().toLowerCase(); // Email cell is at index 3
            const usertype = cells[4].textContent.trim().toLowerCase(); // User type cell is at index 4

            // Check if the search term is empty or if it matches any of the name, email, or user type
            if (!searchTerm || username.includes(searchTerm)|| name.includes(searchTerm) || email.includes(searchTerm) || usertype.includes(searchTerm)) {
                // Show the row if there's a match or if there's no search term
                row.style.display = '';
            } else {
                // Hide the row if there's no match
                row.style.display = 'none';
            }
        } else {
            // Log an error if the row does not contain the necessary cells
            console.error('Row does not contain necessary cells:', row);
        }
    }
});
  
    </script>
</html>