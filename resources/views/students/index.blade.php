@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    Alunos
                    <a href="{{route('students.create')}}" class="btn btn-success">Novo Aluno</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{route('students.edit', ['student' => $student->id])}}" class="btn btn-primary mr-2">Editar</a>
                                            <form action="{{route('students.destroy', ['student' => $student->id])}}" class="form-delete" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger delete-registro">Remover</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Não há estudantes com cursos concluídos</td>
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
