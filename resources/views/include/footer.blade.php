<footer class="bg-light text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase font-weight-bold mt-3 mb-4">Logo</h5>
        <img src="{{asset('image/OIP.png')}}" alt="logo">
        <!-- <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-dark">Link 1</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Link 2</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Link 3</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Link 4</a>
          </li>
        </ul> -->
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Quick Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="text-dark">About Us</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Restaurants</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Contact Us</a>
          </li>
          <!-- <li>
            <a href="#!" class="text-dark">Link 4</a>
          </li> -->
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Contacts</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-dark">Email: fos@gmail.com</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Phone: +977-9841998877</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Address: Kathmandu, Nepal</a>
          </li>
          <!-- <li>
            <a href="#!" class="text-dark">Link 4</a>
          </li> -->
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Map</h5>
       <div class="container">
         <div id="map"></div>
       </div> 
        <script type="text/javascript" src="https://www.google.com/maps/@27.7158453,85.2825928,15z"></script>
        <!-- <ul class="list-unstyled">
          <li>
            <a href="#!" class="text-dark">Link 1</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Link 2</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Link 3</a>
          </li>
          <li>
            <a href="#!" class="text-dark">Link 4</a>
          </li>
        </ul> -->
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3 footer-copyright" style="background-color: rgba(0, 0, 0, 0.2);">
    © {{date('Y')}} Copyright:
    <a class="text-dark" href="{{config('app.url')}}">{{config('app.name')}}</a>
  </div>
  <!-- Copyright -->
</footer>