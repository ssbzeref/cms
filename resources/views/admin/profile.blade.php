@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')

<div class="content-wrapper">
    <div class="m-3">
        <nav aria-label="breadcrumb" class="m-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
        <div class="artist-collection-photo">
            <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#profileModal"
            style="position: absolute;
            margin-left: 356px;">
                <i class="fas fa-pencil-alt"></i>
            </button>
            
          <img src="{{ asset('profile/')}}/{{ Auth::user()->image }}" class="rounded float-left image-responsive" alt="ProfileImage" style="width: 37%">
          </div>
         <div class="row m-6">
             <div class="col-md-8">
              @include('flash-message')
              
                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                      <td scope="col">{{ Auth::user()->name }}</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Email </th>
                        <td>{{ Auth::user()->email }}</td>
                      </tr>

                      <tr>
                        <th scope="row">Your Role </th>
                        <td>{{ Auth::user()->roles->pluck('name')->first() }}</td>
                      </tr>

                      <tr>
                        <th scope="row">Last Login </th>
                        <td>{{ Auth::user()->last_login }}</td>
                      </tr>
                    </tbody>
                  </table>
             </div>
             
         </div>
          
         <!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Your Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
        <form method="POST" action="{{ route('users.profile') }}" enctype="multipart/form-data">
         
          @csrf
              <div class="form-group">
                <label for="name">Name</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" value="{{ Auth::user()->name }}">
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name')}}</span>
              @endif
              </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password">
            
                </div>

                <div class="form-group">
                  <label for="confirm">Confirm Password</label>
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="confirm" name="confirm_password">
                </div>

                <div class="form-group">
                  <label for="image">Profile Picture</label>
                <input type="file" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : ''}}" id="image" name="image">
                </div>
              
                <button type="submit" class="btn btn-outline-primary ml-5">Save Changes</button>
              </form>

        </div>
       
      </div>
    </div>
    @yield('scripts')
  </div>
    </div>
</div>





@include('admin.layouts.footer')


@if($errors->has('name') || $errors->has('email') || $errors->has('password'))
     <script type="text/javascript">
          $('#profileModal').modal('show');
    </script>
@endif
