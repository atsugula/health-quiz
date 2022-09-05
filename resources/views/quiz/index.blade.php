@extends('adminlte::page')

@section('title', 'Quiz')

@section('content_header')
<div class="card-header">
    <div style="display: flex; justify-content: space-between; align-items: center;">

        <div class="float-right">
            <a href="{{ route('quizzes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                {{ __('Create new') }}
            </a>
        </div>

        <div class="float-right">
            <a href="{{ asset('home') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                {{ __('Back') }}
            </a>
        </div>

    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Description</th>
                                    <th>Category</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizzes as $quiz)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $quiz->description }}</td>
                                    <td>{{ $quiz->category->description }}</td>

                                    <td>
                                        <form action="{{ route('quizzes.destroy',$quiz->id) }}" method="POST" class="form-delete">
                                            <a class="btn btn-sm btn-success" href="{{ route('quizzes.edit',$quiz->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $quizzes->links() !!}
        </div>
    </div>
</div>
@stop

@section('js')

    <script src="{{ asset('js/sweetalert.js') }}"></script>

@endsection
