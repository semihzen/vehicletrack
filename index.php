<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Tracking Web Site</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <style>
    .sectiond {
      padding: 50px;
      background-color: #e3f2fd;
      margin-top: 13%; 
    

    }
 
  </style>

</head>


<body>
  <nav class="navbar" style="background-color: #e3f2fd;">

    <div style="text-align: center;" class="container-fluid" class="nav justify-content-center">



      <ul class="nav justify-content-center" style="padding-left: 28%;">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#section1">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#section2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#section3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#section4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Communication</a>
        </li>
        <li>
          <a style="padding-left: 200%;" href="signin.php"><button type="button" class="btn btn-outline-primary">Sign In</button></a>
        </li>
        <li>
          <a style="padding-left: 260%;" href="signup.php" target="blank"><button type="button"
              class="btn btn-outline-primary">Sign Up</button></a>
        </li>
      </ul>

    </div>
  </nav>
  <section>
    <div id="section1">
      <img style="float: left;" src="333.png">
      <br><br><br>
      <h3 style="padding-left: 20%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; What is Vehicle Tracking System?
      </h3>
      <br>
      <p style="padding-left: 20%; padding-right: 5%; color: black; font-size: large;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A Vehicle Tracking System (VTS) is a technology that enables
        businesses and
        individuals to constantly monitor their vehicles. This system utilizes GPS and other communication technologies
        to track the location,
        speed, route, and in some cases, fuel consumption of vehicles. It assists businesses in effectively managing and
        optimizing their vehicles. Knowing where vehicles are, how they are being used, and when, enhances efficiency
        while reducing operating costs. Additionally, it can be employed to ensure vehicle security and mitigate the
        risk of theft. Vehicle Tracking Systems are utilized in various fields such as fleet management, logistics
        operations, security, and emergency response.</p>

    </div>
  </section>
  <br>
  <section>
    <div style="margin-top: 13%; " id="section2">

      <img style="float: right; padding-top: 5%;width:700px;height: 600px" src="23 (1).jpg">
      <h3 style="padding-right: 40%;margin-left: 5%;padding-top: 16%;">
        About Us</h3>
      <br>
      <div class="c1">
        <p style="margin-left: 5%; color: black; font-size: large;">
          By offering reliable and innovative vehicle tracking systems, we provide the opportunity to utilize the latest
          technology. With features such as real-time location tracking, driving analysis, and customized reporting, we
          help our customers manage their vehicles more effectively and enhance safety standards. Prioritizing customer
          satisfaction, we aim to maintain our leadership by conducting continuous R&D efforts and staying abreast of
          industry innovations.</p>
      </div>
    </div>
  </section>

  <section id="section3">

    <div style="margin-top: 20%;" id="section3">
      <br>
      <h3 style="text-align: center;">Services</h3>
      <br><br>
      <table>
        <thead>
          <th><img style="width:20%; height: 20%;margin-left: 43%;" src="h7.png"></th>
          <th><img style="width:26%; height: 26%;margin-left: 35%;" src="h10.png"></th>
          <th><img style="width:23%; height: 23%;margin-left: 35%;" src="h11.png"></th>
          <th><img style="width:30%; height: 30%;margin-left: 35%; " src="h12.png"></th>
        </thead>

        <tbody>

          <td style="padding-left: 4%;padding-right: 3%;">Access a lifetime of history with our website's vehicle
            tracking system. Every mile tells a story,
            and we're here to help you track every adventure along the way.</td>
          <td style="padding-left: 2%;padding-right: 3%;"> Get real-time data and location with ease. Stay
            informed and in control effortlessly</td>
          <td style="padding-left: 2%;padding-right: 3%;">Your safety is our priority. With our robust security
            measures, trust
            that your data and information are always protected.</td>
          <td style="padding-left: 2%;padding-right: 3%;">Explore your data securely with our privacy-centric approach.
            Your information stays protected while you stay informed.</td>
        </tbody>
      </table>
      <br><br><br><br><br>

    </div>
  </section>
  <section id="section4" class="sectiond">
    <div class="sectiond" id="section4">






      <section id=contact class="home-section wg-contact fadeIn">
        <br>
        <div class=home-section-bg></div>
        <div class=container>
          <div class=row>
            <div
              class="section-heading col-12 col-lg-4 mb-3 mb-lg-0 d-flex flex-column align-items-center align-items-lg-start">
              <h1 style="margin-top: -60%;" class=mb-0>Contact</h1>
            </div>
            <div class="col-12 col-lg-8">

              <div style="margin-top: -20%;" class=mb-3>
                <form action="https://formspree.io/f/xaygrnkk" method='POST' name='contact'>
                  <input type='hidden' name='form-name' value='contact' />
                  <div class="form-group form-inline">
                    <label class=sr-only for=inputName>Name</label>
                    <input type=text name=name class="form-control w-100" id=inputName placeholder=Name required>
                  </div>
                  <div class="form-group form-inline">
                    <label class=sr-only for=inputEmail>Email</label>
                    <input type=email name=email class="form-control w-100" id=inputEmail placeholder=Email required>
                  </div>
                  <div class=form-group>
                    <label class=sr-only for=inputMessage>Message</label>
                    <textarea name=message class=form-control id=inputMessage rows=5 placeholder=Message
                      required></textarea>
                  </div>
                  <div class=d-none>
                    <label>
                      Do not fill this field unless you are a bot: <input name=_gotcha>
                    </label>
                  </div>
                  <br>
                  <button type=submit class="btn btn-primary px-3 py-2 w-100 btn btn-dark">Send</button>
                </form>
              </div>



            </div>
          </div>
      </section>





    </div>

  </section>
</body>

</html>
<?php include 'connection.php' ?>;

