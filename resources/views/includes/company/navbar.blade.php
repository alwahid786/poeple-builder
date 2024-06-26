<style>
    .home-section {
        top: 150px !important
    }
</style>
<nav>
    <div class="navbar-top">
        <div class="logo-wrapper">
            <a href="{{ url('/company-dashboard') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="" />
            </a>

        </div>
        <div class="profile-wrapper">
            <img class="profile-image" src="{{ auth()->user()->image }}" alt="" />
            {{-- <h1 class="profile-name">{{auth()->user()->name}}</h1> --}}
            <h1 class="profile-name">{{ explode(' ', auth()->user()->name)[0] }}</h1>
            <img class="menu-image sidebar-toggle-open" src="{{ asset('assets/images/menu.png') }}" alt="" />

        </div>
        <div class="text-copy">
            <h1></h1>
        </div>


    </div>
    <div class="sidebar">
        <div class="sidebar-toggle">
            <img class="menu-close" src="{{ asset('assets/images/close.png') }}" alt="" />
        </div>
        <ul class="siderbar-modules-wrapper">
            <li class="mobile-profile">
                <div class="profile-wrapper">
                    <img class="profile-image" src="{{ auth()->user()->image }}" alt="" />

                    <h1 class="profile-name">{{ explode(' ', auth()->user()->name)[0] }}</h1>

                </div>
            </li>
            <li
                class="{{ request()->is('company-dashboard') || request()->is('add-user') || request()->is('add-user/*') || request()->is('view-user') || request()->is('view-user/*') ? 'active' : '' }}">
                <a href="{{ url('/company-dashboard') }}">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H6C6.55 0 7.02083 0.195833 7.4125 0.5875C7.80417 0.979167 8 1.45 8 2V16C8 16.55 7.80417 17.0208 7.4125 17.4125C7.02083 17.8042 6.55 18 6 18H2ZM12 18C11.45 18 10.9792 17.8042 10.5875 17.4125C10.1958 17.0208 10 16.55 10 16V11C10 10.45 10.1958 9.97917 10.5875 9.5875C10.9792 9.19583 11.45 9 12 9H16C16.55 9 17.0208 9.19583 17.4125 9.5875C17.8042 9.97917 18 10.45 18 11V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H12ZM12 7C11.45 7 10.9792 6.80417 10.5875 6.4125C10.1958 6.02083 10 5.55 10 5V2C10 1.45 10.1958 0.979167 10.5875 0.5875C10.9792 0.195833 11.45 0 12 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V5C18 5.55 17.8042 6.02083 17.4125 6.4125C17.0208 6.80417 16.55 7 16 7H12Z"
                            fill="#404040" />
                    </svg>

                    <span>Dashboard</span>
                </a>
            </li>
            <li
                class="{{ request()->is('company-video') || request()->is('company-video-detail/*') ? 'active' : '' }}">
                <!-- <a href="#"> -->
                <a href="{{ url('/company-video') }}">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.85 9.425C13 9.325 13.075 9.18333 13.075 9C13.075 8.81667 13 8.675 12.85 8.575L7.275 5C7.10833 4.88333 6.9375 4.875 6.7625 4.975C6.5875 5.075 6.5 5.225 6.5 5.425V12.575C6.5 12.775 6.5875 12.925 6.7625 13.025C6.9375 13.125 7.10833 13.1167 7.275 13L12.85 9.425ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2Z"
                            fill="#404040" />
                    </svg>
                    <span>Video's</span>
                </a>
            </li>
            <li
                class="setting-collapse {{ request()->is('company-setting') || request()->is('update-profile') || request()->is('update-password') ? 'active' : '' }}">
                <a>

                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.80136 20.0962C8.55136 20.0962 8.3347 20.0129 8.15136 19.8462C7.96803 19.6795 7.8597 19.4712 7.82636 19.2212L7.52636 16.8962C7.3097 16.8129 7.10553 16.7129 6.91386 16.5962C6.7222 16.4795 6.5347 16.3545 6.35136 16.2212L4.17636 17.1212C3.94303 17.2212 3.7097 17.2337 3.47636 17.1587C3.24303 17.0837 3.0597 16.9379 2.92636 16.7212L1.07636 13.4962C0.943029 13.2795 0.901363 13.0462 0.951363 12.7962C1.00136 12.5462 1.12636 12.3462 1.32636 12.1962L3.20136 10.7712C3.1847 10.6545 3.17636 10.542 3.17636 10.4337V9.75869C3.17636 9.65036 3.1847 9.53786 3.20136 9.42119L1.32636 7.99619C1.12636 7.84619 1.00136 7.64619 0.951363 7.39619C0.901363 7.14619 0.943029 6.91286 1.07636 6.69619L2.92636 3.47119C3.0597 3.25452 3.24303 3.10869 3.47636 3.03369C3.7097 2.95869 3.94303 2.97119 4.17636 3.07119L6.35136 3.97119C6.5347 3.83786 6.72636 3.71286 6.92636 3.59619C7.12636 3.47952 7.32636 3.37952 7.52636 3.29619L7.82636 0.971191C7.8597 0.721191 7.96803 0.512858 8.15136 0.346191C8.3347 0.179525 8.55136 0.0961914 8.80136 0.0961914H12.5514C12.8014 0.0961914 13.018 0.179525 13.2014 0.346191C13.3847 0.512858 13.493 0.721191 13.5264 0.971191L13.8264 3.29619C14.043 3.37952 14.2472 3.47952 14.4389 3.59619C14.6305 3.71286 14.818 3.83786 15.0014 3.97119L17.1764 3.07119C17.4097 2.97119 17.643 2.95869 17.8764 3.03369C18.1097 3.10869 18.293 3.25452 18.4264 3.47119L20.2764 6.69619C20.4097 6.91286 20.4514 7.14619 20.4014 7.39619C20.3514 7.64619 20.2264 7.84619 20.0264 7.99619L18.1514 9.42119C18.168 9.53786 18.1764 9.65036 18.1764 9.75869V10.4337C18.1764 10.542 18.1597 10.6545 18.1264 10.7712L20.0014 12.1962C20.2014 12.3462 20.3264 12.5462 20.3764 12.7962C20.4264 13.0462 20.3847 13.2795 20.2514 13.4962L18.4014 16.6962C18.268 16.9129 18.0805 17.0629 17.8389 17.1462C17.5972 17.2295 17.3597 17.2212 17.1264 17.1212L15.0014 16.2212C14.818 16.3545 14.6264 16.4795 14.4264 16.5962C14.2264 16.7129 14.0264 16.8129 13.8264 16.8962L13.5264 19.2212C13.493 19.4712 13.3847 19.6795 13.2014 19.8462C13.018 20.0129 12.8014 20.0962 12.5514 20.0962H8.80136ZM10.7264 13.5962C11.693 13.5962 12.518 13.2545 13.2014 12.5712C13.8847 11.8879 14.2264 11.0629 14.2264 10.0962C14.2264 9.12952 13.8847 8.30452 13.2014 7.62119C12.518 6.93786 11.693 6.59619 10.7264 6.59619C9.74303 6.59619 8.91386 6.93786 8.23886 7.62119C7.56386 8.30452 7.22636 9.12952 7.22636 10.0962C7.22636 11.0629 7.56386 11.8879 8.23886 12.5712C8.91386 13.2545 9.74303 13.5962 10.7264 13.5962Z"
                            fill="#404040" />
                    </svg>
                    <span>Settings</span>
                    <svg class="dropdown-icon" width="14" height="7" viewBox="0 0 16 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="transparent" d="M1.33398 1.33398L8.00065 8.00065L14.6673 1.33398" stroke="#636363"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

            </li>
            <ul class="pt-0 setting-dropdown setting-dropdown-hide">
                <li class="{{ request()->is('company-setting') ? 'active' : '' }}">
                    <a href="{{ url('/company-setting') }}">

                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.80136 20.0962C8.55136 20.0962 8.3347 20.0129 8.15136 19.8462C7.96803 19.6795 7.8597 19.4712 7.82636 19.2212L7.52636 16.8962C7.3097 16.8129 7.10553 16.7129 6.91386 16.5962C6.7222 16.4795 6.5347 16.3545 6.35136 16.2212L4.17636 17.1212C3.94303 17.2212 3.7097 17.2337 3.47636 17.1587C3.24303 17.0837 3.0597 16.9379 2.92636 16.7212L1.07636 13.4962C0.943029 13.2795 0.901363 13.0462 0.951363 12.7962C1.00136 12.5462 1.12636 12.3462 1.32636 12.1962L3.20136 10.7712C3.1847 10.6545 3.17636 10.542 3.17636 10.4337V9.75869C3.17636 9.65036 3.1847 9.53786 3.20136 9.42119L1.32636 7.99619C1.12636 7.84619 1.00136 7.64619 0.951363 7.39619C0.901363 7.14619 0.943029 6.91286 1.07636 6.69619L2.92636 3.47119C3.0597 3.25452 3.24303 3.10869 3.47636 3.03369C3.7097 2.95869 3.94303 2.97119 4.17636 3.07119L6.35136 3.97119C6.5347 3.83786 6.72636 3.71286 6.92636 3.59619C7.12636 3.47952 7.32636 3.37952 7.52636 3.29619L7.82636 0.971191C7.8597 0.721191 7.96803 0.512858 8.15136 0.346191C8.3347 0.179525 8.55136 0.0961914 8.80136 0.0961914H12.5514C12.8014 0.0961914 13.018 0.179525 13.2014 0.346191C13.3847 0.512858 13.493 0.721191 13.5264 0.971191L13.8264 3.29619C14.043 3.37952 14.2472 3.47952 14.4389 3.59619C14.6305 3.71286 14.818 3.83786 15.0014 3.97119L17.1764 3.07119C17.4097 2.97119 17.643 2.95869 17.8764 3.03369C18.1097 3.10869 18.293 3.25452 18.4264 3.47119L20.2764 6.69619C20.4097 6.91286 20.4514 7.14619 20.4014 7.39619C20.3514 7.64619 20.2264 7.84619 20.0264 7.99619L18.1514 9.42119C18.168 9.53786 18.1764 9.65036 18.1764 9.75869V10.4337C18.1764 10.542 18.1597 10.6545 18.1264 10.7712L20.0014 12.1962C20.2014 12.3462 20.3264 12.5462 20.3764 12.7962C20.4264 13.0462 20.3847 13.2795 20.2514 13.4962L18.4014 16.6962C18.268 16.9129 18.0805 17.0629 17.8389 17.1462C17.5972 17.2295 17.3597 17.2212 17.1264 17.1212L15.0014 16.2212C14.818 16.3545 14.6264 16.4795 14.4264 16.5962C14.2264 16.7129 14.0264 16.8129 13.8264 16.8962L13.5264 19.2212C13.493 19.4712 13.3847 19.6795 13.2014 19.8462C13.018 20.0129 12.8014 20.0962 12.5514 20.0962H8.80136ZM10.7264 13.5962C11.693 13.5962 12.518 13.2545 13.2014 12.5712C13.8847 11.8879 14.2264 11.0629 14.2264 10.0962C14.2264 9.12952 13.8847 8.30452 13.2014 7.62119C12.518 6.93786 11.693 6.59619 10.7264 6.59619C9.74303 6.59619 8.91386 6.93786 8.23886 7.62119C7.56386 8.30452 7.22636 9.12952 7.22636 10.0962C7.22636 11.0629 7.56386 11.8879 8.23886 12.5712C8.91386 13.2545 9.74303 13.5962 10.7264 13.5962Z"
                                fill="#404040" />
                        </svg>
                        <span>Company Setting</span>

                    </a>
                </li>
                <li class="{{ request()->is('update-profile') ? 'active' : '' }}">
                    <a href="{{ url('/update-profile') }}">


                        <svg width="23" height="21" viewBox="0 0 23 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.32056 14.147H6.82056C5.42499 14.147 4.72721 14.147 4.15941 14.3192C2.88101 14.707 1.8806 15.7074 1.4928 16.9858C1.32056 17.5536 1.32056 18.2514 1.32056 19.647M13.8206 6.14697C13.8206 8.63225 11.8058 10.647 9.32056 10.647C6.83528 10.647 4.82056 8.63225 4.82056 6.14697C4.82056 3.66169 6.83528 1.64697 9.32056 1.64697C11.8058 1.64697 13.8206 3.66169 13.8206 6.14697ZM10.3206 19.647L13.4219 18.7609C13.5704 18.7184 13.6447 18.6972 13.7139 18.6654C13.7754 18.6372 13.8339 18.6028 13.8885 18.5627C13.9499 18.5176 14.0045 18.463 14.1137 18.3538L20.5706 11.897C21.261 11.2066 21.261 10.0873 20.5706 9.39694C19.8802 8.7066 18.7609 8.70661 18.0706 9.39697L11.6137 15.8538C11.5045 15.963 11.4499 16.0176 11.4048 16.0791C11.3647 16.1336 11.3303 16.1921 11.3021 16.2536C11.2703 16.3228 11.2491 16.3971 11.2067 16.5456L10.3206 19.647Z"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span>Update Profile</span>
                    </a>
                </li>
                <li class="{{ request()->is('update-password') ? 'active' : '' }}">
                    <a href="{{ url('/update-password') }}">


                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.56099 8.26236V5.616C4.56099 3.84109 6.02415 2.39699 7.8225 2.39699C9.62084 2.39699 11.0842 3.84109 11.0842 5.616V8.26236H12.8285V5.616C12.8323 4.9648 12.7056 4.31929 12.4557 3.71658C12.2058 3.11388 11.8377 2.56588 11.3725 2.10409C10.9073 1.64231 10.3541 1.27584 9.74491 1.02577C9.13568 0.775707 8.48238 0.646973 7.82258 0.646973C7.16277 0.646973 6.50947 0.775707 5.90025 1.02577C5.29103 1.27584 4.7379 1.64231 4.27268 2.10409C3.80746 2.56588 3.43932 3.11388 3.18943 3.71658C2.93955 4.31929 2.81284 4.9648 2.81661 5.616V8.26236H4.56099Z"
                                fill="black" />
                            <path
                                d="M10.2481 15.7164L8.69638 15.6096L8.58813 14.0781L18.6606 4.1369L20.3205 5.77521L10.2481 15.7164Z"
                                fill="black" />
                            <path
                                d="M10.6466 16.7681L7.72635 16.567L7.52273 13.6847L12.2505 9.01855H2.13585C1.65441 9.01855 1.19268 9.20731 0.852243 9.54331C0.511809 9.87931 0.320557 10.335 0.320557 10.8102V18.8553C0.320557 19.3305 0.511809 19.7862 0.852243 20.1222C1.19268 20.4582 1.65441 20.647 2.13585 20.647H13.5092C13.7476 20.647 13.9837 20.6007 14.204 20.5106C14.4242 20.4206 14.6244 20.2886 14.7929 20.1223C14.9615 19.9559 15.0953 19.7584 15.1865 19.541C15.2777 19.3236 15.3247 19.0906 15.3247 18.8553V12.151L10.6466 16.7681Z"
                                fill="black" />
                        </svg>

                        <span>Update Password</span>
                    </a>
                </li>
            </ul>
            {{-- support --}}
            <li
                class="setting-collapse {{ request()->is('company-privacy') || request()->is('company-term') || request()->is('company-help') ? 'active' : '' }}">
                <a>


                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.18 22.46H10.81C10.72 22.45 10.64 22.43 10.55 22.43C9.96996 22.39 9.37996 22.39 8.79996 22.32C7.49996 22.16 6.19996 21.99 4.89996 21.8C4.41996 21.73 3.93996 21.6 3.48996 21.44C3.05996 21.29 2.92996 21.01 2.97996 20.56C2.98996 20.42 2.99996 20.27 3.02996 20.13C3.32996 18.43 4.21996 17.11 5.58996 16.08C6.28996 15.55 7.09996 15.23 7.87996 14.84C8.48996 14.53 9.09996 14.23 9.72996 13.91C9.24996 13.35 8.89996 12.74 8.64996 12.05C8.69996 12.06 8.71996 12.06 8.72996 12.07C9.25996 12.42 9.84996 12.66 10.46 12.83C10.52 12.85 10.59 12.9 10.63 12.96C10.75 13.12 10.91 13.2 11.1 13.2C11.59 13.2 12.08 13.21 12.57 13.2C12.94 13.2 13.18 12.88 13.11 12.52C13.06 12.25 12.84 12.08 12.51 12.07C12.13 12.07 11.75 12.07 11.37 12.07C11.15 12.07 10.92 12.05 10.72 12.2C10.69 12.22 10.64 12.22 10.6 12.21C9.71996 11.97 8.91996 11.59 8.31996 10.87C8.26996 10.81 8.21996 10.72 8.20996 10.64C7.90996 9.31001 7.85996 7.96001 8.00996 6.61001C8.11996 5.64001 8.56996 4.82001 9.39996 4.27001C10.58 3.49001 11.88 3.35001 13.23 3.67001C14.94 4.08001 15.89 5.16001 16.02 6.91001C16.08 7.72001 16.04 8.54001 15.99 9.35001C15.93 10.39 15.67 11.4 15.22 12.35C14.96 12.89 14.64 13.4 14.34 13.93C14.35 13.93 14.41 13.97 14.47 14C15.38 14.45 16.28 14.91 17.19 15.35C17.9 15.69 18.55 16.12 19.12 16.67C20.25 17.77 20.92 19.09 21.04 20.67C21.06 20.95 20.97 21.17 20.74 21.29C20.48 21.44 20.19 21.57 19.9 21.63C18.06 22.03 16.19 22.27 14.31 22.37C13.94 22.39 13.57 22.42 13.19 22.45L13.18 22.46Z"
                            fill="black" />
                        <path
                            d="M16.82 11.26C16.82 11.18 16.82 11.1 16.82 11.02C16.82 9.42999 16.83 7.82999 16.82 6.23999C16.81 5.29999 16.52 4.44999 15.83 3.76999C15.27 3.20999 14.58 2.87999 13.82 2.66999C12.24 2.22999 10.7 2.33999 9.21003 3.04999C7.87003 3.68999 7.21003 4.80999 7.18003 6.27999C7.16003 7.85999 7.18003 9.43999 7.18003 11.02C7.18003 11.1 7.18003 11.18 7.18003 11.26C6.21003 11.43 5.31003 10.82 5.24003 9.86999C5.19003 9.23999 5.20003 8.59999 5.24003 7.96999C5.28003 7.37999 5.62003 6.95999 6.15003 6.70999C6.29003 6.63999 6.33003 6.56999 6.33003 6.41999C6.33003 5.54999 6.50003 4.71999 6.95003 3.95999C7.53003 2.98999 8.41003 2.37999 9.45003 1.99999C10.4 1.65999 11.38 1.47999 12.39 1.54999C13.7 1.63999 14.95 1.95999 16.02 2.77999C16.97 3.50999 17.49 4.48999 17.64 5.66999C17.67 5.92999 17.68 6.19999 17.69 6.45999C17.69 6.56999 17.72 6.62999 17.83 6.67999C18.45 6.95999 18.78 7.43999 18.8 8.10999C18.81 8.66999 18.82 9.22999 18.8 9.77999C18.75 10.72 17.9 11.41 16.85 11.25L16.82 11.26Z"
                            fill="black" />
                    </svg>

                    <span>Support</span>
                    <svg class="dropdown-icon" width="14" height="7" viewBox="0 0 16 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill="transparent" d="M1.33398 1.33398L8.00065 8.00065L14.6673 1.33398" stroke="#636363"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

            </li>
            <ul class="pt-0 setting-dropdown setting-dropdown-hide">

                <li class="{{ request()->is('company-privacy') ? 'active' : '' }}">
                    <a href="{{ url('/company-privacy') }}">
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 19.9C7.88333 19.9 7.775 19.8917 7.675 19.875C7.575 19.8583 7.475 19.8333 7.375 19.8C5.125 19.05 3.33333 17.6625 2 15.6375C0.666667 13.6125 0 11.4333 0 9.09999V4.37499C0 3.95833 0.120833 3.58333 0.3625 3.24999C0.604167 2.91666 0.916667 2.67499 1.3 2.52499L7.3 0.274994C7.53333 0.191661 7.76667 0.149994 8 0.149994C8.23333 0.149994 8.46667 0.191661 8.7 0.274994L14.7 2.52499C15.0833 2.67499 15.3958 2.91666 15.6375 3.24999C15.8792 3.58333 16 3.95833 16 4.37499V9.09999C16 10.15 15.8625 11.1708 15.5875 12.1625C15.3125 13.1542 14.9167 14.1 14.4 15L11.45 12.05C11.6333 11.7333 11.7708 11.4042 11.8625 11.0625C11.9542 10.7208 12 10.3667 12 9.99999C12 8.89999 11.6083 7.95833 10.825 7.17499C10.0417 6.39166 9.1 5.99999 8 5.99999C6.9 5.99999 5.95833 6.39166 5.175 7.17499C4.39167 7.95833 4 8.89999 4 9.99999C4 11.1 4.39167 12.0417 5.175 12.825C5.95833 13.6083 6.9 14 8 14C8.35 14 8.69583 13.9542 9.0375 13.8625C9.37917 13.7708 9.7 13.6333 10 13.45L13.225 16.65C12.5917 17.4 11.8958 18.0375 11.1375 18.5625C10.3792 19.0875 9.54167 19.5 8.625 19.8C8.525 19.8333 8.425 19.8583 8.325 19.875C8.225 19.8917 8.11667 19.9 8 19.9ZM8 12C7.45 12 6.97917 11.8042 6.5875 11.4125C6.19583 11.0208 6 10.55 6 9.99999C6 9.44999 6.19583 8.97916 6.5875 8.58749C6.97917 8.19583 7.45 7.99999 8 7.99999C8.55 7.99999 9.02083 8.19583 9.4125 8.58749C9.80417 8.97916 10 9.44999 10 9.99999C10 10.55 9.80417 11.0208 9.4125 11.4125C9.02083 11.8042 8.55 12 8 12Z"
                                fill="#404040" />
                        </svg>

                        <span>Privacy Policy</span>
                    </a>
                </li>
                <li class="{{ request()->is('company-term') ? 'active' : '' }}">
                    <a href="{{ url('/company-term') }}">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM5 14H10C10.2833 14 10.5208 13.9042 10.7125 13.7125C10.9042 13.5208 11 13.2833 11 13C11 12.7167 10.9042 12.4792 10.7125 12.2875C10.5208 12.0958 10.2833 12 10 12H5C4.71667 12 4.47917 12.0958 4.2875 12.2875C4.09583 12.4792 4 12.7167 4 13C4 13.2833 4.09583 13.5208 4.2875 13.7125C4.47917 13.9042 4.71667 14 5 14ZM5 10H13C13.2833 10 13.5208 9.90417 13.7125 9.7125C13.9042 9.52083 14 9.28333 14 9C14 8.71667 13.9042 8.47917 13.7125 8.2875C13.5208 8.09583 13.2833 8 13 8H5C4.71667 8 4.47917 8.09583 4.2875 8.2875C4.09583 8.47917 4 8.71667 4 9C4 9.28333 4.09583 9.52083 4.2875 9.7125C4.47917 9.90417 4.71667 10 5 10ZM5 6H13C13.2833 6 13.5208 5.90417 13.7125 5.7125C13.9042 5.52083 14 5.28333 14 5C14 4.71667 13.9042 4.47917 13.7125 4.2875C13.5208 4.09583 13.2833 4 13 4H5C4.71667 4 4.47917 4.09583 4.2875 4.2875C4.09583 4.47917 4 4.71667 4 5C4 5.28333 4.09583 5.52083 4.2875 5.7125C4.47917 5.90417 4.71667 6 5 6Z"
                                fill="#404040" />
                        </svg>

                        <span>Term & Condition</span>
                    </a>
                </li>
                <li class="{{ request()->is('company-help') ? 'active' : '' }}">
                    <a href="{{ url('/company-help') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.95 16C10.3 16 10.5958 15.8792 10.8375 15.6375C11.0792 15.3958 11.2 15.1 11.2 14.75C11.2 14.4 11.0792 14.1042 10.8375 13.8625C10.5958 13.6208 10.3 13.5 9.95 13.5C9.6 13.5 9.30417 13.6208 9.0625 13.8625C8.82083 14.1042 8.7 14.4 8.7 14.75C8.7 15.1 8.82083 15.3958 9.0625 15.6375C9.30417 15.8792 9.6 16 9.95 16ZM10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20ZM10.1 5.7C10.5167 5.7 10.8792 5.83333 11.1875 6.1C11.4958 6.36667 11.65 6.7 11.65 7.1C11.65 7.46667 11.5375 7.79167 11.3125 8.075C11.0875 8.35833 10.8333 8.625 10.55 8.875C10.1667 9.20833 9.82917 9.575 9.5375 9.975C9.24583 10.375 9.1 10.825 9.1 11.325C9.1 11.5583 9.1875 11.7542 9.3625 11.9125C9.5375 12.0708 9.74167 12.15 9.975 12.15C10.225 12.15 10.4375 12.0667 10.6125 11.9C10.7875 11.7333 10.9 11.525 10.95 11.275C11.0167 10.925 11.1667 10.6125 11.4 10.3375C11.6333 10.0625 11.8833 9.8 12.15 9.55C12.5333 9.18333 12.8625 8.78333 13.1375 8.35C13.4125 7.91667 13.55 7.43333 13.55 6.9C13.55 6.05 13.2042 5.35417 12.5125 4.8125C11.8208 4.27083 11.0167 4 10.1 4C9.46667 4 8.8625 4.13333 8.2875 4.4C7.7125 4.66667 7.275 5.075 6.975 5.625C6.85833 5.825 6.82083 6.0375 6.8625 6.2625C6.90417 6.4875 7.01667 6.65833 7.2 6.775C7.43333 6.90833 7.675 6.95 7.925 6.9C8.175 6.85 8.38333 6.70833 8.55 6.475C8.73333 6.225 8.9625 6.03333 9.2375 5.9C9.5125 5.76667 9.8 5.7 10.1 5.7Z"
                                fill="#404040" />
                        </svg>
                        <span>Help</span>
                    </a>
                </li>
            </ul>
            <li class="{{ request()->is('company-reward') ? 'active' : '' }}">
                <a href="{{ url('/company-reward') }}">

                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 3.44444C6 3.0306 6 2.82367 6.06031 2.65798C6.16141 2.38021 6.38021 2.16141 6.65798 2.06031C6.82367 2 7.0306 2 7.44444 2H16.5556C16.9694 2 17.1763 2 17.342 2.06031C17.6198 2.16141 17.8386 2.38021 17.9397 2.65798C18 2.82367 18 3.0306 18 3.44444V9C18 12.3137 15.3137 15 12 15C8.68629 15 6 12.3137 6 9V3.44444Z"
                            fill="black" />
                        <path
                            d="M7 21.5556C7 19.5919 8.59188 18 10.5556 18H13.4444C15.4081 18 17 19.5919 17 21.5556C17 21.801 16.801 22 16.5556 22H7.44444C7.19898 22 7 21.801 7 21.5556Z" />
                        <path
                            d="M12 15C8.68629 15 6 12.3137 6 9V3.44444C6 3.0306 6 2.82367 6.06031 2.65798C6.16141 2.38021 6.38021 2.16141 6.65798 2.06031C6.82367 2 7.0306 2 7.44444 2H16.5556C16.9694 2 17.1763 2 17.342 2.06031C17.6198 2.16141 17.8386 2.38021 17.9397 2.65798C18 2.82367 18 3.0306 18 3.44444V9C18 12.3137 15.3137 15 12 15ZM12 15V18M18 4H20.5C20.9659 4 21.1989 4 21.3827 4.07612C21.6277 4.17761 21.8224 4.37229 21.9239 4.61732C22 4.80109 22 5.03406 22 5.5V6C22 6.92997 22 7.39496 21.8978 7.77646C21.6204 8.81173 20.8117 9.62038 19.7765 9.89778C19.395 10 18.93 10 18 10M6 4H3.5C3.03406 4 2.80109 4 2.61732 4.07612C2.37229 4.17761 2.17761 4.37229 2.07612 4.61732C2 4.80109 2 5.03406 2 5.5V6C2 6.92997 2 7.39496 2.10222 7.77646C2.37962 8.81173 3.18827 9.62038 4.22354 9.89778C4.60504 10 5.07003 10 6 10M7.44444 22H16.5556C16.801 22 17 21.801 17 21.5556C17 19.5919 15.4081 18 13.4444 18H10.5556C8.59188 18 7 19.5919 7 21.5556C7 21.801 7.19898 22 7.44444 22Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span>Rewards</span>
                </a>
            </li>

        </ul>
        <ul class="pb-2">
            <li class="">
                <a href="{{ url('company-logout') }}">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.15 10H6C5.71667 10 5.47917 9.90417 5.2875 9.7125C5.09583 9.52083 5 9.28333 5 9C5 8.71667 5.09583 8.47917 5.2875 8.2875C5.47917 8.09583 5.71667 8 6 8H17.15L16.3 7.15C16.1 6.95 16.0042 6.71667 16.0125 6.45C16.0208 6.18333 16.1167 5.95 16.3 5.75C16.5 5.55 16.7375 5.44583 17.0125 5.4375C17.2875 5.42917 17.525 5.525 17.725 5.725L20.3 8.3C20.5 8.5 20.6 8.73333 20.6 9C20.6 9.26667 20.5 9.5 20.3 9.7L17.725 12.275C17.525 12.475 17.2875 12.5708 17.0125 12.5625C16.7375 12.5542 16.5 12.45 16.3 12.25C16.1167 12.05 16.0208 11.8167 16.0125 11.55C16.0042 11.2833 16.1 11.05 16.3 10.85L17.15 10ZM12 5V2H2V16H12V13C12 12.7167 12.0958 12.4792 12.2875 12.2875C12.4792 12.0958 12.7167 12 13 12C13.2833 12 13.5208 12.0958 13.7125 12.2875C13.9042 12.4792 14 12.7167 14 13V16C14 16.55 13.8042 17.0208 13.4125 17.4125C13.0208 17.8042 12.55 18 12 18H2C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H12C12.55 0 13.0208 0.195833 13.4125 0.5875C13.8042 0.979167 14 1.45 14 2V5C14 5.28333 13.9042 5.52083 13.7125 5.7125C13.5208 5.90417 13.2833 6 13 6C12.7167 6 12.4792 5.90417 12.2875 5.7125C12.0958 5.52083 12 5.28333 12 5Z"
                            fill="#404040" />
                    </svg>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="id-code">
        <h2>Your Company Id:</h2>
        <h1 class="textToCopy"><span> <?= auth()->user()->system_id ?></span><span><img
                    src="{{ asset('assets/images/link.png') }}" alt=""></span></h1>
    </div>

</nav>
