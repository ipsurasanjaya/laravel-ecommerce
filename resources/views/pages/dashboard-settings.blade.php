@extends('layouts.dashboard')

@section('title')
    Store Dashboard
@endsection

@section('content')
<div id="page-content-wrapper">
  <nav
    class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
    data-aos="fade-down"
  >
    <div class="container-fluid">
      <button
        class="btn-secondary d-md-none mr-auto mr-2"
        id="menu-toggle"
      >
        &laquo; Menu
      </button>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
      >
        <span class="navbar-toggler-icon"> </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Desktop Menu -->
        <ul class="navbar-nav d-none d-lg-flex ml-auto">
          <li class="nav-item dropdown">
            <a
              href="#"
              class="nav-link"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
            >
              <img
                src="/images/icon-user.png"
                alt=""
                class="rounded-circle mr-2 profile-picture"
              />
              Hi, Angga
            </a>
            <div class="dropdown-menu">
              <a href="/dashboard.html" class="dropdown-item"
                >Dashboard</a
              >
              <a href="/dashboard-account.html" class="dropdown-item"
                >Settings</a
              >
              <div class="dropdown-devider"></div>
              <a href="/" class="dropdown-item">Logout</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-inline-block mt-2">
              <img src="/images/icon-cart-filled.svg" alt="" />
              <div class="card-badge">3</div>
            </a>
          </li>
        </ul>

        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a href="" class="nav-link"> Hi, Angga </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link d-inline-block"> Cart </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Content -->
  <div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Store Settings</h2>
        <p class="dashboard-subtitle">Make store that profitable</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('dashboard-setting-redirect', 'dashboard-setting-store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Store Name</label>
                        <input type="text" class="form-control" name="store_name" value="{{ $user->store_name }}" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Category</label>
                        <select name="categories_id" class="form-control">
                            <option value="{{ $user->categories_id }}">Tidak Diganti</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Store Status</label>
                        <p class="text-muted">
                          Apakah saat ini toko Anda buka?
                        </p>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="store_status"
                            id="openStoreTrue"
                            value="1"
                            {{ $user->store_status = 1 ? 'checked' : '' }}
                          />
                          <label
                            for="openStoreTrue"
                            class="custom-control-label"
                          >
                            Buka
                          </label>
                        </div>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="status_status"
                            id="openStoreFalse"
                            value="0"
                            {{ $user->store_status = 0 ? 'checked' : '' }}
                          />
                          <label
                            for="openStoreFalse"
                            class="custom-control-label"
                          >
                            Sementara Tutup
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button
                        type="submit"
                        class="btn btn-success px-5"
                      >
                        Save Now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection