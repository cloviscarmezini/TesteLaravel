@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Início</div>
                <div class="card-body p-0">
                    <table class="table table-striped text-center mb-0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Curso</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                                @if($student->courses)
                                    @forelse($student->courses as $studentCourse)
                                        <tr>
                                            <td>{{$studentCourse->student->name}}</td>
                                            <td>{{$studentCourse->course->name}}</td>
                                            <td>
                                                <a href="{{URL::to('studentCertificate',[$studentCourse->student->id, $studentCourse->course->id])}}" class="btn btn-success">Certificado</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Não há estudantes com cursos concluídos. Adicione cursos para um aluno para liberar o certificado.</td>
                                        </tr>   
                                    @endforelse
                                @endif
                            @empty
                                <tr>
                                    <td colspan="3">Não há estudantes com cursos concluídos. Adicione cursos para um aluno para liberar o certificado.</td>
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
