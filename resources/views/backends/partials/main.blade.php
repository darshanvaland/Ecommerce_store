
@include('backends.partials.header')
@include('backends.partials.sidebar')


<main>
    
        @yield('content')

        
        @yield('scripts')
</main>
@include('backends.partials.footer')


