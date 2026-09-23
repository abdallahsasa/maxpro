<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
    class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $metaTitle ?? (app()->getLocale() === 'fr' ? 'MAX PRO SOLS — Lancement Prochainement | Revêtements Professionnels' : (app()->getLocale() === 'ar' ? 'ماكس برو — قريباً جداً | حلول الأرضيات والتكسيات الجدارية' : 'MAX PRO SOLS — Coming Soon | Commercial Flooring & Walls')) }}
    </title>
    <meta name="description"
        content="{{ app()->getLocale() === 'fr' ? 'MAX PRO SOLS prépare sa nouvelle vitrine digitale. Spécialiste B2B des revêtements de sols et murs professionnels en Île-de-France.' : (app()->getLocale() === 'ar' ? 'ماكس برو تجهز منصتها الرقمية الجديدة. المتخصص المعتمد لحلول الأرضيات والتكسيات الجدارية في باريس وإيل دو فرانس.' : 'MAX PRO SOLS is preparing its new digital platform. B2B specialist in commercial flooring and wall coverings in Île-de-France.') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('favicon.png') }}">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <link rel="alternate" hreflang="{{ $localeCode }}"
            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
    @endforeach

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body[dir="rtl"] {
            font-family: 'Cairo', sans-serif;
        }

        .glow-radial-light {
            background: radial-gradient(circle at 50% 18%, rgba(230, 23, 31, 0.08) 0%, rgba(248, 250, 252, 0) 70%);
        }

        .pattern-grid-light {
            background-image: radial-gradient(rgba(15, 23, 42, 0.06) 1px, transparent 1px);
            background-size: 28px 28px;
        }
    </style>
</head>

<body
    class="bg-slate-50 text-slate-800 min-h-full flex flex-col justify-between selection:bg-red-600 selection:text-white relative overflow-x-hidden"
    x-data="{
          contactModalOpen: false,
          days: 14,
          hours: 8,
          minutes: 42,
          seconds: 19,
          initCountdown() {
              setInterval(() => {
                  if (this.seconds > 0) {
                      this.seconds--;
                  } else {
                      this.seconds = 59;
                      if (this.minutes > 0) {
                          this.minutes--;
                      } else {
                          this.minutes = 59;
                          if (this.hours > 0) {
                              this.hours--;
                          } else {
                              this.hours = 23;
                              if (this.days > 0) this.days--;
                          }
                      }
                  }
              }, 1000);
          }
      }" x-init="initCountdown()">

    <!-- Ambient Light Background Effects -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute inset-0 bg-cover bg-center opacity-[0.03] mix-blend-multiply"
            style="background-image: url('{{ asset('images/hero_flooring_paris.jpg') }}');"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-white via-slate-50 to-slate-100/80"></div>
        <div class="absolute inset-0 glow-radial-light"></div>
        <div class="absolute inset-0 pattern-grid-light opacity-60"></div>
    </div>

    <!-- Header / Navbar -->
    <header class="relative z-10 w-full border-b border-slate-200/80 bg-white/80 backdrop-blur-md shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <!-- Brand Logo -->
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('logo.png') }}" alt="MAX PRO SOLS"
                        class="h-10 sm:h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </a>
            </div>

            <!-- Right: Status Badge & Language Switcher -->
            <div class="flex items-center gap-3 sm:gap-6">
                <!-- Status Badge -->
                <div
                    class="hidden sm:flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>
                        {{ app()->getLocale() === 'fr' ? 'Chantiers Actifs en Île-de-France' : (app()->getLocale() === 'ar' ? 'عملياتنا جارية في إيل دو فرانس' : 'Active Sites in Île-de-France') }}
                    </span>
                </div>

                <!-- Language Selector -->
                <div class="flex items-center bg-slate-100 p-1 rounded-lg border border-slate-200 shadow-inner">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="px-2.5 py-1 text-xs font-bold rounded-md transition-all uppercase {{ app()->getLocale() === $localeCode ? 'bg-red-600 text-white shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-white/60' }}">
                            {{ $localeCode }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Hero Area -->
    <main class="relative z-10 flex-grow flex items-center py-12 sm:py-16 lg:py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto w-full text-center">

            <!-- Pill Label -->
            <div
                class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm font-semibold mb-8 shadow-xs">
                <span class="inline-block w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                <span>
                    {{ app()->getLocale() === 'fr' ? 'Plateforme Digitale B2B — En Cours de Finalisation' : (app()->getLocale() === 'ar' ? 'المنصة الرقمية للشركات — اللمسات الأخيرة' : 'B2B Digital Platform — Final Stage') }}
                </span>
            </div>

            <!-- Big Main Headline -->
            <h1
                class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-950 mb-6 leading-tight">
                @if(app()->getLocale() === 'fr')
                    L’Excellence des <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-rose-600 to-amber-600">Sols
                        & Murs</span> B2B Arrive.
                @elseif(app()->getLocale() === 'ar')
                    قمة الاحترافية في <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-rose-600 to-amber-600">الأرضيات
                        والتكسيات</span> قريباً.
                @else
                    Next-Level <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-rose-600 to-amber-600">Flooring
                        & Walls</span> Launching Soon.
                @endif
            </h1>

            <!-- Subtitle Description -->
            <p class="text-base sm:text-xl text-slate-600 max-w-3xl mx-auto mb-10 leading-relaxed font-normal">
                @if(app()->getLocale() === 'fr')
                    Nous préparons l'expérience digitale pour les architectes, maîtres d'ouvrage et professionnels du
                    bâtiment à Paris & en Île-de-France. Nos équipes opérationnelles restent 100% mobilisées pour vos
                    projets en cours.
                @elseif(app()->getLocale() === 'ar')
                    نستعد لإطلاق بوابتنا الرقمية المخصصة للمهندسين المعماريين وشركات التطوير والمقاولات في باريس وإيل دو
                    فرانس. فرقنا الميدانية تعمل بكامل طاقتها لتنفيذ مشاريعكم.
                @else
                    We are crafting an exceptional digital experience for architects, project managers, and general
                    contractors across Paris and Île-de-France. Our on-site teams remain fully mobilized for your ongoing
                    projects.
                @endif
            </p>

            <!-- Countdown Timer Card -->
            <div
                class="inline-grid grid-cols-4 gap-2 sm:gap-4 p-3 sm:p-5 rounded-2xl bg-white/90 border border-slate-200/90 shadow-xl shadow-slate-200/60 backdrop-blur-md mb-12 max-w-xl mx-auto w-full">
                <!-- Days -->
                <div
                    class="flex flex-col items-center justify-center p-3 rounded-xl bg-slate-50 border border-slate-100 shadow-2xs">
                    <span class="text-2xl sm:text-4xl font-black text-slate-900 tracking-wider"
                        x-text="String(days).padStart(2, '0')">14</span>
                    <span class="text-[10px] sm:text-xs text-slate-500 font-semibold uppercase mt-1">
                        {{ app()->getLocale() === 'fr' ? 'Jours' : (app()->getLocale() === 'ar' ? 'أيام' : 'Days') }}
                    </span>
                </div>
                <!-- Hours -->
                <div
                    class="flex flex-col items-center justify-center p-3 rounded-xl bg-slate-50 border border-slate-100 shadow-2xs">
                    <span class="text-2xl sm:text-4xl font-black text-slate-900 tracking-wider"
                        x-text="String(hours).padStart(2, '0')">08</span>
                    <span class="text-[10px] sm:text-xs text-slate-500 font-semibold uppercase mt-1">
                        {{ app()->getLocale() === 'fr' ? 'Heures' : (app()->getLocale() === 'ar' ? 'ساعات' : 'Hours') }}
                    </span>
                </div>
                <!-- Minutes -->
                <div
                    class="flex flex-col items-center justify-center p-3 rounded-xl bg-slate-50 border border-slate-100 shadow-2xs">
                    <span class="text-2xl sm:text-4xl font-black text-slate-900 tracking-wider"
                        x-text="String(minutes).padStart(2, '0')">42</span>
                    <span class="text-[10px] sm:text-xs text-slate-500 font-semibold uppercase mt-1">
                        {{ app()->getLocale() === 'fr' ? 'Minutes' : (app()->getLocale() === 'ar' ? 'دقائق' : 'Minutes') }}
                    </span>
                </div>
                <!-- Seconds -->
                <div
                    class="flex flex-col items-center justify-center p-3 rounded-xl bg-slate-50 border border-slate-100 shadow-2xs">
                    <span class="text-2xl sm:text-4xl font-black text-red-600 tracking-wider"
                        x-text="String(seconds).padStart(2, '0')">19</span>
                    <span class="text-[10px] sm:text-xs text-slate-500 font-semibold uppercase mt-1">
                        {{ app()->getLocale() === 'fr' ? 'Secondes' : (app()->getLocale() === 'ar' ? 'ثواني' : 'Seconds') }}
                    </span>
                </div>
            </div>

            <!-- Call to Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                <!-- Open Direct Inquiry Modal -->
                <button type="button" @click="contactModalOpen = true"
                    class="w-full sm:w-auto px-8 py-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-sm tracking-wide shadow-lg shadow-red-600/25 hover:shadow-red-600/40 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center justify-center gap-2.5">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span>
                        {{ app()->getLocale() === 'fr' ? 'Contact Direct & Devis Express' : (app()->getLocale() === 'ar' ? 'تواصل مباشر وطلب عرض أسعار' : 'Direct Inquiry & Fast Quote') }}
                    </span>
                </button>

                <!-- Direct Email -->
                <a href="mailto:info@maxprosols.fr"
                    class="w-full sm:w-auto px-8 py-4 rounded-xl bg-white hover:bg-slate-100 text-slate-800 font-semibold text-sm border border-slate-200 shadow-sm transition-all duration-300 flex items-center justify-center gap-2.5">
                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>info@maxprosols.fr</span>
                </a>
            </div>

            <!-- Core Pillars: 5 Specialties (Light Clean Cards) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5 text-left"
                dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

                <!-- 01 — Carrelage & Faïence -->
                <div
                    class="p-4 rounded-xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md hover:border-red-400 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-red-50 border border-red-100 flex items-center justify-center text-red-600 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-slate-400">01</span>
                        </div>
                        <h3 class="font-bold text-xs text-slate-900 mb-1 group-hover:text-red-600 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Carrelage & Faïence' : (app()->getLocale() === 'ar' ? 'السيراميك والبورسلين' : 'Tiling & Earthenware') }}
                        </h3>
                        <p class="text-[11px] text-slate-600 leading-snug">
                            {{ app()->getLocale() === 'fr' ? 'Pose de carrelage et faïence, grands formats, grès cérame et revêtements muraux pour projets résidentiels, tertiaires et commerciaux.' : (app()->getLocale() === 'ar' ? 'تركيب السيراميك والبورسلين والقياسات الكبيرة، والجرانيت والتكسيات الجدارية للمشاريع السكنية والإدارية والتجارية.' : 'Installation of tiles and earthenware, large formats, porcelain stoneware, and wall coverings for residential, commercial, and tertiary projects.') }}
                        </p>
                    </div>
                </div>

                <!-- 02 — Parquet -->
                <div
                    class="p-4 rounded-xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md hover:border-amber-400 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-slate-400">02</span>
                        </div>
                        <h3 class="font-bold text-xs text-slate-900 mb-1 group-hover:text-amber-700 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Parquet' : (app()->getLocale() === 'ar' ? 'الباركيه والأرضيات الخشبية' : 'Parquet Flooring') }}
                        </h3>
                        <p class="text-[11px] text-slate-600 leading-snug">
                            {{ app()->getLocale() === 'fr' ? 'Pose de parquets massifs, contrecollés et stratifiés : pose droite, bâton rompu, point de Hongrie et finitions.' : (app()->getLocale() === 'ar' ? 'تركيب الباركيه الطبيعي والمصفح وشبه الطبيعي: تركيب طولي، نقشة عظم السمكة، نقطة هنغاريا والتشطيبات الفاخرة.' : 'Installation of solid, engineered, and laminate parquet: straight lay, herringbone, chevron (point de Hongrie), and high-end finishes.') }}
                        </p>
                    </div>
                </div>

                <!-- 03 — Sols Souples -->
                <div
                    class="p-4 rounded-xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md hover:border-sky-400 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-sky-50 border border-sky-100 flex items-center justify-center text-sky-600 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-slate-400">03</span>
                        </div>
                        <h3 class="font-bold text-xs text-slate-900 mb-1 group-hover:text-sky-700 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Sols Souples' : (app()->getLocale() === 'ar' ? 'الأرضيات المرنة (PVC & LVT)' : 'Resilient Flooring') }}
                        </h3>
                        <p class="text-[11px] text-slate-600 leading-snug">
                            {{ app()->getLocale() === 'fr' ? 'PVC, LVT, linoléum, moquette et solutions acoustiques adaptées aux logements, bureaux, commerces et établissements recevant du public.' : (app()->getLocale() === 'ar' ? 'أرضيات PVC، LVT، لينوليوم، موكيت والحلول الصوتية المصممة للمباني السكنية، المكاتب، المتاجر والمرافق العامة.' : 'PVC, LVT, linoleum, carpet tiles, and acoustic solutions tailored for housing, offices, retail, and public buildings (ERP).') }}
                        </p>
                    </div>
                </div>

                <!-- 04 — Résine -->
                <div
                    class="p-4 rounded-xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md hover:border-emerald-400 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-slate-400">04</span>
                        </div>
                        <h3
                            class="font-bold text-xs text-slate-900 mb-1 group-hover:text-emerald-700 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Résine' : (app()->getLocale() === 'ar' ? 'أرضيات الراتنج والإيبوكسي' : 'Resin Flooring') }}
                        </h3>
                        <p class="text-[11px] text-slate-600 leading-snug">
                            {{ app()->getLocale() === 'fr' ? 'Systèmes de sols en résine époxy et polyuréthane adaptés aux contraintes techniques, esthétiques et d’exploitation.' : (app()->getLocale() === 'ar' ? 'أنظمة أرضيات الراتنج والإيبوكسي والبولي يوريثان المصممة لتحمل الضغوط الفنية والجمالية وظروف التشغيل القاسية.' : 'Epoxy and polyurethane resin floor systems engineered for technical performance, aesthetic demands, and heavy-duty operation.') }}
                        </p>
                    </div>
                </div>

                <!-- 05 — Chape & Ragréage -->
                <div
                    class="p-4 rounded-xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md hover:border-purple-400 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div
                                class="w-9 h-9 rounded-lg bg-purple-50 border border-purple-100 flex items-center justify-center text-purple-600 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-slate-400">05</span>
                        </div>
                        <h3 class="font-bold text-xs text-slate-900 mb-1 group-hover:text-purple-700 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Chape & Ragréage' : (app()->getLocale() === 'ar' ? 'اللياسة والتسوية الذاتية' : 'Screed & Leveling') }}
                        </h3>
                        <p class="text-[11px] text-slate-600 leading-snug">
                            {{ app()->getLocale() === 'fr' ? 'Réalisation de chapes, ragréages et travaux de remise à niveau avant pose des revêtements.' : (app()->getLocale() === 'ar' ? 'تنفيذ الصبات واللياسة والتسوية الذاتية ومعالجة وتسوية الأسطح قبل تركيب التكسيات والأرضيات.' : 'Execution of screeds, self-leveling compounds, and surface leveling prior to coverings installation.') }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 w-full border-t border-slate-200 bg-white/80 backdrop-blur-md py-6">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <!-- Left: Legal Info -->
            <div class="flex items-center flex-wrap justify-center sm:justify-start gap-3">
                <span class="font-semibold text-slate-800">MAX PRO SOLS SAS</span>
                <span class="text-slate-300">|</span>
                <span>81 Rue de Silly, 92100 Boulogne-Billancourt</span>
                <span class="text-slate-300">|</span>
                <span>SIREN : 849 537 394</span>
            </div>

            <!-- Right: Admin Access Link -->
            <div class="flex items-center gap-4">
                <a href="{{ url('/admin') }}"
                    class="inline-flex items-center gap-1.5 text-slate-500 hover:text-red-600 transition-colors font-medium text-[11px] py-1 px-2.5 rounded-md hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>{{ app()->getLocale() === 'fr' ? 'Espace Administrateur' : (app()->getLocale() === 'ar' ? 'بوابة الإدارة' : 'Admin Login') }}</span>
                </a>
            </div>
        </div>
    </footer>

    <!-- Contact & Express Quote Modal -->
    <div x-cloak x-show="contactModalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
            <!-- Backdrop -->
            <div x-show="contactModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" @click="contactModalOpen = false"
                class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs transition-opacity"></div>

            <!-- Modal Panel -->
            <div x-show="contactModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative bg-white border border-slate-200 rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full p-6 sm:p-8 text-slate-800"
                dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

                <!-- Close Button -->
                <button type="button" @click="contactModalOpen = false"
                    class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 transition-colors p-1 rounded-lg hover:bg-slate-100">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="mb-6">
                    <h3 class="text-xl font-bold text-slate-950 mb-1.5">
                        {{ app()->getLocale() === 'fr' ? 'Demande Urgente ou Devis B2B' : (app()->getLocale() === 'ar' ? 'طلب عرض أسعار أو استفسار مباشر' : 'Urgent Inquiry or Quote Request') }}
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        {{ app()->getLocale() === 'fr' ? 'Remplissez ce formulaire express pour joindre directement la direction de MAX PRO SOLS.' : (app()->getLocale() === 'ar' ? 'املأ هذا النموذج السريع للتواصل مباشرة مع إدارة ماكس برو.' : 'Fill out this express form to reach MAX PRO SOLS management directly.') }}
                    </p>
                </div>

                @if(session('success'))
                    <div
                        class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Contact Form -->
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            {{ app()->getLocale() === 'fr' ? 'Nom et Prénom *' : (app()->getLocale() === 'ar' ? 'الاسم الكامل *' : 'Full Name *') }}
                        </label>
                        <input type="text" name="name" required
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-sm focus:outline-none focus:bg-white focus:border-red-600 transition-colors">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">
                                {{ app()->getLocale() === 'fr' ? 'Société / Organisation *' : (app()->getLocale() === 'ar' ? 'الشركة أو المؤسسة *' : 'Company *') }}
                            </label>
                            <input type="text" name="company" required
                                class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-sm focus:outline-none focus:bg-white focus:border-red-600 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">
                                {{ app()->getLocale() === 'fr' ? 'Téléphone' : (app()->getLocale() === 'ar' ? 'رقم الهاتف' : 'Phone') }}
                            </label>
                            <input type="text" name="phone"
                                class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-sm focus:outline-none focus:bg-white focus:border-red-600 transition-colors">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            {{ app()->getLocale() === 'fr' ? 'Email Professionnel *' : (app()->getLocale() === 'ar' ? 'البريد الإلكتروني للعمل *' : 'Business Email *') }}
                        </label>
                        <input type="email" name="email" required
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-sm focus:outline-none focus:bg-white focus:border-red-600 transition-colors">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            {{ app()->getLocale() === 'fr' ? 'Objet du Projet *' : (app()->getLocale() === 'ar' ? 'موضوع المشروع *' : 'Subject *') }}
                        </label>
                        <input type="text" name="subject" required
                            placeholder="{{ app()->getLocale() === 'fr' ? 'Ex: Carrelage, Parquet, Résine...' : 'Ex: Carrelage, Parquet...' }}"
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-sm focus:outline-none focus:bg-white focus:border-red-600 transition-colors">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">
                            {{ app()->getLocale() === 'fr' ? 'Détails de la demande *' : (app()->getLocale() === 'ar' ? 'تفاصيل الطلب *' : 'Message *') }}
                        </label>
                        <textarea name="message" rows="3" required
                            class="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-900 text-sm focus:outline-none focus:bg-white focus:border-red-600 transition-colors"></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-3.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-sm shadow-md shadow-red-600/20 transition-all">
                            {{ app()->getLocale() === 'fr' ? 'Envoyer la demande' : (app()->getLocale() === 'ar' ? 'إرسال الطلب الآن' : 'Send Request') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>