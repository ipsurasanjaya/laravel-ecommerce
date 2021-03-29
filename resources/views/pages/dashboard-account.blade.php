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
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('dashboard-setting-redirect', 'dashboard-setting-account') }}" method="POST" enctype="multipart/form-data" id="locations">
                        @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Your Name</label>
                                                <input
                                                    type="text"
                                                    value="{{ $user->name }}"
                                                    id="name"
                                                    name="name"
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input
                                                    type="email"
                                                    value="{{ $user->email }}"
                                                    id="email"
                                                    name="email"
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_one">Address 1</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="address_one"
                                                    name="address_one"
                                                    value="{{ $user->address_one }}"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_two">Address 2</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="address_two"
                                                    name="address_two"
                                                    value="{{ $user->address_two }}"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="provinces_id">Province</label>
                                                <select
                                                    name="provinces_id"
                                                    class="form-control"
                                                    id="provinces_id"
                                                    v-if="provinces"
                                                    v-model="provinces_id"
                                                >
                                                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                                                </select>
                                                <select v-else class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="regencies_id">City</label>
                                                <select
                                                    name="regencies_id"
                                                    class="form-control"
                                                    id="regencies_id"
                                                    v-if="regencies"
                                                    v-model="regencies_id"
                                                >
                                                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                                                </select>
                                                <select v-else class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="zip_code">Postal Code</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="zip_code"
                                                id="zip_code"
                                                value="{{ $user->zip_code }}"
                                            />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="country">Country</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="country"
                                                name="country"
                                                value="{{ $user->country }}"
                                            />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_number">Mobile</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="phone_number"
                                                    name="phone_number"
                                                    value="{{ $user->phone_number }}"
                                                />
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

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
            },
            methods: {
                getProvincesData() {
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                    .then(function(response){
                        self.provinces = response.data;
                    })
                },

                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response){
                        self.regencies = response.data;
                    })
                },
            },
            watch: {
                provinces_id: function(val, oldVal){
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            },
        });
    </script>
@endpush