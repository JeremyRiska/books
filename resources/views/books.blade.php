
<x-main>
    <div class="container">
        <div class="row">
            <div class="col-12 p-5">
                <h1 style="text-align: center"> Knižnica </h1>
            </div>

            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-12 p-5">
                <form method="POST" action="{{ route('add-book')}}">
                    @csrf
                    <input class="form-control" type="text" name="name" placeholder="Názov knihy" required>
                    <div class="row pt-3">
                        <div class="col-lg-5 col-sm-12">
                            <input class="form-control" name="isbn" type="text" placeholder="ISBN" required>
                        </div>
                        <div class="col-lg-2"> </div>

                        <div class="col-lg-5 col-sm-12">
                            <input class="form-control" name="price" type="text" placeholder="Cena" >
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-5 col-sm-12">
                            <select class="form-control" name="category_id" required>
                                <option>Kategória</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-2"> </div>

                        <div class="col-lg-5 col-sm-12">            
                            <input type="text" id="search-author" name="author" placeholder="Autor" class="form-control" >
                            {{-- <input class="form-control" type="text" placeholder="Autor"> --}}
                            <br>
                            <button type="submit" class="btn btn-success">Pridať knihu do knižnice </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <hr>
        <p> <a href="{{ route('books-json')}}"> Zobraz zoznam ako jsson >> </a> </p>
        <div class="row">
            <div class="col-12 p-5">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Nazov</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Kategoria</th>
                        <th scope="col">Autor</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td> {{ $book->name }} </td>
                                <td> {{ $book->isbn }} </td>
                                <td> {{ $book->price }} </td>
                                <td> {{ $book->category->category_name }} </td>
                                <td> {{ $book->author->author_name }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

<script>
var route = "{{ url('search-author') }}";
        $('#search-author').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
</script>
    
</x-main>

