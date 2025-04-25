<!-- resources/views/pricing.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero szekció -->
    <section class="hero">
        <div class="container">
            <h1>Csomagok és árak</h1>
            <p>Válassza ki az intézménye méretének és igényeinek legmegfelelőbb csomagot!</p>
        </div>
    </section>

    <!-- Árazási táblázat -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Intézményméret szerinti csomagok</h2>
                <p>A KalDo rendszer moduláris felépítésű, így mindenki megtalálhatja a számára ideális megoldást.</p>
            </div>

            <div class="row pricing-row">
                <!-- Kis intézmény csomag -->
                <div class="col-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3>Egy intézmény</h3>
                            <div class="pricing-price">
                                <div class="price">25 000 Ft</div>
                                <div class="period">/hó</div>
                            </div>
                            <p>Kisebb intézmények számára</p>
                        </div>
                        <div class="pricing-features">
                            <ul>
                                <li>Korlátlan felhasználó</li>
                                <li>Maximum 10 bérelhető terem</li>
                                <li>Ütközésfigyelés</li>
                                <li>Kimutatás készítés</li>
                                <li>Felhasználókezelés</li>
                                <li>Tevékenységnaplózás</li>
                                <li>150 000 Ft egyszeri díj*</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="{{ route('contact') }}" class="btn">Választom</a>
                        </div>
                    </div>
                </div>

                <!-- Több tagintézmény csomag -->
                <div class="col-4">
                    <div class="pricing-card popular">
                        <div class="popular-badge">Népszerű</div>
                        <div class="pricing-header">
                            <h3>Több tagintézmény</h3>
                            <div class="pricing-price">
                                <div class="price">40 000 Ft</div>
                                <div class="period">/hó</div>
                            </div>
                            <p>Maximum 10 tagintézmény</p>
                        </div>
                        <div class="pricing-features">
                            <ul>
                                <li>Korlátlan felhasználó</li>
                                <li>Korlátlan bérelhető terem</li>
                                <li>Ütközésfigyelés</li>
                                <li>Kimutatás készítés</li>
                                <li>Felhasználókezelés</li>
                                <li>Tevékenységnaplózás</li>
                                <li>252 000 Ft egyszeri díj*</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="{{ route('contact') }}" class="btn">Választom</a>
                        </div>
                    </div>
                </div>

                <!-- Nagyvállalati csomag -->
                <div class="col-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3>10+ tagintézmény</h3>
                            <div class="pricing-price">
                                <div class="price">Egyedi árazás</div>
                                <div class="period"></div>
                            </div>
                            <p>Nagyobb intézményhálózatok számára</p>
                        </div>
                        <div class="pricing-features">
                            <ul>
                                <li>Korlátlan felhasználó</li>
                                <li>Korlátlan bérelhető terem</li>
                                <li>Ütközésfigyelés</li>
                                <li>Kimutatás készítés</li>
                                <li>Felhasználókezelés</li>
                                <li>Tevékenységnaplózás</li>
                                <li>Egyedi implementáció</li>
                                <li>Személyre szabott integráció</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="{{ route('contact') }}" class="btn">Kapcsolatfelvétel</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pricing-note">
                <p>* Az egyszeri díj tartalmazza a felület elkészítését, intézményre szabását, a személyes oktatást az intézményben.</p>
                <p>* Az egyszeri díj 12 havi részletben is megfizethető.</p>
                <p>* Az árak nettó árak, nem tartalmazzák az ÁFA-t.</p>
            </div>
        </div>
    </section>

    <!-- Plusz modulok -->
    <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Pluszban rendelhető modulok</h2>
                <p>Bővítse a KalDo rendszert az Ön speciális igényeinek megfelelően</p>
            </div>

            <div class="row">
                <!-- Szabadságkezelés modul -->
                <div class="col-6">
                    <div class="addon-card">
                        <div class="addon-header">
                            <h3>Szabadságkezelés modul</h3>
                            <div class="addon-price">
                                <span class="price">5 000 Ft</span>
                                <span class="period">/hó</span>
                            </div>
                        </div>
                        <div class="addon-content">
                            <p>A szabadságkezelés modul segít nyilvántartani és kezelni a munkatársak szabadságait, helyettesítéseit.</p>
                            <ul class="feature-list">
                                <li>Éves szabadságkeret kezelése</li>
                                <li>Szabadságigénylés és jóváhagyás folyamat</li>
                                <li>Szabadságok megjelenítése a naptárban</li>
                                <li>Helyettesítések kezelése</li>
                                <li>Statisztikák és jelentések</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hírlevél modul -->
                <div class="col-6">
                    <div class="addon-card">
                        <div class="addon-header">
                            <h3>Hírlevél modul</h3>
                            <div class="addon-price">
                                <span class="price">7 500 Ft</span>
                                <span class="period">/hó</span>
                            </div>
                        </div>
                        <div class="addon-content">
                            <p>A hírlevél modul segítségével egyszerűen küldhet professzionális hírleveleket a látogatóknak, érdeklődőknek.</p>
                            <ul class="feature-list">
                                <li>Feliratkozók kezelése</li>
                                <li>Hírlevelek szerkesztése és ütemezése</li>
                                <li>Feliratkozói listák szegmentálása</li>
                                <li>Megnyitási és kattintási statisztikák</li>
                                <li>Automatikus leiratkozás kezelése</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Összehasonlító táblázat -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Csomagok összehasonlítása</h2>
                <p>Tekintse meg a csomagok részletes összehasonlítását</p>
            </div>

            <div class="comparison-table-container">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th>Funkció</th>
                            <th>Egy intézmény</th>
                            <th>Több tagintézmény</th>
                            <th>10+ tagintézmény</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="feature-name">Havi díj</td>
                            <td>25 000 Ft</td>
                            <td>40 000 Ft</td>
                            <td>Egyedi árazás</td>
                        </tr>
                        <tr>
                            <td class="feature-name">Egyszeri díj</td>
                            <td>150 000 Ft</td>
                            <td>252 000 Ft</td>
                            <td>Egyedi árazás</td>
                        </tr>
                        <tr>
                            <td class="feature-name">Intézmények száma</td>
                            <td>1</td>
                            <td>Max. 10</td>
                            <td>10 felett</td>
                        </tr>
                        <tr>
                            <td class="feature-name">Bérelhető termek</td>
                            <td>Max. 10</td>
                            <td>Korlátlan</td>
                            <td>Korlátlan</td>
                        </tr>
                        <tr>
                            <td class="feature-name">Felhasználók száma</td>
                            <td>Korlátlan</td>
                            <td>Korlátlan</td>
                            <td>Korlátlan</td>
                        </tr>
                        <tr>
                            <td class="feature-name">Ütközésfigyelés</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">Kimutatás készítés</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">Felhasználókezelés</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">Tevékenységnaplózás</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">Személyes oktatás</td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">Egyedi fejlesztések</td>
                            <td>Felár ellenében</td>
                            <td>Felár ellenében</td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">Dedikált támogatás</td>
                            <td>E-mail</td>
                            <td>E-mail, telefon</td>
                            <td>Személyes kapcsolattartó</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Gyakori kérdések -->
    <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Gyakori kérdések az árazással kapcsolatban</h2>
                <p>Minden, amit az előfizetésekről tudni érdemes</p>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <h3>Mit tartalmaz pontosan az egyszeri díj?</h3>
                    <div class="faq-answer">
                        <p>Az egyszeri díj tartalmazza a rendszer teljes telepítését, beállítását, az intézmény(ek) adatainak feltöltését, a felület testreszabását az intézmény arculatához, valamint a személyes oktatást a program használatáról az intézményben. Mindez biztosítja, hogy azonnal használatba tudja venni a rendszert.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Hogyan történik az egyszeri díj részletfizetése?</h3>
                    <div class="faq-answer">
                        <p>Az egyszeri díjat lehetőség van 12 havi egyenlő részletben is megfizetni. A részletfizetési konstrukció kamatmentes, és a havi előfizetési díjjal együtt kerül számlázásra. A részletfizetési lehetőségről a szerződéskötéskor egyeztetünk.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Mi történik, ha az intézményem mérete megváltozik?</h3>
                    <div class="faq-answer">
                        <p>Csomagváltás bármikor lehetséges, ha az intézményi struktúrája megváltozik. Nagyobb csomagra váltás esetén csak a különbözeti egyszeri díjat számítjuk fel. Vegye fel velünk a kapcsolatot, és segítünk a megfelelő csomag kiválasztásában.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>A plusz modulok minden csomaghoz megrendelhetők?</h3>
                    <div class="faq-answer">
                        <p>Igen, a plusz modulok (szabadságkezelés, hírlevél) minden csomaghoz külön-külön vagy együtt is megrendelhetők. A modulok díja a választott csomagtól függetlenül azonos, és bármikor aktiválhatók vagy lemondhatók az előfizetési időszak során.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Van elkötelezettségi idő az előfizetésekkel kapcsolatban?</h3>
                    <div class="faq-answer">
                        <p>A havi előfizetés esetén nincs minimális elkötelezettségi idő, bármikor lemondható. Az egyszeri díj részletfizetése esetén a szerződésben rögzített feltételek érvényesek.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Igényfelmérés -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Nem biztos benne, melyik csomag a megfelelő?</h2>
                    <p>Segítünk kiválasztani az intézménye számára legmegfelelőbb csomagot. Töltse ki rövid kérdőívünket, és szakértőink személyre szabott ajánlatot készítenek Önnek.</p>
                    <ul class="feature-list">
                        <li>Ingyenes igényfelmérés</li>
                        <li>Személyre szabott ajánlat</li>
                        <li>Nincs kötelezettség</li>
                        <li>Részletes költségkalkuláció</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn">Kapcsolatfelvétel</a>
                </div>
                <div class="col-6">
                    <div class="needs-assessment-image">
                        <img src="{{ asset('images/needs-assessment.jpg') }}" alt="Igényfelmérés">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA szekció -->
    <section class="cta">
        <div class="container">
            <h2>Készen áll a kezdésre?</h2>
            <p>Keressen bártan és segítséget nyújtunk, melyik csomag lenne az intézményüknek a leghatékonyabb megoldás.</p>
            <div>
                <a href="{{ route('contact') }}" class="btn btn-outline">Kapcsolat</a>
            </div>
        </div>
    </section>


<!-- CSS az árazási oldalhoz -->
<style>
.pricing-row {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.pricing-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.pricing-card.popular {
    border: 2px solid #0066cc;
    transform: scale(1.05);
    z-index: 1;
}

.pricing-card.popular:hover {
    transform: scale(1.05) translateY(-5px);
}

.popular-badge {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #0066cc;
    color: white;
    padding: 5px 15px;
    font-size: 14px;
    font-weight: bold;
    border-bottom-left-radius: 8px;
}

.pricing-header {
    padding: 30px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

.pricing-header h3 {
    margin-bottom: 15px;
    font-size: 24px;
}

.pricing-price {
    display: flex;
    justify-content: center;
    align-items: baseline;
    margin-bottom: 15px;
}

.price {
    font-size: 36px;
    font-weight: bold;
    color: #0066cc;
}

.period {
    font-size: 18px;
    color: #666;
}

.pricing-features {
    padding: 30px;
    flex-grow: 1;
}

.pricing-features ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pricing-features li {
    margin-bottom: 15px;
    padding-left: 25px;
    position: relative;
}

.pricing-features li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #0066cc;
    font-weight: bold;
}

.pricing-footer {
    padding: 20px 30px 30px;
    text-align: center;
}

.pricing-note {
    text-align: center;
    margin-top: 30px;
    color: #666;
    font-size: 14px;
}

.addon-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    height: 100%;
    transition: transform 0.3s, box-shadow 0.3s;
}

.addon-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.addon-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.addon-header h3 {
    margin: 0;
    font-size: 20px;
}

.addon-price {
    text-align: right;
}

.addon-price .price {
    font-size: 24px;
}

.addon-content p {
    margin-bottom: 20px;
}

.comparison-table-container {
    overflow-x: auto;
}

.comparison-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

.comparison-table th,
.comparison-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

.comparison-table th {
    background-color: #0066cc;
    color: white;
}

.comparison-table th:first-child,
.comparison-table td:first-child {
    text-align: left;
}

.feature-name {
    font-weight: bold;
}

.fa-check {
    color: #28a745;
}

.fa-times {
    color: #dc3545;
}

.needs-assessment-image {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.faq-container {
    margin-top: 30px;
}

.faq-item {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
}

.faq-item h3 {
    padding: 15px;
    margin: 0;
    background-color: #f8f9fa;
    cursor: pointer;
    position: relative;
}

.faq-answer {
    padding: 15px;
    border-top: 1px solid #ddd;
}
</style>

<!-- JavaScript az árazási oldalhoz -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // GYIK lenyitása
    const faqItems = document.querySelectorAll('.faq-item h3');

    faqItems.forEach(item => {
        item.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Kezdetben rejtve
    document.querySelectorAll('.faq-answer').forEach(answer => {
        answer.style.display = 'none';
    });
});
</script>
@endsection
