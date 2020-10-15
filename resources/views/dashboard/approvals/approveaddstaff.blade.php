@extends('dashboard.layout.approvals')

@section('morecontent')
    <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Initiated Add Staff</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="username">username</th>
                    <th scope="col" class="sort" data-sort="username">email</th>
                    <th scope="col" class="sort" data-sort="status">status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach($data['staff'] as $staff)
                  <tr>
                    <th scope="row">
                      <div class="d-flex align-items-center">
                        {{ $staff->name }}
                        </div>
                      </div>
                    </th>

                    <td scope="row">
                      <div class="d-flex align-items-center">
                        {{ $staff->username }}
                        </div>
                      </div>
                    </td>

                    <td scope="row">
                      <div class="d-flex align-items-center">
                        {{ $staff->email }}
                        </div>
                      </div>
                    </td>

                    <td class="status-column-{{ $staff->id }}">
                        @if($staff->active=='0')
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                        @elseif($staff->active=='1')
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
                          <button class="dropdown-item" type='button' onclick="implementAction(4,'approve','{{ $staff->id }}')">Approve</button>
                          <button class="dropdown-item" type="button" onclick="implementAction(4,'reject','{{ $staff->id }}')">Reject</button>
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