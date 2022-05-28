<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body style="background: #f1f1f1;">
  <nav class="navbar has-background-dark" role="navigation" aria-label="main navigation">
   <div class="navbar-brand">
    <a class="navbar-item title" style="color: white; margin: 0px;" href="">
      Al-mulk Project
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" @click="showNav = !showNav" :class="{ 'is-active': showNav }">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu" :class="{ 'is-active': showNav }">
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="js-modal-trigger button is-light" data-target="modal-js-example">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
@php
$milis = round(microtime(true) * 1000);
@endphp
{{-- @dd(date("Y-m-d l H:i:s",($milis/1000))) --}}
{{-- Login modal --}}


<div id="modal-js-example" class="modal">
  <div class="modal-background"></div>

  <div class="modal-content">
    <div class="box has-text-centered">
      <h1 class="title">Login</h1>
      <form action="{{ url("login") }}">
        @csrf
        <input type="text" name="username" class="input" placeholder="Username">
        <input type="password" name="password" class="input" placeholder="Password">
        <br><br>
        <button class="button is-primary">Login</button>
      </form>
      <button class="modal-close is-large" aria-label="close"></button>
    </div>
  </div>

</div>


<style>
  .duplicate-container {

}

@media screen and (max-width: 1024px) {
  .duplicate-container {
    padding-left: 32px;
    padding-right: 32px;
  }
}
</style>
<div class="container duplicate-container">
  <br><br>
  @if(session('success'))
  <div class="notification is-success">
    {{ session('success') }}
  </div>
  @endif
  @if($errors->first('reportTahajjud'))
  <div class="notification is-success">
    Nama Harus di Isi
  </div>
  @endif
  
  <div class="control">
    <label class="radio is-capitalized">
      <input type="radio" name="answer" value="tahajjud" onclick="shalat('tahajjud')" checked>
      <strong>Tahajjud</strong>
    </label>
    <label class="radio">
      <input type="radio" name="answer" value="dhuha" onclick="shalat('dhuha')">
      <strong>Dhuha</strong>
    </label>
  </div>
  <br>

  {{-- tahajjud tadina arek spa, ngan kagok ah jadi pake is-hidden :3 --}}


  <div id="tahajjud">
    <div class="card">
      <div class="card-header">
        <div class="card-header-title">
          Peserta Tahajjud
        </div>
      </div>



      @php
      // array ie ker nyirian
      $collects_tahajjud = collect([]);
      $collects_dhuha = collect([]);
      @endphp

      {{-- array tahajjud, ker nyirian anu ges beres ngerjakeun --}}

      @foreach($participants as $participant)
      @foreach($reports as $report)
      @if($report->participant_id == $participant->id && $report->day_id == $maxdays && date("l",($report->create/1000)) == date("l",($time/1000)) && $report->type == "tahajjud")
      @php
      $collects_tahajjud->push($participant->id);  
      @endphp
      @endif
      @endforeach
      @endforeach

      {{-- array dhuha, ker nyirian anu ges beres ngerjakeun --}}

      @foreach($participants as $participant)
      @foreach($reports as $report)
      @if($report->participant_id == $participant->id && $report->day_id == $maxdays && date("l",($report->create/1000)) == date("l",($time/1000)) && $report->type == "dhuha")
      @php
      $collects_dhuha->push($participant->id);  
      @endphp
      @endif
      @endforeach
      @endforeach


      {{-- insert value tahajjud --}}

      <div class="card-content">
        <form action="{{ url("tahajjud") }}" method="post">
          @csrf
          <div class="select">
            <select name="reportTahajjud" id="">
              <option value="">--Select Name--</option>
              @foreach($participants as $participant)
              @if($collects_tahajjud->contains($participant->id) == false)
              <option value="{{ $participant->id }}">{{ $participant->name }}</option>
              @endif
              @endforeach
            </select>
          </div>
          <input type="text" value="{{ $milis }}" class="is-hidden" name="milis">
          <button class="button">SET</button>
        </form>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header">
        <div class="card-header-title">
          Table Tahajjud {{ date("j",($time/1000)) }} {{ date("F",($time/1000)) }} {{ date("Y",($time/1000)) }}
        </div>
      </div>
      <div class="card-content">
        <div class="table-container">
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach($participants as $participant)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $participant->name }}</td>

              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Monday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "tahajjud")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Tuesday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "tahajjud")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Wednesday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "tahajjud")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Thursday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "tahajjud")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Friday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "tahajjud")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Saturday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "tahajjud")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Sunday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "tahajjud")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>


  {{-- dhuha tadina arek spa, ngan kagok ah jadi pake is-hidden :3 --}}


  {{-- insert value dhuha  --}}


  <div id="dhuha" class="is-hidden">
    <div class="card">
      <div class="card-header">
        <div class="card-header-title">
          Peserta Dhuha
        </div>
      </div>
      <div class="card-content">
        <form action="{{ url("dhuha") }}" method="post">
          @csrf
          <div class="select">
            <select name="reportDhuha" id="">
              <option value="">--Select Name--</option>
              @foreach($participants as $participant)
              @if($collects_dhuha->contains($participant->id) == false)
              <option value="{{ $participant->id }}">{{ $participant->name }}</option>
              @endif
              @endforeach
            </select>
            <input type="text" value="{{ $milis }}" class="is-hidden" name="milis">
          </div>
          <button class="button">SET</button>
        </form>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header">
        <div class="card-header-title">
          Table Dhuha {{ date("j",($time/1000)) }} {{ date("F",($time/1000)) }} {{ date("Y",($time/1000)) }}
        </div>
      </div>
      <div class="card-content">
        <div class="table-container">
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i=0;
            @endphp
            @foreach($participants as $participant)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $participant->name }}</td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Monday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "dhuha")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Tuesday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "dhuha")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Wednesday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "dhuha")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Thursday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "dhuha")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Friday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "dhuha")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Saturday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "dhuha")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
              <td>
                @foreach($reports as $report)
                @if(date("l",($report->create/1000)) == "Sunday" && $report->day_id == $maxdays && $participant->id == $report->participant_id && $report->type == "dhuha")
                {{ $report->status }}
                @endif
                @endforeach
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<footer class="footer" style="background:#f1f1f1;">
  <div class="content has-text-centered">
    <p>
      <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
      <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
      is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
    </p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  function shalat(shalat){
    if (shalat == "tahajjud") {
      $("#dhuha").addClass("is-hidden");
      $("#tahajjud").removeClass("is-hidden");
    }else{
      $("#tahajjud").addClass("is-hidden");
      $("#dhuha").removeClass("is-hidden");
    }
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add('is-active');
  }

  function closeModal($el) {
    $el.classList.remove('is-active');
  }

  function closeAllModals() {
    (document.querySelectorAll('.modal') || []).forEach(($modal) => {
      closeModal($modal);
    });
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener('click', () => {
      openModal($target);
    });
  });

  // Add a click event on various child elements to close the parent modal
  (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
    const $target = $close.closest('.modal');

    $close.addEventListener('click', () => {
      closeModal($target);
    });
  });

  // Add a keyboard event to close all modals
  document.addEventListener('keydown', (event) => {
    const e = event || window.event;

    if (e.keyCode === 27) { // Escape key
      closeAllModals();
    }
  });
});
</script>
<script src="https://unpkg.com/vue@3"></script>
<script>
  new Vue({
  el: '#app',
  data: {
    showNav: false
  }
});
</script>
</body>
</html>