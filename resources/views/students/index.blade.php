@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div>
            <h2>List of students</h2>
        </div>

        <div class="mt-4">
            <table id="dataTable" class="table table-bordered table-hover w-100">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Identification</th>
                        <th scope="col">Email</th>
                        <th scope="col">Facultad</th>
                        <th scope="col">Programa</th>
                        <th scope="col">tipo</th>
                        <th scope="col">avatar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="item{{ $student->id }}">
                            <th scope="row">{{ $student->id }}</th>
                            <td>{{ $student->nombre }}</td>
                            <td>{{ $student->cedula }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->facultad }}</td>
                            <td>{{ $student->programa }}</td>
                            <td>{{ $student->tipo }}</td>
                            <td class="d-flex justify-content-center">
                                <button class="delete-modal"
                                    data-info="{{ $student->avatar }},{{ $student->nombre }},{{ $student->email }}">
                                    <img src="{{ asset('/dist/icons/icon_' . ($student->avatar - 1) . '.png') }}" alt=""
                                        width="30" height="40">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="application/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Todos"],
                ],
                columnDefs: [{
                    orderable: false,
                    searchable: false,
                    targets: 7
                }],
            });
        });

        $(document).on('click', '.delete-modal', function() {
            var stuff = $(this).data('info').split(",");

            Swal.fire({
                title: stuff[1] + '!',
                text: stuff[2] + '.',
                imageUrl: '/dist/icons/icon_' + stuff[0] + '.png',
            })
        });

    </script>
@endsection
