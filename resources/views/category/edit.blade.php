<div class="container">
    <div class="row">
        <div class="card-body">
            <h1 class="card-title text-center">Edit</h1>
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="inputPassword" class="col-sm-2 col-form-label">edit name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="name">
                </div>

                <button class="btn btn-info mt-2" type="submit">submit</button>
            </form>

        </div>
    </div>
</div>
