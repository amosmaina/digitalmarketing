<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index()
    {
        $servicesCount = Service::count();
        $inquiriesCount = Inquiry::count();
        $usersCount = User::count();
        $clientsCount = Client::count();
        $latestInquiries = Inquiry::with('service')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact('servicesCount', 'inquiriesCount', 'usersCount', 'clientsCount', 'latestInquiries'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,marketer'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image_file' => 'nullable|image|max:2048',
            'image_url' => 'nullable|url',
            'features' => 'required|array',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('services', 'public');
            $validated['image'] = Storage::url($path);
        } elseif ($request->image_url) {
            $validated['image'] = $request->image_url;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $service->update($validated);

        return redirect()->route('admin.index')->with('success', 'Service updated successfully.');
    }

    public function inquiries()
    {
        $inquiries = Inquiry::with('service')->latest()->paginate(10);
        return view('admin.inquiries', compact('inquiries'));
    }

    // Client Management
    public function clients()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function convertInquiry(Inquiry $inquiry)
    {
        $client = Client::firstOrCreate(
            ['email' => $inquiry->email],
            ['name' => $inquiry->name, 'phone' => $inquiry->phone]
        );

        return redirect()->route('admin.clients.index')->with('success', 'Inquiry converted to client successfully.');
    }

    // Invoicing
    public function invoices()
    {
        $invoices = Invoice::with('client')->latest()->paginate(10);
        return view('admin.invoices.index', compact('invoices'));
    }

    public function createInvoice(Client $client)
    {
        return view('admin.invoices.create', compact('client'));
    }

    public function storeInvoice(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'due_date' => 'required|date',
            'items' => 'required|array',
            'items.*.description' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::create([
            'client_id' => $validated['client_id'],
            'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
            'due_date' => $validated['due_date'],
            'total_amount' => 0,
            'status' => 'pending'
        ]);

        $total = 0;
        foreach ($validated['items'] as $item) {
            $itemTotal = $item['quantity'] * $item['unit_price'];
            $invoice->items()->create([
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total' => $itemTotal
            ]);
            $total += $itemTotal;
        }

        $invoice->update(['total_amount' => $total]);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice generated successfully.');
    }

    public function downloadInvoice(Invoice $invoice)
    {
        $invoice->load('client', 'items');
        $pdf = Pdf::loadView('admin.invoices.template', compact('invoice'));
        return $pdf->download($invoice->invoice_number . '.pdf');
    }

    // POS
    public function products()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = Storage::url($path);
        }

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    // Page Sections
    public function pageSections()
    {
        $sections = PageSection::orderBy('page_name')->orderBy('order')->get();
        return view('admin.sections.index', compact('sections'));
    }

    public function storeSection(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string',
            'section_type' => 'required|string',
            'title' => 'required|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'integer'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sections', 'public');
            $validated['image'] = Storage::url($path);
        }

        PageSection::create($validated);
        return redirect()->route('admin.sections.index')->with('success', 'Section added successfully.');
    }
}
