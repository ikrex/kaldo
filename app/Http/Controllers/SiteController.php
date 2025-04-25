<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\DemoRequestMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    /**
     * Főoldal megjelenítése
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Funkciók oldal megjelenítése
     */
    public function features()
    {
        return view('features');
    }

    /**
     * Árak oldal megjelenítése
     */
    public function pricing()
    {
        $plans = [
            [
                'name' => 'Alap',
                'price' => '19 900',
                'period' => 'hó',
                'description' => 'Kisebb intézmények számára',
                'features' => [
                    'Maximum 3 felhasználó',
                    'Rendezvénykezelés',
                    'Alapszintű teremfoglalás',
                    'E-mail értesítések',
                    'Alapszintű riportok'
                ],
                'highlight' => false,
                'button_text' => 'Választom',
            ],
            [
                'name' => 'Professional',
                'price' => '39 900',
                'period' => 'hó',
                'description' => 'Közepes méretű intézményeknek',
                'features' => [
                    'Maximum 10 felhasználó',
                    'Minden Alap csomag funkció',
                    'Komplex teremfoglalási rendszer',
                    'Automatikus ütközéskezelés',
                    'Eszközkezelés',
                    'SMS értesítések',
                    'Részletes statisztikák'
                ],
                'highlight' => true,
                'button_text' => 'Választom',
            ],
            [
                'name' => 'Enterprise',
                'price' => '79 900',
                'period' => 'hó',
                'description' => 'Nagy intézmények számára',
                'features' => [
                    'Korlátlan felhasználó',
                    'Minden Professional csomag funkció',
                    'Online jegyértékesítés',
                    'Dedikált ügyfélmenedzser',
                    'API hozzáférés',
                    'Egyedi fejlesztések',
                    'Kiemelt támogatás 24/7'
                ],
                'highlight' => false,
                'button_text' => 'Kapcsolatfelvétel',
            ]
        ];

        return view('pricing', compact('plans'));
    }

    /**
     * Vélemények oldal megjelenítése
     */
    public function testimonials()
    {
        $testimonials = [
            [
                'name' => 'Mónika',
                'position' => 'PR, marketing, értékesítési és pályázatkezelési csoportvezető',
                'location' => 'Mosonmagayróvár',
                'image' => 'testimonial-1.jpg',
                'text' => 'Terembérleti szoftverként kezdtünk, Google naptárról váltottunk, most már a kötelező statisztikában és a belső kommunikációban is használjuk. Ellentétben a nagy platformoktól, személyre szabott, rugalmasan alakítható, mindig rendelkezésre álló segítő, könnyen tanulható és tanítható. A legjobb benne a biztonság és a folyamatos fejlesztés lehetősége. '
            ],
            [
                'name' => 'Boglárka',
                'position' => 'Rendezvényszervező',
                'location' => 'Vecsés',
                'image' => 'testimonial-2.jpg',
                'text' => 'Rendkívül könnyen kezelhető rendszer, Segítőkész support'
            ],
            [
                'name' => 'Eszter',
                'position' => 'Gazdasági vezető',
                'location' => 'Vecsés',
                'image' => 'testimonial-2.jpg',
                'text' => 'Látjuk, ki mikor van szabadságon (innen jelenti a kolléganő is az Államkincstár felé)
                Látogatottsági, kihasználtsági statisztikákat pár perc alatt le tudunk kérni
                Rendezvények, terembérlés esetében minden információt fel tudunk vinni a rendszerbe (teremberendezés, eszközigény stb.), melyre rálát minden kolléga.'
            ],


        ];

        return view('testimonials', compact('testimonials'));
    }

    /**
     * Kapcsolat oldal megjelenítése
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Kapcsolati űrlap feldolgozása
     */
 /**
     * Kapcsolati űrlap feldolgozása
     */
    public function processContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Adatok mentése az adatbázisba
        $contactMessage = ContactMessage::create($validated);

        // E-mail küldése
        try {
            Mail::to('illeskalman77@gmail.com')->send(new ContactFormMail($validated));
        } catch (\Exception $e) {
            // Log hiba esetén
            Log::error('Kapcsolati űrlap e-mail küldési hiba: ' . $e->getMessage());
        }

        return redirect()->route('contact')->with('success', 'Köszönjük megkeresését! Hamarosan felvesszük Önnel a kapcsolatot.');
    }
    /**
     * Demó oldal megjelenítése
     */
    public function demo()
    {
        return view('demo');
    }

    /**
     * Demó igénylés feldolgozása
     */
    public function processDemo(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'employees' => 'required|integer|min:1',
            'message' => 'nullable|string',
            'agree_terms' => 'required|accepted',
        ]);

        // E-mail küldése - valós rendszerben
        // Mail::to('demo@kaldo.hu')->send(new DemoRequestMail($validated));

        return redirect()->route('demo')->with('success', 'Köszönjük érdeklődését! Kollégánk hamarosan felveszi Önnel a kapcsolatot a demó részleteivel kapcsolatban.');
    }

    /**
     * Felhasználási feltételek megjelenítése
     */
    public function terms()
    {
        return view('legal.terms');
    }

    /**
     * Adatvédelmi irányelvek megjelenítése
     */
    public function privacy()
    {
        return view('legal.privacy');
    }
}

class NewsletterController extends Controller
{
    /**
     * Hírlevél feliratkozás feldolgozása
     */
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Valós rendszerben adatbázisba mentenénk
        // NewsletterSubscriber::create($validated);

        return back()->with('success', 'Sikeres feliratkozás a hírlevélre!');
    }
}
