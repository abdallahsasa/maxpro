<x-layouts.app>
    <x-slot:title>{{ $project->title }} | Projects | MAX PRO SOLS</x-slot:title>
    <x-slot:description>{{ Str::limit(strip_tags($project->scope), 150) }}</x-slot:description>

    <!-- Project Header -->
    <div class="relative bg-gray-900 min-h-[60vh] flex items-end">
        @if($project->main_image)
            <div class="absolute inset-0">
                <img loading="lazy" src="{{ asset('storage/' . $project->main_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover opacity-50">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
            </div>
        @endif
        <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 pt-32">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center text-red-500 hover:text-red-400 mb-6 font-medium">
                <svg class="mr-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                Back to Projects
            </a>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                <div>
                    @if($project->sector)
                        <span class="inline-block px-3 py-1 bg-red-600/20 text-red-500 border border-red-600/30 rounded-full text-sm font-semibold uppercase tracking-wider mb-4">{{ $project->sector->title }}</span>
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
                        <span class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
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
                        <span class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg></span>
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
                        <span class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg></span>
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
                        <span class="w-8 h-8 bg-red-100 text-red-600 rounded-lg flex items-center justify-center mr-3"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
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
                                <a href="{{ route('services.show', $service->slug) }}" class="flex items-center text-gray-600 hover:text-red-600 transition-colors group">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-3 group-hover:scale-150 transition-transform"></span>
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
                        <a href="{{ route('quote') }}" class="inline-block w-full bg-red-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-red-500 transition-colors">
                            Request a Quote
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-layouts.app>