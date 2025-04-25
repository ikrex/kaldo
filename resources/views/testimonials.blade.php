<!-- resources/views/testimonials.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero szekció -->
    <section class="hero">
        <div class="container">
            <h1>Partnereink véleménye</h1>
            <p>Ismerje meg, mit mondanak azok, akik már használják a KalDo rendszert.</p>
        </div>
    </section>

    <!-- Vélemények szekció -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Elégedett partnereink</h2>
                <p>Több művelődési intézmény választotta már a KalDo rendszert. Íme néhány vélemény tőlük.</p>
            </div>

            <div class="testimonials-grid">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-image">
                            <img src="{{ asset('images/' . $testimonial['image']) }}" alt="{{ $testimonial['name'] }}">
                        </div>
                        <div class="testimonial-text">
                            <p>{{ $testimonial['text'] }}</p>
                        </div>
                        <div class="testimonial-author">
                            <h3>{{ $testimonial['name'] }}</h3>
                            <p>{{ $testimonial['position'] }}, {{ $testimonial['location'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Esettanulmányok -->
    {{-- <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Sikertörténetek</h2>
                <p>Fedezze fel, hogyan változott partnereink működése a KalDo bevezetése után.</p>
            </div>

            <div class="case-studies">
                <!-- Esettanulmány 1 -->
                <div class="case-study">
                    <div class="row">
                        <div class="col-6">
                            <div class="case-study-image">
                                <img src="{{ asset('images/case-study-1.jpg') }}" alt="Debreceni Művelődési Központ">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="case-study-content">
                                <h3>Debreceni Művelődési Központ</h3>
                                <p class="case-study-summary">A 12 helyszínen működő intézmény programszervezése és teremfoglalása jelentősen egyszerűsödött a KalDo bevezetésével.</p>
                                <div class="case-study-stats">
                                    <div class="stat">
                                        <div class="stat-value">40%</div>
                                        <div class="stat-label">Kevesebb adminisztráció</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-value">25%</div>
                                        <div class="stat-label">Több rendezvény</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-value">30%</div>
                                        <div class="stat-label">Hatékonyabb teremkihasználás</div>
                                    </div>
                                </div>
                                <a href="#" class="btn">Eset részletei</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Esettanulmány 2 -->
                <div class="case-study">
                    <div class="row">
                        <div class="col-6">
                            <div class="case-study-content">
                                <h3>Szegedi Agóra</h3>
                                <p class="case-study-summary">A komplex kulturális központ többféle tevékenységének összehangolása és a kommunikáció javítása volt a fő cél a KalDo bevezetésekor.</p>
                                <div class="case-study-stats">
                                    <div class="stat">
                                        <div class="stat-value">50%</div>
                                        <div class="stat-label">Gyorsabb információáramlás</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-value">35%</div>
                                        <div class="stat-label">Kevesebb ütközés</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-value">20%</div>
                                        <div class="stat-label">Növekedés a látogatók számában</div>
                                    </div>
                                </div>
                                <a href="#" class="btn">Eset részletei</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="case-study-image">
                                <img src="{{ asset('images/case-study-2.jpg') }}" alt="Szegedi Agóra">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Video vélemények -->
    {{-- <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Videó vélemények</h2>
                <p>Nézze meg partnereink beszámolóit a KalDo használatáról</p>
            </div>

            <div class="video-testimonials">
                <div class="row">
                    <!-- Videó 1 -->
                    <div class="col-4">
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <img src="{{ asset('images/video-thumbnail-1.jpg') }}" alt="Videó vélemény">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h3>Péter Zsolt, igazgató</h3>
                                <p>Petőfi Művelődési Központ, Győr</p>
                            </div>
                        </div>
                    </div>

                    <!-- Videó 2 -->
                    <div class="col-4">
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <img src="{{ asset('images/video-thumbnail-2.jpg') }}" alt="Videó vélemény">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h3>Nagy Katalin, programszervező</h3>
                                <p>Fővárosi Művelődési Ház, Budapest</p>
                            </div>
                        </div>
                    </div>

                    <!-- Videó 3 -->
                    <div class="col-4">
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <img src="{{ asset('images/video-thumbnail-3.jpg') }}" alt="Videó vélemény">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info">
                                <h3>Tóth József, vezető</h3>
                                <p>Városi Kulturális Központ, Miskolc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Partnerek logói -->
    {{-- <section class="section" style="background-color: #f2f7ff;">
        <div class="container">
            <div class="section-title">
                <h2>Partnereink</h2>
                <p>Büszkék vagyunk arra, hogy az ország számos kiváló kulturális intézménye használja a KalDo rendszert</p>
            </div>

            <div class="partners-logo">
                <div class="row">
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-1.png') }}" alt="Partner logó">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-2.png') }}" alt="Partner logó">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-3.png') }}" alt="Partner logó">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-4.png') }}" alt="Partner logó">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-5.png') }}" alt="Partner logó">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-6.png') }}" alt="Partner logó">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-7.png') }}" alt="Partner logó">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-8.png') }}" alt="Partner logó">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- CTA szekció -->
    <section class="cta">
        <div class="container">
            <h2>Csatlakozzon elégedett partnereinkhez</h2>
            <p>Próbálja ki a KalDo rendszert, és tapasztalja meg az előnyeit saját intézményében!</p>
            <div>
                <a href="{{ route('demo') }}" class="btn btn-white">Ingyenes demó</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Kapcsolat</a>
            </div>
        </div>
    </section>
@endsection

<!-- CSS a vélemények oldalhoz -->
<style>
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.testimonial-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    height: 100%;
    transition: transform 0.3s, box-shadow 0.3s;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.testimonial-content {
    padding: 30px;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.testimonial-image {
    text-align: center;
    margin-bottom: 20px;
}

.testimonial-image img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}

.testimonial-text {
    flex-grow: 1;
    font-style: italic;
    position: relative;
    padding: 0 15px;
}

.testimonial-text p {
    position: relative;
}

.testimonial-text p:before {
    content: '\201C';
    font-size: 60px;
    font-family: Georgia, serif;
    color: #0066cc;
    opacity: 0.3;
    position: absolute;
    left: -20px;
    top: -20px;
}

.testimonial-author {
    margin-top: 20px;
    text-align: center;
}

.testimonial-author h3 {
    margin-bottom: 5px;
    color: #0066cc;
}

.testimonial-author p {
    color: #666;
    font-size: 14px;
}

.case-study {
    margin-bottom: 60px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.case-study-image {
    height: 100%;
    overflow: hidden;
}

.case-study-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.case-study-content {
    padding: 30px;
}

.case-study-content h3 {
    font-size: 24px;
    color: #0066cc;
    margin-bottom: 15px;
}

.case-study-summary {
    margin-bottom: 20px;
    font-size: 16px;
    line-height: 1.6;
}

.case-study-stats {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.stat {
    text-align: center;
    padding: 15px;
    background-color: #f2f7ff;
    border-radius: 8px;
    flex: 1;
    margin: 0 5px;
}

.stat-value {
    font-size: 28px;
    font-weight: bold;
    color: #0066cc;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 14px;
    color: #666;
}

.video-testimonials {
    margin-top: 40px;
}

.video-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 30px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.video-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.video-thumbnail {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.video-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.video-card:hover .video-thumbnail img {
    transform: scale(1.05);
}

.play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background-color: rgba(0, 102, 204, 0.8);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    transition: background-color 0.3s;
}

.video-card:hover .play-button {
    background-color: #0066cc;
}

.video-info {
    padding: 20px;
}

.video-info h3 {
    margin-bottom: 5px;
}

.video-info p {
    color: #666;
    font-size: 14px;
}

.partners-logo {
    margin-top: 40px;
}

.partner-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100px;
    margin-bottom: 30px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.partner-logo:hover {
    transform: scale(1.05);
}

.partner-logo img {
    max-width: 100%;
    max-height: 100%;
    filter: grayscale(100%);
    opacity: 0.7;
    transition: filter 0.3s, opacity 0.3s;
}

.partner-logo:hover img {
    filter: grayscale(0);
    opacity: 1;
}

@media (max-width: 768px) {
    .testimonials-grid {
        grid-template-columns: 1fr;
    }

    .case-study-stats {
        flex-direction: column;
    }

    .stat {
        margin: 5px 0;
    }
}
</style>

<!-- JavaScript a videó lejátszáshoz -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoThumbnails = document.querySelectorAll('.video-thumbnail');

    videoThumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Valós rendszerben itt indulna a videó lejátszása
            alert('Videó lejátszása - demó funkcionalitás');
        });
    });
});
</script>
