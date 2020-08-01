@section('styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div>
      <h2>
        List of questions
        <a href="questions/create">
          <button type="button" class="btn btn-success float-right">Add question</button>
        </a>
      </h2>
    </div>

    <div class="mt-4">
      <table id="dataTable" class="table table-bordered table-hover w-100">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Correct option</th>
            <th scope="col">Option 1</th>
            <th scope="col">Option 2</th>
            <th scope="col">Option 3</th>
            <th scope="col">Factor</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($questions as $question)
            <tr class="item{{ $question->id }}">
              <th scope="row">{{ $question->id }}</th>
              <td>{{ $question->titulo }}</td>
              <td>{{ $question->opcCorrecta }}</td>
              <td>{{ $question->opc1 }}</td>
              <td>{{ $question->opc2 }}</td>
              <td>{{ $question->opc3 }}</td>
              <td>{{ $question->factor == 0 ? 'General' : $question->factor }}</td>
              <td class="d-flex justify-content-center">
                <a href="{{ route('users.edit', $question->id) }}">
                  <button type="button" class="btn btn-primary btn-sm mx-1">
                    <i class="material-icons">create</i>
                  </button>
                </a>
                <button class="delete-modal btn btn-danger btn-sm" data-info="{{ $question->id }}">
                  <i class="material-icons">delete_forever</i>
                </button></td>
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
          width: "12%",
          targets: 7
        }],
      });
    });

    $(document).on('click', '.delete-modal', function() {

      Swal.fire({
        title: 'Are you sure?',
        text: "Question #" + $(this).data('info') + " will be deleted",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, do it!',
        cancelButtonText: "No"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "DELETE",
            url: '/users/destroy',
            data: {
              "_token": $('meta[name="csrf-token"]').attr('content'),
              'id': $(this).data('info')
            },
            success: function(data) {
              $('.item' + $(this).data('info')).remove();
              Swal.fire(
                'Deleted!',
                'The question ' + $(this).data('info') + " was deleted successfully.",
                'success'
              );
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.error(XMLHttpRequest.responseText);
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
              })
            }
          });
        }
      })
    });

  </script>
@endsection
