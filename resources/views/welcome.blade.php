@extends('layouts.app')

@section('content')
    @if ($errors->has('email'))
        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
    @endif
    <form method="POST" action="/send-email">
        @csrf
    
        <div>
            <label for="from">From:</label>
            <input type="email" id="from" name="from" value="{{ old('from') }}" required>
            @if ($errors->has('from'))
                <div class="alert alert-danger">{{ $errors->first('from') }}</div>
            @endif
        </div>
    
        <div>
            <label for="to">To:</label>
            <input type="email" id="to" name="to" value="{{ old('to') }}" required>
            @if ($errors->has('to'))
                <div class="alert alert-danger">{{ $errors->first('to') }}</div>
            @endif
        </div>
    
        <div>
            <label for="cc">Cc:</label>
            <input type="email" id="cc" name="cc" value="{{ old('cc') }}">
            @if ($errors->has('cc'))
                <div class="alert alert-danger">{{ $errors->first('cc') }}</div>
            @endif
        </div>
    
        <div>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
            @if ($errors->has('subject'))
                <div class="alert alert-danger">{{ $errors->first('subject') }}</div>
            @endif
        </div>
    
        <div>
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="text" {{ old('type') == 'text' ? "selected" : "" }}>Text</option>
                <option value="html" {{ old('type') == 'html' ? "selected" : "" }}>HTML</option>
            </select>
            @if ($errors->has('type'))
                <div class="alert alert-danger">{{ $errors->first('type') }}</div>
            @endif
        </div>
    
        <div>
            <label for="body">Body:</label>
            <textarea id="body" name="body" required>{{ old('body') }}</textarea>
            @if ($errors->has('body'))
                <div class="alert alert-danger">{{ $errors->first('body') }}</div>
            @endif
        </div>
    
        <button type="submit">Send</button>
    </form>
@endsection
