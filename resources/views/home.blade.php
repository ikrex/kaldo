<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero szekció -->
    <section class="hero">
        <div class="container">
            <h1>Hatékony rendezvényszervezés művelődési intézményeknek</h1>
            <p>A KalDo segít elkerülni az ütközéseket, egyszerűsíti az információáramlást és optimalizálja a művelődési intézmények működését.</p>
            <div class="hero-buttons">
                <a href="{{ route('features') }}" class="btn btn-outline">Funkciók</a>
            </div>
        </div>
    </section>

    <!-- Előnyök szekció -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Miért válaszd a KalDo rendszert?</h2>
                <p>Egy komplex szoftver, amely a művelődési intézmények sajátos igényeihez igazodik.</p>
            </div>

            <div class="row">
                <!-- Előny 1 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Ütközésmentes tervezés</h3>
                        <p>Automatikusan jelzi az időpont- és teremütközéseket, így elkerülhetők a kellemetlen átfedések és duplikációk.</p>
                    </div>
                </div>

                <!-- Előny 2 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3>Egyszerű folyamatkezelés</h3>
                        <p>A rendezvények teljes életciklusának kezelése egy helyen, az ötlettől a megvalósításig és az értékelésig.</p>
                    </div>
                </div>

                <!-- Előny 3 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3>Automatikus értesítések</h3>
                        <p>Valós idejű értesítések és emlékeztetők a fontos eseményekről, határidőkről és változásokról.</p>
                    </div>
                </div>

                <!-- Előny 4 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Csapatmunka támogatása</h3>
                        <p>Hatékony együttműködés és feladatmegosztás a szervezeten belül, mindenki pontosan tudja a feladatát.</p>
                    </div>
                </div>

                <!-- Előny 5 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>Átfogó elemzések</h3>
                        <p>Részletes statisztikák és jelentések a rendezvények sikerességéről, látogatottságáról és erőforráshasználatról.</p>
                    </div>
                </div>

                <!-- Előny 6 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Mobilbarát felület</h3>
                        <p>Rugalmas kezelhetőség bármilyen eszközről, így munkatársaid útközben is naprakészek maradhatnak.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Funkciók kiemelése -->
    <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Főbb funkcióink</h2>
                <p>Optimalizált megoldások a művelődési intézmények mindennapjaihoz.</p>
            </div>

            <!-- Funkció 1 -->
            <div class="feature">
                <div class="row">
                    <div class="col-6 feature-content">
                        <h3>Integrált naptár és foglalási rendszer</h3>
                        <p>Terem- és eszközfoglalások kezelése egyetlen naptárban, valós idejű elérhetőség-ellenőrzéssel. A rendszer automatikusan jelzi az ütközéseket és javaslatot tesz alternatív időpontokra vagy helyszínekre.</p>
                        <ul class="feature-list">
                            <li>Több nézet: napi, heti, havi és listás megjelenítés</li>
                            <li>Automatikus ütközésfigyelés és figyelmeztetés</li>
                            <li>Egyszerű foglalási folyamat néhány kattintással</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/calendar-feature.jpg') }}" alt="Integrált naptár és foglalási rendszer">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Funkció 2 -->
            <div class="feature">
                <div class="row">
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/communication-feature.jpg') }}" alt="Hatékony kommunikáció">
                        </div>
                    </div>
                    <div class="col-6 feature-content">
                        <h3>Hatékony kommunikáció</h3>
                        <p>Zökkenőmentes információáramlás a szervezeten belül és a látogatók felé. Értesítések, emlékeztetők és hírlevelek küldése, csoportos üzenetek és személyre szabott kommunikáció.</p>
                        <ul class="feature-list">
                            <li>Automatikus értesítések a fontos határidőkről</li>
                            <li>SMS és e-mail értesítések testreszabása</li>
                            <li>Belső üzenetküldő rendszer a gyors egyeztetésekhez</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Funkció 3 -->
            <div class="feature">
                <div class="row">
                    <div class="col-6 feature-content">
                        <h3>Átfogó jelentések és statisztikák</h3>
                        <p>Adatvezérelt döntéshozatal részletes kimutatások és elemzések segítségével. Nyomon követheti a látogatottságot, a bevételeket, a térhasználat hatékonyságát és más kulcsfontosságú mutatókat.</p>
                        <ul class="feature-list">
                            <li>Testreszabható műszerfalak a fontos mutatók követéséhez</li>
                            <li>Exportálható riportok Excel és PDF formátumban</li>
                            <li>Vizuális adatmegjelenítés grafikonokkal és diagramokkal</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/statistics-feature.jpg') }}" alt="Átfogó jelentések és statisztikák">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vélemények szekció -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Partnereink véleménye</h2>
                <p>Ismerd meg, mit mondanak azok, akik már használják a KalDo rendszert.</p>
            </div>

            <div class="row">
                <!-- Vélemény 1 -->
                <div class="col-4">
                    <div class="testimonial">
                        <div class="testimonial-image">
                            <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Nagy Eszter">
                        </div>
                        <div class="testimonial-text">
                            "A KalDo beveztése óta jelentősen csökkent az adminisztrációs teher az intézményünkben. A teremfoglalással kapcsolatos ütközések megszűntek, és a kollégáim közötti kommunikáció is gördülékenyebbé vált."
                        </div>
                        <div class="testimonial-author">Nagy Eszter</div>
                        <div class="testimonial-position">Művelődési Központ Igazgató, Budapest</div>
                    </div>
                </div>

                <!-- Vélemény 2 -->
                <div class="col-4">
                    <div class="testimonial">
                        <div class="testimonial-image">
                            <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Kovács Péter">
                        </div>
                        <div class="testimonial-text">
                            "Több mint 10 éve dolgozom a szakmában, de ilyen átlátható rendszerrel még nem találkoztam. A KalDo valóban érti a művelődési intézmények egyedi igényeit és problémáit. Mindenkinek csak ajánlani tudom!"
                        </div>
                        <div class="testimonial-author">Kovács Péter</div>
                        <div class="testimonial-position">Kulturális Központ Vezető, Debrecen</div>
                    </div>
                </div>

                <!-- Vélemény 3 -->
                <div class="col-4">
                    <div class="testimonial">
                        <div class="testimonial-image">
                            <img src="{{ asset('images/testimonial-3.jpg') }}" alt="Szabó Andrea">
                        </div>
                        <div class="testimonial-text">
                            "Napi szinten használom a KalDo rendszert, és jelentősen megkönnyíti a munkámat. A naptár funkció és az automatikus értesítések segítségével soha nem csúszom le egy fontos határidőről sem."
                        </div>
                        <div class="testimonial-author">Szabó Andrea</div>
                        <div class="testimonial-position">Rendezvényszervező, Szeged</div>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('testimonials') }}" class="btn">További vélemények</a>
            </div>
        </div>
    </section>

    <!-- CTA szekció -->
    <section class="cta">
        <div class="container">
            <h2>Kész vagy egyszerűsíteni a művelődési intézményed működését?</h2>
            <p>Próbáld ki a KalDo rendszert ingyenesen és tapasztald meg, milyen hatékony lehet a rendezvényszervezés!</p>
            <div>
                <a href="{{ route('contact') }}" class="btn btn-outline">Kapcsolat</a>
            </div>
        </div>
    </section>
@endsection
