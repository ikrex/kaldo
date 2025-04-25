<!-- resources/views/features.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero szekció -->
    <section class="hero">
        <div class="container">
            <h1>KalDo funkciói</h1>
            <p>Fedezd fel a KalDo rendszer átfogó funkcióit, amelyek forradalmasítják a művelődési intézmények működését.</p>
        </div>
    </section>

    <!-- Funkciók áttekintése -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Modulok és funkciók áttekintése</h2>
                <p>Az alábbi modulok segítségével a KalDo rendszer komplex megoldást nyújt a művelődési intézmények számára.</p>
            </div>

            <div class="row">
                <!-- Modul 1 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Eseménykezelés</h3>
                        <p>Kezeld és szervezd meg az intézmény eseményeit, programjait egy helyen.</p>
                    </div>
                </div>

                <!-- Modul 2 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <h3>Teremfoglalás</h3>
                        <p>Optimalizáld a termek és erőforrások kihasználtságát, előzd meg az ütközéseket.</p>
                    </div>
                </div>

                <!-- Modul 3 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h3>Kommunikáció</h3>
                        <p>Biztosítsd a zökkenőmentes információáramlást a szervezeten belül és a közönség felé.</p>
                    </div>
                </div>

                <!-- Modul 4 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Résztvevőkezelés</h3>
                        <p>Tartsd nyilván a látogatókat, résztvevőket és a jelentkezéseket.</p>
                    </div>
                </div>

                <!-- Modul 5 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h3>Statisztikák</h3>
                        <p>Elemezd a rendezvények sikerességét és az intézmény teljesítményét.</p>
                    </div>
                </div>

                <!-- Modul 6 -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3>Feladatkezelés</h3>
                        <p>Hatékony feladatkiosztás és nyomonkövetés a csapat tagjai között.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Részletes funkciók -->
    <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Részletes funkciók</h2>
                <p>Ismerje meg a KalDo rendszer moduljait és képességeit részletesebben.</p>
            </div>

            <!-- Eseménykezelés -->
            <div class="feature">
                <div class="row">
                    <div class="col-6 feature-content">
                        <h3>Eseménykezelés</h3>
                        <p>A KalDo eseménykezelő modulja segít a rendezvények tervezésében, szervezésében és lebonyolításában az ötlettől egészen az értékelésig.</p>
                        <ul class="feature-list">
                            <li>Teljes rendezvénytervezés és -menedzsment</li>
                            <li>Eseménysablonok visszatérő rendezvényekhez</li>
                            <li>Program- és napirend tervezés</li>
                            <li>Előadók, fellépők kezelése</li>
                            <li>Költségtervezés és nyomonkövetés</li>
                            <li>Események promóciója és marketingje</li>
                            <li>Esemény utáni értékelések és visszajelzések</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/event-management.jpg') }}" alt="Eseménykezelés">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teremfoglalás -->
            <div class="feature">
                <div class="row">
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/room-booking.jpg') }}" alt="Teremfoglalás">
                        </div>
                    </div>
                    <div class="col-6 feature-content">
                        <h3>Teremfoglalás</h3>
                        <p>A KalDo teremfoglalási modulja optimalizálja az intézmény tereinek kihasználtságát és elkerüli a kellemetlen ütközéseket.</p>
                        <ul class="feature-list">
                            <li>Valós idejű foglalási naptár</li>
                            <li>Automatikus ütközés-ellenőrzés</li>
                            <li>Termek és eszközök kapacitáskezelése</li>
                            <li>Visszatérő foglalások kezelése</li>
                            <li>Terem-előkészítési igények kezelése</li>
                            <li>Termek kihasználtságának elemzése</li>
                            <li>Terembeállítások és elrendezések kezelése</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Kommunikáció -->
            <div class="feature">
                <div class="row">
                    <div class="col-6 feature-content">
                        <h3>Kommunikáció</h3>
                        <p>A hatékony információáramlás kulcsfontosságú minden szervezet számára. A KalDo kommunikációs eszközeivel egyszerűen tarthatod a kapcsolatot kollégáiddal és a közönséggel.</p>
                        <ul class="feature-list">
                            <li>Belső üzenetküldő rendszer</li>
                            <li>E-mail és SMS értesítések</li>
                            <li>Automatikus emlékeztetők</li>
                            <li>Hírlevelek küldése</li>
                            <li>Kollaborációs eszközök</li>
                            <li>Dokumentumok megosztása</li>
                            <li>Kommunikációs előzmények nyomonkövetése</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/communication.jpg') }}" alt="Kommunikáció">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Résztvevőkezelés -->
            <div class="feature">
                <div class="row">
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/participant-management.jpg') }}" alt="Résztvevőkezelés">
                        </div>
                    </div>
                    <div class="col-6 feature-content">
                        <h3>Résztvevőkezelés</h3>
                        <p>A KalDo rendszer segít a rendezvény résztvevőinek kezelésében, a regisztrációtól a jelenlét nyilvántartásáig.</p>
                        <ul class="feature-list">
                            <li>Online regisztráció és jelentkezés</li>
                            <li>Résztvevői listák kezelése</li>
                            <li>Jelenléti ívek és beléptetés</li>
                            <li>Résztvevők csoportosítása</li>
                            <li>QR-kódos beléptetés</li>
                            <li>Résztvevői visszajelzések és értékelések</li>
                            <li>Résztvevői statisztikák</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Statisztikák -->
            <div class="feature">
                <div class="row">
                    <div class="col-6 feature-content">
                        <h3>Statisztikák és jelentések</h3>
                        <p>A KalDo átfogó elemzési eszközei segítségével valós képet kaphatsz intézményed működéséről és rendezvényeid sikerességéről.</p>
                        <ul class="feature-list">
                            <li>Testreszabható műszerfalak</li>
                            <li>Részletes látogatottsági statisztikák</li>
                            <li>Bevétel és költségelemzés</li>
                            <li>Terem kihasználtsági mutatók</li>
                            <li>Időszaki összehasonlító elemzések</li>
                            <li>Exportálható jelentések (PDF, Excel)</li>
                            <li>Vizuális adatmegjelenítés grafikonokkal</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/statistics.jpg') }}" alt="Statisztikák">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feladatkezelés -->
            <div class="feature">
                <div class="row">
                    <div class="col-6">
                        <div class="feature-image">
                            <img src="{{ asset('images/task-management.jpg') }}" alt="Feladatkezelés">
                        </div>
                    </div>
                    <div class="col-6 feature-content">
                        <h3>Feladatkezelés</h3>
                        <p>A KalDo feladatkezelő modulja segít a rendezvényekkel kapcsolatos feladatok kiosztásában, nyomon követésében és hatékony végrehajtásában.</p>
                        <ul class="feature-list">
                            <li>Feladatok létrehozása és kiosztása</li>
                            <li>Határidők és emlékeztetők kezelése</li>
                            <li>Feladatok állapotának nyomon követése</li>
                            <li>Csoportos feladatkezelés</li>
                            <li>Feladatok prioritásának beállítása</li>
                            <li>Megjegyzések és dokumentumok csatolása</li>
                            <li>Jelentés a teljesített feladatokról</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rendszerkövetelmények -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Technikai információk</h2>
                <p>A KalDo rendszer mindenhol és mindenkor elérhető.</p>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <h3>Rendszerkövetelmények</h3>
                        <ul class="feature-list">
                            <li>Modern webböngésző (Chrome, Firefox, Safari, Edge)</li>
                            <li>Stabil internetkapcsolat</li>
                            <li>Nincs szükség külön szoftvertelepítésre</li>
                            <li>Mobileszközökön is teljes funkcionalitás</li>
                            <li>Felhőalapú rendszer, minimális szerver igény</li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <h3>Biztonság és adatvédelem</h3>
                        <ul class="feature-list">
                            <li>GDPR-kompatibilis adatkezelés</li>
                            <li>SSL titkosított adatátvitel</li>
                            <li>Rendszeres biztonsági mentések</li>
                            <li>Többszintű jogosultságkezelés</li>
                            <li>Tevékenységnapló és audit</li>
                            <li>Adatveszteség elleni védelem</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA szekció -->
    <section class="cta">
        <div class="container">
            <h2>Kész vagy kipróbálni a KalDo rendszert?</h2>
            <p>Próbáld ki ingyenesen és fedezd fel, hogyan teheted hatékonyabbá intézményed működését!</p>
            <div>
                <a href="{{ route('demo') }}" class="btn btn-white">Ingyenes demó</a>
                <a href="{{ route('pricing') }}" class="btn btn-outline">Árak megtekintése</a>
            </div>
        </div>
    </section>
@endsection
