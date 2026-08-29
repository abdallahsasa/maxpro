<x-layouts.app>
    <x-slot:title>{{ app()->getLocale() === 'fr' ? 'MAX PRO SOLS | Revêtements de Sols & Murs Professionnels Paris & Île-de-France' : (app()->getLocale() === 'ar' ? 'ماكس برو | حلول الأرضيات والتكسيات الجدارية للمشاريع الكبرى' : 'MAX PRO SOLS | Commercial Flooring & Wall Coverings Paris & Île-de-France') }}</x-slot:title>
    <x-slot:description>{{ app()->getLocale() === 'fr' ? 'Spécialiste B2B des revêtements de sols et murs en Île-de-France : résine époxy, parquets nobles, panneaux acoustiques, LVT. Normes DTU, garantie décennale.' : 'Commercial contractor for floor and wall coverings in Paris and Île-de-France: industrial resin, chevron parquet, acoustic wall cladding, luxury vinyl tiles.' }}</x-slot:description>

    <!-- 1. Hero Section (Airy, Luxurious Architectural Light Theme) -->
    <section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-slate-100">
        <!-- Background Architectural Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero_flooring_paris.jpg') }}" alt="MAX PRO SOLS Réalisation de Prestige Paris" class="w-full h-full object-cover object-center transform scale-105 transition-transform duration-1000">
            <!-- Light Multi-layer Gradient Overlays for High Legibility & Warmth -->
            <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/85 to-white/50"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-white/40"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-red-600/10 via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 w-full">
            <div class="max-w-3xl" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                
                <!-- Pill Badge -->
                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white/90 border border-slate-200/90 backdrop-blur-md mb-8 shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-600 animate-ping"></span>
                    <span class="w-2 h-2 rounded-full bg-red-600 -ml-4"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-800">
                        {{ app()->getLocale() === 'fr' ? 'Spécialiste Revêtements Sols & Murs • Paris & Île-de-France' : (app()->getLocale() === 'ar' ? 'متخصصون في تكسيات الأرضيات والجدران • باريس' : 'Specialist in Floor & Wall Coverings • Paris & Region') }}
                    </span>
                </div>

                <!-- Main Title -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-950 leading-[1.12] mb-6">
                    @if(app()->getLocale() === 'fr')
                        L'Excellence Technique <br>
                        <span class="text-slate-800">du Sol au Mur pour</span> <br>
                        <span class="bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent">les Professionnels.</span>
                    @elseif(app()->getLocale() === 'ar')
                        التميز الفني في <br>
                        <span class="text-slate-800">تكسيات الأرضيات والجدران</span> <br>
                        <span class="bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent">للمشاريع الكبرى والشركات.</span>
                    @else
                        Technical Excellence <br>
                        <span class="text-slate-800">from Floor to Wall for</span> <br>
                        <span class="bg-gradient-to-r from-red-600 to-red-700 bg-clip-text text-transparent">Building Professionals.</span>
                    @endif
                </h1>

                <!-- Subtitle -->
                <p class="text-lg sm:text-xl text-slate-700 mb-10 leading-relaxed max-w-2xl font-normal">
                    @if(app()->getLocale() === 'fr')
                        Partenaire certifié des maîtres d’ouvrage, promoteurs, architectes et entreprises générales. Résines industrielles, parquets nobles, panneaux acoustiques et sols souples certifiés DTU.
                    @elseif(app()->getLocale() === 'ar')
                        شريككم المعتمد للمقاولين الرئيسيين والمطورين العقاريين والمهندسين المعماريين في باريس. أرضيات الإيبوكسي الصناعي، الباركيه الفاخر، والتكسيات الصوتية.
                    @else
                        Trusted commercial partner for contractors, developers, and architects across Greater Paris. Certified industrial resin, chevron hardwood, acoustic wall panels, and commercial LVT.
                    @endif
                </p>

                <!-- Action CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 mb-12">
                    <a href="{{ route('quote') }}" class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl text-white font-bold text-base bg-gradient-to-r from-red-600 via-red-600 to-red-700 hover:from-red-500 hover:to-red-600 shadow-xl shadow-red-600/25 hover:shadow-red-600/40 transition-all transform hover:-translate-y-0.5">
                        <span>{{ app()->getLocale() === 'fr' ? 'Demander un Devis Express (24/48h)' : (app()->getLocale() === 'ar' ? 'طلب عرض سعر فوري' : 'Request a Fast Quote (24/48h)') }}</span>
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-xl text-slate-800 font-semibold text-base bg-white/95 hover:bg-white border border-slate-300 hover:border-slate-400 shadow-sm backdrop-blur-md transition-all">
                        <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>{{ app()->getLocale() === 'fr' ? 'Découvrir nos Réalisations' : (app()->getLocale() === 'ar' ? 'استعراض المشاريع المنجزة' : 'Explore Completed Projects') }}</span>
                    </a>
                </div>

                <!-- Trust Indicators Floating Strip -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-6 border-t border-slate-300/80 text-xs text-slate-700 font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>Normes DTU & CSTB</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>Garantie Décennale</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>Interlocuteur Dédié</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>Chiffrage sous 24/48h</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. Dynamic Key Metrics Bar (Light Gray Backdrop with Bold Contrast) -->
    <section class="relative z-20 bg-slate-50 border-y border-slate-200 py-10 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @if(isset($statistics) && $statistics->count() > 0)
                    @foreach($statistics as $stat)
                        <div class="flex items-center gap-4 group">
                            <div class="w-14 h-14 rounded-2xl bg-red-50 border border-red-200 flex items-center justify-center text-red-600 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 flex-shrink-0 shadow-sm">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            </div>
                            <div>
                                <div class="text-3xl sm:text-4xl font-extrabold text-slate-950 tracking-tight">{{ $stat->value }}</div>
                                <div class="text-xs sm:text-sm font-semibold text-slate-600">{{ $stat->getTranslation('label', app()->getLocale()) }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center gap-4">
                        <div class="text-3xl font-extrabold text-slate-950">150 000+</div>
                        <div class="text-xs text-slate-600 font-medium">m² de Sols & Murs Posés</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-3xl font-extrabold text-slate-950">500+</div>
                        <div class="text-xs text-slate-600 font-medium">Chantiers B2B Livrés</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-3xl font-extrabold text-slate-950">15+</div>
                        <div class="text-xs text-slate-600 font-medium">Années d’Expérience</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-3xl font-extrabold text-slate-950">100%</div>
                        <div class="text-xs text-slate-600 font-medium">Conformité DTU & Normes</div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- 3. Core Services Showcase (Pure Crisp White) -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                        <span class="w-6 h-0.5 bg-red-600"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Nos Domaines d’Intervention' : (app()->getLocale() === 'ar' ? 'مجالات اختصاصنا' : 'Areas of Expertise') }}</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 tracking-tight">
                        {{ app()->getLocale() === 'fr' ? 'Solutions Hautes Performances pour vos Sols & Murs' : (app()->getLocale() === 'ar' ? 'حلول عالية الأداء للأرضيات والجدران' : 'High-Performance Systems for Floors & Walls') }}
                    </h2>
                </div>
                <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-700 transition-colors group">
                    <span>{{ app()->getLocale() === 'fr' ? 'Voir toutes nos prestations' : (app()->getLocale() === 'ar' ? 'عرض جميع الخدمات' : 'View all services') }}</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @if(isset($services) && $services->count() > 0)
                    @foreach($services as $index => $service)
                        <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-red-500 hover:shadow-xl transition-all duration-300 flex flex-col">
                            <!-- Image Container -->
                            <div class="h-56 overflow-hidden relative">
                                <img src="{{ asset($service->image ?? 'images/service_resin.jpg') }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-white/90 backdrop-blur border border-slate-200 text-[11px] font-bold text-red-600 uppercase tracking-wider rounded-lg shadow-sm">
                                        N° 0{{ $index + 1 }}
                                    </span>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition-colors">
                                        {{ $service->title }}
                                    </h3>
                                    <p class="text-slate-600 text-xs sm:text-sm line-clamp-3 leading-relaxed mb-6">
                                        {{ strip_tags($service->overview) }}
                                    </p>
                                </div>
                                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                    <a href="{{ route('services.show', $service->slug) }}" class="text-xs font-bold text-slate-800 group-hover:text-red-600 flex items-center gap-1.5 transition-colors">
                                        <span>{{ app()->getLocale() === 'fr' ? 'Fiche technique' : 'View details' }}</span>
                                        <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                    <span class="w-2 h-2 rounded-full bg-slate-300 group-hover:bg-red-600 transition-colors"></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- 4. Project Methodology & Technical Rigor (Light Slate Backdrop) -->
    <section class="py-24 bg-slate-50 border-y border-slate-200 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                    <span class="w-6 h-0.5 bg-red-600"></span>
                    <span>{{ app()->getLocale() === 'fr' ? 'Méthodologie d’Exécution' : 'Project Methodology' }}</span>
                    <span class="w-6 h-0.5 bg-red-600"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 tracking-tight mb-4">
                    {{ app()->getLocale() === 'fr' ? 'Une Rigueur Éprouvée de l’Étude au PV de Réception' : 'Rigorous Engineering from Audit to Final Handover' }}
                </h2>
                <p class="text-slate-600 text-sm sm:text-base">
                    {{ app()->getLocale() === 'fr' ? 'Nous garantissons à chaque maître d’ouvrage un chantier maîtrisé, conforme aux règles professionnelles et aux délais imposés.' : 'Delivering zero-defect flooring installations compliant with French DTU standards on every construction site.' }}
                </p>
            </div>

            <!-- 4 Steps -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold flex items-center justify-center text-lg mb-6">
                        01
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Audit & Calepinage</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Relevé hygrométrique, analyse de planéité du support, plans de calepinage précis et préconisation des matériaux adaptés aux contraintes d'exploitation.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold flex items-center justify-center text-lg mb-6">
                        02
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Préparation Mécanique</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Grenaillage, ponçage diamant, traitement des fissures, application de primaires d’adhérence et ragréages fibrés haute performance P3/P4S.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold flex items-center justify-center text-lg mb-6">
                        03
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Pose & Finitions</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Installation exécutée par nos équipes internes qualifiées : coulage de résines, poses de parquets en point de Hongrie, habillages muraux acoustiques.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="relative p-7 rounded-2xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-200 text-red-600 font-extrabold flex items-center justify-center text-lg mb-6">
                        04
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Réception & DOE</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Procès-verbal de réception sans réserve, remise du Dossier des Ouvrages Exécutés (DOE), fiches d'entretien et activation de la garantie décennale.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Featured Projects Showcase -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                        <span class="w-6 h-0.5 bg-red-600"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Nos Réalisations Récentes' : 'Featured Case Studies' }}</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 tracking-tight">
                        {{ app()->getLocale() === 'fr' ? 'Chantiers d’Exception Livrés en Île-de-France' : 'Recent Flagship Installations' }}
                    </h2>
                </div>
                <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-700 transition-colors group">
                    <span>{{ app()->getLocale() === 'fr' ? 'Explorer la galerie complète' : 'Browse full gallery' }}</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                @if(isset($featuredProjects) && $featuredProjects->count() > 0)
                    @foreach($featuredProjects as $project)
                        <div class="group relative rounded-3xl overflow-hidden bg-white border border-slate-200 hover:border-slate-300 transition-all duration-300 shadow-md hover:shadow-xl">
                            <!-- Image Container -->
                            <div class="h-80 sm:h-96 overflow-hidden relative">
                                <img src="{{ asset($project->main_image ?? 'images/project_logistics.jpg') }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/30 to-transparent"></div>
                                
                                <!-- Badges over image -->
                                <div class="absolute top-5 left-5 flex flex-wrap gap-2">
                                    @if($project->sector)
                                        <span class="px-3.5 py-1.5 rounded-lg bg-white/95 backdrop-blur-md border border-slate-200 text-xs font-bold text-slate-800 uppercase tracking-wider shadow-sm">
                                            {{ $project->sector->title }}
                                        </span>
                                    @endif
                                    @if($project->surface_areas)
                                        <span class="px-3.5 py-1.5 rounded-lg bg-red-600 text-xs font-bold text-white uppercase tracking-wider shadow-sm">
                                            {{ strip_tags($project->surface_areas) }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Content Area -->
                            <div class="p-8 bg-white">
                                <div class="flex items-center gap-2 text-xs text-slate-500 mb-2 font-medium">
                                    <svg class="w-4 h-4 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>{{ $project->location }}</span>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition-colors">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-slate-600 text-sm line-clamp-2 leading-relaxed mb-6">
                                    {{ strip_tags($project->scope) }}
                                </p>
                                <a href="{{ route('projects.show', $project->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-red-700 transition-colors">
                                    <span>{{ app()->getLocale() === 'fr' ? 'Consulter le projet' : 'View case study' }}</span>
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- 6. Certified Manufacturer Partners -->
    <section class="py-16 bg-slate-50 border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-500">
                    {{ app()->getLocale() === 'fr' ? 'Fabricants Européens & Partenaires Industriels Agréés' : 'Certified European Manufacturers & Brands' }}
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
                        ['name' => 'BOSTIK', 'sub' => 'Colles & Fixations'],
                    ];
                @endphp
                @foreach($partnerBrands as $brand)
                    <div class="p-6 rounded-xl bg-white border border-slate-200 hover:border-red-500 hover:shadow-md text-center transition-all group">
                        <div class="text-lg font-black tracking-wider text-slate-800 group-hover:text-red-600 transition-colors">{{ $brand['name'] }}</div>
                        <div class="text-[10px] text-slate-500 uppercase tracking-tight mt-1 font-medium">{{ $brand['sub'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. High-Converting Quote CTA Block (Light Red & White Card) -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-3xl bg-gradient-to-r from-red-50 via-white to-red-50 border border-red-200 p-10 sm:p-16 shadow-xl overflow-hidden">
                <!-- Background decorative elements -->
                <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-red-500/10 blur-3xl pointer-events-none"></div>
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold uppercase tracking-wider border border-red-200">
                            Chiffrage Express B2B
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 tracking-tight">
                            {{ app()->getLocale() === 'fr' ? 'Un projet de sol ou mur en Île-de-France ?' : 'Planning a commercial flooring project in Paris region?' }}
                        </h2>
                        <p class="text-slate-700 text-sm sm:text-base max-w-2xl leading-relaxed">
                            {{ app()->getLocale() === 'fr' ? 'Transmettez-nous votre CCTP, vos plans ou votre métré. Nos ingénieurs d’affaires vous répondent avec un devis technique complet sous 24 à 48 heures.' : 'Send us your project specifications, architectural drawings, or bill of quantities. Receive an engineered technical quote within 24 to 48 hours.' }}
                        </p>
                        <div class="flex flex-wrap gap-6 pt-2 text-xs text-slate-600 font-medium">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <span>maxprosols@gmail.com</span>
                            </span>
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                <span>81 Rue de Silly, 92100 Boulogne-Billancourt</span>
                            </span>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-4">
                        <a href="{{ route('quote') }}" class="w-full text-center bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg shadow-red-600/30 transition-all transform hover:-translate-y-0.5 text-base">
                            {{ app()->getLocale() === 'fr' ? 'Déposer un Dossier / Devis' : 'Submit Project for Quote' }}
                        </a>
                        <a href="{{ route('contact') }}" class="w-full text-center bg-white hover:bg-slate-50 text-slate-800 font-semibold py-4 px-8 rounded-xl border border-slate-300 shadow-sm transition-all text-sm">
                            {{ app()->getLocale() === 'fr' ? 'Contacter notre Équipe' : 'Contact Our Team' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
