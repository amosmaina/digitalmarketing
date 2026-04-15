<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Str;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $client = Client::first() ?: Client::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890'
        ]);

        $invoice = Invoice::create([
            'client_id' => $client->id,
            'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
            'due_date' => now()->addDays(30),
            'total_amount' => 500.00,
            'status' => 'pending'
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => 'Web Design Service',
            'quantity' => 1,
            'unit_price' => 300.00,
            'total' => 300.00
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => 'SEO Optimization',
            'quantity' => 1,
            'unit_price' => 200.00,
            'total' => 200.00
        ]);
    }
}
