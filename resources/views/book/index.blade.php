<div class="container">
    <div class="row">
        <div class="card-body ">
            <h1 class="card-title text-center">Ini Book</h1>

            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="container border border-emerald-500 p-5">
                    <label for="inputPassword" class="col-sm-2 col-form-label">create title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="title">
                    </div>
                    <label for="inputPassword" class="col-sm-2 col-form-label">create author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="author">
                    </div>
                    <label for="inputPassword" class="col-sm-2 col-form-label">create edition</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="edition">
                    </div>
                    <label for="inputPassword" class="col-sm-2 col-form-label">create publishing</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="publishing">
                    </div>
                    <label for="inputPassword" class="col-sm-2 col-form-label">create isbn</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" name="isbn">
                    </div>
                    <select class="form-select mt-3" aria-label="Default select example" name="category_id">
                        <option selected>Open this select menu</option>
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    <select class="form-select mt-3" aria-label="Default select example" name="place_id">
                        <option selected>Open this select menu</option>
                        @foreach ($place as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>

                    <label for="inputPassword" class="col-sm-2 col-form-label">create image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="inputPassword" name="image">
                    </div>
                    <label for="inputPassword" class="col-sm-2 col-form-label">create pdf</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="inputPassword" name="pdf">
                    </div>
                </div>

                <button class="btn btn-info" type="submit">submit</button>

            </form>
        </div>

        <div class="container mt-4 flex ">
            @foreach ($book as $row)
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('storage/book/', $row->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> Title :{{ $row->title }}</h5>
                        <p class="card-text">Author : {{ $row->author }}</p>
                        <p class="card-text">Edition :{{ $row->edition }}</p>
                        <p class="card-text">Publishing : {{ $row->publishing }}</p>
                        <p class="card-text">isbn : {{ $row->isbn }}</p>
                        <a href="{{ url('storage/book/pdf/', $row->pdf) }}" class="btn btn-info" target="blank">look
                            pdf</a>
                        <a href="{{ route('book.edit', $row->id) }}" class="btn btn-primary">Go edit</a>

                        @foreach ($book as $row)
                            <form action="{{ route('book.destroy', $row->id) }}" class="btn btn-danger" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div>
                                    <button class="btn btn-danger">delete</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
