<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
      <img
        src="/images/dashboard-store-logo.svg"
        alt="Logo Dashboard"
        class="my-4 mt-5"
      />
    </div>
    <div class="list-group list-group-flush">
      <a
        href="{{ route('dashboard') }}"
        class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}"
        >Dashboard</a
      >
    </div>
    <div class="list-group list-group-flush">
      <a
        href="{{ route('dashboard-product') }}"
        class="list-group-item list-group-item-action {{ (request()->is('dashboard/products*')) ? 'active' : '' }}"
        >My Products</a
      >
    </div>
    <div class="list-group list-group-flush">
      <a
        href="{{ route('dashboard-transaction') }}"
        class="list-group-item list-group-item-action {{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}"
        >Transactions</a
      >
    </div>
    <div class="list-group list-group-flush">
      <a
        href="{{ route('dashboard-settings-store') }}"
        class="list-group-item list-group-item-action {{ (request()->is('dashboard/setting*')) ? 'active' : '' }}"
        >Store Settings</a
      >
    </div>
    <div class="list-group list-group-flush">
      <a
        href="{{ route('dashboard-settings-account') }}"
        class="list-group-item list-group-item-action {{ (request()->is('dashboard/account*')) ? 'active' : '' }}"
        >My Account</a
      >
    </div>
    <div class="list-group list-group-flush">
      <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" 
        class="list-group-item list-group-item-action"
      >
        Sign Out
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </div>
</div>