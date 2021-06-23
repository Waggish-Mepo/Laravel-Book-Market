
<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('Template.navbar')

  @include('Template.sidebar')


  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">

      <div class="card card-primary card-outline mt-3">
        <div class="card-body">
            <div class="card-body mb-3">
                <h3>Ganti Password</h3>
            </div>
          
            <form action="{{route('updatePw')}}" id="change_password_form" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" class="form-control" id="old_password" >
                
                    @if($errors->any('old_password'))
                    <span class="text-danger">{{$errors->first('old_password')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="new_password" >
                    @if($errors->any('new_password'))
                    <span class="text-danger">{{$errors->first('new_password')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" >
                    @if($errors->any('confirm_password'))
                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
          
        </div>
      </div>
        
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

</div>
  @include('Template.script')
</body>
</html>
