@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-body">
        <h1>Halaman Datang <strong>{{ Auth::user()->name }}</strong></h1>

        <ul>
            @foreach($menuItem as $menuItemx)
            <li>
                <a href="{{ $menuItemx->url }}">{{ $menuItemx->title }}</a>
                @if($menuItemx->children->count())
                    <ul>
                        @foreach($menuItemx->children as $child)
                            {{-- <x-menu-item :menuItem="$child"/> --}}
                            <li>


                            <a href="{{ $child->url }}">{{ $child->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
  </div>


@endsection
