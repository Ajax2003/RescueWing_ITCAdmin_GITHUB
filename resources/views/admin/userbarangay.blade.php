<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RescueWing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src ="./app.js"></script>
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
                    <a href="{{ url('/dashboard') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <i class="bi bi-speedometer"></i> Dashboard
                    </a>
                    <!-- SubMenu-Reports -->
                    <a href="{{ url('/reports') }}" class=" text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <i class="bi bi-flag-fill"></i> Reports
                    </a>
                <!-- Users Text -->
            <hr class="border-1 border-blue-800"></hr>
            <h3 class="py-2.5 px-4 text-blue-900 text-[20px] font-semibold">Users</h3>
                    <!-- SubMenu Administration  -->
                   <a href="{{ url('/admin') }}" class=" text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-person-fill"></i> Administration
                   </a>
                   <!-- SubMenu-Emergency Facilities -->
                   <a href="{{ url('/facility') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-person-fill"></i> Emergency Facilities
                   </a>
                   <!-- SubMenu-Barangay -->
                   <a href="{{ url('/barangay') }}" class="bg-blue-600 text-white text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-bank2"></i> Barangay
                   </a>
                   <!-- SubMenu-Students -->
                   <a href="{{ url('/studentfaculty') }}" class=" text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-backpack-fill"></i> Students
                   </a>
                <hr class="border-1 border-blue-800"></hr>
                <h3 class="py-2.5 px-4 text-blue-900 text-[20px] font-semibold">Account</h3>
                     <!-- SubMenu-Profile -->
                   <a href="{{ url('/profile') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-person-circle"></i> Profile
                   </a>
                    <!-- SubMenu-Settings -->
                   <a href="{{ url('/settings') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                      <i class="bi bi-gear-fill"></i> Settings
                   </a>
                     <!-- SubMenu-Logout -->
                   <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                     @csrf 
                     @method('DELETE')
                     <div class="flex items-center space-x-4">
                         <button class="btn btn-danger py-2 px-36 pl-4 text-blue-900 text-md text-left border border-white rounded-md bg-white transition duration-200 hover:bg-red-800 hover:text-white hover:border-red-800" type="submit">
                         <i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
             
          </nav>
        </div>
        <!-- Content -->
        <div class="bg-blue-900 flex-1 p-10 text-2xl font-bold">
        <header>
        <div class="flex items-center space-x-4">
          <span class="text-lg font-semibold text-white">Welcome, {{Auth::user()->name ?? ''}}</span>
          <span class="text-sm text-gray-300">Today: {{ now()->format('l, F j, Y') }}</span>   
        </header>
        
        
        <main class="bg-blue-900 flex-1 overflow-x-hidden overflow-y-auto">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-zinc-700 dark:text-zinc-200 text-sm font-medium">Barangay</h3>
                <h3 class="text-zinc-700 dark:text-zinc-200 text-3xl font-medium">List of Users</h3>
                <div class ="text-end">
                  <a href ="{{ route('barangay.create') }}" class="btn btn-primary px-4 py-2 mt-8 bg-white text-blue-900 border border-white text-[15px] hover:bg-blue-700 hover:text-white hover:border-blue-700 hover:bg-opacity-85">
                  <i class="bi bi-plus-square-fill px-1"></i>Add New User</a>
                </div>
                @if (session('success'))
                <div class ="alert alert-success text-white text-[-20px]"> 
                  {{ session ('success')}}
                </div>
                @endif 
                @if (session('error'))
                <div class ="alert alert-danger text-white text-[-20px]"> 
                  {{ session ('error')}}
                </div>
                @endif 
                <div class="mt-8">

            <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
                    <div class="flex items-center">
                            <table class="table table-hover w-full mb-60">
                              <thead class="text-white rounded-md">
                                  <tr class="bg-blue-900">
                                      <th class="px-4 py-2 text-left">#</th>
                                      <th class="px-4 py-2 text-left">Facility</th>
                                      <th class="px-4 py-2 text-left">Name</th>
                                      <th class="px-12 py-2 text-left">Email</th>
                                      <th class="px-4 py-2 text-left">Username</th>
                                      <th class="px-4 py-2 text-left">Action</th>
                                  </tr>
                              </thead>
                          <tbody>
                          <?php $counter = 0; ?>
                            @forelse($users->sortBy('id') as $index => $row)
                                <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">{{++$counter }}</td>
                                  <td class="px-4 py-2 text-left">{{$row->type}}</td> 
                                  <td class="px-4 py-2 text-left">{{$row->name}}</td>
                                  <td class="px-4 py-2 text-left">{{$row->email}}</td>
                                  <td class="px-4 py-2 text-left">{{$row->username}}</td>
                                  <td class="px-4 py-2 text-left">
                                  <a href="{{ route('barangay.edit', ['id' => $row->id]) }}" class="btn btn-primary hover:text-green-800">Edit</a>
                                  <form action="{{ route('barangay.delete', $row->id) }}" method="POST" id="delete-form-{{ $row->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger hover:text-red-800" onClick="confirmDeleteUser({{ $row->id }})">Delete</button>
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
<script>
    //grab everything we need
    const btn = document.querySelector('.mobile-menu-button');
    const sidebar = document.querySelector('.sidebar')

    //add our event listener for the click
    btn.addEventListener('click', ()=> {
        sidebar.classList.toggle("-translate-x-full");
    })

    function confirmDeleteUser(userId) {
        if (confirm("Are you sure you want to delete user " + userId + "?")) {
         document.getElementById('delete-form-' + userId).submit();
        }
      }
</script>
</html>