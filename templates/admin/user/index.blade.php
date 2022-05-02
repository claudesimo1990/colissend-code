@extends('admin.layout.layout')

@section('page-title')

    <h1>Users</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">Users</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

   <section class="section">
       <div class="row">
           <div class="col-lg-12">

               <div class="card">
                   <div class="card-body">
                       <h5 class="card-title">Tous les utilisateurs</h5>
                       <table class="table datatable">
                           <thead>
                           <tr class="text-center">
                               <th scope="col">N°</th>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">avatar</th>
                               <th scope="col">Created At</th>
                               <th scope="col">Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($users as $user)
                               <tr class="text-center">
                                   <th scope="row">{{ $user->id }}</th>
                                   <td>{{ $user->name }}</td>
                                   <td>{{ $user->email }}</td>
                                   <td><a href="{{ $user->avatar }}"><img src="{{ $user->myAvatar() }}" width="50" height="50" class="rounded avatar"  alt=""></a></td>
                                   <td>{{ $user->created_at->format('d.m.y') }}</td>
                                   <td>
                                       <a  href="{{ route('admin.users.show', ['user' => $user->id]) }}" type="button" class="btn btn-success rounded-pill">show</a>
                                       <form class="d-inline" method="POST" action="{{ route('admin.users.destroy', ['user' => $user->id ]) }}">
                                           @method('DELETE')
                                           @csrf
                                            <button type="submit" class="btn btn-danger rounded-pill">delete</button>
                                       </form>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                       {{ $users->links('pagination.custom') }}
                   </div>
               </div>
           </div>
       </div>
   </section>
@endsection
