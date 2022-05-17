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

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
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



<br>
{{-- <span style='font-size:100px;'>&#10060;</span>
<span style='font-size:100px;'>&#128077;</span>
<span style='font-size:100px;'>&#9989;</span> --}}
<div class="container">
  <br><br>
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
      <div class="card-content">
        <form action="{{ url("tahajjud/request") }}" method="post">
          @csrf
          <div class="select">
            <select name="report" id="">
              <option value="">Select Name</option>
              <option value="rizky">rizky</option>
              <option value="rizal">rizal</option>
            </select>
          </div>
          <button class="button">SET</button>
        </form>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header">
        <div class="card-header-title">
          Table Tahajjud 17 agustus 2022
        </div>
      </div>
      <div class="card-content">
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
            <tr>
              <td>1</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>2</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>3</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>4</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>5</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  {{-- dhuha tadina arek spa, ngan kagok ah jadi pake is-hidden :3 --}}


  <div id="dhuha" class="is-hidden">
    <div class="card">
      <div class="card-header">
        <div class="card-header-title">
          Peserta Dhuha
        </div>
      </div>
      <div class="card-content">
        <form action="{{ url("tahajjud/request") }}" method="post">
          @csrf
          <div class="select">
            <select name="report" id="">
              <option value="">Select Name</option>
              <option value="rizky">rizky</option>
              <option value="rizal">rizal</option>
            </select>
          </div>
          <button class="button">SET</button>
        </form>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header">
        <div class="card-header-title">
          Table Dhuha 17 Agustus 2022
        </div>
      </div>
      <div class="card-content">
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
            <tr>
              <td>1</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>2</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>3</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>4</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
            <tr>
              <td>5</td>
              <td>rizky</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
              <td>V</td>
            </tr>
          </tbody>
        </table>
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
</body>
</html>