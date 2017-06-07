@foreach($stores as $store)
    <p>{{$store->name_en}}</p>
    <p>{{$store->name_ar}}</p>
    <p>{{$store->phone}}</p>
    <p>{{$store->email}}</p>
@endforeach
