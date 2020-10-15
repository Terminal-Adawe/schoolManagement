  @include('dashboard.head')
 <!-- Sidenav -->
 @extends('dashboard.layout.sidebar')

@section('frame')
  <!-- Main content -->
  <div class="main-content" id="panel">
    @include('dashboard.nav')
    @include('dashboard.statHeader')
    <div class="container-fluid mt--6">
      @yield('content')
      @include('dashboard.footer')
    </div>
  </div>
  @include('dashboard.foot')
@endsection