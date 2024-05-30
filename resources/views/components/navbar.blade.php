<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Laravel Pokedex</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a @class([
          'nav-link',
          'active' => Request::path() == "/"
        ]) aria-current="page" href="/">Home</a>
        <a @class([
          "nav-link",
          'active' => Request::path() == "pokemon"
        ]) aria-current="page" href="/pokemon">Pokemon</a>
      </div>
    </div>
  </div>
</nav>