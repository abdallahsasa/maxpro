<x-layouts.app>
    <x-slot:title>Our Services & Floor Covering Solutions | MAX PRO SOLS</x-slot:title>
    <x-slot:description>Comprehensive floor and wall covering solutions for every professional sector, including industrial resin and acoustic panels.</x-slot:description>

    <!-- Header -->
    <div class="bg-slate-50 py-16 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">Our Services</h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Comprehensive floor and wall covering solutions for every professional sector.</p>
        </div>
    </div>

    <!-- Services Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($services as $service)
            <a href="{{ route('services.show', $service->slug) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="h-56 overflow-hidden relative">
                    @if($service->image)
                        <img loading="lazy" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">{{ $service->title }}</h2>
                    <div class="text-gray-600 line-clamp-3 mb-6">
                        {!! strip_tags($service->overview) !!}
                    </div>
                    <span class="inline-flex items-center text-red-600 font-semibold group-hover:translate-x-2 transition-transform duration-300">
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