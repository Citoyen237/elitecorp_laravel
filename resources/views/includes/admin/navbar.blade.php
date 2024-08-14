@php
    use App\Models\Message;
    $readMessagesCount = Message::where('is_read', 0)->count();
    $messages = Message::where('is_read', 0)->get();
@endphp
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="" class="logo d-flex align-items-center">
      <img src="{{asset ('front/img/logo1.PNG')}}" alt="">
      <span class="d-none d-lg-block">Elitecorp.org</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->


  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">{{$readMessagesCount}}</span>
        </a><!-- End Messages Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">

            <a href="{{route('admin.message.list')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">Tout voir</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          @foreach ($messages as $item)
          <li class="message-item">
            <a href="{{route('admin.message.repondre', $item->id)}}">
              <div>
                <h4>{{$item->email}}</h4>
                <p>{{$item->message}}</p>
                <p>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p>
              </div>
            </a>
          </li>
          @endforeach
          <li class="dropdown-footer">
            <a href="{{route('admin.message.list')}}">Afficher les messages</a>
          </li>

        </ul><!-- End Messages Dropdown Items -->

      </li><!-- End Messages Nav -->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{ asset('admin/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
        </a><!-- End Profile Iamge Icon -->
      </li>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
