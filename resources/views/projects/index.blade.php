<x-layouts.app>
    <x-slot:title>Our Projects & Case Studies | MAX PRO SOLS</x-slot:title>
    <x-slot:description>Discover our completed floor and wall covering projects across various sectors in Paris and Île-de-France.</x-slot:description>

    <!-- Header -->
    <div class="bg-slate-50 py-16 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">Our Projects</h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Discover our completed floor and wall covering projects across Paris and Île-de-France.</p>
        </div>
    </div>

    <!-- Projects Portfolio -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- Filters -->
        @if(isset($sectors) && $sectors->count() > 0)
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <a href="{{ route('projects.index') }}" class="{{ !request('sector') ? 'bg-red-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }} px-6 py-2 rounded-full font-medium border border-gray-200 transition-colors">
                All Projects
            </a>
            @foreach($sectors as $sector)
            <a href="{{ route('projects.index', ['sector' => $sector->getTranslation('slug', app()->getLocale()) ?? $sector->slug]) }}" class="{{ request('sector') === ($sector->getTranslation('slug', app()->getLocale()) ?? $sector->slug) ? 'bg-red-600 text-white border-red-600' : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' }} px-6 py-2 rounded-full font-medium border transition-colors">
                {{ $sector->title }}
            </a>
            @endforeach
        </div>
        @endif

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                <a href="{{ route('projects.show', $project->slug) }}" class="block relative h-64 overflow-hidden">
                    @if($project->main_image)
                        <img loading="lazy" src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        @if($project->sector)
                            <span class="text-xs font-bold uppercase tracking-wider text-red-500 mb-2 block">{{ $project->sector->title }}</span>
                        @endif
                        <h3 class="text-xl font-bold text-white">{{ $project->title }}</h3>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-20 text-gray-500 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                No projects found for this category.
            </div>
            @endforelse
        </div>
        
        <div class="mt-12">
            {{ $projects->links() }}
        </div>
    </div>
</x-layouts.app>