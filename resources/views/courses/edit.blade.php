@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar curso</div>

                <div class="card-body">
                    <form action="{{route('courses.update', ['course' => $course->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{$course->name}}" name="name" id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="workload">Carga horária</label>
                            <input class="form-control @error('workload') is-invalid @enderror" type="number" value="{{$course->workload}}" name="workload" id="workload">
                            @error('workload')
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