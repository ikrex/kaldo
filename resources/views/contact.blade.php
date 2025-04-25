<!-- resources/views/contact.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero szekció -->
    <section class="hero">
        <div class="container">
            <h1>Kapcsolat</h1>
            <p>Vegye fel velünk a kapcsolatot, ha kérdése van a KalDo rendszerről vagy segítségre van szüksége.</p>
        </div>
    </section>

    <!-- Kapcsolati űrlap és adatok -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Kapcsolati űrlap</h2>
                    <p>Küldjön nekünk üzenetet, és kollégáink hamarosan válaszolnak.</p>

                    @if(session('success'))
                        <div class="alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.process') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Név *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
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
                            <label for="phone">Telefonszám</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject">Tárgy *</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Üzenet *</label>
                            <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn">Üzenet küldése</button>
                    </form>
                </div>
                <div class="col-6">
                    <h2>Elérhetőségeink</h2>
                    <p>Az alábbi elérhetőségeken is felveheti velünk a kapcsolatot:</p>

                    <div class="contact-info">

                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h3>Telefon</h3>
                                <p>+36 70 244 9102</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h3>E-mail</h3>
                                <p>info@kaldo.hu</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- GYIK -->
    <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Gyakran Ismételt Kérdések</h2>
                <p>Az alábbiakban összegyűjtöttük a leggyakrabban felmerülő kérdéseket.</p>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <h3>Milyen méretű intézményeknek ajánlott a KalDo rendszer?</h3>
                    <div class="faq-answer">
                        <p>A KalDo rendszer rugalmas és skálázható, így mind a kisebb művelődési házak, mind a nagyobb kulturális központok számára ideális megoldást nyújt. A rendszer moduláris felépítésének köszönhetően az intézmény méretétől és igényeitől függően testreszabható, így mindenki azt a csomagot választhatja, amely leginkább megfelel az elvárásainak.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Mennyire bonyolult a rendszer bevezetése és használata?</h3>
                    <div class="faq-answer">
                        <p>A KalDo felhasználói felületét úgy terveztük, hogy intuitív és könnyen kezelhető legyen. A rendszer bevezetése során átfogó oktatást biztosítunk a teljes csapat számára, valamint részletes dokumentációt és videótutorialokat is elérhetővé teszünk. Ezen felül, dedikált ügyfélszolgálatunk mindig rendelkezésre áll, ha bármilyen kérdés vagy probléma merülne fel a használat során.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Hogyan integálható a KalDo a már meglévő rendszereinkkel?</h3>
                    <div class="faq-answer">
                        <p>A KalDo nyílt API-val rendelkezik, amely lehetővé teszi az integrációt a legtöbb meglévő rendszerrel, például könyvelési szoftverekkel, CRM rendszerekkel, vagy weboldallal. Szakértőink segítenek az integráció megtervezésében és kivitelezésében, hogy a lehető legzökkenőmentesebb legyen az átállás és az adatok szinkronizálása.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <h3>Van lehetőség a rendszer kipróbálására vásárlás előtt?</h3>
                    <div class="faq-answer">
                        <p>Természetesen! Kínálunk 30 napos ingyenes próbaverziót, amely tartalmazza a rendszer összes funkcióját. Ezen felül, igény esetén személyes demót is tartunk, ahol szakértőink bemutatják a rendszer működését, és válaszolnak az összes felmerülő kérdésre. A próbaverzió igényléséhez látogass el a "Demó" oldalunkra, vagy vedd fel velünk a kapcsolatot közvetlenül.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA szekció -->
    <section class="cta">
        <div class="container">
            <h2>Kérdése van? Segítünk!</h2>
            <p>Hívjon minket vagy kérjen visszahívást, és szakértőink válaszolnak minden kérdésére.</p>
            <div>
                <a href="tel:+3612345678" class="btn btn-white">Hívás most</a>
                <a href="{{ route('demo') }}" class="btn btn-outline">Demó igénylése</a>
            </div>
        </div>
    </section>
@endsection

<!-- CSS a kapcsolat oldalhoz -->
<style>
.contact-form {
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

.contact-info {
    margin-top: 30px;
}

.contact-item {
    display: flex;
    margin-bottom: 20px;
}

.contact-item i {
    font-size: 24px;
    color: #0066cc;
    margin-right: 20px;
    margin-top: 5px;
}

.contact-item h3 {
    margin-bottom: 5px;
    font-size: 18px;
}

.map-placeholder {
    margin-top: 30px;
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

<!-- JavaScript a GYIK lenyitásához -->
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
</script>
