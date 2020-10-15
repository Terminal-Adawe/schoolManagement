@extends('dashboard.layout.addTestScores')

@section('morecontent')
<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Students</h3>
            </div>
          <form action="{{ url('/saveTestScore') }}" method="POST" class="saveTestScore">
            <input type="hidden" class="subject-id" value="">
            <div class="table-responsive">
                <div class="container-fluid my-2">
                    <div class="row mb-1">
                      <div class="col">
                        <input type="text" class="form-control testTitle" placeholder="Test Name">
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                      <div class="col">
                        <div class="form-group">
                              <select class="form-control term" id="sel1">
                                <option value="0">Select Term</option>
                                  <option value="Term_1">Term 1</option>
                                  <option value="Term_2">Term 2</option>
                                  <option value="Term_3">Term 3</option>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <input type="hidden" class="tests" />

                      
                    </div>
                    <div class="row mt-2">
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
                  </tr>
                </thead>
                <tbody class="list">
                  <input type="hidden" class="displayStudents" value="{{ $data['students'] }}">
                   
                 
 
                </tbody>
              </table>
            </div>
          </form>

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