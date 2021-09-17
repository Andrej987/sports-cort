<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
    </div>
    <div class="page-title">Add Court</div>
    <form role="form" action="{{ route('create_field') }}" method="POST" class="cities-create-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="form-group-items">Address</label>
            <input class="form-group-items form-control" name="address" placeholder="Address">
        </div>
        <div class="form-group">
            <label class="form-group-items">Longitude</label>
            <input class="form-group-items form-control" name="longitude" placeholder="Longitude">
        </div>
        <div class="form-group">
            <label class="form-group-items">Latitude</label>
            <input class="form-group-items form-control" name="latitude" placeholder="latitude">
        </div>
        <div class="form-group">
            <label class="form-group-items">Number of courts</label>
            <input class="form-group-items form-control" name="number_of_courts" placeholder="Courts Nb.">
        </div>
        <div class="form-group">
            <label class="form-group-items">Type</label>
            <select style="width: 200px" class="form-group-items form-control" id="type_id" name="type_id">
                <option value="N/A">--SELECT--</option>
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-group-items">Country</label>
            <select style="width: 200px" class="form-group-items form-control" id="country_id" name="country_id">
                <option value="N/A">--SELECT--</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-group-items">City</label>
            <select style="width: 200px" class="form-group-items form-control" id="city_id" name="city_id">
            <option value="N/A">--SELECT--</option>
            </select>
        </div>
        <div class="button-container">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="error-msg">{{$error}}</div>
        @endforeach
        @endif
    </form>
</body>

</html>
<script>
    var selectElement = document.getElementById('country_id');
    var citiesList = [];
    selectElement.addEventListener('change', (e) => {

        var id = document.getElementById('country_id').value;
        var stateUrl = "{{ url('cities/getbycountry/')}}" + `/${id}`;

        console.log(stateUrl);
        async function getCities() {
            try {
                var response = await fetch(stateUrl, {
                    method: 'GET'
                });
                var responseJson = await response.json();
                citiesList = responseJson;
                var selectCities = document.getElementById('city_id');
                console.log(citiesList);
                citiesList.forEach(element => {
                    var option = document.createElement('option');
                    option.value = element.id;
                    option.innerHTML = element.name;
                    selectCities.appendChild(option);
                });
            } catch (error) {
                console.log(error)
            }

        }
        getCities();

    })
</script>