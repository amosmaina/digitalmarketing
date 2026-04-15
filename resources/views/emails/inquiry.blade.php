@component('mail::message')
# New Inquiry Received

**Name:** {{ $inquiry->name }}
**Email:** {{ $inquiry->email }}
**Service:** {{ $inquiry->service ? $inquiry->service->title : 'General' }}

**Message:**
{{ $inquiry->message }}

@component('mail::button', ['url' => config('app.url') . '/admin/inquiries'])
View in Backoffice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
