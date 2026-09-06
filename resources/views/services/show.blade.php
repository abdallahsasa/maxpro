<x-layouts.app>
    <x-slot:title>{{ $service->title }} | {{ app()->getLocale() === 'fr' ? 'Prestations' : (app()->getLocale() === 'ar' ? 'الاختصاصات' : 'Services') }} | MAX PRO SOLS</x-slot:title>
    <x-slot:description>{{ Str::limit(strip_tags($service->overview), 150) }}</x-slot:description>

    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Hero Section -->
        <div class="relative bg-slate-950 min-h-[320px] flex items-end overflow-hidden border-b border-slate-800">
            @php
                $imgSrc = $service->image 
                    ? (str_starts_with($service->image, 'images/') ? asset($service->image) : asset('storage/' . $service->image))
                    : asset('images/hero_flooring_paris.jpg');
            @endphp
            <div class="absolute inset-0">
                <img loading="lazy" src="{{ $imgSrc }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-35 filter blur-[1px]">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-slate-950/40"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12 sm:py-16">
                <div>
                    <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-red-500 hover:text-red-400 mb-4 font-semibold text-xs tracking-wider uppercase transition-colors">
                        <svg class="w-4 h-4 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>{{ app()->getLocale() === 'fr' ? 'Retour aux prestations' : (app()->getLocale() === 'ar' ? 'العودة للاختصاصات' : 'Back to Services') }}</span>
                    </a>

                    <div class="inline-block px-2.5 py-0.5 rounded bg-red-600/20 text-red-400 border border-red-500/30 text-xs font-bold uppercase mb-2">
                        0{{ $service->order_column }}
                    </div>

                    <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">{{ $service->title }}</h1>
                </div>
            </div>
        </div>

        <!-- Content Layout -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    @if($service->overview)
                    <section class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                        <h2 class="text-2xl font-bold text-slate-900 mb-4 flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                            <span>{{ app()->getLocale() === 'fr' ? 'Présentation de la spécialité' : (app()->getLocale() === 'ar' ? 'نظرة عامة' : 'Overview') }}</span>
                        </h2>
                        <div class="prose prose-lg prose-red max-w-none text-slate-700 leading-relaxed font-normal">
                            {!! $service->overview !!}
                        </div>
                    </section>
                    @endif
                    
                    @if($service->solutions)
                    <section class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm">
                        <h2 class="text-2xl font-bold text-slate-900 mb-4 flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                            <span>{{ app()->getLocale() === 'fr' ? 'Nos Solutions & Systèmes Techniques' : (app()->getLocale() === 'ar' ? 'حلولنا وأنظمتنا الفنية' : 'Our Technical Solutions') }}</span>
                        </h2>
                        <div class="prose prose-lg prose-red max-w-none text-slate-700 leading-relaxed">
                            {!! $service->solutions !!}
                        </div>
                    </section>
                    @endif

                    @if($service->process)
                    <section class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                        <h2 class="text-2xl font-bold text-slate-900 mb-4 flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                            <span>{{ app()->getLocale() === 'fr' ? 'Processus de Mise en Œuvre' : (app()->getLocale() === 'ar' ? 'خطوات ومراحل التنفيذ' : 'Implementation Process') }}</span>
                        </h2>
                        <div class="prose prose-lg prose-red max-w-none text-slate-700 leading-relaxed">
                            {!! $service->process !!}
                        </div>
                    </section>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-28 space-y-6">
                        
                        <!-- CTA Card -->
                        <div class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 rounded-2xl p-7 text-white shadow-xl border border-slate-800 relative overflow-hidden">
                            <div class="absolute -right-6 -bottom-6 w-28 h-28 bg-red-600/15 rounded-full filter blur-xl pointer-events-none"></div>

                            <span class="inline-block px-2.5 py-0.5 rounded bg-red-600/20 text-red-400 text-[11px] font-bold uppercase tracking-wider mb-3 border border-red-500/30">
                                {{ app()->getLocale() === 'fr' ? 'Devis Gratuit B2B' : (app()->getLocale() === 'ar' ? 'عرض أسعار سريع' : 'B2B Fast Quote') }}
                            </span>

                            <h3 class="text-xl font-bold mb-2">
                                {{ app()->getLocale() === 'fr' ? 'Un chantier sur cette spécialité ?' : (app()->getLocale() === 'ar' ? 'مشروع يخص هذا الاختصاص؟' : 'Need this specialty?') }}
                            </h3>

                            <p class="text-slate-300 text-xs sm:text-sm leading-relaxed mb-6">
                                {{ app()->getLocale() === 'fr' 
                                    ? 'Contactez notre direction technique pour étudier vos CCTP, échantillons et métrés.'
                                    : 'Contact our technical team to review your specifications and receive a comprehensive proposal.' }}
                            </p>

                            <a href="{{ route('quote') }}" class="block w-full text-center bg-red-600 hover:bg-red-500 text-white font-bold py-3 px-4 rounded-xl text-xs uppercase tracking-wider shadow-lg shadow-red-600/30 transition-all">
                                {{ app()->getLocale() === 'fr' ? 'Demander un chiffrage' : (app()->getLocale() === 'ar' ? 'طلب دراسة تسعيرية' : 'Request a Quote') }}
                            </a>
                        </div>

                        <!-- Technical Standards & Guarantees -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 pb-2 border-b border-slate-100">
                                {{ app()->getLocale() === 'fr' ? 'Garanties Professionnelles' : (app()->getLocale() === 'ar' ? 'الضمانات الفنية' : 'Professional Guarantees') }}
                            </h4>
                            <div class="flex items-center gap-3 text-xs text-slate-700">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>{{ app()->getLocale() === 'fr' ? 'Garantie Décennale 10 ans' : '10-Year Decennial Warranty' }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-xs text-slate-700">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>{{ app()->getLocale() === 'fr' ? 'Conformité Normes DTU & CSTB' : 'DTU & CSTB Compliance' }}</span>
                            </div>
                            <div class="flex items-center gap-3 text-xs text-slate-700">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>{{ app()->getLocale() === 'fr' ? 'Interventions Paris & Île-de-France' : 'Paris & Île-de-France Coverage' }}</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</x-layouts.app>