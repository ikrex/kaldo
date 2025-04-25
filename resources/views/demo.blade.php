<!-- resources/views/demo.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero szekció -->
    <section class="hero">
        <div class="container">
            <h1>Ingyenes demó</h1>
            <p>Próbálja ki a KalDo rendszert 30 napig teljesen ingyenesen, minden funkcióval!</p>
        </div>
    </section>

    <!-- Demo szekció -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Miért próbálja ki a KalDo rendszert?</h2>
                    <p>A 30 napos ingyenes próbaverzió segítségével:</p>
                    <ul class="feature-list">
                        <li>Megismerheti a rendszer összes funkcióját</li>
                        <li>Tesztelheti, hogyan illeszkedik az intézménye munkafolyamataiba</li>
                        <li>Munkatársai is megtapasztalhatják az egyszerű kezelhetőséget</li>
                        <li>Személyre szabott segítséget kap a beállításokhoz</li>
                        <li>Szakértőink támogatják a tesztelés teljes időtartama alatt</li>
                        <li>Nincs semmilyen kötelezettség a próbaidőszak után</li>
                    </ul>
                    <div class="demo-steps">
                        <h3>A demó igénylésének lépései:</h3>
                        <ol>
                            <li>Töltse ki az űrlapot a szükséges adatokkal</li>
                            <li>Kollégánk 24 órán belül felveszi Önnel a kapcsolatot</li>
                            <li>Egyeztetjük az igényeit és beállítjuk a rendszert</li>
                            <li>Rövid oktatást tartunk a használatról</li>
                            <li>Kezdheti a tesztelést valós környezetben</li>
                        </ol>
                    </div>
                </div>
                <div class="col-6">
                    <div class="demo-form-container">
                        <h2>Igényeljen ingyenes demót</h2>
                        <p>Töltse ki az alábbi űrlapot, és hamarosan felvesszük Önnel a kapcsolatot.</p>

                        @if(session('success'))
                            <div class="alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('demo.process') }}" method="POST" class="demo-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Név *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="position">Beosztás *</label>
                                <input type="text" id="position" name="position" value="{{ old('position') }}" required>
                                @error('position')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="institution">Intézmény neve *</label>
                                <input type="text" id="institution" name="institution" value="{{ old('institution') }}" required>
                                @error('institution')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail cím *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Telefonszám *</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="employees">Alkalmazottak száma *</label>
                                <input type="number" id="employees" name="employees" value="{{ old('employees') }}" min="1" required>
                                @error('employees')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message">Különleges igények vagy kérdések</label>
                                <textarea id="message" name="message" rows="4">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group checkbox-group">
                                <input type="checkbox" id="agree_terms" name="agree_terms" required>
                                <label for="agree_terms">Elfogadom az <a href="{{ route('terms') }}" target="_blank">adatkezelési feltételeket</a> *</label>
                                @error('agree_terms')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn">Demó igénylése</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Referenciák -->
    <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Partnereink véleménye</h2>
                <p>Ők már kipróbálták a KalDo rendszert, és elégedettek az eredménnyel</p>
            </div>

            <div class="row">
                <!-- Referencia 1 -->
                <div class="col-4">
                    <div class="testimonial">
                        <div class="testimonial-image">
                            <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Nagy Eszter">
                        </div>
                        <div class="testimonial-text">
                            "A demó verzió annyira meggyőző volt, hogy már a próbaidőszak felénél eldöntöttük: szeretnénk hosszú távon használni a KalDo rendszert. A bevezetés zökkenőmentes volt, és a támogatás is kiváló."
                        </div>
                        <div class="testimonial-author">Nagy Eszter</div>
                        <div class="testimonial-position">Művelődési Központ Igazgató, Budapest</div>
                    </div>
                </div>

                <!-- Referencia 2 -->
                <div class="col-4">
                    <div class="testimonial">
                        <div class="testimonial-image">
                            <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Kovács Péter">
                        </div>
                        <div class="testimonial-text">
                            "Eleinte szkeptikusak voltunk, de a demó időszak alatt a kollégák annyira megszerették a rendszert, hogy már nem tudnánk nélküle dolgozni. Különösen a teremfoglalási funkciót és az automatikus értesítéseket használjuk napi szinten."
                        </div>
                        <div class="testimonial-author">Kovács Péter</div>
                        <div class="testimonial-position">Kulturális Központ Vezető, Debrecen</div>
                    </div>
                </div>

                <!-- Referencia 3 -->
                <div class="col-4">
                    <div class="testimonial">
                        <div class="testimonial-image">
                            <img src="{{ asset('images/testimonial-4.jpg') }}" alt="Tóth Balázs">
                        </div>
                        <div class="testimonial-text">
                            "A KalDo demó során a fejlesztők még egyedi igényeinket is figyelembe vették, és segítettek a rendszert teljesen a mi munkafolyamatainkhoz igazítani. Az átállás gyors és problémamentes volt."
                        </div>
                        <div class="testimonial-author">Tóth Balázs</div>
                        <div class="testimonial-position">Közösségi Ház Vezető, Pécs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GYIK -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Gyakran Ismételt Kérdések a demóval kapcsolatban</h2>
                <p>Az alábbi kérdések és válaszok segítenek a demó igénylésével kapcsolatban</p>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <h3>Milyen hosszú a próbaidőszak?</h3>
                    <div class="faq-answer">
                        <p>A standard próbaidőszak 30 nap, amely minden funkciót tartalmaz. Indokolt esetben, egyedi megállapodás alapján ez meghosszabbítható.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Milyen adatok szükségesek a demó elindításához?</h3>
                    <div class="faq-answer">
                        <p>A demó elindításához minimálisan szükséges adatok: intézmény neve, kapcsolattartó adatai, tervezett felhasználók száma. A rendszer testreszabásához további információkat kérhetünk a munkafolyamatokról és igényekről.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Valós adatokkal tesztelhetem a rendszert?</h3>
                    <div class="faq-answer">
                        <p>Igen, a próbaidőszak alatt a saját, valós adataival dolgozhat a rendszerben. A próbaidőszak végén, ha nem kívánja folytatni, az adatokat biztonságosan töröljük.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Kapunk oktatást a demó használatához?</h3>
                    <div class="faq-answer">
                        <p>Természetesen! A próbaidőszak kezdetén ingyenes online oktatást biztosítunk, ahol bemutatjuk a rendszer funkcióit és használatát. Ezen felül részletes dokumentációt és oktatóvideókat is elérhetővé teszünk.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA szekció -->
    <section class="cta">
        <div class="container">
            <h2>Készen áll a hatékonyabb működésre?</h2>
            <p>Próbálja ki a KalDo rendszert most, és tapasztalja meg a különbséget!</p>
            <div>
                <a href="#" onclick="scrollToForm(); return false;" class="btn btn-white">Demó igénylése</a>
            </div>
        </div>
    </section>
@endsection

<!-- CSS a demó oldalhoz -->
<style>
.demo-form-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

.demo-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.checkbox-group {
    display: flex;
    align-items: center;
}

.checkbox-group input {
    width: auto;
    margin-right: 10px;
}

.checkbox-group label {
    margin-bottom: 0;
}

.error-message {
    color: #d9534f;
    font-size: 14px;
    margin-top: 5px;
}

.alert-success {
    background-color: #dff0d8;
    color: #3c763d;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.demo-steps {
    margin-top: 30px;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
}

.demo-steps h3 {
    margin-bottom: 15px;
}

.demo-steps ol {
    padding-left: 20px;
}

.demo-steps li {
    margin-bottom: 10px;
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

<!-- JavaScript a GYIK lenyitásához és az űrlaphoz görgetéshez -->
<script>
document.addEventListener('DOMContentLoaded', function() {
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

function scrollToForm() {
    const form = document.querySelector('.demo-form-container');
    form.scrollIntoView({ behavior: 'smooth' });
}
</script>
