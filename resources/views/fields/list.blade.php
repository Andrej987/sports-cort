<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
        <a href="create" class="link-btn create-btn">Create Court</a>
    </div>
    <tbody>
        @foreach($sport_fields as $field)
        <div class="court-info-container">
            <span class="item-name">{{ $field->address}}</span>
            <span class="item-name">{{ $field->address}}</span>
            <span class="item-name">{{ $field->country->name}}</span>
            <span class="item-name">{{ $field->city->name}}</span>
            <span class="item-name">{{ $field->type->type}}</span>
            <span class="item-name">{{ $field->longitude}}</span>
            <span class="item-name">{{ $field->latitude}}</span>
            <span class="item-name">{{ $field->number_of_courts}}</span>

            <form action="{{ route('delete_field', $field->id) }}" method="POST" class="delete-form">
                @csrf
                @method('delete')
                <button type="submit" class="link-btn btn-delete">Delete</button>
            </form>
        </div>
    </tbody>
    @endforeach
    </tbody>
</body>

</html>