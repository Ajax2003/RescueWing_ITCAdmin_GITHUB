{{-- resources/views/emergency/index.blade.php --}}

<!DOCTYPE html>
<html>

<head>
    <title>Emergency Form</title>
</head>

<body>
    <!--Barangay buttons-->
    <h1>Others</h1>
    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif
    <form id="emergencyForm" method="POST" action="{{ route('e-clicked') }}">
        @csrf
        <button type="button" onclick="getLocationAndSubmit('Earthquake')">Earthquake</button>
        <button type="button" onclick="getLocationAndSubmit('Fire')">Fire</button>
        <button type="button" onclick="getLocationAndSubmit('Flood')">Flood</button>
    </form>

    <!--Security buttons-->
    <h1>Security</h1>
    <form id="securityForm" method="POST" action="{{ route('s-clicked') }}">
        @csrf
        <button type="button" onclick="getLocationAndSubmitSecurity('Theft')">Theft</button>
        <button type="button" onclick="getLocationAndSubmitSecurity('Rape')">Rape</button>
        <button type="button" onclick="getLocationAndSubmitSecurity('Physical Abuse')">Physical Abuse</button>
    </form>

    <!--Medical buttons-->
    <h1>Medical</h1>
    <form id="medicalForm" method="POST" action="{{ route('m-clicked') }}">
        @csrf
        <button type="button" onclick="getLocationAndSubmitMedical('Allergy Reaction')">Allergy Reaction</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Seizures')">Seizures</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Burns')">Burns</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Fainting')">Fainting</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Asthma')">Asthma</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Nausea')">Nausea</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Poison')">Poison</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Bleed')">Bleed</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Sprain')">Sprain</button>
        <button type="button" onclick="getLocationAndSubmitMedical('Fracture')">Fracture</button>

    </form>
        <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
</body>
<script>
        function getLocationAndSubmit(emergencyType) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Create hidden inputs for latitude, longitude, emergency type, and medical type
                    var latitudeInput = document.createElement('input');
                    latitudeInput.type = 'hidden';
                    latitudeInput.name = 'latitude';
                    latitudeInput.value = position.coords.latitude;

                    var longitudeInput = document.createElement('input');
                    longitudeInput.type = 'hidden';
                    longitudeInput.name = 'longitude';
                    longitudeInput.value = position.coords.longitude;

                    var emergencyTypeInput = document.createElement('input');
                    emergencyTypeInput.type = 'hidden';
                    emergencyTypeInput.name = 'emergency_type';
                    emergencyTypeInput.value = emergencyType;


                    // Append the hidden inputs to the form
                    var form = document.getElementById('emergencyForm');
                    form.appendChild(latitudeInput);
                    form.appendChild(longitudeInput);
                    form.appendChild(emergencyTypeInput);

                    // Submit the form
                    form.submit();
                }, function(error) {
                    console.log('Error getting geolocation:', error.message);
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }


        function getLocationAndSubmitSecurity(securityType) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitudeInput = document.createElement('input');
                    latitudeInput.type = 'hidden';
                    latitudeInput.name = 'latitude';
                    latitudeInput.value = position.coords.latitude;

                    var longitudeInput = document.createElement('input');
                    longitudeInput.type = 'hidden';
                    longitudeInput.name = 'longitude';
                    longitudeInput.value = position.coords.longitude;

                    var securityTypeInput = document.createElement('input');
                    securityTypeInput.type = 'hidden';
                    securityTypeInput.name = 'security_type';
                    securityTypeInput.value = securityType;

                    var form = document.getElementById('securityForm');
                    form.appendChild(latitudeInput);
                    form.appendChild(longitudeInput);
                    form.appendChild(securityTypeInput);
                    form.submit();
                }, function(error) {
                    console.log('Error getting geolocation:', error.message);
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }

        function getLocationAndSubmitMedical(medicalType) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitudeInput = document.createElement('input');
                    latitudeInput.type = 'hidden';
                    latitudeInput.name = 'latitude';
                    latitudeInput.value = position.coords.latitude;

                    var longitudeInput = document.createElement('input');
                    longitudeInput.type = 'hidden';
                    longitudeInput.name = 'longitude';
                    longitudeInput.value = position.coords.longitude;

                    var medicalTypeInput = document.createElement('input');
                    medicalTypeInput.type = 'hidden';
                    medicalTypeInput.name = 'medical_type';
                    medicalTypeInput.value = medicalType;

                    var form = document.getElementById('medicalForm');
                    form.appendChild(latitudeInput);
                    form.appendChild(longitudeInput);
                    form.appendChild(medicalTypeInput);
                    form.submit();
                }, function(error) {
                    console.log('Error getting geolocation:', error.message);
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }
    </script>
</html>