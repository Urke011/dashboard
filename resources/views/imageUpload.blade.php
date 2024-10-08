


<form action="/image" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Stock Name:</label>
    <select name="stockSymbol" id="stock" required>
        @foreach($allSymbols as $allSymbol)
            <option value="{{ $allSymbol->stockSymbol }}">{{ $allSymbol->stockTitle }}</option>
        @endforeach
    </select>
    <label for="imagePath">Image:</label>
    <input type="file" name="imagePath" id="imagePath" required>
    <button type="submit">Submit</button>
</form>
