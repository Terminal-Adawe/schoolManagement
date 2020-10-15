@extends('dashboard.layout.studentRanks')

@section('morecontent')
<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Students</h3>
            </div>
            <input type="hidden" class="subject-id" value="">
            <div class="table-responsive">
                <div class="container-fluid my-2">
                    <div class="row mb-1">
                      <div class="col">
                        <div class="form-group">
                              <select class="form-control term" id="sel1">
                                  @if(isset($data['subjects']))
                                      <option value="0">Select Subject</option>
                                    @foreach($data['subjects'] as $subject)
                                      <option value="subject">{{ $subject->subject_name }}</option>
                                    @endforeach
                                  @else
                                    <option>Select Class</option>
                                  @endif
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col">
                        <form action="/studentranks" method="get" style="width: 100%">
                            <input type="hidden" name="classid" value="{{ $data['class']->id }}">
                            <input type="hidden" name="term" value="Term_1">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke;">1st Term</button>
                        </form>
                      </div>
                      <div class="col">
                        <form action="/studentranks" method="get" style="width: 100%">
                            <input type="hidden" name="classid" value="{{ $data['class']->id }}">
                            <input type="hidden" name="term" value="Term_2">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke;">2nd Term</button>
                        </form>
                      </div>
                      <div class="col">
                        <form action="/studentranks" method="get" style="width: 100%">
                            <input type="hidden" name="classid" value="{{ $data['class']->id }}">
                            <input type="hidden" name="term" value="Term_3">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke;">3rd Term</button>
                        </form>
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
                    <th scope="col" class="sort" data-sort="budget">Class</th>
                    <th scope="col">Score /100</th>
                    <th scope="col">Rank</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($data['students'] as $i => $student)
                  <tr class="table-row">
                    <input type="hidden" name="studentid" class="studentid" value="{{ $student->studentid }}">
                    <th scope="row">
                      <div class="d-flex align-items-center class-items">
                        {{ $student->first_name }} {{ $student->last_name }}
                      </div>
                    </th>
                    <td>
                      <div class="d-flex align-items-center class-items">
                        {{ $student->class }}
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <label>{{ $student->score  }}</label>
                      </div>
                    </td>
                    <td>
                      {{ $i + 1 }}
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