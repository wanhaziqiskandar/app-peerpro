<x-app-layout>
    <h1>Payment Successful</h1>
    <p>{{ $tuition_payment->status}}</p>
    <a href="{{ route('requests.index') }}">Continue Browsing</a>
</x-app-layout>
