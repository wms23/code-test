<li class="nav-item">
    <a href="{{ route('clients.index') }}"
       class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <p>Clients</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('billings.index') }}"
       class="nav-link {{ Request::is('billings*') ? 'active' : '' }}">
        <p>Billings</p>
    </a>
</li>


