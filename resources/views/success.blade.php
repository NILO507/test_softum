@extends('layouts.app')

@section('content')
    <div>
        <p>Адрес отправителя: {{ $from }}</p>
        <p>Адрес получателя: {{ $to }}</p>
        @if($cc)
            <p>Адрес копии письма: {{ $cc }}</p>
        @endif
        <p>Тип тела письма: {{ $type }}</p>
    </div>

    @if($type === 'text')
        <p>Тело письма:</p>
        <pre>{{ $body }}</pre>
    @elseif($type === 'html')
        <p>Тело письма:</p>
        <iframe srcdoc="{{ $body }}" width="100%" height="400" frameborder="0"></iframe>
    @endif
@endsection