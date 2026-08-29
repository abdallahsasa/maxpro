<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_can_be_submitted()
    {
        $response = $this->post(route('contact.submit'), [
            'name' => 'John Doe',
            'company' => 'Acme Corp',
            'email' => 'john@example.com',
            'phone' => '+33123456789',
            'subject' => 'General Inquiry',
            'message' => 'Hello, I would like to know more about your services.',
        ]);

        $response->assertSessionHas('success');
        $response->assertRedirect();
        
        $this->assertDatabaseHas('contact_requests', [
            'email' => 'john@example.com',
            'company' => 'Acme Corp',
        ]);
    }

    public function test_quote_request_form_can_be_submitted_with_attachments()
    {
        Storage::fake('public');
        
        $file = UploadedFile::fake()->create('document.pdf', 1000, 'application/pdf');

        $response = $this->post(route('quote.submit'), [
            'company_name' => 'BuildIt Co.',
            'contact_name' => 'Jane Smith',
            'email' => 'jane@buildit.com',
            'phone' => '+33987654321',
            'project_location' => 'Paris',
            'project_type' => 'Commercial',
            'project_description' => 'Need 500sqm of epoxy flooring.',
            'attachments' => [$file],
        ]);

        $response->assertSessionHas('success');
        $response->assertRedirect();

        $this->assertDatabaseHas('quote_requests', [
            'email' => 'jane@buildit.com',
            'project_location' => 'Paris',
        ]);

        $this->assertDatabaseHas('quote_attachments', [
            'original_name' => 'document.pdf',
        ]);
    }
}
