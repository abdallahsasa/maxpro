<x-layouts.app>
    <x-slot:title>
        {{ app()->getLocale() === 'fr' 
            ? 'À Propos de MAX PRO SOLS | Notre Savoir-Faire & Nos Engagements' 
            : (app()->getLocale() === 'ar' 
                ? 'عن ماكس برو (MAX PRO SOLS) | خبراتنا والتزاماتنا' 
                : 'About MAX PRO SOLS | Our Expertise & Commitments') }}
    </x-slot:title>

    <x-slot:description>
        {{ app()->getLocale() === 'fr'
            ? 'MAX PRO SOLS est une entreprise francilienne spécialisée dans les travaux de revêtements de sols et murs pour les professionnels du bâtiment en Île-de-France.'
            : (app()->getLocale() === 'ar'
                ? 'ماكس برو شركة متخصصة في أعمال وتكسيات الأرضيات والجدران لمحترفي البناء وشركات المقاولات في باريس وإيل دو فرانس.'
                : 'MAX PRO SOLS is a Paris region specialist in floor and wall coverings for building professionals, project owners, and contractors across Île-de-France.') }}
    </x-slot:description>

    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Hero Header -->
        <section class="relative bg-slate-900 text-white overflow-hidden py-16 sm:py-24 border-b border-slate-800">
            <div class="absolute inset-0 opacity-20 bg-cover bg-center mix-blend-luminosity filter blur-[1px]"
                 style="background-image: url('{{ asset('images/hero_flooring_paris.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-slate-950/80"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumbs -->
                <nav class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                        {{ app()->getLocale() === 'fr' ? 'Accueil' : (app()->getLocale() === 'ar' ? 'الرئيسية' : 'Home') }}
                    </a>
                    <span>/</span>
                    <span class="text-red-500 font-semibold">
                        {{ app()->getLocale() === 'fr' ? 'L’Entreprise' : (app()->getLocale() === 'ar' ? 'عن الشركة' : 'About Us') }}
                    </span>
                </nav>

                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-red-600/20 border border-red-500/30 text-red-400 text-xs font-semibold mb-4 backdrop-blur-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Entreprise Francilienne Spécialisée' : (app()->getLocale() === 'ar' ? 'شركة فرنسية متخصصة في باريس' : 'Paris Region Specialist') }}</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white mb-6 leading-tight">
                        {{ $page->title ?? (app()->getLocale() === 'fr' ? 'À propos de MAX PRO SOLS' : 'About MAX PRO SOLS') }}
                    </h1>

                    <p class="text-lg sm:text-xl text-slate-300 leading-relaxed font-light">
                        {{ app()->getLocale() === 'fr' 
                            ? 'Notre savoir-faire au service de vos projets en Île-de-France.' 
                            : (app()->getLocale() === 'ar' 
                                ? 'خبرتنا الفنية والعملية في خدمة كافة مشاريعكم.' 
                                : 'Our professional craftsmanship dedicated to your projects.') }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Main Narrative & Savoir-Faire Section -->
        <section class="py-16 sm:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                    
                    <!-- Left: Main Rich Content -->
                    <div class="lg:col-span-7">
                        <div class="inline-block text-xs font-bold uppercase tracking-wider text-red-600 mb-2">
                            {{ app()->getLocale() === 'fr' ? 'Présentation' : (app()->getLocale() === 'ar' ? 'نظرة عامة' : 'Overview') }}
                        </div>
                        <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 mb-8 leading-snug">
                            {{ app()->getLocale() === 'fr' 
                                ? 'Notre savoir-faire au service de vos projets' 
                                : (app()->getLocale() === 'ar' 
                                    ? 'خبرتنا في خدمة مشاريعكم' 
                                    : 'Our expertise at the service of your projects') }}
                        </h2>

                        <div class="space-y-5 text-slate-700 text-base sm:text-lg leading-relaxed font-normal">
                            @if(isset($page) && $page->content)
                                {!! $page->content !!}
                            @else
                                <p>
                                    MAX PRO SOLS est une entreprise francilienne spécialisée dans la réalisation de travaux de revêtements de sols et murs pour les professionnels du bâtiment, maîtres d’ouvrage, promoteurs, architectes et entreprises générales.
                                </p>
                                <p>
                                    Nous intervenons à Paris et en Île-de-France sur des projets de construction neuve, de rénovation et d’aménagement.
                                </p>
                                <p>
                                    Notre savoir-faire couvre notamment le carrelage et la faïence, le parquet, les sols souples, les revêtements en résine, les chapes, le ragréage ainsi que la préparation des supports.
                                </p>
                                <p>
                                    De l’étude du dossier à la réception des travaux, nos équipes assurent un suivi rigoureux du chantier avec une attention particulière portée à la qualité d’exécution, au respect des prescriptions techniques et aux délais.
                                </p>
                            @endif
                        </div>

                        <!-- Core Capabilities Grid Pills -->
                        <div class="mt-10 pt-8 border-t border-slate-100">
                            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">
                                {{ app()->getLocale() === 'fr' ? 'Champs d’intervention clés :' : (app()->getLocale() === 'ar' ? 'مجالات العمل والتنفيذ :' : 'Key fields of intervention:') }}
                            </h3>
                            <div class="flex flex-wrap gap-2.5">
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold transition-colors">
                                    {{ app()->getLocale() === 'fr' ? 'Carrelage & Faïence' : (app()->getLocale() === 'ar' ? 'السيراميك والبورسلين' : 'Tiling & Earthenware') }}
                                </span>
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold transition-colors">
                                    {{ app()->getLocale() === 'fr' ? 'Parquets & Point de Hongrie' : (app()->getLocale() === 'ar' ? 'الباركيه ونقشة الشفرون' : 'Parquet & Chevron') }}
                                </span>
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold transition-colors">
                                    {{ app()->getLocale() === 'fr' ? 'Sols Souples & LVT' : (app()->getLocale() === 'ar' ? 'الأرضيات المرنة والـ LVT' : 'Resilient Flooring & LVT') }}
                                </span>
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold transition-colors">
                                    {{ app()->getLocale() === 'fr' ? 'Revêtements en Résine' : (app()->getLocale() === 'ar' ? 'أرضيات الراتنج والإيبوكسي' : 'Resin Coatings') }}
                                </span>
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold transition-colors">
                                    {{ app()->getLocale() === 'fr' ? 'Chapes & Ragréage' : (app()->getLocale() === 'ar' ? 'اللياسة والتسوية الذاتية' : 'Screeds & Self-Leveling') }}
                                </span>
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold transition-colors">
                                    {{ app()->getLocale() === 'fr' ? 'Préparation des Supports' : (app()->getLocale() === 'ar' ? 'إعداد ومعالجة الأسطح' : 'Substrate Preparation') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Key Highlights Card -->
                    <div class="lg:col-span-5">
                        <div class="bg-slate-50 p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-red-600/5 rounded-full filter blur-2xl pointer-events-none"></div>

                            <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                <span>{{ app()->getLocale() === 'fr' ? 'Pour qui intervenons-nous ?' : (app()->getLocale() === 'ar' ? 'الفئات المستهدفة' : 'Who do we work with?') }}</span>
                            </h3>

                            <ul class="space-y-4 text-sm text-slate-700">
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0 mt-0.5 font-bold text-xs">✓</div>
                                    <div>
                                        <strong class="text-slate-900">{{ app()->getLocale() === 'fr' ? 'Professionnels du Bâtiment' : (app()->getLocale() === 'ar' ? 'محترفو قطاع البناء' : 'Building Professionals') }}</strong>
                                        <p class="text-xs text-slate-500 mt-0.5">{{ app()->getLocale() === 'fr' ? 'Entreprises générales, corps d’état secondaires et sous-traitance de haute qualité.' : 'General contractors and specialized building partners.' }}</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0 mt-0.5 font-bold text-xs">✓</div>
                                    <div>
                                        <strong class="text-slate-900">{{ app()->getLocale() === 'fr' ? 'Maîtres d’Ouvrage & Promoteurs' : (app()->getLocale() === 'ar' ? 'المطورون العقاريون وأصحاب المشاريع' : 'Project Owners & Developers') }}</strong>
                                        <p class="text-xs text-slate-500 mt-0.5">{{ app()->getLocale() === 'fr' ? 'Programmes résidentiels, tertiaires et commerciaux neufs ou réhabilités.' : 'Residential, commercial and mixed-use real estate programs.' }}</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0 mt-0.5 font-bold text-xs">✓</div>
                                    <div>
                                        <strong class="text-slate-900">{{ app()->getLocale() === 'fr' ? 'Architectes & Maîtres d’Œuvre' : (app()->getLocale() === 'ar' ? 'المهندسون المعماريون ومكاتب التصميم' : 'Architects & Project Managers') }}</strong>
                                        <p class="text-xs text-slate-500 mt-0.5">{{ app()->getLocale() === 'fr' ? 'Conseil technique, échantillons et respect scrupuleux des calepinages.' : 'Technical advice, material sampling, and strict plan conformity.' }}</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="mt-8 pt-6 border-t border-slate-200 flex flex-col gap-3">
                                <a href="{{ route('quote') }}" class="w-full py-3 px-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs text-center uppercase tracking-wider shadow-sm transition-all">
                                    {{ app()->getLocale() === 'fr' ? 'Demander un devis pour votre chantier' : (app()->getLocale() === 'ar' ? 'طلب عرض أسعار لمشروعكم' : 'Request a Project Quote') }}
                                </a>
                                <a href="{{ route('contact') }}" class="w-full py-2.5 px-4 rounded-xl bg-white hover:bg-slate-100 text-slate-800 font-semibold text-xs text-center border border-slate-200 transition-colors">
                                    {{ app()->getLocale() === 'fr' ? 'Échanger avec notre équipe technique' : (app()->getLocale() === 'ar' ? 'تواصل مع فريقنا الفني' : 'Contact our technical team') }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Commitments Section -->
        @if($commitments->count() > 0)
        <section class="bg-slate-50 py-16 sm:py-24 border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-block px-3.5 py-1 rounded-full bg-red-100 text-red-600 text-xs font-bold uppercase tracking-wider mb-3">
                        {{ app()->getLocale() === 'fr' ? 'Nos Valeurs' : (app()->getLocale() === 'ar' ? 'قيمنا ومعاييرنا' : 'Our Values') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                        {{ app()->getLocale() === 'fr' ? 'Nos engagements' : (app()->getLocale() === 'ar' ? 'التزاماتنا المهنية' : 'Our Commitments') }}
                    </h2>
                    <p class="mt-4 text-slate-600 text-base sm:text-lg">
                        {{ app()->getLocale() === 'fr'
                            ? 'Une exigence de chaque instant pour garantir la réussite technique et temporelle de vos ouvrages.'
                            : (app()->getLocale() === 'ar'
                                ? 'التزام دائم لضمان النجاح الفني والالتزام الزمني في كافة مواقع العمل.'
                                : 'An unwavering standard to ensure the technical success and timely completion of your works.') }}
                    </p>
                    <div class="mt-6 w-16 h-1 bg-red-600 mx-auto rounded-full"></div>
                </div>

                <!-- Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach($commitments as $index => $commitment)
                    <div class="bg-white p-7 sm:p-8 rounded-2xl shadow-sm border border-slate-200/80 hover:shadow-lg hover:border-red-500/40 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <!-- Icon and Number -->
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 rounded-2xl bg-red-50 border border-red-100 text-red-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                                    @if($index === 0)
                                        <!-- Qualité d'exécution -->
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                    @elseif($index === 1)
                                        <!-- Respect des délais -->
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @elseif($index === 2)
                                        <!-- Maîtrise technique -->
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    @elseif($index === 3)
                                        <!-- Suivi de chantier -->
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    @else
                                        <!-- Garantie décennale -->
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    @endif
                                </div>
                                <span class="text-xs font-black text-slate-300">0{{ $index + 1 }}</span>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-red-600 transition-colors">
                                {{ $commitment->title }}
                            </h3>

                            <div class="text-slate-600 text-sm leading-relaxed">
                                {!! $commitment->description !!}
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-slate-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span>{{ app()->getLocale() === 'fr' ? 'Engagement Contractuel' : (app()->getLocale() === 'ar' ? 'التزام تعاقدي معتمد' : 'Contractual Commitment') }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
        @endif

        <!-- Bottom B2B Project CTA -->
        <section class="py-16 bg-slate-900 text-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h2 class="text-2xl sm:text-3xl font-extrabold mb-4">
                    {{ app()->getLocale() === 'fr'
                        ? 'Un projet de construction ou de rénovation en Île-de-France ?'
                        : (app()->getLocale() === 'ar'
                            ? 'هل لديكم مشروع بناء أو تجديد في باريس أو إيل دو فرانس؟'
                            : 'A construction or renovation project in Île-de-France?') }}
                </h2>
                <p class="text-slate-300 max-w-2xl mx-auto mb-8 text-sm sm:text-base">
                    {{ app()->getLocale() === 'fr'
                        ? 'Nos équipes étudient votre cahier des charges et vos CCTP pour vous soumettre un chiffrage rapide et précis.'
                        : (app()->getLocale() === 'ar'
                            ? 'تقوم فرقنا الهندسية بدراسة دفاتر الشروط والمواصفات الفنية لتقديم عرض أسعار سريع ومفصل.'
                            : 'Our technical teams review your specifications to provide a fast and precise estimate.') }}
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('quote') }}" class="px-8 py-3.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-sm tracking-wide shadow-lg shadow-red-600/30 transition-all">
                        {{ app()->getLocale() === 'fr' ? 'Demander un devis express' : (app()->getLocale() === 'ar' ? 'طلب عرض أسعار فوري' : 'Request an Express Quote') }}
                    </a>
                    <a href="{{ route('contact') }}" class="px-8 py-3.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold text-sm border border-slate-700 transition-colors">
                        {{ app()->getLocale() === 'fr' ? 'Nous contacter' : (app()->getLocale() === 'ar' ? 'تواصل معنا' : 'Contact Us') }}
                    </a>
                </div>
            </div>
        </section>

    </div>
</x-layouts.app>