<nav class="border text-capitalize">
    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('prison.dashboard') }}" class="text-primary">Dashboard</a>
    </div>

    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('user.setting') }}" class="text-primary">Edit Profile</a>
    </div>

    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('user.account') }}" class="text-primary">Account</a>
    </div>

    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('prison.did.index') }}" class="text-primary">DID</a>
    </div>

    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('user.buymore') }}" class="text-primary">Buy More Minutes</a>
    </div>
    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('user.orders') }}" class="text-primary">Order History</a>
    </div>
    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('user.usage') }}" class="text-primary">account usage</a>
    </div>
    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('user.expiry') }}" class="text-primary">account expiry</a>
    </div>
    <div class="p-3 border-bottom bg-lightgray">
        <a href="{{ route('prison.logout') }}" class="text-primary">logout</a>
    </div>
</nav>