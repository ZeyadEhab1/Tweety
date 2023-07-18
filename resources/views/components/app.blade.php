@extends('components.master')
@section('content')
<section class="px-8">
    <main class="container mx-auto">
        <div class="lg:flex lg:justify-between">
            @section('content')
            <div class="lg:w-32">
                @include('_sidebar-links')
            </div>

            <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                @yield('content')
            </div>
            <div>
                @include('_friends-list')
            </div>

        </div>

    </main>
</section>
@endsection
