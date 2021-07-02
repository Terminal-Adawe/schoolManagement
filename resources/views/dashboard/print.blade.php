<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

  <!-- Sidenav -->
  @include('dashboard.head')
 <!-- Sidenav -->
 @extends('dashboard.layout.sidebar')
  <!-- Main content -->
  @section('frame')
  <div class="main-content" id="panel">
    <!-- Topnav -->
   @include('dashboard.nav')
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            Preview
            <p class="text-white mt-0 mb-5"> preview </p>
            <!-- <a href="#!" class="btn btn-neutral">Edit profile</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

      <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-around">
                <div class="p-2">
                  <div style="width: 250px; border-radius: 8px; overflow: hidden;">
                    <img src="{{ Storage::url($data['student']->avatar) }}" width="100%">
                  </div>
                </div>
                <div class="p-2">
                  {{ $data['student']->first_name }} {{ $data['student']->last_name }}<span class="font-weight-light">, 27</span>
                </div>
                <div class="p-2">
                  {{ $data['student']->class }}
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Student information</h6>
                <div class="container-fluid pl-lg-4">
                  <div class="row">
              <!--       <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                      </div>
                    </div> -->
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">Email address</label>
                        <p>{{ $data['student']->email }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">First name</label>
                        <p>{{ $data['student']->first_name }}</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <p>
                          {{ $data['student']->last_name }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <p>
                          {{ $data['student']->address }}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <p>
                          {{ $data['student']->city }}
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <p>
                          {{ $data['student']->country }}
                        </p>
                      </div>
                    </div>
                    <!-- <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-postal-code">Postal code</label>
                        <p>
                        </p>
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <label class="form-control-label" for="input-g-contact">Guardian's Contact</label>
                      <p>
                        {{ $data['student']->guardian_contact }}
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <label class="form-control-label" for="input-g-email">Guardian's Email</label>
                      <p>
                        {{ $data['student']->guardian_email }}
                      </p>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Description</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Student</label>
                    <p>{{ $data['student']->description }}</p>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Hobbies</label>
                    <p>{{ $data['student']->hobbies }}</p>
                  </div>
                </div>

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Teacher Comments</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    @foreach($data['comment'] as $comment)
                      <p>{{ optional($comment)->comment }}</p>
                    @endforeach
                  </div>
                </div>
         
            </div>
          </div>

        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-body">
              <form action="/print-sheet" method="POST">
                @csrf 
                <input type="hidden" name="studentid" value="{{ $data['student']->studentid }}">
                <input type="hidden" name="thehtml" value='<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="School Management System">
  <meta name="author" content="Creative Tim">
  <title>School Management System</title>
  <link rel="icon" href="{{ public_path("assets/img/brand/favicon.png") }}" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{ public_path("assets/vendor/nucleo/css/nucleo.css") }}" type="text/css">
  <link rel="stylesheet" href="{{ public_path("assets/vendor/@fontawesome/fontawesome-free/css/all.min.css") }}" type="text/css">
  <link rel="stylesheet" href="{{ public_path("assets/css/argon.css?v=1.2.0") }}" type="text/css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="{{ public_path("assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ public_path("assets/vendor/js-cookie/js.cookie.js") }}"></script>
  <script src="{{ public_path("assets/js/argon.js?v=1.2.0") }}"></script>
</head>
<div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-around">
                <div class="p-2">
                  <div style="width: 250px; border-radius: 8px; overflow: hidden;">
                    <img src="{{ public_path("storage/".$data["student"]->avatar) }}" width="100%">
                  </div>
                </div>
                <div class="p-2">
                  {{ $data["student"]->first_name }} {{ $data["student"]->last_name }}<span class="font-weight-light">, 27</span>
                </div>
                <div class="p-2">
                  {{ $data["student"]->class }}
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Student information</h6>
                <div class="container-fluid pl-lg-4">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label class="form-control-label">Email address</label>
                        <p>{{ $data["student"]->email }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-control-label">First name</label>
                        <p>{{ $data["student"]->first_name }}</p>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <p>
                          {{ $data["student"]->last_name }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <p>
                          {{ $data["student"]->address }}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <p>
                          {{ $data["student"]->city }}
                        </p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <p>
                          {{ $data["student"]->country }}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label class="form-control-label" for="input-g-contact">Guardians Contact</label>
                      <p>
                        {{ $data["student"]->guardian_contact }}
                      </p>
                    </div>
                    <div class="col-6">
                      <label class="form-control-label" for="input-g-email">Guardians Email</label>
                      <p>
                        {{ $data["student"]->guardian_email }}
                      </p>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Description</h6>
                <div class="pl-4">
                  <div class="form-group">
                    <label class="form-control-label">About Student</label>
                    <p>{{ $data["student"]->description }}</p>
                  </div>
                </div>

                <div class="pl-4">
                  <div class="form-group">
                    <label class="form-control-label">Hobbies</label>
                    <p>{{ $data["student"]->hobbies }}</p>
                  </div>
                </div>

                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Teacher Comments</h6>
                <div class="pl-4">
                  <div class="form-group">
                    @foreach($data["comment"] as $comment)
                      <p>{{ optional($comment)->comment }}</p>
                    @endforeach
                  </div>
                </div>
            </div>
          </div>'>
                <button type="submit" class="btn btn-danger">Download</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      @include('dashboard.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('dashboard.foot')

  @endsection