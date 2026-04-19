<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #111; margin: 0; padding: 0; line-height: 1.5; background: #fff; }
        .invoice-box { max-width: 800px; margin: auto; padding: 40px; }
        .header { width: 100%; margin-bottom: 30px; border-bottom: 3px solid #eab308; padding-bottom: 20px; }
        .logo-text { font-size: 32px; font-weight: bold; color: #000; letter-spacing: 3px; }
        .logo-sub { font-size: 10px; color: #666; text-transform: uppercase; letter-spacing: 2px; }
        .invoice-title { text-align: right; font-size: 24px; font-weight: bold; color: #eab308; }
        .details-table { width: 100%; margin-bottom: 40px; }
        .details-table td { vertical-align: top; width: 50%; }
        .section-label { font-size: 12px; font-weight: bold; color: #eab308; text-transform: uppercase; margin-bottom: 5px; }
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .items-table th { background-color: #000; color: #eab308; text-align: left; padding: 12px 15px; text-transform: uppercase; font-size: 13px; }
        .items-table td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        .items-table tr:nth-child(even) { background-color: #fafafa; }
        .total-row td { padding-top: 20px; border: none; }
        .total-box { background: #000; color: #eab308; padding: 15px 25px; border-radius: 10px; text-align: right; }
        .total-label { font-size: 14px; font-weight: bold; }
        .total-amount { font-size: 22px; font-weight: bold; }
        .footer { margin-top: 60px; text-align: center; border-top: 1px solid #eee; padding-top: 30px; }
        .contact-info { display: flex; justify-content: center; gap: 20px; font-size: 11px; color: #444; margin-top: 10px; }
        .brand-color { color: #eab308; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="header">
            <tr>
                <td>
                    <div class="logo-text">VANTAGE</div>
                    <div class="logo-sub">Premium Digital & Event Agency</div>
                </td>
                <td class="invoice-title">
                    INVOICE<br>
                    <span style="font-size: 14px; color: #444;">#{{ $invoice->invoice_number }}</span>
                </td>
            </tr>
        </table>

        <table class="details-table">
            <tr>
                <td>
                    <div class="section-label">Bill To:</div>
                    <div style="font-weight: bold; font-size: 16px;">{{ $invoice->client->name }}</div>
                    <div style="color: #444;">{{ $invoice->client->email }}</div>
                    <div style="color: #444;">{{ $invoice->client->phone }}</div>
                </td>
                <td style="text-align: right;">
                    <div class="section-label">Details:</div>
                    <div><strong>Date:</strong> {{ $invoice->created_at->format('M d, Y') }}</div>
                    <div><strong>Due Date:</strong> {{ $invoice->due_date ? $invoice->due_date->format('M d, Y') : $invoice->created_at->addDays(7)->format('M d, Y') }}</div>
                    <div><strong>Status:</strong> <span class="brand-color">{{ strtoupper($invoice->status) }}</span></div>
                </td>
            </tr>
        </table>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: right;">Price</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr>
                    <td>{{ $item->description }}</td>
                    <td style="text-align: center;">{{ $item->quantity }}</td>
                    <td style="text-align: right;">{{ number_format($item->unit_price, 2) }}</td>
                    <td style="text-align: right;">{{ number_format($item->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table style="width: 100%;">
            <tr>
                <td style="width: 60%;">
                    <div class="section-label">Payment Information:</div>
                    <div style="font-size: 12px; color: #666;">
                        Please use Invoice #{{ $invoice->invoice_number }} as reference.<br>
                        Payments can be made via Bank Transfer or M-Pesa.
                    </div>
                </td>
                <td style="width: 40%;">
                    <div class="total-box">
                        <span class="total-label">GRAND TOTAL:</span><br>
                        <span class="total-amount">KES {{ number_format($invoice->total_amount, 2) }}</span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="footer">
            <p style="font-weight: bold; margin-bottom: 5px;">Thank you for your business!</p>
            <div class="contact-info">
                <span>📧 info@vantagedigitalagency.co.ke</span> | 
                <span>📞 +254 780 088088</span> | 
                <span>💬 WhatsApp: +254 780 088088</span>
            </div>
            <p style="font-size: 10px; color: #999; margin-top: 20px;">
                &copy; {{ date('Y') }} Vantage Digital Agency. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
