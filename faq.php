<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
body {
  width: 100%;
  min-height:100vh;
  padding: 0;
  margin: 0;
  background-color: #F9F9FB;
  overflow-x: hidden;
}

.page {
  position: relative;
  width: 100%;
  background:#F9F9FB;
  
}

.pageheader{
  width:100%;
 
  background-color:white;
  color:#212529;
  padding: 0 2rem;
  
}

.wrappersection{
  width:100%;
  background-color: white;
  padding:1rem 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.pagelogo {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}
.sitelogo {
  position: relative;
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 50%;
  color: #ff5276;
  overflow: hidden;
  cursor: pointer;
}

.sitelogo img {
  display: inline-block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.sitetext {
  font-size: 1.5rem;
  color: #ff5276;
  margin-left: 1.2rem;
}
.navigation-bar{
  width:fit-content;
  margin:0 auto;
}
li {
  list-style: none;
  display: inline-block;
  margin-left: 1.2rem;
  font-size: 1.2rem;
  font-weight: 430;
}

li a {
  text-decoration: none;
  display: inline-block;
  padding: .3rem 1.2rem;
}

li a:hover {
  background:blueviolet ;
  color: white;
  border-radius: 1rem;
}




    .accordionpanel {
      width: 100%;
      padding: 3rem 6rem;
      background-color: #F9F9FB;

    }

    .headingsection {
      width: 100%;
      background: white;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      border: 1px solid transparent;
      border-top: .4rem solid #0dcaf0;
      padding: .7rem 1.2rem;
      border-radius: .5rem;
      margin-bottom: 2rem;
    }

    .faqaccordion {
      width: 100%;
      height: 100%;
      background: white;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      border: 1px solid transparent;
      padding: 1.2rem;
      border-radius: 1rem;
    }
  </style>

</head>

<body>
  <div class="page">
    <div class="pageheader">
      <div class="wrappersection">
        <a href="index.php">
          <div class="pagelogo">
            <div class="sitelogo">
              <img src="images/weblogo.jpg" alt="logo">
            </div>
            <div class="sitetext">Election Day</div>

          </div>
        </a>
        <a href="login.php"><i class="fa fa-user icon"></i>
              Login</a>
      </div>
      <nav class="navigation-bar">
        <ul class="nav-content">
          <li class="nav-items"><a href="download.php"><i class="fa fa-user icon"></i>
              Download</a></li>
          <li class="nav-items"><a href="schelection.php"><i class="fa fa-user icon"></i> Election</a></li>
          <li class="nav-items"><a href="prevresults.php"><i class="fa fa-user icon"></i>
              Results</a></li>
          <li class="nav-items"><a href="aboutus.php"><i class="fa fa-user icon"></i>
              About Us</a></li>
        </ul>
      </nav>
    </div>

    <div class="accordionpanel">
      <div class="headingsection">
        <h1>FAQ</h1>
        <div>Frequently Asked Questions</div>
      </div>
      <div class="faqaccordion">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Who is eligible to be registered as a general elector?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Every Indian citizen who has attained the age of 18 years on the qualifying date i.e. first day of January of the year of revision of electoral roll, unless otherwise disqualified, is eligible to be registered as a voter in the roll of the part/polling area of the constituency where he is ordinarily resident.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                What is the relevant date for determining the age of 18 years? Can I get myself registered as a voter on the day when I have completed 18 years of age?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                According to Section 14 (b) of the Representation of People Act, 1950 the relevant date (qualifying date) for determining the age of an applicant is the first day of January of the year in which the electoral roll after revision is finally published. For example, if you have completed or are completing 18 years of age on any date from and after 2nd January 2013 but upto to 1st January 2014, you will be eligible for registration as a voter in the elector roll going to be finally published in January, 2014.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Can a non-citizen of India become a voter in the electoral rolls in India?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                No. A person who is not a citizen of India is not eligible for registration as a voter in the electoral rolls in India. Even those who have ceased to be citizens of India on acquiring the citizenship of another country are not eligible to be enrolled in the electoral rolls in India.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingfour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                How can one get registered / enrolled in the electoral roll?
              </button>
            </h2>
            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                One has to file the application for the purpose, in prescribed Form 6, before the Electoral Registration Officer / Assistant Electoral Registration Officer of the constituency within which the place of ordinary residence of the applicant falls. The application accompanied by copies of the relevant documents can be filed in person before the concerned Electoral Registration Officer / Assistant Electoral Registration Officer or sent by post addressed to him or can be handed over to the Booth Level Officer of your polling area, or can even be filed online on website of Chief Electoral Officer of the concerned state or website of Election Commission of India. While filing Form 6 on line, the copies of necessary documents should also be uploaded.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingac">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseac" aria-expanded="false" aria-controls="collapseac">
                Can a non-citizen of India become a voter in the electoral rolls in India?
              </button>
            </h2>
            <div id="collapseac" class="accordion-collapse collapse" aria-labelledby="headingac" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                No. A person who is not a citizen of India is not eligible for registration as a voter in the electoral rolls in India. Even those who have ceased to be citizens of India on acquiring the citizenship of another country are not eligible to be enrolled in the electoral rolls in India.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingfive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                What documents are required to be enclosed with Form 6?
              </button>
            </h2>
            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                One recent passport size coloured photograph, duly affixed in the box given for the purpose in Form 6 and photo-copies of documentary proof of age and residence are required to be enclosed with Form 6. The list of documentary proof of age and residence which can be enclosed with Form 6 is given in the guidelines enclosed with Form 6. For filling up Form 6, the said guidelines enclosed therewith may be referred to.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingsix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                A homeless person, who is otherwise eligible for registration as an elector, does not possess documentary proof of ordinary residence. What is the procedure of verification in such case?
              </button>
            </h2>
            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                In case of homeless persons, the Booth Level Officer will visit the address given in Form 6 at night to ascertain that the homeless person actually sleeps at the place which is given as his address in Form 6. If the Booth Level Officer is able to verify that the homeless person actually sleeps at that place, no documentary proof of place of residence shall be necessary. Booth Level Officer must visit for more than one night for such verification.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingseven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                I am a tenant and my landlord does not want me to get enrolled. How can I get enrolled as a voter?
              </button>
            </h2>
            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                To get enrolled in the voter list is your statutory right. Please check the electoral roll of your area available on website of Election Commission / Chief Electoral Officer of the state / in office of Electoral Registration Officer / Assistant Electoral Registration Officer. If your name is not included in the roll, please fill up Form 6 and deposit it with the Electoral Registration Officer / Assistant Electoral Registration Officer / Booth Level Officer.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingeight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                How can corrections be made if there are some mistakes in the entries in the electoral roll pertaining to electors?
              </button>
            </h2>
            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                For correction of mistakes in electoral rolls, an application in Form 8 is to be submitted to the Electoral Registration Officer concerned.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingnine">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                I have shifted from my residence where I am registered an elector to some other place. How do I ensure that I am enrolled in my new place of residence?
              </button>
            </h2>
            <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingnine" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                In case the new residence is in the same constituency, please fill Form 8A, otherwise fill up Form 6 and submit to the Electoral Registration Officer / Assistant Electoral Registration Officer of the area of your new residence.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingten">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                Can one be enrolled at more than one place?
              </button>
            </h2>
            <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="headingten" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                No. A person cannot be enrolled as a voter at more than one place in view of the provisions contained in Sections 17 and 18 of Representation of People Act, 1950. Likewise, no person can be enrolled as an elector more than once in any electoral roll. Any person while applying for fresh enrolment, makes a statement or declaration whether his / her name is already included in the electoral roll of any other constituency, and if such statement/declaration is false and which the applicant either knows or believes to be false or does not believe to be true, he is liable to be punished under section 31 of the Representation of the People Act, 1950.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="includes/bootstrapjs/jquery.min.js"></script>
</body>

</html>