@foreach($users as $user)
    <p>{{$user->name}}</p>
    <p>{{$user->role}}</p>
    <p>{{$user->phone}}</p>
    <p>{{$user->email}}</p>
@endforeach
