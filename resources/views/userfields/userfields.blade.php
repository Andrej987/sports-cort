<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
    </div>
    <div class="page-title">Add Favorite Field</div>
    <!-- <tbody>
        @foreach($sport_fields as $field)
        <tr>
            <td>{{ $field->field->address}}</td>
            <td>
                <a href="{{ route('show_field', [$field->field->id]) }}">Sign on court</a>
                <a href="{{ route('delete_user_field', [$field->field->id]) }}" class="btn btn-xs btn-primary">Delete</a>
            </td>
        </tr>
    </tbody>
    @endforeach
    </tbody> -->
    <!-- <label for="">Add favorite field</label> -->
    <form role="form" action="{{ route('add_field') }}" method="POST" class="cities-create-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="form-group-items">City</label>
            <select style="width: 200px" class="form-group-items form-control" id="city_id" name="city_id">
                <option value="N/A">--SELECT--</option>
                @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->id}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-group-items">Address</label>
            <input class="form-group-items form-control" name="address" placeholder="Address">
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
    </form>

</body>

</html>
<script>
    var selectElement = document.getElementById('city_id');
    var fieldsList = [];
    selectElement.addEventListener('change', (e) => {

        var id = document.getElementById('city_id').value;
        var stateUrl = "{{ url('users/getfieldbycity/')}}" + `/${id}`;

        async function getFields() {
            try {
                var response = await fetch(stateUrl, {
                    method: 'GET'
                });
                var responseJson = await response.json();
                fieldsList = responseJson;
                var selectFields = document.getElementById('field_id');

                fieldsList.forEach(element => {
                    var option = document.createElement('option');
                    option.value = element.id;
                    option.innerHTML = element.address;
                    selectFields.appendChild(option);
                });
            } catch (error) {
                console.log(error)
            }

        }
        getFields();
    })
</script>