@extends('layouts.app')

@section('content')
    <div>
        <div style="text-align:center;">
        <h1>Converter</h1>

        </div>

        <div>
            <form action="/convert" method="post">
                @csrf
                <div>
                    <input type="text" name="amount" placeholder="1.00" style="color: gray;">
                </div>
                <div>
                    <label>FROM</label>
                    <select name="from">
                    @foreach ($codes as $code => $value)
                        <option {{$code == @session('conversion') || $code == 'EUR' ? 'selected' : '' }}>
                        {{ $code }}
                    </option>
                        @endforeach
                  
                    </select>
                    
                </div>
                <div>
                <label>TO</label>

                <select name="to">
                    @foreach ($codes as $code => $value)
                        <option {{$code == @session('conversion') || $code === 'USD' ? 'selected' : '' }}>
                        {{ $code }}
                    </option>
                        @endforeach
                </select>
                </div>

                <div>
                    <button type="submit">
                        Convert
                    </button>
                </div>
            </form>
        </div>
        @if (session('conversion'))
            <div>
                {{ session('conversion') }}
            </div>
        @elseif ($errors->any())
            @foreach ($errors->all() as $error)
                {{ $error }}
                
            @endforeach
        @endif
    </div>
@endsection