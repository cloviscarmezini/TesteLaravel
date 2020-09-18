@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar aluno</div>

                <div class="card-body">
                    <form action="{{route('students.update', ['student' => $student->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{$student->name}}" name="name" id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Cursos (Selecione um ou mais para liberar o certificado)</label>
                            <select class="form-control selectpicker @error('courses') is-invalid @enderror" name="courses[]" multiple>
                                @foreach($courses as $idx=>$course)
                                    <option value="{{$course->id}}" {{  in_array($course->id, array_column($student->courses()->get()->toArray(), 'course_id')) ? "selected":"" }}>{{$course->name}}</option>
                                @endforeach
                            </select>
                            @error('courses')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary save" type="submit">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection