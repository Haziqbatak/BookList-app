@extends('include.index')

@section('content')
<div class="container">
    <div class="ro">
        <div class="card-body">
            <h1 class="card-title text-center">Ini place</h1>

            <form action="{{ route('place.store') }}" method="POST">
                @csrf
                @method('post')
                <label for="inputPassword" class="col-sm-2 col-form-label">create name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="name">
                </div>

                <button class="btn btn-info mt-2" type="submit">submit</button>
            </form>


            <div class="container mt-4">
                @forelse ($place as $row)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No .</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $row->name }}
                            </td>
                            <td>
                                <form action="{{ route('place.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger">
                                        delete
                                    </button>
                                </form>
                                
                                <a href="{{ route('place.edit', $row->id) }}" class="btn btn-warning">
                                    update
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection