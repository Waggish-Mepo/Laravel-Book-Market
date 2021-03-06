
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Toko Akhir Zaman</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="text-center">
            <div class="card card-success card-outline">
              <div class="card-header bg-white mt-1">
                <img src="{{ url('/images/'.$profile->logo) }}" alt="logo">

                <h3 class="my-3">{{$profile->nama_perusahaan}}</h3>
                <h5 class="mb-1 card-text">{!!$profile->alamat!!}</h5>
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
