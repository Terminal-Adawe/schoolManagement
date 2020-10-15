@extends('dashboard.layout.addGrades')

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
                                <label for="sel1">{{ $data['class']->class_name }}</label>
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
                                <label for="sel1">By Subject:</label>
                                    <select class="form-control only-subject-select" id="sel1">
                                        <option>All</option>
                                        @foreach($data['subjects'] as $subject)
                                            <option>{{ $subject->subject_name }}</option>
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
                    <div class="row mb-3">
                      <div class="col">
                        <form action="/student-grades" method="get" style="width: 100%">
                            <input type="hidden" name="classid" value="{{ $data['class']->id }}">
                            <input type="hidden" name="term" value="Term_1">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke;">1st Term</button>
                        </form>
                      </div>
                      <div class="col">
                        <form action="/student-grades" method="get" style="width: 100%">
                            <input type="hidden" name="classid" value="{{ $data['class']->id }}">
                            <input type="hidden" name="term" value="Term_2">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke;">2nd Term</button>
                        </form>
                      </div>
                      <div class="col">
                        <form action="/student-grades" method="get" style="width: 100%">
                            <input type="hidden" name="classid" value="{{ $data['class']->id }}">
                            <input type="hidden" name="term" value="Term_3">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke;">3rd Term</button>
                        </form>
                      </div>
                      <div class="col">
                        <a class="btn btn-primary btn-block" href="/addtestscore" style="color: whitesmoke">Add Test Scores</a>
                    </div>
                    </div>

                    <div class="row">
                      <div class="col-12 alert-box">

                      </div>
                    </div>

                </div>
                 
              
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Term</th>
<!--                     <th scope="col" class="sort" data-sort="budget">Class</th> -->
                    <!-- <th scope="col" class="sort" data-sort="status">Course</th> -->
                    <th scope="col" class="sort" data-sort="status">Subject</th>
                    <th scope="col">Test Score</th>
                    <th scope="col">Exam Score</th>
                    <th scope="col">
                            <button class="btn btn-secondary btn-block saveScores" type="submit" style="color: #208ade;" value="{{ $data['term'] }}">Save</button>
                    </th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach($data['students'] as $student)
                  <tr class="table-row">
                    <input type="hidden" name="studentid" class="studentid" value="{{ $student->studentid }}">
                    <th scope="row">
                      <div class="d-flex align-items-center class-items">
                        {{ $student->first_name }}
                      </div>
                    </th>
                    <td>
                      <div class="d-flex align-items-center class-items">
                        {{ $student->term }}
                      </div>
                    </td>
                    <!-- <td>
                      <div class="d-flex align-items-center class-items">
                        {{ $student->class }}
                      </div>
                    </td> -->
                    <!-- <td>
                      <div class="d-flex align-items-center course-items">
                        {{ $student->course }}
                      </div>
                    </td> -->
                    <td>
                      <div class="d-flex align-items-center subject-items">
                        {{ $student->subject_name }}
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <label>{{ $student->total_test_score * 0.3  }}</label>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <input type="hidden" name="subjectid" class="subjectid" value="{{ $student->subjectid }}">
                        <input type="text" class="form-control score" id="usr" value="{{ $student->exam_score }}" onclick="this.select()">
                      </div>
                    </td>
                    
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