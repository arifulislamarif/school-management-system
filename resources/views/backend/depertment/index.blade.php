@extends('layouts.admin')
@section('title') Depertment | Academic @endsection

@section('content')

@php
$user = Auth::user();
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Depertment</h3>
                    <a href="{{ route('depertment.create') }}" class="btn btn-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;Add Depertment</a>
                </div>
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" width="75%">Depertment</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="25%"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($depertments as $depertment)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1 text-center" tabindex="0">{{ $depertment->name }}</td>
                                            <td class="sorting_1 text-center" tabindex="0">
                                                <a data-toggle="tooltip" data-placement="top" title="depertment Profile" href="{{ route('depertment.show', $depertment->id) }}" class="btn bg-warning"><i class="fas fa-eye"></i></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Edit Depertment" href="{{ route('depertment.edit', $depertment->id) }}" class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('depertment.destroy', $depertment->id) }}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button data-toggle="tooltip" data-placement="top" title="Delete Depertment" onclick="return confirm('Are you sure you want to delete this item?');" class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                </form>
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
</div>
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
@endsection
