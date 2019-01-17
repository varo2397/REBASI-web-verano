@extends('layouts.complainant')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Historial de denuncias</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class=" text-primary">
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Dirección</th>
                  @if(Auth::user()->role != 0)
                  <th>Distrito</th>
                  @endif
                  <th>Seguimiento</th>
                  <th>Fecha</th>
                  </thead>
                  <tbody>
                  @foreach($userReports as $report)
                    <tr>
                      <td>
                        <a href="reports/{{$report->id}}/edit">
                        {{ $report->id }}
                        </a>
                      </td>
                      <td>
                        <a href="reports/{{$report->id}}/edit">
                        {{ $report->description }}
                        </a>
                      </td>
                      <td>
                        <a href="reports/{{$report->id}}/edit">
                        {{ $report->address }}
                        </a>
                      </td>
                      @if(Auth::user()->role != 0)
                      <td>
                        <a href="reports/{{$report->id}}/edit">
                        {{ $report->name }}
                        </a>
                      </td>
                      @endif
                      <td>
                        <a href="reports/{{$report->id}}/edit">
                        {{ $report->tracing }}
                        </a>
                      </td>
                      <td>
                        <a href="reports/{{$report->id}}/edit">
                        {{ $report->created_at }}
                        </a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
