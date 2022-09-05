@extends('adminlte::page')

@section('title')
    Resource
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="float-right">
                                <a href="{{ route('resources.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Create New') }}
                                </a>
                            </div>

                            <div class="float-right">
                                <a href="{{ asset('home') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>
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

										<th>Category</th>
										<th>Route</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resources as $resource)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $resource->category->description }}</td>
											<td>
                                                <a class="btn btn-sm btn-outline-dark" href="{{ asset($resource->route) }}"><i class="fa fa-fw fa-eye"></i> Show file</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('resources.destroy',$resource->id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-success" href="{{ route('resources.edit',$resource->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $resources->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/sweetalert.js') }}"></script>

@endsection
