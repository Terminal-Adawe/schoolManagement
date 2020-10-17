@extends('dashboard.layout.students')

@section('morecontent')
<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Students</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="sel1">By Class:</label>
                                    <select class="form-control class-select" id="sel1">
                                        <option>All</option>
                                        @foreach($data['classes'] as $class)
                                            <option>{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="sel1">By Course:</label>
                                    <select class="form-control course-select" id="sel1">
                                        <option>All</option>
                                      @foreach($data['courses'] as $course)
                                            <option>{{ $course->course_title }}</option>
                                        @endforeach
                                    </select>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="sel1">By Teacher:</label>
                                    <select class="form-control" id="sel1">
                                      @foreach($data['staff'] as $staff)
                                            <option>{{ $staff->name }}</option>
                                        @endforeach
                                    </select>
                            </div> 
                        </div>
                    </div>
                </div>
                 
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Class</th>
                    <th scope="col" class="sort" data-sort="status">Course</th>
                    <th scope="col">Address</th>
                    <th scope="col" class="sort" data-sort="completion">Last Position</th>
                    <th scope="col" class="sort" data-sort="completion">Current Position</th>
                    <!-- <th scope="col"></th> -->
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach($data['students'] as $student)
                  <tr class="table-row">
                    <th scope="row">
                      <div class="media align-items-center">
                        <form method="get" action="{{ url('/view-student') }}">
                          @csrf
                          <input type="hidden" name="studentid" value="{{ $student->id }}">
                        <button type="submit" width="100%" height="100%" style="border: none; background: none;" class="row">
                          <span class="avatar rounded-circle mr-3 col">
                            <img alt="Image placeholder" src="{{ Storage::url($student->avatar) }}">
                          </span>
                          <div class="media-body col">
                            <span class="name mb-0 text-sm my-auto">{{ $student->first_name }} {{ $student->last_name }}</span>
                          </div>
                        </button>
                        </form>
                      </div>
                    </th>
                    <td>
                      <div class="d-flex align-items-center class-items">
                        {{ $student->class }}
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center course-items">
                        {{ $student->course }}
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        {{ $student->address }}
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        
                      </div>
                    </td>
                    
                    <!-- <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection