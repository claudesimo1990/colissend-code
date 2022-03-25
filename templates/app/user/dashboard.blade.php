@extends('app.layout.layout')


@section('app')

   @php $active = request()->get('active') ? request()->get('active') : 'show' @endphp

   <div class="container pt-2">
       <section class="section profile">
           <div class="row m-2">
                   <div class="card">
                       <div class="card-body pt-5">
                           <ul class="nav nav-tabs nav-tabs-bordered">

                               <li class="nav-item">
                                   <button class="nav-link @if($active == 'show') active @endif" data-bs-toggle="tab" data-bs-target="#profile-overview">General</button>
                               </li>

                               <li class="nav-item">
                                   <button class="nav-link @if($active == 'edit') active @endif" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer votre profile</button>
                               </li>

                               <li class="nav-item">
                                   <button class="nav-link @if($active == 'notifications') active @endif" data-bs-toggle="tab" data-bs-target="#profile-notifications">Notifications</button>
                               </li>

                               <li class="nav-item">
                                   <button class="nav-link @if($active == 'messages') active @endif" data-bs-toggle="tab" data-bs-target="#profile-messages">Messages</button>
                               </li>

                               <li class="nav-item">
                                   <button class="nav-link @if($active == 'password') active @endif" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer votre mot de passe</button>
                               </li>

                               <li class="nav-item">
                                   <button class="nav-link @if($active == 'posts') active @endif" data-bs-toggle="tab" data-bs-target="#profile-posts">Mes annonces</button>
                               </li>

                               <li class="nav-item">
                                   <button class="nav-link @if($active == 'reservations') active @endif" data-bs-toggle="tab" data-bs-target="#profile-reservations">Reservations</button>
                               </li>

                           </ul>
                           <div class="tab-content pt-2">

                               <div class="tab-pane fade @if($active == 'show') show active @endif profile-overview" id="profile-overview">

                                   <div class="row">
                                       <div class="col-md-4">
                                           <x-avatar :profile="$profile" width="120" height="120" class="rounded-circle text-center w-full"></x-avatar>
                                           <h3 class="mt-2 fw-bolder">{{ $profile->user->name }}</h3>
                                          <p>{{ $profile->user->email }}</p>
                                          <div class="social-links mt-2">
                                            <a href="{{ $profile->google }}" class="google"><i class="bi bi-google"></i></a>
                                            <a href="{{ $profile->google }}" class="facebook mx-2"><i class="bi bi-facebook"></i></a>
                                            <a href="{{ $profile->instagram }}" class="instagram mx-2"><i class="bi bi-instagram"></i></a>
                                            <a href="{{ $profile->linkedin }}" class="linkedin mx-2"><i class="bi bi-linkedin"></i></a>
                                          </div>
                                       </div>
                                       <div class="col-md-8">
                                           <h5 class="card-title">A propos de moi</h5>
                                           <blockquote class="blockquote-footer">
                                                <p class="small fst-italic">{{ $profile->about }}</p>
                                           </blockquote>
                                           <div class="row">
                                               <div class="col-lg-3 col-md-4 label ">Nom complet</div>
                                               <div class="col-lg-9 col-md-8">{{ $profile->full_name }}</div>
                                           </div>
                                           <div class="row">
                                               <div class="col-lg-3 col-md-4 label">Pays</div>
                                               <div class="col-lg-9 col-md-8">{{ $profile->country }}</div>
                                           </div>
                                           <div class="row">
                                               <div class="col-lg-3 col-md-4 label">adresse</div>
                                               <div class="col-lg-9 col-md-8">{{ $profile->street }}, {{ $profile->city }}</div>
                                           </div>
                                           <div class="row">
                                               <div class="col-lg-3 col-md-4 label">Telephone</div>
                                               <div class="col-lg-9 col-md-8">{{ $profile->phone }}</div>
                                           </div>
                                           <div class="row">
                                               <div class="col-lg-3 col-md-4 label">Date de Naissance</div>
                                               <div class="col-lg-9 col-md-8">{{ $profile->birthday ? formatDate($profile->birthday) : '' }}</div>
                                           </div>
                                       </div>
                                   </div>

                               </div>

                               <div class="tab-pane fade profile-edit pt-3 @if($active == 'edit') show active @endif" id="profile-edit">

                                   <!-- Profile Edit Form -->
                                   <form method="Post" action="{{ route('user.profile.edit', ['profile' => $profile->id ]) }}"  autocomplete="off" enctype="multipart/form-data">
                                       @csrf

                                       <div class="row mb-3">
                                           <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                           <div class="col-md-8 col-lg-9">
                                               <x-avatar :profile="$profile" width="120" height="120" class="" ></x-avatar>
                                               <div class="pt-2">
                                                   <div class="image-upload">
                                                       <label for="file-input" class="btn btn-success btn-sm" style="padding-left: 36px;padding-right: 36px;">
                                                           <i class="bi bi-upload text-white"></i>
                                                       </label>
                                                       <input id="file-input" type="file" />
                                                   </div>
                                                   @error('avatar')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                    </span>
                                                   @enderror
                                               </div>
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom Complet</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="fullName" type="text" class="form-control" id="fullName" value="{{ $profile->full_name }}">
                                               @error('fullName')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="about" class="col-md-4 col-lg-3 col-form-label">A propos de moi</label>
                                           <div class="col-md-8 col-lg-9">
                                               <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $profile->about }}</textarea>
                                               @error('about')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="Country" class="col-md-4 col-lg-3 col-form-label">Pays</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="country" type="text" class="form-control" id="Country" value="{{ $profile->country }}">
                                               @error('country')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="Address" class="col-md-4 col-lg-3 col-form-label">Ville</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="city" type="text" class="form-control" id="city" value="{{ $profile->city }}">
                                               @error('city')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="street" class="col-md-4 col-lg-3 col-form-label">Rue</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="street" type="text" class="form-control" id="street" value="{{ $profile->street }}">
                                               @error('street')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telephone</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="phone" type="text" class="form-control" id="Phone" value="{{ $profile->phone }}">
                                               @error('phone')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="email" type="email" class="form-control" id="Email" value="{{ auth()->user()->email }}">
                                               @error('email')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="birthday" class="col-md-4 col-lg-3 col-form-label">Date de Naissance
                                               {{ $profile->birthday }}
                                           </label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="birthday" type="date" value="{{ $profile->birthday }}" class="form-control" id="birthday">
                                               @error('birthday')
                                               <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="google" class="col-md-4 col-lg-3 col-form-label">Profile google</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="google" type="text" class="form-control" id="google" value="{{ $profile->google }}">
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Profile Facebook</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="facebook" type="text" class="form-control" id="Facebook" value="{{ $profile->facebook }}">
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Profile Instagram</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="instagram" type="text" class="form-control" id="Instagram" value="{{ $profile->instagram }}">
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">Profile linkedin</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="linkedin" type="text" class="form-control" id="linkedin" value="{{ $profile->linkedin }}">
                                           </div>
                                       </div>

                                       <div class="text-center">
                                           <button type="submit" class="btn btn-primary">Enregistrer</button>
                                       </div>
                                   </form>
                               </div>

                               <div class="tab-pane fade pt-3  @if($active == 'notifications') show active @endif" id="profile-notifications">
                                   <div class="row mb-3">
                                       <div class="accordion" id="accordionExample">
                                           @foreach($notifications as $notification)
                                               <div class="accordion-item">
                                                   <h2 class="accordion-header" id="flush-headingOne">
                                                       <button class="accordion-button collapsed text-dark d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $notification->id }}" aria-expanded="false" aria-controls="flush-collapseOne{{ $notification->id }}">
                                                        <span class="fw-bolder">{{ $notification->data['title'] }}</span><span class="badge badge-success text-secondary">new</span>
                                                       </button>
                                                   </h2>
                                                   <div id="flush-collapseOne{{ $notification->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                       <div class="accordion-body"><p>{{ $notification->data['message'] }}</p></div>
                                                       <div class="d-flex mb-2">
                                                           <a class="btn btn-success mx-2" href="{{ $notification->data['valider']  }}">valider la demande</a>
                                                           <a class="btn btn-danger" href="{{ $notification->data['refuser']  }}">refuser la demande</a>
                                                       </div>
                                                   </div>
                                               </div>
                                           @endforeach
                                       </div>
                                   </div>
                               </div>

                               <div class="tab-pane fade pt-3 @if($active == 'messages') show active @endif" id="profile-messages">
                                   <chat-component></chat-component>
                               </div>

                               <div class="tab-pane fade pt-3  @if($active == 'password') show active @endif" id="profile-change-password">
                                   <form method="Post" action="{{ route('user.password.change') }}">
                                       @csrf

                                       <div class="row mb-3">
                                           <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="current" type="password" class="form-control" id="currentPassword">
                                               @error('current')
                                                   <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="password" type="password" class="form-control" id="newPassword">
                                               @error('password')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="row mb-3">
                                           <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer votre mot de passe</label>
                                           <div class="col-md-8 col-lg-9">
                                               <input name="password_confirmation" type="password" class="form-control" id="renewPassword">
                                               @error('password_confirmation')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                               @enderror
                                           </div>
                                       </div>

                                       <div class="text-center">
                                           <button type="submit" class="btn btn-success">Enregistrer</button>
                                       </div>
                                   </form>

                               </div>

                               <div class="tab-pane fade pt-3  @if($active == 'posts') show active @endif" id="profile-posts">
                                   <table class="table table-borderless datatable">
                                       <thead>
                                       <tr>
                                           <th scope="col">N°</th>
                                           <th scope="col">Depart</th>
                                           <th scope="col">Arrivée</th>
                                           <th scope="col">Kilos</th>
                                           <th scope="col">Status</th>
                                           <th scope="col">actions</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                       @foreach(auth()->user()->posts as $post)
                                           <tr class="border">
                                               <th scope="row"><a href="#">#{{ $post->id }}</a></th>
                                               <td>{{ $post->from }}</td>
                                               <td>{{ $post->to }}</td>
                                               <td>{{ $post->kilo }}</td>
                                               @if($post->status == 'ACCEPTED')
                                                   <td><span class="badge bg-success">ACCEPTED</span></td>
                                               @elseif($post->status == 'REJECTED')
                                                       <td><span class="badge bg-danger">REJECTED</span></td>
                                               @else
                                                   <td><span class="badge bg-primary">PROGRESS</span></td>
                                               @endif
                                               <td>
                                                   <a class="btn btn-success">
                                                       <i class="bi bi-pencil-square text-white"></i>
                                                   </a>
                                                   <a class="btn btn-danger">
                                                       <i class="bi bi-trash text-white"></i>
                                                   </a>
                                               </td>
                                           </tr>
                                       @endforeach
                                       </tbody>
                                   </table>
                               </div>

                               <div class="tab-pane fade pt-3  @if($active == 'reservations') show active @endif" id="profile-reservations">
                                   <table class="table table-borderless datatable">
                                       <thead>
                                       <tr>
                                       </tr>
                                       </thead>
                                       <tbody>
                                           @foreach($reservations as $reservation)
                                               <tr class="border">
                                                   <td>Votre reservion du <span class="fw-bold">{{ formatDate($reservation->created_at) }}</span> sur le post <span class="fw-bold">{{ $reservation->post->from }}</span> => <span class="fw-bold">{{ $reservation->post->to }}</span> du <span class="fw-bold">{{ formatDate($reservation->post->dateFrom) }}</span> au <span class="fw-bold">{{ formatDate($reservation->post->dateTo) }}</span></td>
                                                   @if($reservation->status == 'PROGRESS')
                                                       <td><span class="badge bg-primary">PROGRESS</span></td>
                                                   @elseif($reservation->status == 'ACCEPTED')
                                                       <td><span class="badge bg-success">ACCEPTED</span></td>
                                                       <td><a href="{{ route('booking-checkout', ['reservation' => $reservation->id]) }}">payer avec paypal</a></td>
                                                   @else
                                                       <td><span class="badge bg-danger">REJECTED</span></td>
                                                   @endif
                                               </tr>
                                           @endforeach
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
       </section>
   </div>

@endsection
