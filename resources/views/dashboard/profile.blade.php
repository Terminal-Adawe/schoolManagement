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
            <h1 class="display-2 text-white">{{ $data['student']->first_name }} {{ $data['student']->last_name }}</h1>
            <p class="text-white mt-0 mb-5"></p>
            <!-- <a href="#!" class="btn btn-neutral">Edit profile</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ Storage::url($data['student']->avatar) }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <!-- <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a> -->
              </div>
            </div>
            <div class="card-body pt-0">
              <!-- <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="text-center">
                <h5 class="h3">
                  {{ $data['student']->first_name }} {{ $data['student']->last_name }}<span class="font-weight-light">, 27</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{ $data['student']->city }}, {{ $data['student']->country }}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{ $data['student']->class }}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><b>Favorite Subject:</b> {{ $data['favoriteSubject']->subject_name }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">View profile </h3>
                </div>
                <div class="col-4 text-right">
                  <form method="GET" action="/editStudentProfile">
                    @csrf
                    <input type="hidden" name="studentid" value="{{ $data['student']->studentid }}">
                    <button type="submit" class="btn btn-sm btn-primary">Edit Profile</a>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
           
                <h6 class="heading-small text-muted mb-4">Student information</h6>
                <div class="pl-lg-4">
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

                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Medical History</label>
                    <p>{{ $data['student']->medical_history }}</p>
                  </div>
                </div>

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Teacher Comments</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">What do you think of this student?</label>
                    @foreach($data['comment'] as $comment)
                      <p>{{ optional($comment)->comment }}</p>
                    @endforeach
                  </div>
                </div>

                <hr class="my-4" />

              <div class="d-flex justify-content-end bg-secondary mb-3">
                  <div class="p-2">
                    <form method="get" action="{{ url('/print') }}">
                          @csrf
                          <input type="hidden" name="studentid" value="{{ $data['student']->studentid }}">
                            <button type="submit" class="btn btn-danger">Print</button>
                        </form>
                    </div>
                </div>
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