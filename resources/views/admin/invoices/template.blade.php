<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        }
        .header {
            width: 100%;
            margin-bottom: 20px;
        }
        .header td {
            vertical-align: top;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
            text-transform: uppercase;
        }
        .invoice-details {
            text-align: right;
        }
        .client-details {
            margin-bottom: 40px;
        }
        .client-details h3 {
            margin-top: 0;
            color: #2563eb;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 5px;
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th {
            background-color: #f3f4f6;
            color: #374151;
            font-weight: bold;
            text-align: left;
            padding: 10px;
            border-bottom: 2px solid #e5e7eb;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
        }
        .total-section {
            width: 100%;
            margin-top: 20px;
        }
        .total-section td {
            border: none;
        }
        .total-label {
            text-align: right;
            font-weight: bold;
            padding-right: 20px;
        }
        .total-amount {
            text-align: right;
            font-weight: bold;
            color: #2563eb;
            font-size: 18px;
            background-color: #f3f4f6;
            width: 150px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .status-pending { background-color: #fef3c7; color: #92400e; }
        .status-paid { background-color: #d1fae5; color: #065f46; }
        .status-cancelled { background-color: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="header">
            <tr>
                <td>
                    <img src="{{ public_path('images/vantagelogo.png') }}" alt="Vantage Logo" style="height: 60px; width: auto; margin-bottom: 10px;">
                    <div class="company-info">
                        Vantage Digital Agency<br>
                        Email: info@vantagedigitalagency.co.ke<br>
                        Phone: +254 780 088088
                    </div>
                </td>
                <td class="invoice-details">
                    <h2 style="margin-top: 0; color: #2563eb;">INVOICE</h2>
                    <p>
                        <strong>Invoice #:</strong> {{ $invoice->invoice_number }}<br>
                        <strong>Date:</strong> {{ $invoice->created_at->format('M d, Y') }}<br>
                        <strong>Due Date:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('M d, Y') }}<br>
                        <strong>Status:</strong> <span class="status-badge status-{{ $invoice->status }}">{{ strtoupper($invoice->status) }}</span>
                    </p>
                </td>
            </tr>
        </table>

        <div class="client-details">
            <h3>BILL TO:</h3>
            <p>
                <strong>{{ $invoice->client->name }}</strong><br>
                {{ $invoice->client->email }}<br>
                {{ $invoice->client->phone }}
            </p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: right;">Unit Price</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr>
                    <td>{{ $item->description }}</td>
                    <td style="text-align: center;">{{ $item->quantity }}</td>
                    <td style="text-align: right;">${{ number_format($item->unit_price, 2) }}</td>
                    <td style="text-align: right;">${{ number_format($item->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="total-section">
            <tr>
                <td colspan="2"></td>
                <td class="total-label">Subtotal</td>
                <td style="text-align: right;">${{ number_format($invoice->total_amount, 2) }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td class="total-label">Tax (0%)</td>
                <td style="text-align: right;">$0.00</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td class="total-label" style="font-size: 18px;">Total</td>
                <td class="total-amount">${{ number_format($invoice->total_amount, 2) }}</td>
            </tr>
        </table>

        <div class="footer">
            <p>Thank you for your business!</p>
            <p>Please make payment within the due date to avoid any service interruption.</p>
        </div>
    </div>
</body>
</html>
