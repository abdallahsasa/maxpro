<?php

$routesContent = <<<'PHP'
<?php
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
    
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
    
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
    
    Route::get('/quote', [QuoteController::class, 'index'])->name('quote');
    Route::post('/quote', [QuoteController::class, 'submit'])->name('quote.submit');
});
PHP;

file_put_contents(__DIR__ . '/routes/web.php', $routesContent);


$controllersDir = __DIR__ . '/app/Http/Controllers/';

$homeController = <<<'PHP'
<?php
namespace App\Http\Controllers;
use App\Models\Statistic;
use App\Models\Service;
use App\Models\Project;
use App\Models\Partner;
class HomeController extends Controller {
    public function index() {
        $statistics = Statistic::orderBy('order_column')->get();
        $services = Service::where('is_published', true)->orderBy('order_column')->take(3)->get();
        $featuredProjects = Project::where('is_featured', true)->latest('published_at')->take(4)->get();
        $partners = Partner::where('is_active', true)->orderBy('order_column')->get();
        return view('welcome', compact('statistics', 'services', 'featuredProjects', 'partners'));
    }
}
PHP;
file_put_contents($controllersDir . 'HomeController.php', $homeController);

$pageController = <<<'PHP'
<?php
namespace App\Http\Controllers;
use App\Models\Page;
use App\Models\Commitment;
class PageController extends Controller {
    public function about() {
        $page = Page::where('identifier', 'about')->first();
        $commitments = Commitment::orderBy('order_column')->get();
        return view('about', compact('page', 'commitments'));
    }
}
PHP;
file_put_contents($controllersDir . 'PageController.php', $pageController);

$serviceController = <<<'PHP'
<?php
namespace App\Http\Controllers;
use App\Models\Service;
class ServiceController extends Controller {
    public function index() {
        $services = Service::where('is_published', true)->orderBy('order_column')->get();
        return view('services.index', compact('services'));
    }
    public function show($slug) {
        $service = Service::where('slug->'.app()->getLocale(), $slug)
                          ->orWhere('slug->en', $slug)
                          ->orWhere('slug->fr', $slug)
                          ->firstOrFail();
        return view('services.show', compact('service'));
    }
}
PHP;
file_put_contents($controllersDir . 'ServiceController.php', $serviceController);

$projectController = <<<'PHP'
<?php
namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Sector;
use Illuminate\Http\Request;
class ProjectController extends Controller {
    public function index(Request $request) {
        $query = Project::query();
        if ($request->has('sector')) {
            $query->whereHas('sector', function($q) use ($request) {
                $q->where('slug->en', $request->sector)->orWhere('slug->fr', $request->sector);
            });
        }
        $projects = $query->latest('published_at')->paginate(12);
        $sectors = Sector::where('is_published', true)->orderBy('order_column')->get();
        return view('projects.index', compact('projects', 'sectors'));
    }
    public function show($slug) {
        $project = Project::where('slug->'.app()->getLocale(), $slug)
                          ->orWhere('slug->en', $slug)
                          ->orWhere('slug->fr', $slug)
                          ->firstOrFail();
        return view('projects.show', compact('project'));
    }
}
PHP;
file_put_contents($controllersDir . 'ProjectController.php', $projectController);

$contactController = <<<'PHP'
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactRequest;
class ContactController extends Controller {
    public function index() {
        return view('contact');
    }
    public function submit(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            // 'cf-turnstile-response' => 'required',
        ]);
        $validated['ip_address'] = $request->ip();
        ContactRequest::create($validated);
        return back()->with('success', 'Your message has been sent successfully. We will get back to you soon.');
    }
}
PHP;
file_put_contents($controllersDir . 'ContactController.php', $contactController);

$quoteController = <<<'PHP'
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use App\Models\QuoteAttachment;
use App\Models\Service;
class QuoteController extends Controller {
    public function index() {
        $services = Service::where('is_published', true)->orderBy('order_column')->get();
        return view('quote', compact('services'));
    }
    public function submit(Request $request) {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'project_location' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'approximate_surface_area' => 'nullable|string|max:255',
            'expected_start_date' => 'nullable|string|max:255',
            'project_description' => 'required|string',
            'services' => 'array',
            'services.*' => 'exists:services,id',
            'attachments' => 'array|max:5',
            'attachments.*' => 'file|max:10240',
        ]);
        
        $quote = QuoteRequest::create([
            'company_name' => $validated['company_name'],
            'contact_name' => $validated['contact_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'project_location' => $validated['project_location'],
            'project_type' => $validated['project_type'],
            'approximate_surface_area' => $validated['approximate_surface_area'] ?? null,
            'expected_start_date' => $validated['expected_start_date'] ?? null,
            'project_description' => $validated['project_description'],
            'ip_address' => $request->ip(),
        ]);
        
        if (!empty($validated['services'])) {
            $quote->services()->attach($validated['services']);
        }
        
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('quote_attachments', 'public');
                QuoteAttachment::create([
                    'quote_request_id' => $quote->id,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);
            }
        }
        
        return back()->with('success', 'Your quote request has been submitted. Our team will contact you shortly.');
    }
}
PHP;
file_put_contents($controllersDir . 'QuoteController.php', $quoteController);

echo "Controllers created and routes updated.\n";
