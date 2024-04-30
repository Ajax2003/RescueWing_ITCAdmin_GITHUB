<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('RescueWing') }}
        </h2>
    </x-slot>

    <h2 class="font-semibold text-m text-gray-800 leading-tight" style="margin-left: 20px; margin-top: 8px;">
        {{ __('Medical') }}
    </h2>

    <div class="container" style="display:flex; justify-content: start; flex-wrap: wrap; margin-top:10px; margin-left: 10px">
        <div clas="card-container" style="display:flex; justify-content: start; flex-wrap: wrap;">

            <input id="ch" type="checkbox">

            <!-- Allergy Reaction-->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Allergy Reaction_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style="font-size: 12px; text-align: center; margin-bottom: 8px;">Allergy Reaction</h3>
                    </div>
                </div>
            </a>

            
            <!-- Seizures -->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Seizures_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Seizures</h3>
                    </div>
                </div>
            </a>

            <!-- Burns -->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Burns_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Burns</h3>
                    </div>
                </div>
            </a>

            <style>
                #ch {
                    display: none;
                }

                #ch:checked ~ .content {
                    display: block;
                }

                .content {
                    display: none;
                }

                #ch:checked ~ label {
                    display:none;
                }

                @media only screen and (min-width: 1000px) and (max-width: 2000px) {
                    label {
                        display: none;
                    }

                    .content {
                        display: block;
                    }
                }
            </style>

            <div class="content">
                <div class="container" style="display:flex; justify-content: start; flex-wrap: wrap;">
                    <div clas="card-container" style="display:flex; justify-content: start; flex-wrap: wrap;">
                        <!-- Fainting -->
                        <a href="#">
                            <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                                <img src="images/Choking_1.png" alt="">
                                <div class="card-content" style="padding: 2px;">
                                    <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Fainting</h3>
                                </div>
                            </div>
                        </a>

                        <!-- Asthma -->
                        <a href="#">
                            <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                                <img src="images/Choking_1.png" alt="">
                                <div class="card-content" style="padding: 2px;">
                                    <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Asthma</h3>
                                </div>
                            </div>
                        </a>

                        <!-- Nausea -->
                        <a href="#">
                            <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                                <img src="images/Choking_1.png" alt="">
                                <div class="card-content" style="padding: 2px;">
                                    <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Nausea</h3>
                                </div>
                            </div>
                        </a>

                        <!-- Poison -->
                        <a href="#">
                            <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                                <img src="images/Choking_1.png" alt="">
                                <div class="card-content" style="padding: 2px;">
                                    <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Poison</h3>
                                </div>
                            </div>
                        </a>

                        <!-- Bleed -->
                        <a href="#">
                            <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                                <img src="images/Choking_1.png" alt="">
                                <div class="card-content" style="padding: 2px;">
                                    <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Bleed</h3>
                                </div>
                            </div>
                        </a>

                        <!-- Sprain -->
                        <a href="#">
                            <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                                <img src="images/Choking_1.png" alt="">
                                <div class="card-content" style="padding: 2px;">
                                    <h3 style=" font-size: 12px;text-align:center;">Sprain</h3>
                                </div>
                            </div>
                        </a>

                        <!-- Fracture -->
                        <a href="#">
                            <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                                <img src="images/Choking_1.png" alt="">
                                <div class="card-content" style="padding: 2px;">
                                    <h3 style=" font-size: 12px;text-align:center;">Fracture</h3>
                                </div>
                            </div>
                        </a>

                        <label for="ch" style="cursor:pointer; margin-left: 4px; margin-top:12px; width: 80px; height: 80px; overflow: auto;">
                            <img src="images/OSA.png" alt="">
                        </label>
                    </div>
                </div>
            </div>
            <label for="ch" style="cursor:pointer; margin-left: 4px; margin-top:12px; width: 80px; height: 80px; overflow: auto;">
                <img src="images/Allergy Reaction_1.png" alt="">
            </label>
        </div>

    </div>

    <h2 class="font-semibold text-m text-gray-800 leading-tight" style="margin-left: 20px; margin-top: 8px;">
        {{ __('Crime') }}
    </h2>

    <div class="container" style="display:flex; justify-content: start; flex-wrap: wrap; margin-top:10px; margin-left: 10px">
        <div clas="card-container" style="display:flex; justify-content: start; flex-wrap: wrap;">

            <!-- Theft-->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Allergy Reaction_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style="font-size: 12px; text-align: center ;">Theft</h3>
                    </div>
                </div>
            </a>

            <!-- Rape -->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Seizures_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style=" font-size: 12px;text-align:center;">Rape</h3>
                    </div>
                </div>
            </a>

            <!-- Physical Abuse -->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Burns_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style=" font-size: 12px;text-align:center;">Physical Abuse</h3>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <h2 class="font-semibold text-m text-gray-800 leading-tight" style="margin-left: 20px;">
        {{ __('Others') }}
    </h2>

    <div class="container" style="display:flex; justify-content: start; flex-wrap: wrap; margin-left: 10px; padding-bottom: 7vh;">
        <div clas="card-container" style="display:flex; justify-content: start; flex-wrap: wrap;">

            <!-- Fire-->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Allergy Reaction_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style="font-size: 12px; text-align: center; margin-bottom: 8px;">Fire</h3>
                    </div>
                </div>
            </a>

            <!-- Earthquake -->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Seizures_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Earthquake</h3>
                    </div>
                </div>
            </a>

            <!-- Flood -->
            <a href="#">
                <div class="card" style="width: 70px; overflow: auto; margin:10px; ">
                    <img src="images/Burns_1.png" alt="">
                    <div class="card-content" style="padding: 2px;">
                        <h3 style=" font-size: 12px;text-align:center;margin-bottom:8px;">Flood</h3>
                    </div>
                </div>
            </a>

            <div class="min-h-60 bg-gray-100">
                <div class="min-h-60 bg-gray-100">
                
                </div>  
            </div>  
        </div>

    </div>



    <x-slot name="footer">
     
    </x-slot>
</x-app-layout>
