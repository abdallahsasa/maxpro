<?php

$viewsDir = __DIR__ . '/resources/views/';

$about = <<<'HTML'
<x-layouts.app>
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden py-24">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop" alt="About MAX PRO SOLS" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900/90"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6">{{ $page->title ?? 'About Us' }}</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Discover the story, mission, and commitments that drive MAX PRO SOLS to excellence.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="prose prose-lg prose-amber max-w-none text-gray-700">
            {!! $page->content ?? '<p>MAX PRO SOLS is a leader in premium floor and wall coverings.</p>' !!}
        </div>
    </div>

    <!-- Commitments Section -->
    @if($commitments->count() > 0)
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Our Commitments</h2>
                <div class="mt-4 w-24 h-1 bg-amber-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($commitments as $commitment)
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all">
                    @if($commitment->icon)
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-6 text-amber-600">
                            <img src="{{ asset('storage/' . $commitment->icon) }}" class="w-8 h-8 object-contain" alt="">
                        </div>
                    @else
                        <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-6 text-amber-600">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    @endif
                    <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $commitment->title }}</h3>
                    <div class="text-gray-600 prose-sm">
                        {!! $commitment->description !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</x-layouts.app>
HTML;
file_put_contents($viewsDir . 'about.blade.php', $about);

$servicesIndex = <<<'HTML'
<x-layouts.app>
    <!-- Header -->
    <div class="bg-gray-900 py-20 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Our Services</h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">Comprehensive floor and wall covering solutions for every professional sector.</p>
        </div>
    </div>

    <!-- Services Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($services as $service)
            <a href="{{ route('services.show', $service->slug) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="h-56 overflow-hidden relative">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-amber-600 transition-colors">{{ $service->title }}</h2>
                    <div class="text-gray-600 line-clamp-3 mb-6">
                        {!! strip_tags($service->overview) !!}
                    </div>
                    <span class="inline-flex items-center text-amber-600 font-semibold group-hover:translate-x-2 transition-transform duration-300">
                        View Details
                        <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center text-gray-500 py-12">
                No services currently available.
            </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>
HTML;
file_put_contents($viewsDir . 'services/index.blade.php', $servicesIndex);

$serviceShow = <<<'HTML'
<x-layouts.app>
    <!-- Hero Section -->
    <div class="relative bg-gray-900 h-96">
        @if($service->image)
            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
            </div>
        @endif
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-end pb-16">
            <div>
                <a href="{{ route('services.index') }}" class="inline-flex items-center text-amber-500 hover:text-amber-400 mb-4 font-medium">
                    <svg class="mr-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                    Back to Services
                </a>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white">{{ $service->title }}</h1>
            </div>
        </div>
    </div>

    <!-- Content Layout -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                @if($service->overview)
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Overview</h2>
                    <div class="prose prose-lg prose-amber max-w-none text-gray-700">
                        {!! $service->overview !!}
                    </div>
                </section>
                @endif
                
                @if($service->solutions)
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Solutions</h2>
                    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                        <div class="prose prose-lg prose-amber max-w-none text-gray-700">
                            {!! $service->solutions !!}
                        </div>
                    </div>
                </section>
                @endif

                @if($service->process)
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Implementation Process</h2>
                    <div class="prose prose-lg prose-amber max-w-none text-gray-700">
                        {!! $service->process !!}
                    </div>
                </section>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-8">
                    <!-- CTA Card -->
                    <div class="bg-amber-600 rounded-2xl p-8 text-white shadow-xl">
                        <h3 class="text-2xl font-bold mb-4">Need this service?</h3>
                        <p class="text-amber-100 mb-6">Get in touch with our experts to discuss your specific requirements and get a detailed quotation.</p>
                        <a href="{{ route('quote') }}" class="block w-full text-center bg-white text-amber-600 font-bold py-3 px-4 rounded-lg hover:bg-gray-50 transition-colors">
                            Request a Quote
                        </a>
                    </div>

                    @if($service->project_types || $service->considerations)
                    <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
                        @if($service->project_types)
                        <div class="mb-8">
                            <h4 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Ideal For</h4>
                            <div class="prose prose-sm text-gray-600">
                                {!! $service->project_types !!}
                            </div>
                        </div>
                        @endif

                        @if($service->considerations)
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Key Considerations</h4>
                            <div class="prose prose-sm text-gray-600">
                                {!! $service->considerations !!}
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
HTML;
file_put_contents($viewsDir . 'services/show.blade.php', $serviceShow);

echo "Basic internal views created.\n";
