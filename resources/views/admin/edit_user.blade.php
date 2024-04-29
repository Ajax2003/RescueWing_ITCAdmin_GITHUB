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
                    <a href="{{ url('admin/dashboard') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                        <i class="bi bi-speedometer"></i> Dashboard
                    </a>
                   <a href="{{ url('/admin') }}" class="bg-blue-600 text-white text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-person-fill"></i> User Management
                   </a>
                <hr class="border-1 border-blue-800"></hr>
                <h3 class="py-2.5 px-4 text-blue-900 text-[20px] font-semibold">Account</h3>
                     <!-- SubMenu-Profile -->
                   <a href="{{ url('/adminprofile') }}" class="text-blue-900 block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white">
                     <i class="bi bi-person-circle"></i> Profile
                   </a>
                    <!-- SubMenu-Settings -->

                     <!-- SubMenu-Logout -->
                   <!--<form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
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

        <div class="bg-blue-900 flex-1 p-10 text-2xl font-bold">
        <header>
        <div class="flex items-center space-x-4">
          <span class="text-lg font-semibold text-white">Welcome, {{Auth::user()->name ?? ''}}</span>
          <span class="text-sm text-gray-300">Today: {{ now()->format('l, F j, Y') }}</span>   
        </header>

        <main class="bg-blue-900 flex-1 overflow-x-hidden overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
            <h3 class="text-zinc-700 dark:text-zinc-200 text-sm font-medium">Management</h3>
            <h3 class="text-zinc-700 dark:text-zinc-200 text-3xl font-medium">User Management - Edit/Update User</h3>
        </div>
        <div class="bg-white shadow rounded-lg p-6 overflow-x-auto"> 
            <h3 class="text-[-60px]">{{ $title }}</h3>
                <form class="form1" method="POST" action="{{ route('user.update', ['id' => $edit->id]) }}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">  
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="form-control border block w-full px-3 py-2 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter Name" value="@if (isset($edit->id)) {{$edit->name}} @else {{ old('name') }} @endif">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email" class="form-control border block w-full px-3 py-2 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter Email" value="@if (isset($edit->id)) {{$edit->email}} @else {{ old('email') }} @endif">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                     <label for="usertype" class="block text-sm font-medium text-gray-700">User Type</label>
                       <select name="usertype" id="usertype" class="form-control border block w-full px-3 py-2 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                          <option value="user" @if (isset($edit) && $edit->usertype == 'user') selected @endif>User</option>
                          <option value="admin" @if (isset($edit) && $edit->usertype == 'admin') selected @endif>Admin</option>
                          <option value="barangay" @if (isset($edit) && $edit->usertype == 'barangay') selected @endif>Barangay</option>
                          <option value="facility" @if (isset($edit) && $edit->usertype == 'facility') selected @endif>Facility</option>
                        </select>
                        @error('usertype')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <input type="submit" value="Submit" class="btn btn-primary px-4 py-2 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <a href="{{ route('admin.useradmin') }}" class="btn btn-danger px-4 py-2 rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Cancel</a>
                    </div>
            </form>
            </div>
        </div>
</div>
</body>
</html>