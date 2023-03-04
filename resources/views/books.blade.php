
<x-main>
    <div class="container">
        <div class="row">
            <div class="col-12 p-5">
                <h1 style="text-align: center"> Kniznica </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-5">
                <form method="POST" action="{{ route('add-book')}}">
                    @csrf
                    <input class="form-control" type="text" name="name" placeholder="Nazov knihy">
                    <div class="row pt-3">
                        <div class="col-lg-5 col-sm-12">
                            <input class="form-control" name="isbn" type="text" placeholder="ISBN">
                        </div>
                        <div class="col-lg-2"> </div>

                        <div class="col-lg-5 col-sm-12">
                            <input class="form-control" name="price" type="text" placeholder="Cena">
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-5 col-sm-12">
                            <select class="form-control" name="category_id">
                                <option>Kategoria</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-2"> </div>

                        <div class="col-lg-5 col-sm-12">            
                            <input type="text" id="search" name="search" placeholder="Search" class="form-control">
                            {{-- <input class="form-control" type="text" placeholder="Autor"> --}}
                            <br>
                            <button type="submit" class="btn btn-success">Pridat Knihu do kniznice </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <hr>
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
var route = "{{ url('autocomplete-search') }}";
        $('#search').typeahead({
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

