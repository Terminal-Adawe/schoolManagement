@extends('dashboard.layout.approvals')

@section('morecontent')
    <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Initiated Add Student</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="picture">Picture</th>
                    <th scope="col" class="sort" data-sort="firstname">First Name</th>
                    <th scope="col" class="sort" data-sort="lastname">Last Name</th>
                    <th scope="col" class="sort" data-sort="address">Address</th>
                    <th scope="col" class="sort" data-sort="class">Class</th>
                    <th scope="col" class="sort" data-sort="username">email</th>
                    <th scope="col" class="sort" data-sort="status">status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach($data['students'] as $student)
                  <tr>
                    <th scope="row">
                      <div class="d-flex align-items-center">
                        <img src="{{ Storage::url($student->avatar) }}" width="80px">
                        </div>
                      </div>
                    </th>
                    <th scope="row">
                      <div class="d-flex align-items-center">
                        {{ $student->first_name }}
                        </div>
                      </div>
                    </th>

                    <td scope="row">
                      <div class="d-flex align-items-center">
                        {{ $student->last_name }}
                        </div>
                      </div>
                    </td>

                    <td scope="row">
                      <div class="d-flex align-items-center">
                        {{ $student->address }}
                        </div>
                      </div>
                    </td>

                    <td scope="row">
                      <div class="d-flex align-items-center">
                        {{ $student->class }}
                        </div>
                      </div>
                    </td>

                    <td scope="row">
                      <div class="d-flex align-items-center">
                        {{ $student->email }}
                        </div>
                      </div>
                    </td>

                    <td class="status-column-{{ $student->id }}">
                        @if($student->active=='0')
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                        @elseif($student->active=='1')
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">approved</span>
                      </span>
                        @else
                        <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i>
                        <span class="status">rejected</span>
                      </span>
                        @endif
                    </td>
                   
                    <td class="text-left">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <button class="dropdown-item" type='button' onclick="implementAction(5,'approve','{{ $student->id }}')">Approve</button>
                          <button class="dropdown-item" type="button" onclick="implementAction(5,'reject','{{ $student->id }}')">Reject</button>
                        </div>
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