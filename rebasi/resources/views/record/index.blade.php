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
                  <th>Lugar</th>
                  <th>Fecha</th>
                  </thead>
                  <tbody>
                  @foreach($userReports as $report)
                    <tr>
                      <td>
                        {{ $report->id }}
                      </td>
                      <td>
                        {{ $report->description }}
                      </td>
                      <td>
                        {{ $report->place }}
                      </td>
                      <td>
                        {{ $report->created_at }}
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
