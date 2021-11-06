<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('dashboard');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function add_event_details(Request $request)
    {
        $event = new Event;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->startDateTime = Carbon::parse($request->start_datetime);
        $event->endDateTime =  Carbon::parse($request->end_datetime);
        $event->save();
        return redirect(route('dashboard'));
    }
    public function edit_event(Request $request, $id) {
            $id = $request->id;
            $event = Event::find($id);
            $startDateTime = Carbon::parse($event->start->dateTime)->format('m/d/y h:i:A');
            $endDateTime = Carbon::parse($event->end->dateTime)->format('m/d/y h:i:A');
        return view('edit_event')
            ->with('event_data', $event)->with('startDateTime', $startDateTime)->with('endDateTime', $endDateTime);
    }
    public function edit_event_details(Request $request)
    {
        $start_time = Carbon::parse($request->start_datetime);
        $end_time = Carbon::parse($request->end_datetime);
        $event = Event::find($request->id);
        $event->update(['name' => $request->name]);
        $event->update(['description' => $request->description]);
        $event->update(['startDateTime' => $start_time ]);
        $event->update(['endDateTime' => $end_time]);
        return redirect(route('dashboard'));
    }
}