<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
    class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'MAX PRO SOLS - Revêtements de Sols & Murs Professionnels' }}</title>
    <meta name="description"
        content="{{ $description ?? 'MAX PRO SOLS : Spécialiste des revêtements de sols et murs pour les professionnels du bâtiment en Île-de-France. Résine industrielle, parquets, acoustique, LVT.' }}">

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
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
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
    </style>
</head>

<body class="antialiased bg-white text-slate-800 flex flex-col min-h-screen selection:bg-red-600 selection:text-white"
    x-data="{ mobileMenuOpen: false }">

    <!-- Top B2B Bar with Direct Language Quick Links -->
    <div class="bg-slate-50 border-b border-slate-200 text-xs text-slate-600 py-2 hidden lg:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-slate-900 font-semibold">
                        {{ app()->getLocale() === 'fr' ? 'Interventions Paris & Île-de-France' : (app()->getLocale() === 'ar' ? 'مشاريع باريس ومنطقة إيل دو فرانس' : 'Projects in Paris & Île-de-France') }}
                    </span>
                </span>
                <span class="text-slate-300">|</span>
                <span>81 Rue de Silly, 92100 Boulogne-Billancourt</span>
                <span class="text-slate-300">|</span>
                <span class="font-medium">SIREN : 849 537 394</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="mailto:maxprosols@gmail.com"
                    class="hover:text-red-600 transition-colors flex items-center gap-1.5 font-medium">
                    <svg class="w-3.5 h-3.5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>maxprosols@gmail.com</span>
                </a>
                <span class="text-slate-300">|</span>
                <span
                    class="text-amber-700 bg-amber-50 px-2 py-0.5 rounded border border-amber-200 font-semibold flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    {{ app()->getLocale() === 'fr' ? 'Garantie Décennale' : (app()->getLocale() === 'ar' ? 'تأمين عشري 10 سنوات' : '10-Year Warranty') }}
                </span>

                <!-- Quick Direct Language Switcher in Top Bar -->
                <div class="flex items-center space-x-1 border-l border-slate-200 pl-4">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="px-2 py-0.5 rounded text-[11px] font-bold uppercase transition-colors {{ app()->getLocale() === $localeCode ? 'bg-red-600 text-white' : 'text-slate-500 hover:text-red-600 hover:bg-slate-200/60' }}">
                            {{ $localeCode }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <header
        class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200/90 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <img src="{{ asset('logo.png') }}" alt="MAX PRO SOLS"
                            class="h-12 w-auto group-hover:scale-105 transition-transform duration-200">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2"
                    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                    <a href="{{ route('home') }}"
                        class="px-3.5 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('home') ? 'text-red-600 bg-red-50 font-bold' : 'text-slate-700 hover:text-red-600 hover:bg-slate-50' }} transition-all">
                        {{ app()->getLocale() === 'fr' ? 'Accueil' : (app()->getLocale() === 'ar' ? 'الرئيسية' : 'Home') }}
                    </a>
                    <a href="{{ route('about') }}"
                        class="px-3.5 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('about') ? 'text-red-600 bg-red-50 font-bold' : 'text-slate-700 hover:text-red-600 hover:bg-slate-50' }} transition-all">
                        {{ app()->getLocale() === 'fr' ? 'L\'Entreprise' : (app()->getLocale() === 'ar' ? 'عن الشركة' : 'About Us') }}
                    </a>
                    <a href="{{ route('services.index') }}"
                        class="px-3.5 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('services.*') ? 'text-red-600 bg-red-50 font-bold' : 'text-slate-700 hover:text-red-600 hover:bg-slate-50' }} transition-all">
                        {{ app()->getLocale() === 'fr' ? 'Prestations' : (app()->getLocale() === 'ar' ? 'خدماتنا' : 'Services') }}
                    </a>
                    <a href="{{ route('projects.index') }}"
                        class="px-3.5 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('projects.*') ? 'text-red-600 bg-red-50 font-bold' : 'text-slate-700 hover:text-red-600 hover:bg-slate-50' }} transition-all">
                        {{ app()->getLocale() === 'fr' ? 'Réalisations' : (app()->getLocale() === 'ar' ? 'مشاريعنا' : 'Projects') }}
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-3.5 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('contact') ? 'text-red-600 bg-red-50 font-bold' : 'text-slate-700 hover:text-red-600 hover:bg-slate-50' }} transition-all">
                        {{ app()->getLocale() === 'fr' ? 'Contact' : (app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact') }}
                    </a>

                    <div class="h-6 w-px bg-slate-200 mx-2"></div>

                    <!-- Language Switcher Dropdown (Alpine.js with Click outside) -->
                    <div class="relative" x-data="{ langOpen: false }">
                        <button @click="langOpen = !langOpen" @click.outside="langOpen = false" type="button"
                            aria-haspopup="true" :aria-expanded="langOpen" aria-label="Select Language"
                            class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-slate-700 hover:text-red-600 hover:border-slate-300 text-xs uppercase font-bold tracking-wider transition-all">
                            <span>{{ app()->getLocale() }}</span>
                            <svg class="w-3 h-3 text-slate-500 transition-transform duration-200"
                                :class="{ 'rotate-180': langOpen }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="langOpen" x-cloak x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="absolute right-0 mt-2 w-36 bg-white border border-slate-200 rounded-xl shadow-xl py-1.5 z-50 divide-y divide-slate-100">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="flex items-center justify-between px-4 py-2 text-xs text-slate-700 hover:bg-slate-50 hover:text-red-600 transition-colors {{ app()->getLocale() === $localeCode ? 'text-red-600 font-bold bg-red-50/60' : '' }}">
                                    <span>{{ $properties['native'] }}</span>
                                    <span class="uppercase text-[10px] text-slate-400 font-mono">{{ $localeCode }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="{{ route('quote') }}"
                        class="ml-3 inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white text-sm font-bold px-5 py-2.5 rounded-xl shadow-md shadow-red-600/20 hover:shadow-red-600/40 transition-all transform hover:-translate-y-0.5">
                        <span>{{ app()->getLocale() === 'fr' ? 'Devis Express' : (app()->getLocale() === 'ar' ? 'طلب عرض سعر' : 'Get a Quote') }}</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden gap-3">
                    <a href="{{ route('quote') }}"
                        class="bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">
                        {{ app()->getLocale() === 'fr' ? 'Devis' : (app()->getLocale() === 'ar' ? 'سعر' : 'Quote') }}
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                        class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none"
                        aria-label="Open mobile menu" :aria-expanded="mobileMenuOpen">
                        <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div x-show="mobileMenuOpen" x-cloak x-transition.origin.top
            class="md:hidden bg-white border-b border-slate-200 px-4 pt-3 pb-6 space-y-2 shadow-lg">
            <a href="{{ route('home') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-slate-100">
                {{ app()->getLocale() === 'fr' ? 'Accueil' : (app()->getLocale() === 'ar' ? 'الرئيسية' : 'Home') }}
            </a>
            <a href="{{ route('about') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-slate-100">
                {{ app()->getLocale() === 'fr' ? 'L\'Entreprise' : (app()->getLocale() === 'ar' ? 'عن الشركة' : 'About Us') }}
            </a>
            <a href="{{ route('services.index') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-slate-100">
                {{ app()->getLocale() === 'fr' ? 'Prestations' : (app()->getLocale() === 'ar' ? 'خدماتنا' : 'Services') }}
            </a>
            <a href="{{ route('projects.index') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-slate-100">
                {{ app()->getLocale() === 'fr' ? 'Réalisations' : (app()->getLocale() === 'ar' ? 'مشاريعنا' : 'Projects') }}
            </a>
            <a href="{{ route('contact') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-slate-100">
                {{ app()->getLocale() === 'fr' ? 'Contact' : (app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact') }}
            </a>
            <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                <span
                    class="text-xs text-slate-500 font-medium">{{ app()->getLocale() === 'fr' ? 'Langue :' : (app()->getLocale() === 'ar' ? 'اللغة :' : 'Language:') }}</span>
                <div class="flex gap-2">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="px-2.5 py-1 rounded bg-slate-100 text-xs font-bold uppercase {{ app()->getLocale() === $localeCode ? 'text-red-600 border border-red-500/40 bg-red-50' : 'text-slate-600' }}">
                            {{ $localeCode }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer: Clean, Prestigious Light B2B Layout -->
    <footer class="bg-slate-50 text-slate-700 pt-16 pb-12 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 mb-14"
                dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <!-- Col 1: Brand & Presentation (span 4) -->
                <div class="lg:col-span-4 space-y-6">
                    <a href="{{ route('home') }}" class="inline-block">
                        <img src="{{ asset('logo.png') }}" alt="MAX PRO SOLS" class="h-12 w-auto">
                    </a>
                    <p class="text-slate-600 text-sm leading-relaxed max-w-sm">
                        @if(app()->getLocale() === 'fr')
                            MAX PRO SOLS : Entreprise francilienne spécialisée dans la fourniture et la pose de revêtements
                            de sols techniques et habillages muraux de prestige pour les professionnels du bâtiment, maîtres
                            d'ouvrage et architectes.
                        @elseif(app()->getLocale() === 'ar')
                            ماكس برو للأرضيات والجدران : شركة رائدة في منطقة باريس متخصصة في توريد وتركيب الأرضيات والتكسيات
                            الجدارية للمشاريع الكبرى، المطورين العقاريين والمهندسين المعماريين.
                        @else
                            MAX PRO SOLS: Greater Paris contractor specializing in the supply and installation of commercial
                            flooring and prestigious wall coverings for construction professionals, developers, and
                            architects.
                        @endif
                    </p>
                    <div class="flex flex-wrap gap-2 text-xs">
                        <span
                            class="px-3 py-1.5 bg-white border border-slate-200/90 rounded-lg text-slate-700 font-semibold shadow-xs">
                            {{ app()->getLocale() === 'fr' ? 'Normes DTU & CSTB' : (app()->getLocale() === 'ar' ? 'معايير DTU الفنية' : 'DTU & CSTB Standards') }}
                        </span>
                        <span
                            class="px-3 py-1.5 bg-white border border-slate-200/90 rounded-lg text-slate-700 font-semibold shadow-xs">
                            {{ app()->getLocale() === 'fr' ? 'Garantie Décennale' : (app()->getLocale() === 'ar' ? 'تأمين عشري 10 سنوات' : '10-Year Warranty') }}
                        </span>
                        <span
                            class="px-3 py-1.5 bg-white border border-slate-200/90 rounded-lg text-slate-700 font-semibold shadow-xs">
                            {{ app()->getLocale() === 'fr' ? 'Classements UPEC' : (app()->getLocale() === 'ar' ? 'شهادات UPEC' : 'UPEC Certified') }}
                        </span>
                    </div>
                </div>

                <!-- Col 2: Services / Expertise (span 3) -->
                <div class="lg:col-span-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-900 mb-5 flex items-center gap-2">
                        <span class="w-1 h-4 bg-red-600 rounded-full"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Savoir-Faire' : (app()->getLocale() === 'ar' ? 'مجالات الخبرة' : 'Expertise') }}</span>
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('services.index') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Résine Époxy & Polyuréthane' : (app()->getLocale() === 'ar' ? 'أرضيات الراتنج والإيبوكسي' : 'Epoxy & Polyurethane Resin') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Parquets & Point de Hongrie' : (app()->getLocale() === 'ar' ? 'الباركيه الفاخر ونقشة الشفرون' : 'Prestige Hardwood & Chevron') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Panneaux Muraux Acoustiques' : (app()->getLocale() === 'ar' ? 'الألواح الجدارية العازلة للصوت' : 'Acoustic Wall Panels') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Sols Souples LVT & Moquette' : (app()->getLocale() === 'ar' ? 'الأرضيات الفينيل وبلاط الموكيت' : 'Commercial LVT & Carpet Tiles') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Préparation des Supports' : (app()->getLocale() === 'ar' ? 'إعداد ومعالجة الأسطح' : 'Substrate Preparation') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Navigation (span 2) -->
                <div class="lg:col-span-2">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-900 mb-5 flex items-center gap-2">
                        <span class="w-1 h-4 bg-red-600 rounded-full"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Navigation' : (app()->getLocale() === 'ar' ? 'روابط الموقع' : 'Navigation') }}</span>
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('home') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Accueil' : (app()->getLocale() === 'ar' ? 'الرئيسية' : 'Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'L\'Entreprise & Engagements' : (app()->getLocale() === 'ar' ? 'عن الشركة والالتزامات' : 'About Us & Commitments') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects.index') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Chantiers Réalisés' : (app()->getLocale() === 'ar' ? 'المشاريع المنفذة' : 'Completed Projects') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('quote') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Demande de Devis' : (app()->getLocale() === 'ar' ? 'طلب عرض أسعار' : 'Request a Quote') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="text-slate-600 hover:text-red-600 font-medium transition-colors">
                                {{ app()->getLocale() === 'fr' ? 'Nous Contacter' : (app()->getLocale() === 'ar' ? 'تواصل معنا' : 'Contact Us') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Legal (span 3) -->
                <div class="lg:col-span-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-900 mb-5 flex items-center gap-2">
                        <span class="w-1 h-4 bg-red-600 rounded-full"></span>
                        <span>{{ app()->getLocale() === 'fr' ? 'Siège Social' : (app()->getLocale() === 'ar' ? 'المقر الرئيسي' : 'Headquarters') }}</span>
                    </h4>
                    <ul class="space-y-3.5 text-sm text-slate-600">
                        <li class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-red-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="leading-snug font-medium">81 Rue de Silly<br>92100 Boulogne-Billancourt,
                                France</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:maxprosols@gmail.com"
                                class="hover:text-red-600 font-medium transition-colors">maxprosols@gmail.com</a>
                        </li>
                        <li class="pt-3 text-xs text-slate-500 border-t border-slate-200/80 space-y-1">
                            <div class="font-mono">SIREN : <span class="text-slate-700 font-semibold">849 537 394</span>
                            </div>
                            <div class="font-mono">SIRET : <span class="text-slate-700 font-semibold">849 537 394
                                    00033</span></div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright & Legal Links -->
            <div class="pt-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500"
                dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <p>
                    &copy; {{ date('Y') }} MAX PRO SOLS.
                    @if(app()->getLocale() === 'fr')
                        Tous droits réservés. Réalisation professionnelle B2B.
                    @elseif(app()->getLocale() === 'ar')
                        جميع الحقوق محفوظة. تنفيذ وتطوير احترافي.
                    @else
                        All rights reserved. Professional commercial contractor.
                    @endif
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-red-600 transition-colors">
                        {{ app()->getLocale() === 'fr' ? 'Mentions Légales' : (app()->getLocale() === 'ar' ? 'إشعار قانوني' : 'Legal Notice') }}
                    </a>
                    <a href="#" class="hover:text-red-600 transition-colors">
                        {{ app()->getLocale() === 'fr' ? 'Politique de Confidentialité' : (app()->getLocale() === 'ar' ? 'سياسة الخصوصية' : 'Privacy Policy') }}
                    </a>
                    <a href="{{ url('sitemap.xml') }}" class="hover:text-red-600 transition-colors">
                        {{ app()->getLocale() === 'fr' ? 'Plan du site' : (app()->getLocale() === 'ar' ? 'خريطة الموقع' : 'Sitemap') }}
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>