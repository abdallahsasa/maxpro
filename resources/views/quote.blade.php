<x-layouts.app>
    <x-slot:title>Request a Quotation | MAX PRO SOLS</x-slot:title>
    <x-slot:description>Provide details about your project to receive a comprehensive proposal from our construction and flooring experts.</x-slot:description>

    <!-- Header -->
    <div class="bg-gray-900 py-20 border-b border-gray-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Request a Quotation</h1>
            <p class="text-xl text-gray-400">Provide details about your project to receive a comprehensive proposal from our experts.</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        
        @if(session('success'))
            <div class="mb-10 bg-green-50 text-green-700 p-6 rounded-2xl flex items-center border border-green-200 shadow-sm">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-1">Quotation Request Submitted!</h3>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <form action="{{ route('quote.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-12 overflow-hidden relative">
            @csrf
            
            <!-- Progress indicator decorative -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gray-100">
                <div class="h-full bg-red-500 w-full"></div>
            </div>

            <div class="space-y-12">
                <!-- 1. Contact Information -->
                <div>
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 font-bold mr-3">1</span>
                        <h2 class="text-2xl font-bold text-gray-900">Contact Information</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pl-11">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Company Name <span class="text-red-500">*</span></label>
                            <input type="text" name="company_name" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors" value="{{ old('company_name') }}">
                            @error('company_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Contact Person <span class="text-red-500">*</span></label>
                            <input type="text" name="contact_name" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors" value="{{ old('contact_name') }}">
                            @error('contact_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors" value="{{ old('email') }}">
                            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors" value="{{ old('phone') }}">
                            @error('phone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- 2. Project Details -->
                <div>
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 font-bold mr-3">2</span>
                        <h2 class="text-2xl font-bold text-gray-900">Project Details</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pl-11">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Project Location / City <span class="text-red-500">*</span></label>
                            <input type="text" name="project_location" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors" value="{{ old('project_location') }}">
                            @error('project_location') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Project Type <span class="text-red-500">*</span></label>
                            <select name="project_type" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">
                                <option value="" disabled selected>Select an option</option>
                                <option value="Commercial" {{ old('project_type') == 'Commercial' ? 'selected' : '' }}>Commercial / Retail</option>
                                <option value="Industrial" {{ old('project_type') == 'Industrial' ? 'selected' : '' }}>Industrial / Logistics</option>
                                <option value="Office" {{ old('project_type') == 'Office' ? 'selected' : '' }}>Office Building</option>
                                <option value="Residential" {{ old('project_type') == 'Residential' ? 'selected' : '' }}>High-end Residential</option>
                                <option value="Public" {{ old('project_type') == 'Public' ? 'selected' : '' }}>Public Sector / Healthcare</option>
                                <option value="Other" {{ old('project_type') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('project_type') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Approximate Surface Area (m²)</label>
                            <input type="text" name="approximate_surface_area" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors" value="{{ old('approximate_surface_area') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Expected Start Date</label>
                            <input type="text" name="expected_start_date" placeholder="e.g. Q3 2024 or ASAP" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors" value="{{ old('expected_start_date') }}">
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- 3. Required Services -->
                <div>
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 font-bold mr-3">3</span>
                        <h2 class="text-2xl font-bold text-gray-900">Required Services</h2>
                    </div>
                    
                    <div class="pl-11">
                        <p class="text-gray-500 text-sm mb-4">Select all services that apply to your project:</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($services as $service)
                            <label class="flex items-start p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-red-50 hover:border-red-200 transition-colors">
                                <input type="checkbox" name="services[]" value="{{ $service->id }}" class="mt-1 w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500" {{ (is_array(old('services')) && in_array($service->id, old('services'))) ? ' checked' : '' }}>
                                <span class="ml-3">
                                    <span class="block text-sm font-bold text-gray-900">{{ $service->title }}</span>
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('services') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- 4. Description & Attachments -->
                <div>
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 font-bold mr-3">4</span>
                        <h2 class="text-2xl font-bold text-gray-900">Additional Details</h2>
                    </div>
                    
                    <div class="pl-11 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Project Description <span class="text-red-500">*</span></label>
                            <textarea name="project_description" rows="5" required placeholder="Please describe your requirements, current floor condition, specific constraints, etc." class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors">{{ old('project_description') }}</textarea>
                            @error('project_description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Attachments (Plans, Photos, Specs)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="attachments" class="relative cursor-pointer bg-transparent rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                            <span>Upload files</span>
                                            <input id="attachments" name="attachments[]" type="file" class="sr-only" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.zip">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PDF, Images, Word up to 10MB</p>
                                </div>
                            </div>
                            @error('attachments') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            @error('attachments.*') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="pl-11 pt-6">
                    <button type="submit" class="w-full sm:w-auto bg-red-600 text-white font-bold py-4 px-10 rounded-lg hover:bg-red-700 transition-colors shadow-lg hover:shadow-red-600/30 text-lg">
                        Submit Request
                    </button>
                    <p class="mt-4 text-sm text-gray-500">By submitting this form, you agree to our privacy policy regarding the storage of your data.</p>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>