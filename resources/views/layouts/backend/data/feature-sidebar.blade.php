<li
class="sidebar-item  has-sub">
<a href="#" class='sidebar-link'>
    <i class="bi bi-menu-down"></i>
    <span>Feature</span>
</a>
<ul class="submenu ">
    <li class="submenu-item ">
        <a href="{{ route('backend.pemilih.index') }}">{{ __('sidebar.voter') }}</a>
        <a href="{{ route('backend.kandidat.index') }}">{{ __('sidebar.candidate') }}</a>
    </li>
</ul>
</li>