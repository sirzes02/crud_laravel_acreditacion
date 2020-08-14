@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <h2>Add new question</h2>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('questions.update', $question->id) }}" method="POST">
      @method("PATCH")
      @csrf
      <div class="form-group">
        <label>Title</label>
        <textarea name="titulo" rows="2" class="form-control" required>{{ $question->titulo }}</textarea>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label>Correct option</label>
          <textarea name="opcCorrecta" rows="3" class="form-control" required>{{ $question->opcCorrecta }}</textarea>
        </div>
        <div class="form-group col-md-6">
          <label>Option 1</label>
          <textarea name="opc1" rows="3" class="form-control" required>{{ $question->opc1 }}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label>Option 2</label>
          <textarea name="opc2" rows="3" class="form-control" required>{{ $question->opc2 }}</textarea>
        </div>
        <div class="form-group col-md-6">
          <label>Option 3</label>
          <textarea name="opc3" rows="3" class="form-control" required>{{ $question->opc3 }}</textarea>
        </div>
      </div>
      <div class="form-group">
        <label>Factor</label>
        <input type="number" name="factor" class="form-control" value={{ $question->factor }} min="0" max="12" required>
      </div>

      <div class="mt-3">
        <button type="submit" class="btn btn-primary mr-2">Create</button>
        <a href="{{ url('/questions') }}">
          <button type="button" class="btn btn-danger">Cancel</button>
        </a>
      </div>
    </form>
  </div>
@endsection
