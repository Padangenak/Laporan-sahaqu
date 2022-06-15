<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <title>Document</title>
  <style>
    .block {
      display: block;
    }

    .w-full {
      width: 100%;
    }
  </style>
  @stack('css')
</head>

<body style="min-height: 100vh">
  <nav class="navbar has-background-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item title" style="color: white; margin: 0px;" href="">
        Al-mulk Project
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" @click="showNav = !showNav"
        :class="{ 'is-active': showNav }">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    <div id="navbarBasicExample" class="navbar-menu" :class="{ 'is-active': showNav }">
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a href="{{ url('/') }}" class="button is-primary">Go to home</a>
            <form action="{{ route('admin.logout') }}" method="post">
              @csrf
              <button class="js-modal-trigger button is-light" data-target="modal-js-example">
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="is-flex has-background-white px-0" style="width: 100% !important; height: 80vh">
    <div id="sidebar" class="px-5 pt-3 has-text-centered has-background-success"
      style="border-right: 1px solid rgb(200, 200, 200); max-width: 17%; min-width: 17%">
      <a href="{{ route('admin.participant') }}"
        class="px-5 block py-3 item-menu has-text-weight-bold has-text-white">Participant</a>
    </div>
    <div class="px-6 pt-5 is-flex-grow-1">
      <section class="hero" style="background-color: rgb(245, 245, 245)">
        <div class="hero-body">
          <div class="title">@yield('title')</div>
        </div>
      </section>
      <section class="mt-5 w-full">
        @yield('content')
      </section>
    </div>
  </div>
</body>

</html>