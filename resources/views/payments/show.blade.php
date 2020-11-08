@extends ('layouts.app')

@section ('content')
    @livewire('payments.process-payment', compact('payment'))
@endsection
