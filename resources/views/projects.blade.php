@extends ('parent')
@section('title','projects')
@section('content')
<!-- Projects -->
<section id="projects">
      <div class="container pt-3">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Gallery</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="/img/1.jpg" class="card-img-top" alt="Project 1" />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="/img/2.jpg" class="card-img-top" alt="Project 1" />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="/img/3.jpg" class="card-img-top" alt="Project 1" />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="/img/4.jpg" class="card-img-top" alt="Project 1" />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,192L40,213.3C80,235,160,277,240,250.7C320,224,400,128,480,128C560,128,640,224,720,272C800,320,880,320,960,293.3C1040,267,1120,213,1200,192C1280,171,1360,181,1400,186.7L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir Projects -->
    @endsection