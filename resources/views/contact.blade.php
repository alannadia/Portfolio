@extends('parent')
@section('title','contact')
@section('content')
<!-- contact -->
<section id="contact">
      <div class="containe pt-3">
        <div class="row text-center">
          <div class="col">
            <h2>Contact Me</h2>
          </div>
        </div>
        <div class="row justify-content-center mb-3">
          <div class="col-md-6">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" />
              </div>
              <div class="mb-3">
                <label for="pesan" class="form-label">pesan</label>
                <textarea class="form-control" id="pesan" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">kirim</button>
            </form>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="rgb(58, 57, 56)"
          fill-opacity="1"
          d="M0,96L40,122.7C80,149,160,203,240,213.3C320,224,400,192,480,160C560,128,640,96,720,112C800,128,880,192,960,224C1040,256,1120,256,1200,240C1280,224,1360,192,1400,176L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir contact -->
    @endsection 