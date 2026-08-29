<x-layouts.app>
    <x-slot:title>About MAX PRO SOLS | Our Mission & Quality Commitments</x-slot:title>
    <x-slot:description>Discover the story, mission, and commitments that drive MAX PRO SOLS to excellence in the flooring and wall covering industry.</x-slot:description>

    <!-- Hero Section -->
    <div class="relative bg-slate-100 overflow-hidden py-20 border-b border-slate-200">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">{{ $page->title ?? 'About Us' }}</h1>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                Discover the story, mission, and commitments that drive MAX PRO SOLS to excellence.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="prose prose-lg prose-red max-w-none text-gray-700">
            {!! $page->content ?? '<p>MAX PRO SOLS is a leader in premium floor and wall coverings.</p>' !!}
        </div>
    </div>

    <!-- Commitments Section -->
    @if($commitments->count() > 0)
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Our Commitments</h2>
                <div class="mt-4 w-24 h-1 bg-red-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($commitments as $commitment)
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all">
                    @if($commitment->icon)
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6 text-red-600">
                            <img loading="lazy" src="{{ asset('storage/' . $commitment->icon) }}" class="w-8 h-8 object-contain" alt="">
                        </div>
                    @else
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6 text-red-600">
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