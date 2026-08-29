<x-layouts.app>
    <x-slot:title>{{ $service->title }} | Services | MAX PRO SOLS</x-slot:title>
    <x-slot:description>{{ Str::limit(strip_tags($service->overview), 150) }}</x-slot:description>

    <!-- Hero Section -->
    <div class="relative bg-gray-900 h-96">
        @if($service->image)
            <div class="absolute inset-0">
                <img loading="lazy" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
            </div>
        @endif
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-end pb-16">
            <div>
                <a href="{{ route('services.index') }}" class="inline-flex items-center text-red-500 hover:text-red-400 mb-4 font-medium">
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
                    <div class="prose prose-lg prose-red max-w-none text-gray-700">
                        {!! $service->overview !!}
                    </div>
                </section>
                @endif
                
                @if($service->solutions)
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Solutions</h2>
                    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                        <div class="prose prose-lg prose-red max-w-none text-gray-700">
                            {!! $service->solutions !!}
                        </div>
                    </div>
                </section>
                @endif

                @if($service->process)
                <section>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Implementation Process</h2>
                    <div class="prose prose-lg prose-red max-w-none text-gray-700">
                        {!! $service->process !!}
                    </div>
                </section>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-8">
                    <!-- CTA Card -->
                    <div class="bg-red-600 rounded-2xl p-8 text-white shadow-xl">
                        <h3 class="text-2xl font-bold mb-4">Need this service?</h3>
                        <p class="text-red-100 mb-6">Get in touch with our experts to discuss your specific requirements and get a detailed quotation.</p>
                        <a href="{{ route('quote') }}" class="block w-full text-center bg-white text-red-600 font-bold py-3 px-4 rounded-lg hover:bg-gray-50 transition-colors">
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