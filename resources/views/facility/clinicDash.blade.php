<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic RescueWing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="./app.js"></script>
    @laravelPWA
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4IewD6AdNgDrG4TCerlz0AjsVhCN_9U4&callback=initMap" async></script>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('79f4dee31c34d78452e0', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('clinic-channel');
        channel.bind('form-clinic', function(data) {
            console.log("Received data:", data);
            Swal.fire({
                title: 'EMERGENCY!',
                html: `Medical Type: ${data.result.medical_type}<br>Name: ${data.result.name}<br>Latitude: ${data.result.latitude}<br>Longitude: ${data.result.longitude}<br><div id="map-container" style="height: 400px;"></div>`, // Container for the map
                icon: 'warning',
                confirmButtonText: 'ALERT RESPONDERS',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Add the data to the table
                    var tableBody = document.getElementById('emergency-data');
                    var newRow = tableBody.insertRow();
                    newRow.innerHTML = `
                <td class="border px-4 py-2">${data.result.name}</td>
                <td class="border px-4 py-2">${data.result.medical_type}</td>
                <td class="border px-4 py-2">${data.result.latitude}, ${data.result.longitude}</td>
            `;
                }
            });
        });
    </script>


</head>

<body class="bg-blue-900">
    <div class="relative min-h-screen md:flex">
        <!-- mobile menu bar -->
        <div class="bg-blue-800 text-white font-bold text-lg flex justify-between md:hidden">
            <!-- logo -->
            <i class="bi bi-app-indicator flex items-center space-x-2 px-4"></i>
            <a href="#" class="block p-4 text-white font-bold">Clinic RescueWing</a>

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
                <span class="text-2xl font-extrabold">Clinic RescueWing</span>
            </a>

            <div>
                <hr class="border-1 border-blue-800 p-2">
                </hr>
                <h2 class="text-blue-900 font-bold px-10"> {{Auth::user()->username ?? ''}}</h2>
                <span class="text-blue-900 px-10">Miguel Allen Lorenzo</span>
                <span class="text-blue-900 px-10">Secretary</span>

            </div>
            <!-- nav -->
            <nav>
                <hr class="border-1 border-blue-800">
                </hr>
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

                <hr class="border-1 border-blue-800">
                </hr>
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
                <form>
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center space-x-4">
                        <button class="btn btn-danger py-2 px-36 pl-4 text-blue-900 text-md text-left border border-white rounded-md bg-white transition duration-200 hover:bg-red-800 hover:text-white hover:border-red-800" type="submit">
                            <i class="bi bi-box-arrow-right"></i>Logout</button>
                    </div>
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
                    <h3 class="text-zinc-700 dark:text-zinc-200 text-sm font-medium">Dashboard</h3>
                    <h3 class="text-zinc-700 dark:text-zinc-200 text-3xl font-medium">Emergency Board</h3>
                    <div class="mt-8">
                        <div class="bg-white shadow rounded-lg p-6">
                            <table class="table-auto">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Medical Type</th>
                                        <th class="px-4 py-2">Location</th>
                                    </tr>
                                </thead>
                                <tbody id="emergency-data">
                                   
                                    <!-- Add more rows as needed -->
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
    btn.addEventListener('click', () => {
        sidebar.classList.toggle("-translate-x-full");
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>