<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif" href="{{ url('panel/dashboard') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'user') collapsed @endif" href="{{ url('panel/user/list') }}">
      <i class="bi bi-person"></i>
      <span>Users</span>
    </a>
  </li> --}}
  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'category') collapsed @endif" href="{{ url('panel/category/list') }}">
      <i class="bi bi-person"></i>
      <span>Category</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link @if(Request::segment(2) != 'blogs') collapsed @endif" href="{{ url('panel/blog/list') }}">
      <i class="bi bi-person"></i>
      <span>Blogs</span>
    </a>
  </li>

  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.html">
      <i class="bi bi-question-circle"></i>
      <span>Help</span>
    </a>
  </li> --}}

  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Inbox</span>
    </a>
  </li> --}}

  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li> --}}
</ul>

</aside>