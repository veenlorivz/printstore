<style>
    .sidebar{
        position: fixed;
        top: 0;
        left: 0;
        width: 15.2vw;
        bottom: 0;
        background-color:  white;
        box-shadow: .5px 0 3px rgb(177, 176, 176);
        padding-top: 20px;
    }

    .sidebar-brand{
        font-size: 25px;
        margin-left:40px;
        margin-bottom: 30px;
    }

    .sidebar-items{
        font-family: "Nunito";
        font-size: 16px;
        margin-bottom: 15px;
        padding: 10px 0 10px 40px;
        cursor: pointer;
        text-decoration: none;
    }

    .sidebar-items:hover{
        color: #38bdf8;
    }

    .sidebar-items.active{
        color: white;
        background-color: #38bdf8;
    }

    .content-dashboard{
        margin-left: 20vw;
    }
</style>

<div class="sidebar d-flex flex-column">
    <div class="sidebar-brand">
        PrintStore
    </div>
    <a class="sidebar-items {{ Route::is('dashboard.products') ? 'active' : '' }}" href="{{ route("dashboard.products") }}">
        Products
    </a>
    <a class="sidebar-items {{ Route::is('dashboard.orders') ? 'active' : '' }}" href="{{ route("dashboard.orders") }}">
        Orders
    </a>
    <a class="sidebar-items {{ Route::is('dashboard.customers') ? 'active' : '' }}" href="{{ route("dashboard.customers") }}">
        Customers
    </a>
</div>
