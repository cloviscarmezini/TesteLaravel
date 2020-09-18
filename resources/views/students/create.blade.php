@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo aluno</div>

                <div class="card-body">
                    <form action="{{route('students.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" name="name" id="name">
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
                                    <option value="{{$course->id}}" {{ old("courses.".$idx) == $course->id ? "selected":"" }}>{{$course->name}}</option>
                                @endforeach
                            </select>
                            @error('courses')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary save" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection