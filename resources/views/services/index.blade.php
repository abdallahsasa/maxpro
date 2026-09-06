<x-layouts.app>
    <x-slot:title>
        {{ app()->getLocale() === 'fr' 
            ? 'Nos Prestations & Solutions de Revêtements | MAX PRO SOLS' 
            : (app()->getLocale() === 'ar' 
                ? 'خدماتنا واختصاصاتنا في الأرضيات والتكسيات | ماكس برو' 
                : 'Our Services & Floor Covering Solutions | MAX PRO SOLS') }}
    </x-slot:title>

    <x-slot:description>
        {{ app()->getLocale() === 'fr' 
            ? 'Découvrez nos 5 spécialités : Carrelage & Faïence, Parquet, Sols Souples, Résine, Chape & Ragréage pour vos projets à Paris et en Île-de-France.' 
            : (app()->getLocale() === 'ar' 
                ? 'اكتشف اختصاصاتنا الـ 5: السيراميك والبورسلين، الباركيه، الأرضيات المرنة، الراتنج والإيبوكسي، الصبات والتسوية الذاتية في باريس وإيل دو فرانس.' 
                : 'Discover our 5 specialties: Tiling, Parquet, Resilient Flooring, Resin, Screed & Leveling across Paris and Île-de-France.') }}
    </x-slot:description>

    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Hero Header -->
        <section class="relative bg-slate-900 text-white overflow-hidden py-16 sm:py-20 border-b border-slate-800">
            <div class="absolute inset-0 opacity-20 bg-cover bg-center mix-blend-luminosity filter blur-[1px]"
                 style="background-image: url('{{ asset('images/hero_flooring_paris.jpg') }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-slate-950/80"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- Breadcrumbs -->
                <nav class="flex items-center justify-center gap-2 text-xs font-medium text-slate-400 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                        {{ app()->getLocale() === 'fr' ? 'Accueil' : (app()->getLocale() === 'ar' ? 'الرئيسية' : 'Home') }}
                    </a>
                    <span>/</span>
                    <span class="text-red-500 font-semibold">
                        {{ app()->getLocale() === 'fr' ? 'Prestations' : (app()->getLocale() === 'ar' ? 'الاختصاصات' : 'Services') }}
                    </span>
                </nav>

                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-red-600/20 border border-red-500/30 text-red-400 text-xs font-semibold mb-4 backdrop-blur-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                    <span>{{ app()->getLocale() === 'fr' ? 'Savoir-Faire & Spécialités Métiers' : (app()->getLocale() === 'ar' ? 'مجالات الاختصاص والخبرة' : 'Core Trade Specialties') }}</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                    {{ app()->getLocale() === 'fr' 
                        ? 'Nos Domaines d’Intervention' 
                        : (app()->getLocale() === 'ar' 
                            ? 'اختصاصاتنا وحلولنا الفنية' 
                            : 'Our Specialized Solutions') }}
                </h1>
                <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light">
                    {{ app()->getLocale() === 'fr' 
                        ? '05 expertises d’excellence pour tous vos projets de revêtements de sols et murs à Paris & en Île-de-France.' 
                        : (app()->getLocale() === 'ar' 
                            ? '5 اختصاصات متكاملة تغطي كافة متطلبات الأرضيات والتكسيات الجدارية بأعلى معايير الجودة.' 
                            : '05 specialized capabilities covering floor and wall coverings for all professional sectors.') }}
                </p>
            </div>
        </section>

        <!-- Services Grid -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                <a href="{{ route('services.show', $service->slug) }}"
                   class="group flex flex-col bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:border-red-500/80 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    
                    <!-- Image -->
                    <div class="h-60 overflow-hidden relative bg-slate-100">
                        @php
                            $imgSrc = $service->image 
                                ? (str_starts_with($service->image, 'images/') ? asset($service->image) : asset('storage/' . $service->image))
                                : asset('images/hero_flooring_paris.jpg');
                        @endphp
                        <img loading="lazy" src="{{ $imgSrc }}" alt="{{ $service->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                        
                        <!-- Badge Number -->
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/95 backdrop-blur text-xs font-extrabold text-red-600 uppercase tracking-wider rounded-lg shadow-sm border border-slate-200">
                                0{{ $service->order_column ?? ($index + 1) }}
                            </span>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="p-6 sm:p-8 flex-grow flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition-colors">
                                {{ $service->title }}
                            </h2>
                            <div class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-6 font-normal">
                                {!! strip_tags($service->overview) !!}
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="inline-flex items-center gap-2 text-xs font-bold text-slate-900 group-hover:text-red-600 transition-colors">
                                <span>{{ app()->getLocale() === 'fr' ? 'Consulter la fiche détaillée' : (app()->getLocale() === 'ar' ? 'تفاصيل الاختصاص' : 'View Service Details') }}</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                            <span class="w-2 h-2 rounded-full bg-slate-300 group-hover:bg-red-600 transition-colors"></span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center text-slate-500 py-16">
                    {{ app()->getLocale() === 'fr' ? 'Aucune prestation disponible pour le moment.' : 'No services available.' }}
                </div>
                @endforelse
            </div>
        </section>

        <!-- Bottom Quote CTA -->
        <section class="py-16 bg-slate-50 border-t border-slate-200">
            <div class="max-w-5xl mx-auto px-4 text-center">
                <h3 class="text-2xl font-bold text-slate-900 mb-3">
                    {{ app()->getLocale() === 'fr' 
                        ? 'Besoin d’un chiffrage précis pour l’une de ces prestations ?' 
                        : (app()->getLocale() === 'ar' 
                            ? 'هل تحتاجون إلى دراسة تسعيرية دقيقة لأحد هذه الاختصاصات؟' 
                            : 'Need a precise estimate for one of these specialties?') }}
                </h3>
                <p class="text-sm text-slate-600 mb-6 max-w-xl mx-auto">
                    {{ app()->getLocale() === 'fr'
                        ? 'Transmettez-nous votre descriptif technique ou vos plans pour une réponse sous 24 à 48 heures.'
                        : 'Send us your technical specifications or blueprints for a response within 24 to 48 hours.' }}
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('quote') }}" class="px-6 py-3 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold uppercase tracking-wider shadow-sm transition-all">
                        {{ app()->getLocale() === 'fr' ? 'Demander un devis express' : (app()->getLocale() === 'ar' ? 'طلب عرض أسعار' : 'Request a Quote') }}
                    </a>
                    <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl bg-white hover:bg-slate-100 text-slate-800 text-xs font-bold uppercase tracking-wider border border-slate-300 transition-colors">
                        {{ app()->getLocale() === 'fr' ? 'Contactez-nous' : (app()->getLocale() === 'ar' ? 'تواصل معنا' : 'Contact Us') }}
                    </a>
                </div>
            </div>
        </section>

    </div>
</x-layouts.app>