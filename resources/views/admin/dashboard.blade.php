<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RescueWing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src ="./app.js"></script>
    @laravelPWA
    @vite('resources/css/app.css')
</head>

<body class ="bg-blue-900">
    <div class ="relative min-h-screen md:flex bg-gradient-to-r from-red-700 to-blue-900">
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
                    <a href="{{ url('admin/dashboard') }}" class="bg-blue-600 text-white text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <i class="bi bi-speedometer"></i> Dashboard
                    </a>
                    <!-- SubMenu Administration  -->
                   <a href="{{ url('/admin') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
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
                     <!-- 
                   <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                     @csrf 
                     @method('DELETE')
                     <div class="flex items-center space-x-4">
                         <button class="btn btn-danger py-2 px-36 pl-4 text-blue-900 text-md text-left border border-white rounded-md bg-white transition duration-200 hover:bg-red-800 hover:text-white hover:border-red-800" type="submit">
                         <i class="bi bi-box-arrow-right"></i>Logout</button>
                    </form>
                    -->
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
        <!-- Header -->
        <div class="bg-blue-900 flex-1 p-10 text-2xl font-bold">
        <header>
        <div class="flex items-center space-x-4">
          <span class="text-lg font-semibold text-white">Welcome, {{Auth::user()->name ?? ''}}</span>
          <span class="text-sm text-gray-300">Today: {{ now()->format('l, F j, Y') }}</span>   
        </header>
        <!-- Main Content -->
        <main class="bg-blue-900 flex-1 overflow-x-hidden overflow-y-auto">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-zinc-700 dark:text-zinc-200 text-sm font-medium">Dashboard</h3>
                <h3 class="text-zinc-700 dark:text-zinc-200 text-3xl font-medium">Emergency Board</h3>
          <div class="mt-8">

          <div class="bg-white shadow p-6 overflow-x-auto"> <!-- Table container -->
                   <div class="flex items-center border border-blue-900 border-2 rounded-lg">
                            <table class="table table-hover w-full mb-60 table-md"> <!-- Table container -->
                              <thead class="text-white">
                                  <tr class="bg-blue-900"> <!-- Table header row -->
                                      <!-- Column headers -->
                                      <th class="px-4 py-2 text-left text-[20px]">Types of Emergencies</th>
                                      <th class="px-12 py-2 text-left text-[20px]">List of Users</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Allergy Reaction</td>
                                  <td class="px-4 py-2 text-left">User(Students, Faculty, Staff)</td>
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Seizure</td>
                                  <td class="px-4 py-2 text-left">Admin</td>
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Burns</td>
                                  <td class="px-4 py-2 text-left">Barangay (Tanod, Kagawad, Secretary, Chairman)</td>
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Thief</td>
                                  <td class="px-4 py-2 text-left">Emergency Facilities (Clinic, Security, OSA)</td>
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Rape</td>
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Physical Abuse</td>                    
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Fire</td>
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Earthquake</td>
                                  </td>
                              </tr>
                              <tr class="hover:bg-gray-100 border-b border-gray-200 text-[15px] font-bold text-blue-900 ">
                                  <td class="px-4 py-2 text-left">Flood</td>
                                  </td>
                              </tr>
                        </tbody>
                      </table>
                  </div>
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
</script>
</html>