<x-layouts.app>
    <x-slot:title>Contact Us | MAX PRO SOLS</x-slot:title>
    <x-slot:description>Get in touch with the MAX PRO SOLS team for general inquiries, partnerships, or support in Paris and Île-de-France.</x-slot:description>

    <!-- Header -->
    <div class="bg-slate-50 py-16 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">Contact Us</h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Get in touch with our team for technical consultations, partnerships, or project specifications.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Let's start a conversation</h2>
                <p class="text-gray-600 text-lg mb-12">Whether you have a question about our services, pricing, or need a technical consultation, our team is ready to answer all your questions.</p>
                
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center text-red-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Headquarters</h3>
                            <p class="text-gray-600 leading-relaxed">81 Rue de Silly<br>92100 Boulogne-Billancourt<br>France</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center text-red-600">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Email</h3>
                            <a href="mailto:maxprosols@gmail.com" class="text-red-600 hover:text-red-700 font-medium">maxprosols@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-10">
                @if(session('success'))
                    <div class="mb-8 bg-green-50 text-green-700 p-4 rounded-xl flex items-center border border-green-200">
                        <svg class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-colors" value="{{ old('name') }}">
                            @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="company" class="block text-sm font-semibold text-gray-700 mb-2">Company <span class="text-red-500">*</span></label>
                            <input type="text" name="company" id="company" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-colors" value="{{ old('company') }}">
                            @error('company') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-colors" value="{{ old('email') }}">
                            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-colors" value="{{ old('phone') }}">
                            @error('phone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject <span class="text-red-500">*</span></label>
                        <input type="text" name="subject" id="subject" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-colors" value="{{ old('subject') }}">
                        @error('subject') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message <span class="text-red-500">*</span></label>
                        <textarea name="message" id="message" rows="5" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-colors">{{ old('message') }}</textarea>
                        @error('message') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full bg-red-600 text-white font-bold py-4 px-8 rounded-lg hover:bg-red-700 transition-colors shadow-lg hover:shadow-red-600/30">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>