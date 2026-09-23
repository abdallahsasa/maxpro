<x-layouts.app>
    <x-slot:title>
        {{ app()->getLocale() === 'fr' 
            ? 'MAX PRO SOLS | Revêtements de Sols & Murs Professionnels Paris & Île-de-France' 
            : (app()->getLocale() === 'ar' 
                ? 'ماكس برو | حلول الأرضيات والتكسيات الجدارية للمشاريع الكبرى في باريس' 
                : 'MAX PRO SOLS | Commercial Flooring & Wall Coverings Paris & Île-de-France') }}
    </x-slot:title>
    
    <x-slot:description>
        {{ app()->getLocale() === 'fr' 
            ? 'Entreprise spécialisée dans les revêtements de sols et murs B2B en Île-de-France : carrelage grands formats, parquets nobles, sols souples, résines industrielles et chapes fluides. Normes DTU, garantie décennale.' 
            : (app()->getLocale() === 'ar' 
                ? 'شركة متخصصة في تكسيات وأرضيات المشاريع الكبرى في باريس وإيل دو فرانس: البورسلين، الباركيه، الأرضيات المرنة، الإيبوكسي واللياسة الذاتية. ضمان عشري 10 سنوات.' 
                : 'Specialist commercial contractor for floor and wall coverings across Paris region: large-format tiles, chevron parquet, resilient flooring, industrial resin, and self-leveling screeds.') }}
    </x-slot:description>

    <!-- ==========================================
         1. HERO SECTION: LUXURY ARCHITECTURAL LIGHT
         ========================================== -->
    <section class="relative min-h-[92vh] flex items-center justify-center overflow-hidden bg-slate-900 text-white">
        <!-- Background Architectural Image with Cinematic Blend -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero_flooring_paris.jpg') }}" 
                 alt="MAX PRO SOLS Réalisation de Prestige Paris"
                 class="w-full h-full object-cover object-center transform scale-105 transition-transform duration-1000 opacity-40">
            <!-- Multi-layer Gradient Overlays for Architectural Depth -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-slate-950/70"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/60"></div>
            <div class="absolute inset-0 bg-grid-white opacity-20 pointer-events-none"></div>
            <div class="absolute -top-40 -left-40 w-96 h-96 bg-red-600/20 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                
                <!-- Left Column: Value Proposition & CTAs (7 cols) -->
                <div class="lg:col-span-7 space-y-8">
                    <!-- Pill Badge -->
                    <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white/10 border border-white/15 backdrop-blur-md shadow-sm">
                        <span class="flex h-2.5 w-2.5 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-600"></span>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-200">
                            {{ app()->getLocale() === 'fr' 
                                ? 'Spécialiste Revêtements Sols & Murs • Paris & Île-de-France' 
                                : (app()->getLocale() === 'ar' 
                                    ? 'متخصصون معتمدون في تكسيات الأرضيات والجدران • باريس' 
                                    : 'Specialist in Floor & Wall Coverings • Paris & Region') }}
                        </span>
                    </div>

                    <!-- Main H1 Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.12]">
                        @if(app()->getLocale() === 'fr')
                            L'Excellence Technique <br>
                            <span class="text-slate-300">du Sol au Mur pour</span> <br>
                            <span class="bg-gradient-to-r from-red-500 via-red-400 to-rose-400 bg-clip-text text-transparent">les Professionnels.</span>
                        @elseif(app()->getLocale() === 'ar')
                            التميز الفني والهندسي <br>
                            <span class="text-slate-300">في تكسيات الأرضيات والجدران</span> <br>
                            <span class="bg-gradient-to-r from-red-500 via-red-400 to-rose-400 bg-clip-text text-transparent">للمشاريع الكبرى والشركات.</span>
                        @else
                            Technical Excellence <br>
                            <span class="text-slate-300">from Floor to Wall for</span> <br>
                            <span class="bg-gradient-to-r from-red-500 via-red-400 to-rose-400 bg-clip-text text-transparent">Building Professionals.</span>
                        @endif
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg sm:text-xl text-slate-300 max-w-2xl leading-relaxed font-normal">
                        @if(app()->getLocale() === 'fr')
                            Partenaire de référence des maîtres d’ouvrage, promoteurs, architectes et entreprises générales. Carrelage grand format, parquets nobles, sols résine et chapes fluides exécutés dans le respect strict des normes DTU.
                        @elseif(app()->getLocale() === 'ar')
                            الشريك المعتمد لأصحاب المشاريع، المطورين العقاريين، المهندسين المعماريين وشركات المقاولات العامة في باريس. تنفيذ هندسي متكامل يطابق المعايير الفرنسية الصارمة.
                        @else
                            Trusted B2B partner for contractors, developers, and architects across Greater Paris. Certified large-format tile, engineered chevron oak, industrial resin, and acoustic resilient flooring.
                        @endif
                    </p>

                    <!-- Dual Action CTAs -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-2">
                        <a href="{{ route('quote') }}"
                           class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl text-white font-bold text-base bg-gradient-to-r from-red-600 via-red-600 to-red-700 hover:from-red-500 hover:to-red-600 shadow-xl shadow-red-600/30 hover:shadow-red-600/50 transition-all transform hover:-translate-y-0.5 border border-red-500/40">
                            <span>{{ app()->getLocale() === 'fr' ? 'Demander un Devis Express (24/48h)' : (app()->getLocale() === 'ar' ? 'طلب عرض سعر فوري (24/48 س)' : 'Request Fast Quote (24/48h)') }}</span>
                            <svg class="w-5 h-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="{{ route('projects.index') }}"
                           class="inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-xl text-white font-semibold text-base bg-white/10 hover:bg-white/15 border border-white/20 backdrop-blur-md transition-all">
                            <svg class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>{{ app()->getLocale() === 'fr' ? 'Explorer nos Réalisations' : (app()->getLocale() === 'ar' ? 'استعراض المشاريع المنجزة' : 'Explore Flagship Projects') }}</span>
                        </a>
                    </div>

                    <!-- Trust Strip -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-6 border-t border-white/10 text-xs text-slate-300 font-medium">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Normes DTU & CSTB</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Garantie Décennale</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Interlocuteur Dédié</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Chiffrage sous 24/48h</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Interactive Architectural Card Deck (5 cols) -->
                <div class="lg:col-span-5 hidden lg:block">
                    <div class="relative">
                        <!-- Floating Glass Glow -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-amber-500 rounded-3xl blur-xl opacity-30"></div>

                        <!-- Technical Specification Showcase Card -->
                        <div class="relative rounded-3xl bg-slate-900/90 border border-white/15 p-6 backdrop-blur-xl shadow-2xl space-y-6">
                            <!-- Card Header -->
                            <div class="flex items-center justify-between border-b border-white/10 pb-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-3 h-3 rounded-full bg-red-500"></span>
                                    <span class="text-xs font-mono font-bold tracking-widest uppercase text-slate-300">
                                        MAX PRO SOLS • SAS
                                    </span>
                                </div>
                                <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-[10px] font-bold uppercase tracking-wider">
                                    DTU Certifié
                                </span>
                            </div>

                            <!-- Showcase Real Estate -->
                            <div class="relative rounded-2xl overflow-hidden h-52 group">
                                <img src="{{ asset('images/project_luxury_boutique.jpg') }}" 
                                     alt="Showcase réalisation" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4 flex justify-between items-end">
                                    <div>
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-red-400 block mb-0.5">
                                            Chantier Référent IDF
                                        </span>
                                        <h4 class="text-sm font-bold text-white">Boutique de Luxe & Espaces Tertiaires</h4>
                                    </div>
                                    <span class="text-xs font-mono font-bold text-slate-300 bg-black/50 px-2 py-1 rounded backdrop-blur border border-white/10">
                                        Paris 8e
                                    </span>
                                </div>
                            </div>

                            <!-- 5 Pillars Live Spec Indicator -->
                            <div class="space-y-2">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 flex justify-between">
                                    <span>{{ app()->getLocale() === 'fr' ? 'Nos 5 Spécialités Clés' : (app()->getLocale() === 'ar' ? 'الاختصاصات الخمسة المعتمدة' : 'Our 5 Core Capabilities') }}</span>
                                    <span class="text-red-400 font-mono">01 — 05</span>
                                </div>
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <a href="{{ route('services.index') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-colors flex items-center justify-between group">
                                        <span class="font-medium text-slate-200 group-hover:text-red-400 transition-colors">01 Carrelage & Faïence</span>
                                        <span class="text-slate-500 group-hover:text-white">&rarr;</span>
                                    </a>
                                    <a href="{{ route('services.index') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-colors flex items-center justify-between group">
                                        <span class="font-medium text-slate-200 group-hover:text-red-400 transition-colors">02 Parquet Noble</span>
                                        <span class="text-slate-500 group-hover:text-white">&rarr;</span>
                                    </a>
                                    <a href="{{ route('services.index') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-colors flex items-center justify-between group">
                                        <span class="font-medium text-slate-200 group-hover:text-red-400 transition-colors">03 Sols Souples & LVT</span>
                                        <span class="text-slate-500 group-hover:text-white">&rarr;</span>
                                    </a>
                                    <a href="{{ route('services.index') }}" class="p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-colors flex items-center justify-between group">
                                        <span class="font-medium text-slate-200 group-hover:text-red-400 transition-colors">04 Résine Époxy / PU</span>
                                        <span class="text-slate-500 group-hover:text-white">&rarr;</span>
                                    </a>
                                </div>
                                <a href="{{ route('services.index') }}" class="w-full p-2.5 rounded-xl bg-red-600/20 hover:bg-red-600/30 border border-red-500/30 transition-colors flex items-center justify-between group text-xs">
                                    <span class="font-semibold text-red-300">05 Chape Fluide & Ragréage Technique</span>
                                    <span class="text-red-400 group-hover:translate-x-1 transition-transform">&rarr;</span>
                                </a>
                            </div>

                            <!-- Footer Trust Badges Inside Card -->
                            <div class="pt-3 border-t border-white/10 flex items-center justify-between text-[11px] text-slate-400">
                                <span>SIREN : 849 537 394</span>
                                <span class="text-emerald-400 font-semibold flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    Assuré Décennale SMABTP
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==========================================
         2. DYNAMIC KEY METRICS & IMPACT BAR
         ========================================== -->
    <section class="relative z-20 bg-slate-950 border-y border-white/10 py-10 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                @if(isset($statistics) && $statistics->count() > 0)
                    @foreach($statistics as $stat)
                        <div class="flex items-center gap-4 group p-4 rounded-2xl bg-white/5 border border-white/5 hover:border-red-500/40 hover:bg-white/10 transition-all duration-300">
                            <div class="w-12 h-12 rounded-xl bg-red-600/20 border border-red-500/30 flex items-center justify-center text-red-400 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 flex-shrink-0 shadow-sm">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight font-mono">
                                    {{ $stat->value }}
                                </div>
                                <div class="text-xs font-medium text-slate-400 line-clamp-1">
                                    {{ $stat->getTranslation('label', app()->getLocale()) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/5">
                        <div class="text-3xl font-extrabold text-white font-mono">150 000+</div>
                        <div class="text-xs text-slate-400 font-medium">m² Sols & Murs Posés</div>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/5">
                        <div class="text-3xl font-extrabold text-white font-mono">500+</div>
                        <div class="text-xs text-slate-400 font-medium">Chantiers B2B Livrés</div>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/5">
                        <div class="text-3xl font-extrabold text-white font-mono">15+</div>
                        <div class="text-xs text-slate-400 font-medium">Années d’Expérience</div>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/5">
                        <div class="text-3xl font-extrabold text-white font-mono">100%</div>
                        <div class="text-xs text-slate-400 font-medium">Normes DTU & CSTB</div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- ==========================================
         3. CORE SERVICES: 5 ARCHITECTURAL PILLARS
         ========================================== -->
    <section class="py-24 bg-white relative bg-grid-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                        <span class="w-6 h-0.5 bg-red-600"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Nos 5 Savoir-Faire Spécialisés' : (app()->getLocale() === 'ar' ? 'اختصاصاتنا الخمسة المعتمدة' : 'Our 5 Core Specialties') }}</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-950 tracking-tight">
                        {{ app()->getLocale() === 'fr' 
                            ? 'Solutions Hautes Performances Sols & Murs' 
                            : (app()->getLocale() === 'ar' 
                                ? 'حلول هندسية متطورة للأرضيات وتكسيات الجدران' 
                                : 'Engineered High-Performance Flooring Systems') }}
                    </h2>
                </div>
                <a href="{{ route('services.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-700 transition-colors group flex-shrink-0">
                    <span>{{ app()->getLocale() === 'fr' ? 'Voir le catalogue complet' : (app()->getLocale() === 'ar' ? 'عرض جميع الخدمات' : 'View full catalog') }}</span>
                    <svg class="w-4 h-4 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- 5-Column Responsive Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
                @if(isset($services) && $services->count() > 0)
                    @foreach($services as $index => $service)
                        <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-red-600 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1">
                            
                            <!-- Card Top Image with Gradient & Number Badge -->
                            <div>
                                <div class="h-52 overflow-hidden relative bg-slate-100">
                                    @php
                                        $serviceImg = $service->image 
                                            ? (str_starts_with($service->image, 'images/') ? asset($service->image) : asset('storage/' . $service->image))
                                            : asset('images/hero_flooring_paris.jpg');
                                    @endphp
                                    <img src="{{ $serviceImg }}"
                                         alt="{{ $service->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                         loading="lazy">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent opacity-60 group-hover:opacity-85 transition-opacity"></div>
                                    
                                    <!-- Index Badge (01 to 05) -->
                                    <div class="absolute top-4 left-4 rtl:left-auto rtl:right-4">
                                        <span class="px-2.5 py-1 bg-white/95 backdrop-blur border border-slate-200 text-xs font-black text-red-600 font-mono tracking-wider rounded-lg shadow-sm">
                                            0{{ $service->order_column ?? ($index + 1) }}
                                        </span>
                                    </div>

                                    <!-- Quick Technical Tag Pill -->
                                    <div class="absolute bottom-3 left-3 right-3">
                                        <span class="inline-block px-2.5 py-1 rounded-md bg-slate-950/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/10">
                                            @if($index === 0)
                                                Grands Formats & SPEC
                                            @elseif($index === 1)
                                                Chêne Massif & Chevron
                                            @elseif($index === 2)
                                                PVC, LVT & Acoustique
                                            @elseif($index === 3)
                                                Époxy & Polyuréthane
                                            @else
                                                Chape Fluide P3/P4
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <!-- Card Content -->
                                <div class="p-5">
                                    <h3 class="text-base font-bold text-slate-950 mb-2.5 group-hover:text-red-600 transition-colors line-clamp-1">
                                        {{ $service->title }}
                                    </h3>
                                    <p class="text-slate-600 text-xs line-clamp-4 leading-relaxed font-normal">
                                        {{ strip_tags($service->overview) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Card Bottom Action Link -->
                            <div class="p-5 pt-0">
                                <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <a href="{{ route('services.show', $service->slug) }}"
                                       class="text-xs font-bold text-slate-900 group-hover:text-red-600 flex items-center gap-1.5 transition-colors">
                                        <span>{{ app()->getLocale() === 'fr' ? 'Fiche technique' : (app()->getLocale() === 'ar' ? 'المواصفات الفنية' : 'Technical sheet') }}</span>
                                        <svg class="w-3.5 h-3.5 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <span class="w-2 h-2 rounded-full bg-slate-200 group-hover:bg-red-600 transition-colors"></span>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>

    <!-- ==========================================
         4. SECTORS MATRIX (TYPOLOGIES DE CHANTIERS)
         ========================================== -->
    <section class="py-24 bg-slate-950 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-white opacity-10 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-400 mb-3">
                    <span class="w-6 h-0.5 bg-red-500"></span>
                    <span>{{ app()->getLocale() === 'fr' ? 'Domaines d’Intervention' : (app()->getLocale() === 'ar' ? 'القطاعات والمشاريع المستهدفة' : 'Sectors of Intervention') }}</span>
                    <span class="w-6 h-0.5 bg-red-500"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-4">
                    {{ app()->getLocale() === 'fr' ? 'Des Références Exigeantes par Secteur' : (app()->getLocale() === 'ar' ? 'حلول مخصصة لمعايير كل قطاع' : 'Engineered Solutions by Industry Sector') }}
                </h2>
                <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                    {{ app()->getLocale() === 'fr' 
                        ? 'De l’hygiène ultra-rigoureuse des salles blanches aux parquets prestigieux des flagships parisiens, nous maîtrisons les contraintes spécifiques de chaque cahier des charges.' 
                        : (app()->getLocale() === 'ar' 
                            ? 'نقدم استجابة تقنية دقيقة لكافة المتطلبات الهندسية: العزل الصوتي للمكاتب، التحمل العالي للمستودعات، والفخامة المعمارية للفنادق والمتاجر الفاخرة.' 
                            : 'From cleanroom anti-dust epoxy to luxury oak chevron in Parisian flagships, we adhere strictly to every project specification.') }}
                </p>
            </div>

            <!-- 3 Sectors Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Sector 1: Tertiaire & Bureaux -->
                <div class="rounded-3xl bg-slate-900/90 border border-white/10 p-8 hover:border-red-500/50 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-red-600/20 border border-red-500/30 text-red-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="text-xs font-mono font-bold text-red-400 uppercase tracking-widest block mb-1">
                            SECTEUR 01
                        </span>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-red-400 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Tertiaire & Sièges Sociaux' : (app()->getLocale() === 'ar' ? 'المقرات الإدارية والشركات' : 'Corporate Headquarters & Offices') }}
                        </h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            {{ app()->getLocale() === 'fr' 
                                ? 'Revêtements acoustiques, dalles LVT clipsables/collées, moquettes grand passage U3P3 et habillages muraux pour bureaux premium et espaces de coworking.' 
                                : 'Acoustic flooring, heavy-duty commercial LVT, carpet tiles, and acoustic wall panels engineered for sound comfort and high corporate traffic.' }}
                        </p>
                    </div>
                    <ul class="space-y-2.5 pt-4 border-t border-white/10 text-xs text-slate-300">
                        <li class="flex items-center gap-2">
                            <span class="text-red-400 font-bold">✓</span>
                            <span>Affaiblissement acoustique certifié (ΔLw)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-red-400 font-bold">✓</span>
                            <span>Classement UPEC U3/U4 & ERP</span>
                        </li>
                    </ul>
                </div>

                <!-- Sector 2: Industrie & Logistique -->
                <div class="rounded-3xl bg-slate-900/90 border border-white/10 p-8 hover:border-red-500/50 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/20 border border-amber-500/30 text-amber-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-widest block mb-1">
                            SECTEUR 02
                        </span>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-amber-400 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Industrie & Hubs Logistiques' : (app()->getLocale() === 'ar' ? 'المستودعات والمنشآت الصناعية' : 'Industrial & Logistics Hubs') }}
                        </h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            {{ app()->getLocale() === 'fr' 
                                ? 'Systèmes de sols en résine époxy et polyuréthane ultra-résistants aux charges lourdes, agressions chimiques et passages continus d’engins de manutention.' 
                                : 'Heavy-duty epoxy and polyurethane resin systems resisting heavy dynamic loads, chemical aggression, and intensive forklift traffic.' }}
                        </p>
                    </div>
                    <ul class="space-y-2.5 pt-4 border-t border-white/10 text-xs text-slate-300">
                        <li class="flex items-center gap-2">
                            <span class="text-amber-400 font-bold">✓</span>
                            <span>Résistance mécanique & anti-poussière</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-amber-400 font-bold">✓</span>
                            <span>Étanchéité & adhérence antidérapante</span>
                        </li>
                    </ul>
                </div>

                <!-- Sector 3: Retail & Luxe -->
                <div class="rounded-3xl bg-slate-900/90 border border-white/10 p-8 hover:border-red-500/50 transition-all duration-300 group flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/20 border border-rose-500/30 text-rose-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <span class="text-xs font-mono font-bold text-rose-400 uppercase tracking-widest block mb-1">
                            SECTEUR 03
                        </span>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-rose-400 transition-colors">
                            {{ app()->getLocale() === 'fr' ? 'Retail de Prestige & Hôtellerie' : (app()->getLocale() === 'ar' ? 'المتاجر الفاخرة والفنادق' : 'Luxury Retail & Hospitality') }}
                        </h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            {{ app()->getLocale() === 'fr' 
                                ? 'Parquets prestigieux en point de Hongrie, bétons cirés, carrelages grands formats et finitions haute couture pour boutiques et hôtels de prestige.' 
                                : 'Prestigious chevron French oak, micro-cement, large porcelain slabs, and architectural wall claddings for luxury flagship boutiques and high-end hotels.' }}
                        </p>
                    </div>
                    <ul class="space-y-2.5 pt-4 border-t border-white/10 text-xs text-slate-300">
                        <li class="flex items-center gap-2">
                            <span class="text-rose-400 font-bold">✓</span>
                            <span>Calepinage géométrique d’exception</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-rose-400 font-bold">✓</span>
                            <span>Finitions huilées & vitrification grand trafic</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- ==========================================
         5. METHODOLOGY & TECHNICAL DTU RIGOR
         ========================================== -->
    <section class="py-24 bg-slate-50 border-y border-slate-200 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                    <span class="w-6 h-0.5 bg-red-600"></span>
                    <span>{{ app()->getLocale() === 'fr' ? 'Méthodologie DTU en 4 Étapes' : (app()->getLocale() === 'ar' ? 'منهجية التنفيذ الهندسي' : '4-Step DTU Engineering Workflow') }}</span>
                    <span class="w-6 h-0.5 bg-red-600"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 tracking-tight mb-4">
                    {{ app()->getLocale() === 'fr' ? 'Une Rigueur Éprouvée de l’Étude au PV de Réception' : (app()->getLocale() === 'ar' ? 'دقة متناهية من دراسة المخططات حتى الاستلام النهائي' : 'Zero-Defect Quality from Audit to Final Handover') }}
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    {{ app()->getLocale() === 'fr' 
                        ? 'Chaque chantier bénéficie d’un suivi rigoureux assuré par nos conducteurs de travaux pour garantir la conformité aux prescriptions CSTB et le respect scrupuleux des plannings.' 
                        : (app()->getLocale() === 'ar' 
                            ? 'إشراف ميداني مستمر وفحوصات تقنية مخبرية قبل وأثناء وبعد التركيب لضمان أعلى معايير الجودة والسلامة.' 
                            : 'Every site is supervised by dedicated technical site managers guaranteeing adherence to DTU rules and zero-delay completion.') }}
                </p>
            </div>

            <!-- 4 Step Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-lg hover:border-red-400 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold font-mono flex items-center justify-center text-lg mb-6">
                            01
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Audit & Calepinage</h3>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                            Relevé hygrométrique (bombe au carbure), contrôle de planéité sous règle de 2 m, plans de calepinage cotés et validation des fiches techniques fabricants.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                        Étape Préliminaire
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-lg hover:border-red-400 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold font-mono flex items-center justify-center text-lg mb-6">
                            02
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Préparation Mécanique</h3>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                            Grenaillage, ponçage diamant, pontage des fissures par agrafage et coulée de ragréages autonivelants fibrés à haute adhérence classement P3/P4S.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                        Préparation des Supports
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-lg hover:border-red-400 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold font-mono flex items-center justify-center text-lg mb-6">
                            03
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Pose & Finitions</h3>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                            Mise en œuvre par nos compagnons qualifiés : alignement laser des grands formats, soudure à chaud des lés PVC, vitrification des parquets ou coulage des résines.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                        Exécution Technique
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200/90 shadow-sm hover:shadow-lg hover:border-red-400 transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold font-mono flex items-center justify-center text-lg mb-6">
                            04
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Réception & DOE</h3>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                            Visite contradictoire sans réserve, remise immédiate du Dossier des Ouvrages Exécutés (DOE), carnets d’entretien et activation de la garantie décennale.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] font-semibold text-slate-500 uppercase tracking-wider">
                        Livraison & Décennale
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ==========================================
         6. FEATURED REALISATIONS GALLERY
         ========================================== -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                        <span class="w-6 h-0.5 bg-red-600"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Chantiers Récents' : (app()->getLocale() === 'ar' ? 'المشاريع المنفذة' : 'Selected Projects') }}</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-950 tracking-tight">
                        {{ app()->getLocale() === 'fr' ? 'Chantiers d’Exception Livrés en Île-de-France' : (app()->getLocale() === 'ar' ? 'مشاريع متميزة تم إنجازها في منطقة باريس' : 'Flagship Projects Delivered Across Paris Region') }}
                    </h2>
                </div>
                <a href="{{ route('projects.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-700 transition-colors group flex-shrink-0">
                    <span>{{ app()->getLocale() === 'fr' ? 'Explorer la galerie complète' : (app()->getLocale() === 'ar' ? 'استعراض كافة المشاريع' : 'Browse full gallery') }}</span>
                    <svg class="w-4 h-4 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                @if(isset($featuredProjects) && $featuredProjects->count() > 0)
                    @foreach($featuredProjects as $project)
                        <div class="group relative rounded-3xl overflow-hidden bg-white border border-slate-200 hover:border-slate-400 transition-all duration-300 shadow-md hover:shadow-2xl flex flex-col justify-between">
                            <!-- Image Container -->
                            <div class="h-80 sm:h-96 overflow-hidden relative">
                                <img src="{{ asset($project->main_image ?? 'images/project_logistics.jpg') }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                     loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/30 to-transparent"></div>

                                <!-- Floating Badges -->
                                <div class="absolute top-5 left-5 rtl:left-auto rtl:right-5 flex flex-wrap gap-2">
                                    @if($project->sector)
                                        <span class="px-3.5 py-1.5 rounded-lg bg-white/95 backdrop-blur-md border border-slate-200 text-xs font-bold text-slate-900 uppercase tracking-wider shadow-sm">
                                            {{ $project->sector->title }}
                                        </span>
                                    @endif
                                    @if($project->surface_areas)
                                        <span class="px-3.5 py-1.5 rounded-lg bg-red-600 text-xs font-bold text-white uppercase tracking-wider shadow-sm font-mono">
                                            {{ strip_tags($project->surface_areas) }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Content Area -->
                            <div class="p-8 bg-white flex-grow flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 text-xs text-slate-500 mb-2 font-medium">
                                        <svg class="w-4 h-4 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>{{ $project->location }}</span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-slate-950 mb-3 group-hover:text-red-600 transition-colors">
                                        {{ $project->title }}
                                    </h3>
                                    <p class="text-slate-600 text-sm line-clamp-2 leading-relaxed mb-6 font-normal">
                                        {{ strip_tags($project->scope) }}
                                    </p>
                                </div>
                                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                    <a href="{{ route('projects.show', $project->slug) }}"
                                       class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-700 transition-colors">
                                        <span>{{ app()->getLocale() === 'fr' ? 'Consulter l’étude de cas' : (app()->getLocale() === 'ar' ? 'تفاصيل المشروع' : 'View case study') }}</span>
                                        <svg class="w-4 h-4 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>

    <!-- ==========================================
         7. CERTIFIED MANUFACTURER PARTNERS
         ========================================== -->
    <section class="py-16 bg-slate-50 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-500">
                    {{ app()->getLocale() === 'fr' ? 'Fabricants Industriels Européens & Partenaires Agréés' : (app()->getLocale() === 'ar' ? 'الشركات المصنعة الأوروبية والشركاء الصناعيون' : 'Certified European Industrial Manufacturers & Brands') }}
                </span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 items-center">
                @php
                    $partnerBrands = [
                        ['name' => 'TARKETT', 'sub' => 'Sols Vinyles & LVT'],
                        ['name' => 'GERFLOR', 'sub' => 'Sols Techniques UPEC'],
                        ['name' => 'FORBO', 'sub' => 'Linoléum & Moquette'],
                        ['name' => 'MAPEI', 'sub' => 'Ragréages & Primaires'],
                        ['name' => 'SIKA', 'sub' => 'Résines Industrielles'],
                        ['name' => 'BOSTIK', 'sub' => 'Colles & Fixations DTU'],
                    ];
                @endphp
                @foreach($partnerBrands as $brand)
                    <div class="p-6 rounded-2xl bg-white border border-slate-200 hover:border-red-500 hover:shadow-md text-center transition-all group">
                        <div class="text-lg font-black tracking-wider text-slate-800 group-hover:text-red-600 transition-colors font-mono">
                            {{ $brand['name'] }}
                        </div>
                        <div class="text-[10px] text-slate-500 uppercase tracking-tight mt-1 font-semibold">
                            {{ $brand['sub'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==========================================
         8. HIGH-CONVERTING B2B QUOTE & CCTP CTA
         ========================================== -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-3xl bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 border border-slate-800 p-10 sm:p-16 shadow-2xl overflow-hidden text-white">
                
                <!-- Background decorative elements -->
                <div class="absolute -right-20 -bottom-20 w-96 h-96 rounded-full bg-red-600/20 blur-3xl pointer-events-none"></div>
                <div class="absolute -left-20 -top-20 w-72 h-72 rounded-full bg-amber-500/10 blur-3xl pointer-events-none"></div>
                <div class="absolute inset-0 bg-grid-white opacity-10 pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                    <div class="lg:col-span-8 space-y-5">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-600/20 text-red-400 text-xs font-bold uppercase tracking-wider border border-red-500/30">
                            Chiffrage Express B2B • Réponse sous 24/48h
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                            {{ app()->getLocale() === 'fr' 
                                ? 'Un Projet de Revêtements Sols & Murs en Île-de-France ?' 
                                : (app()->getLocale() === 'ar' 
                                    ? 'هل لديكم مشروع أرضيات أو تكسيات جدارية في باريس؟' 
                                    : 'Planning a Commercial Flooring Project in Paris Region?') }}
                        </h2>
                        <p class="text-slate-300 text-base max-w-2xl leading-relaxed">
                            {{ app()->getLocale() === 'fr' 
                                ? 'Transmettez-nous votre CCTP, vos plans architecturaux ou votre métré. Nos ingénieurs d’affaires chiffrent votre projet avec précision et vous remettent une proposition technique détaillée sous 24 à 48 heures.' 
                                : (app()->getLocale() === 'ar' 
                                    ? 'أرسلوا لنا المخططات الهندسية أو جدول الكميات والمواصفات الفنية وسيقوم فريقنا الهندسي بتقديم عرض سعر تفصيلي ودقيق خلال 24 إلى 48 ساعة.' 
                                    : 'Submit your architectural drawings, tender documentation, or bills of quantities. Our technical engineers deliver a comprehensive engineered quote within 24 to 48 hours.') }}
                        </p>
                        
                        <div class="flex flex-wrap gap-6 pt-4 text-xs text-slate-300 font-medium">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>info@maxprosols.fr</span>
                            </span>
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>81 Rue de Silly, 92100 Boulogne-Billancourt</span>
                            </span>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-4">
                        <a href="{{ route('quote') }}"
                           class="w-full text-center bg-gradient-to-r from-red-600 via-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold py-4 px-8 rounded-xl shadow-xl shadow-red-600/30 transition-all transform hover:-translate-y-0.5 text-base border border-red-500/40">
                            {{ app()->getLocale() === 'fr' ? 'Déposer un CCTP / Demande de Devis' : (app()->getLocale() === 'ar' ? 'تقديم المخططات / طلب عرض سعر' : 'Submit CCTP / Request Quote') }}
                        </a>
                        <a href="{{ route('contact') }}"
                           class="w-full text-center bg-white/10 hover:bg-white/15 text-white font-semibold py-4 px-8 rounded-xl border border-white/20 backdrop-blur-md transition-all text-sm">
                            {{ app()->getLocale() === 'fr' ? 'Échanger avec un Responsable de Projet' : (app()->getLocale() === 'ar' ? 'التواصل مع مهندس المشروع' : 'Speak with Project Manager') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layouts.app>