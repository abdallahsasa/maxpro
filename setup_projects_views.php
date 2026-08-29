<?php

$viewsDir = __DIR__ . '/resources/views/';

$projectsIndex = <<<'HTML'
<x-layouts.app>
    <!-- Header -->
    <div class="bg-gray-900 py-20 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Our Projects</h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">Discover our completed floor and wall covering projects across various sectors.</p>
        </div>
    </div>

    <!-- Projects Portfolio -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- Filters -->
        @if(isset($sectors) && $sectors->count() > 0)
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <a href="{{ route('projects.index') }}" class="{{ !request('sector') ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }} px-6 py-2 rounded-full font-medium border border-gray-200 transition-colors">
                All Projects
            </a>
            @foreach($sectors as $sector)
            <a href="{{ route('projects.index', ['sector' => $sector->getTranslation('slug', app()->getLocale()) ?? $sector->slug]) }}" class="{{ request('sector') === ($sector->getTranslation('slug', app()->getLocale()) ?? $sector->slug) ? 'bg-amber-600 text-white border-amber-600' : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' }} px-6 py-2 rounded-full font-medium border transition-colors">
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
                        <img src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        @if($project->sector)
                            <span class="text-xs font-bold uppercase tracking-wider text-amber-500 mb-2 block">{{ $project->sector->title }}</span>
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
HTML;
file_put_contents($viewsDir . 'projects/index.blade.php', $projectsIndex);

$projectShow = <<<'HTML'
<x-layouts.app>
    <!-- Project Header -->
    <div class="relative bg-gray-900 min-h-[60vh] flex items-end">
        @if($project->main_image)
            <div class="absolute inset-0">
                <img src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover opacity-50">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
            </div>
        @endif
        <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 pt-32">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center text-amber-500 hover:text-amber-400 mb-6 font-medium">
                <svg class="mr-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                Back to Projects
            </a>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                <div>
                    @if($project->sector)
                        <span class="inline-block px-3 py-1 bg-amber-600/20 text-amber-500 border border-amber-600/30 rounded-full text-sm font-semibold uppercase tracking-wider mb-4">{{ $project->sector->title }}</span>
                    @endif
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white">{{ $project->title }}</h1>
                </div>
                
                <!-- Quick Info Box -->
                @if($project->location || $project->surface_areas)
                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl text-white min-w-[250px]">
                    @if($project->location)
                    <div class="mb-4">
                        <span class="block text-gray-400 text-sm mb-1 uppercase tracking-wider">Location</span>
                        <div class="font-semibold">{{ $project->location }}</div>
                    </div>
                    @endif
                    @if($project->surface_areas)
                    <div>
                        <span class="block text-gray-400 text-sm mb-1 uppercase tracking-wider">Surface Area</span>
                        <div class="font-semibold">{!! strip_tags($project->surface_areas) !!}</div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Project Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-16">
                @if($project->scope)
                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
                        Project Scope
                    </h2>
                    <div class="prose prose-lg text-gray-600 max-w-none">
                        {!! $project->scope !!}
                    </div>
                </section>
                @endif

                @if($project->constraints)
                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg></span>
                        Challenges & Constraints
                    </h2>
                    <div class="prose prose-lg text-gray-600 max-w-none">
                        {!! $project->constraints !!}
                    </div>
                </section>
                @endif

                @if($project->solution)
                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg></span>
                        Our Solution
                    </h2>
                    <div class="prose prose-lg text-gray-600 max-w-none bg-gray-50 p-8 rounded-2xl border border-gray-100">
                        {!! $project->solution !!}
                    </div>
                </section>
                @endif

                @if($project->results)
                <section>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
                        Results
                    </h2>
                    <div class="prose prose-lg text-gray-600 max-w-none">
                        {!! $project->results !!}
                    </div>
                </section>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-8">
                    @if($project->services && $project->services->count() > 0)
                    <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 border-b pb-4">Services Applied</h3>
                        <ul class="space-y-4">
                            @foreach($project->services as $service)
                            <li>
                                <a href="{{ route('services.show', $service->slug) }}" class="flex items-center text-gray-600 hover:text-amber-600 transition-colors group">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full mr-3 group-hover:scale-150 transition-transform"></span>
                                    <span class="font-medium">{{ $service->title }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- CTA -->
                    <div class="bg-gray-900 rounded-2xl p-8 text-center shadow-xl">
                        <h4 class="text-xl font-bold text-white mb-4">Start a similar project</h4>
                        <p class="text-gray-400 mb-6">Contact our experts to discuss your requirements and receive a comprehensive proposal.</p>
                        <a href="{{ route('quote') }}" class="inline-block w-full bg-amber-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-amber-500 transition-colors">
                            Request a Quote
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-layouts.app>
HTML;
file_put_contents($viewsDir . 'projects/show.blade.php', $projectShow);

echo "Projects views created.\n";
