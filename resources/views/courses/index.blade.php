@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    Cursos
                    <a href="{{route('courses.create')}}" class="btn btn-success">Novo Curso</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped text-center mb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Carga Horária</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $course)
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->workload}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{route('courses.edit', ['course' => $course->id])}}" class="btn btn-primary mr-2">Editar</a>
                                            <form action="{{route('courses.destroy', ['course' => $course->id])}}" class="form-delete" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger delete-registro">Remover</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Não há cursos cadastrados</td>
                                </tr>   
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
