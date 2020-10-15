@extends('dashboard.layout.approvals')

@section('morecontent')
    <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Initiated Add Class</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Class</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach($data['classes'] as $class)
                  <tr>
                    <th scope="row">
                      <div class="d-flex align-items-center">
                        {{ $class->class_name }}
                        </div>
                      </div>
                    </th>

                    <td class="status-column-{{ $class->id }}">
                        @if($class->active=='0')
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                        @elseif($class->active=='1')
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">approved</span>
                      </span>
                        @else
                        <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i>
                        <span class="status">Rejected</span>
                      </span>
                        @endif
                    </td>
                   
                    <td class="text-left">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <button class="dropdown-item" type="button" onclick="implementAction(1,'approve','{{ $class->id }}')">Approve</button>
                          <button class="dropdown-item" type="button" onclick="implementAction(1,'reject','{{ $class->id }}')">Reject</button>
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