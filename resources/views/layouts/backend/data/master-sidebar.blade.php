<li
class="sidebar-item  has-sub">
<a href="#" class='sidebar-link'>
    <i class="bi bi-stack"></i>
    <span>Master</span>
</a>
<ul class="submenu ">
    <li class="submenu-item ">
        <a href="{{ route('backend.jurusan.index') }}">{{ __('sidebar.major') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.kelas.index') }}">{{ __('sidebar.class') }}</a>
    </li>
</ul>
</li>