<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Info;
use App\Models\Emergency;
use App\Models\Clinic;
use App\Models\Security;
use App\Events\Alerts;
use App\Events\clinicAlert;
use App\Events\secuAlert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class PortalController extends Controller
{


    public function emergency()
    {
        return view('main');
    }

    public function eclicked(Request $request)
    {
        // Check if the 'emergency_type' field is present in the request
        if ($request->has('emergency_type')) {
            $emergencyType = $request->input('emergency_type');
            // Process based on the emergency type
            switch ($emergencyType) {
                case 'Earthquake':
                    break;
                case 'Fire':

                    break;
                case 'Flood':
                    break;
            }

            // Save emergency type
            $emergency = new Emergency();
            $emergency->emergency_type = $emergencyType;

            // Save latitude and longitude
            $emergency->latitude = $request->input('latitude');
            $emergency->longitude = $request->input('longitude');
            $emergency->save();

            // Notify data
            event(new Alerts(request()->all()));
            return redirect()->back()->with('success', 'Others Emergency handled successfully!');
        
        }
    }

   /* private function data2()
    {
        $emergency = Emergency::first(); // Or however you fetch your emergency data
        $data = ['result' => $emergency];
        return view('dashboard', compact('emergency'));
    }*/


    public function sclicked(Request $request)
    {
        // Check if the 'security_type' field is present in the request
        if ($request->has('security_type')) {
            $securityType = $request->input('security_type');
            // Process based on the security type
            switch ($securityType) {
                case 'Theft':
                    
                    break;
                case 'Rape':
                   
                    break;
                case 'Physical Abuse':
                    
                    break;
            }

            // Save security type
            $security = new Security(); 
            $security->security_type = $securityType; 

            // Save latitude and longitude
            $security->latitude = $request->input('latitude');
            $security->longitude = $request->input('longitude');
            $security->save();

            // Dispatch an event
            event(new secuAlert(request()->all()));

            // Redirect back with success message
            return redirect()->back()->with('success', 'Security emergency handled successfully!');
        }
    }

    public function mclicked(Request $request)
    {
        // Check if the 'medical_type' field is present in the request
        if ($request->has('medical_type')) {
            $medicalType = $request->input('medical_type');
            // Process based on the medical type
            switch ($medicalType) {
                case 'Allergy Reaction':
                    break;
                case 'Seiaures':
                    break;
                case 'Burns':
                    break;
                case 'Fainting':
                    break;
                case 'Asthma':
                    break;
                case 'Nausea':
                    break;
                case 'Poison':
                    break;
                case 'Bleed':
                    break;
                case 'Sprain':
                     break;
                case 'Fracture':
                    break;
            }

            // Save medical type, latitude, and longitude
            $medical = new Clinic(); 
            $medical->medical_type = $medicalType;
         
            $medical->latitude = $request->input('latitude');
            $medical->longitude = $request->input('longitude');
            $medical->save();

            // Dispatch an event
            event(new clinicAlert($request->all()));

            // Redirect back with success message
            return redirect()->back()->with('success', 'Medical emergency handled successfully!');
        }
    }


    public function dashboard()
    {
        // return "Welcome to your dashboard";
        return view('dashboard');
    }

    public function security()
    {
        // return "Welcome to your dashboard";
        return view('dashboards.securityDash');
    }

    public function medical()
    {
        // return "Welcome to your dashboard";
        return view('dashboards.clinicDash');
    }

    public function dashReports()
    {
        $emergencies = Emergency::all();
        return view('dashReports', ['emergencies' => $emergencies]);
    }
}
