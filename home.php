<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TCOE</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/index.css" />
</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <a class="navbar-brand p-0" href="#">
                <img
                    src="assets/images/Tcoe_logo.jpg"
                    class="logo ms-5 p-0"
                    alt="" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#problem-statements">Problem Statements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#eligibility">Eligibility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#timelines">Timelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#meet-our-mentors">Mentors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#prize">Prize Money</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#faqs">FAQs</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-bs-toggle="modal"
                            data-bs-target="#authModal1"
                            href="#login1">Jury</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-bs-toggle="modal"
                            data-bs-target="#authModal"
                            href="#login">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Offcanvas Menu for Mobile -->
        <div
            class="offcanvas offcanvas-end w-50"
            tabindex="-1"
            id="offcanvasMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-bs-toggle="modal"
                            data-bs-target="#authModal1"
                            href="#login1">Jury</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-bs-toggle="modal"
                            data-bs-target="#authModal"
                            href="#login">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Hero Section -->
        <header class="hero bg-white text-center">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- First Slide -->
                    <div class="carousel-item active">
                        <img
                            src="assets/images/imc2.png"
                            alt="Main Banner 1"
                            class="d-block w-100 img-fluid rounded shadow-sm" />
                    </div>
                    <!-- Second Slide -->
                    <div class="carousel-item">
                        <img
                            src="assets/images/Main Banner.png"
                            alt="Main Banner 2"
                            class="d-block w-100 img-fluid rounded shadow-sm" />
                    </div>
                </div>
                <!-- Carousel Controls -->
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>

        <!-- About Us Section -->
        <section id="about" class="about-section">
            <div class="container-fluid">
                <div class="text-center">
                    <h2 class="section-heading">About Us</h2>
                </div>
                <div class="text-center">
                    <img
                        src="assets/images/About Us.png"
                        alt="About Us"
                        class="img-fluid rounded shadow-sm" />
                </div>
            </div>
        </section>

        <!-- Problem Statements Section -->
        <section id="problem-statements" class="py-5">
            <div class="container-fluid">
                <div class="text-center mb-5">
                    <h2 class="section-heading">Problem Statements</h2>
                </div>
                <div
                    id="problemStatementsCarousel"
                    class="carousel slide"
                    data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-sm-12 mb-4">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/suo_moto.png"
                                            class="card-img-top"
                                            alt="Suo Moto" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                Suo Moto
                                                <span class="text-white">Suo Moto</span>
                                            </h5>

                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal1">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4 d-none d-md-block">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/ai_driven.png"
                                            class="card-img-top"
                                            alt="AI-Driven Network Maintenance" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                AI-Driven Network Maintenance
                                            </h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal2">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4 d-none d-md-block">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/multi_model.png"
                                            class="card-img-top"
                                            alt="Multi-Modal Interactive System" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                Multi-Modal Interactive System
                                            </h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal3">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-sm-12 mb-4">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/5g_kiosk.jpg"
                                            class="card-img-top"
                                            alt="5G Kiosk" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">5G Kiosk</h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal4">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4 d-none d-md-block">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/5g_enabled.png"
                                            class="card-img-top"
                                            alt="5G Enabled Consoles/Devices" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                5G Enabled Consoles/Devices For Students
                                            </h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal5">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4 d-none d-md-block">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/realtime_control.png"
                                            class="card-img-top"
                                            alt="Real Time Control Of Advanced Drones" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                Real Time Control Of Advanced Drones
                                            </h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal6">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-sm-12 mb-4">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/digital_twin.png"
                                            class="card-img-top"
                                            alt="Digital Twin Technology" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">Digital Twin Technology</h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal7">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4 d-none d-md-block">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/ntn.png"
                                            class="card-img-top"
                                            alt="NTN Communications" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                Non-Terrestrial Network (NTN) Communications
                                            </h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal8">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4 d-none d-md-block">
                                    <div class="card h-100">
                                        <img
                                            src="assets/images/5g_broadcast.png"
                                            class="card-img-top"
                                            alt="5G Broadcasting" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">5G Broadcasting</h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal9">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-sm-12 mb-4">
                                    <div class="card h-100">
                                        <img
                                            src="assets/problem_statements/5g broadcast 10.jpeg"
                                            class="card-img-top"
                                            alt="Emergency Communication Systems" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">5G BROADCASTS</h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal10">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4 d-none d-md-block">
                                    <div class="card h-100">
                                        <img
                                            src="assets/problem_statements/5g oran.png"
                                            class="card-img-top"
                                            alt="Virtual Networking and SDN" />
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">5G O-RAN</h5>
                                            <div class="d-flex justify-content-between mt-auto">
                                                <button
                                                    class="btn btn-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#applyModal">
                                                    Apply Now
                                                </button>
                                                <a
                                                    href="#"
                                                    class="btn btn-link"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewMoreModal11">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel controls -->
                    <!-- <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#problemStatementsCarousel"
            data-bs-slide="prev">
            <span
              class="carousel-control-prev-icon"
              aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#problemStatementsCarousel"
            data-bs-slide="next">
            <span
              class="carousel-control-next-icon"
              aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button> -->

                    <!-- Carousel indicators -->
                    <div class="carousel-indicators position-relative mt-0">
                        <button
                            type="button"
                            data-bs-target="#problemStatementsCarousel"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                            aria-label="Slide 1"></button>
                        <button
                            type="button"
                            data-bs-target="#problemStatementsCarousel"
                            data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button
                            type="button"
                            data-bs-target="#problemStatementsCarousel"
                            data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button
                            type="button"
                            data-bs-target="#problemStatementsCarousel"
                            data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal 1 -->
        <div
            class="modal fade"
            id="viewMoreModal1"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel1">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Problem Statement</h3>
                        <p class="text-center">Suo Moto</p>
                        <br />
                        <h3 class="text-center">Possible Approach / Simplified Statement</h3>
                        <p class="text-center">
                            Solution using 5G, 6G and Emerging Technologies for the
                            following Application verticals:
                        </p>
                        <ul>
                            <li>Automobile/ Transport/Logistics</li>
                            <li>Industry 4.0</li>
                            <li>Tourism</li>
                            <li>Enterprise & Emergency Communication</li>
                            <li>Smart Cities</li>
                            <li>Railways</li>
                            <li>Mining/ Ports/ Airports</li>
                            <li>Power</li>
                            <li>Rural & Remote Communication</li>
                            <li>FinTech</li>
                            <li>Water Management</li>
                            <li>Sports</li>
                            <li>Cyber Security, Quantum communications and
                                security</li>
                            <li>Environment, Public Safety & Disaster
                                Management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
        <div
            class="modal fade"
            id="viewMoreModal2"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel2">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>AI-Driven Network Maintenance</h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            Develop an AI-powered system that predicts network failures,
                            optimizes maintenance schedules, and reduces downtime.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 3 -->
        <div
            class="modal fade"
            id="viewMoreModal3"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel3"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel3">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>Design of Multi-Modal Interactive system</h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            Multi-modal interaction system that combines visual, auditory,
                            and haptic feedback for a fully immersive experience. This could
                            include realistic gestures, voice commands, and tactile
                            responses, all synchronized
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 4 -->
        <div
            class="modal fade"
            id="viewMoreModal4"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel4"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel4">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>
                            With a very poor doctor to patient ratio in the country, access
                            to medical practitioners and health care workers remains a big
                            challenge for even the first level diagnosis at the primary
                            health care centers across rural India.
                        </h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            To enable a 5G kiosk, for application such as tele consultation,
                            AI enabled suggestions, detections, live vitals monitoring of
                            patients, centralized information systems.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 5 -->
        <div
            class="modal fade"
            id="viewMoreModal5"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel5"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel5">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>
                            Rural schools and colleges lack laboratory infrastructure for
                            hands-on experience to augment theoretical learning
                        </h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            5G enabled consoles/devices for students in remote villages to
                            access, control and read results from various connected lab
                            equipment for conducting experiments.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 6 -->
        <div
            class="modal fade"
            id="viewMoreModal6"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel6"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel6">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>
                            Real time control of advanced drones with intelligent computing
                            features such as Computer Vision (CV), AI/ML, Autonomous
                            functionality.
                        </h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            5G connected drone with CV/AI/ML for agriculture(crop health,
                            disease diagnosis, fertilizers/pesticide application), logistics
                            (medicine delivery, sample collections)
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 7 -->
        <div
            class="modal fade"
            id="viewMoreModal7"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel7"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel7">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>
                            Design a digital twin application that solve a real life problem
                            in India
                        </h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            Design a platform that seamlessly integrates physical and
                            digital environments, allowing users to transition between
                            real-world and virtual settings without noticeable disruption.
                            This could involve spatial mapping, environment-aware holograms,
                            or mixed-reality interfaces.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 8 -->
        <div
            class="modal fade"
            id="viewMoreModal8"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel8"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel8">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>
                            IoTs applications in remote areas are resource constrained in
                            terms of power, data management , and network scalability.
                            Design a NTN-Enabled IoT solution to address the above-mentioned
                            challenges.
                        </h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            Design a solution that enables large-scale IoT deployments via
                            NTNs, focusing on applications such as environmental monitoring,
                            smart agriculture, or maritime connectivity. Solution should
                            address challenges related to power efficiency, data management,
                            and network scalability.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 9 -->
        <div
            class="modal fade"
            id="viewMoreModal9"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel9"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel9">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>
                            Lack of visual information on natural calamity prone areas such
                            as landslide areas of motorable sections of the highways/roads,
                            water levels at bridges in flood prone regions, areas affected
                            by cyclones leads to loss of life and property
                        </h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            Access to live video broadcast from the impacted areas along
                            with alerts based on sensors and other historical data, directly
                            accessible to users on their 5G devices (such as cellphones,
                            vehicle telematics, standalone devices, etc) using 5G Broadcast
                            technology.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal 10 -->
        <div
            class="modal fade"
            id="viewMoreModal10"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel10"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel10">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>
                            Human-animal encounters across country is a common problem for
                            all the roads in remote forest areas
                        </h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            Live Video broadcast and Alerts for the area based on animal
                            proximity, directly accessible on the Cell phone or vehicle
                            telematics using 5G Broadcast
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal 11 -->
        <div
            class="modal fade"
            id="viewMoreModal11"
            tabindex="-1"
            aria-labelledby="viewMoreModalLabel9"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewMoreModalLabel11">OVERVIEW</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <h3>Problem Statement</h3>
                        <h6>Develop industry automation use case(s) using 5G O-RAN</h6>
                        <br />
                        <h3>Possible Approach / Simplified Statement</h3>
                        <p>
                            5G O-RAN supports digital transformation of multiple industries
                            - Industry 4.0, viz. Agriculture, Robotics, Smart Cities, etc.
                            Develop innovative applications in various fields using 5G and
                            beyond technologies such as network slicing, private networks,
                            ultra-reliable networks.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Admin login -->
        <div
            class="modal fade"
            id="authModal"
            tabindex="-1"
            aria-labelledby="authModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content no-border">
                    <div class="modal-header">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content mt-3" id="authTabContent">
                            <!-- Login Form -->
                            <div
                                class="tab-pane fade show active card p-2"
                                id="login"
                                role="tabpanel">
                                <div class="text-center p-1">
                                    <h4>Login to Admin Account</h4>
                                    <p>Welcome back! Please enter your details</p>
                                </div>
                                <form action="login.php" method="post">
                                    <div class="mb-3">
                                        <input
                                            type="email"
                                            class="form-control"
                                            placeholder="Email"
                                            id="email"
                                            name="email"
                                            required />
                                    </div>
                                    <div class="mb-3">
                                        <input
                                            type="password"
                                            class="form-control"
                                            placeholder="Password"
                                            id="password"
                                            name="password"
                                            required />
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-violet">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jury login -->
        <div
            class="modal fade"
            id="authModal1"
            tabindex="-1"
            aria-labelledby="authModal1Label"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content no-border">
                    <div class="modal-header">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content mt-3" id="authTabContent">
                            <!-- Login Form -->
                            <div
                                class="tab-pane fade show active card p-2"
                                id="login1"
                                role="tabpanel">
                                <div class="text-center p-1">
                                    <h4>Login to Jury Account</h4>
                                    <p>Welcome back! Please enter your details</p>
                                </div>
                                <form action="login1.php" method="post">
                                    <div class="mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Username"
                                            id="email"
                                            name="email"
                                            required />
                                    </div>
                                    <div class="mb-3">
                                        <input
                                            type="password"
                                            class="form-control"
                                            placeholder="Password"
                                            id="password"
                                            name="password"
                                            required />
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-violet">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Eligibility Section -->
        <section id="eligibility">
            <div class="container-fluid">
                <div class="text-center">
                    <h2 class="section-heading">Eligibility Criteria</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card eligible-card">
                            <div class="card-body">
                                <h3 class="card-title">Students</h3>
                                <p class="card-text">
                                    Students from academic institutions in India.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card eligible-card">
                            <div class="card-body">
                                <h3 class="card-title">Startups</h3>
                                <p class="card-text">
                                    Owned and controlled by Resident Indian Citizens.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card eligible-card">
                            <div class="card-body">
                                <h3 class="card-title">R&D Institutions</h3>
                                <p class="card-text">Private R&D Centers from India.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card not-eligible-card">
                            <div class="card-body">
                                <h3 class="card-title">Academia</h3>
                                <p class="card-text">
                                    Academic institutions registered in India.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card not-eligible-card">
                            <div class="card-body">
                                <h3 class="card-title">Employees of DoT, IMC, DCIS</h3>
                                <p class="card-text text-danger">NOT ELIGIBLE</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card not-eligible-card">
                            <div class="card-body">
                                <h3 class="card-title">Selected in Previous 5G Hackathon</h3>
                                <p class="card-text text-danger">NOT ELIGIBLE</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timelines Section -->
        <section id="timelines" class="bg-white">
            <div class="container-fluid text-center">
                <div class="timeline-image-wrapper">
                    <img
                        src="assets/images/Timeline2.png"
                        alt="Timelines Banner"
                        class="timeline-image" />
                </div>
            </div>
        </section>

        <!-- Mentors Section -->
        <section id="meet-our-mentors">
            <div class="container-fluid">
                <div class="text-center">
                    <h2 class="section-heading">Meet Our Mentors</h2>
                </div>
                <div id="mentorsCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Carousel Inner -->
                    <div class="carousel-inner">
                        <!-- Carousel Item 1 -->
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <!-- Mentor 1 -->
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_Neil.png" class="card-img-top mentor-img" alt="Neil Shah" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Neil Shah</h5>
                                            <p class="card-text">Counter Point Research</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mentor 2 -->
                                <div class="col-12 col-md-4 mb-4 d-none d-md-block">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_Ravi_Sina.png" class="card-img-top mentor-img" alt="Ravi Sinha" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Ravi Sinha</h5>
                                            <p class="card-text">O-Ran Alliance</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mentor 3 -->
                                <div class="col-12 col-md-4 mb-4 d-none d-md-block">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_Aayush.png" class="card-img-top mentor-img" alt="Aayush Bhatnagar" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Aayush Bhatnagar</h5>
                                            <p class="card-text">Jio</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel Item 2 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <!-- Mentor 4 -->
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_mentor.png" class="card-img-top mentor-img" alt="Sanjay Kumar" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Sanjay Kumar</h5>
                                            <p class="card-text">TelcoLearn</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mentor 5 -->
                                <div class="col-12 col-md-4 mb-4 d-none d-md-block">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_gopi.png" class="card-img-top mentor-img" alt="Gopi Krishna Lakkepuram" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Gopi Krishna Lakkepuram</h5>
                                            <p class="card-text">Hyperleap AI</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mentor 6 -->
                                <div class="col-12 col-md-4 mb-4 d-none d-md-block">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_kiran.png" class="card-img-top mentor-img" alt="Kiran Babu" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Kiran Babu</h5>
                                            <p class="card-text">Rava AI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel Item 3 -->
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <!-- Mentor 7 -->
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_rajan.png" class="card-img-top mentor-img" alt="Ranjan Relan" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Ranjan Relan</h5>
                                            <p class="card-text">AgentAnalytics.AI</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mentor 8 -->
                                <div class="col-12 col-md-4 mb-4 d-none d-md-block">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_pushkar.png" class="card-img-top mentor-img" alt="Pushkar Apte" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Pushkar Apte</h5>
                                            <p class="card-text">Qualcomm India Pvt. Ltd.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mentor 9 -->
                                <div class="col-12 col-md-4 mb-4 d-none d-md-block">
                                    <div class="card h-100 text-center">
                                        <img src="assets/mentors/medium_rajesh.png" class="card-img-top mentor-img" alt="Rajesh Kumar Pathak" />
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title">Rajesh Kumar Pathak</h5>
                                            <p class="card-text">Bharat 6G Alliance</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Controls -->
                    <!-- <a class="carousel-control-prev" href="#mentorsCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#mentorsCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a> -->

                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#mentorsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#mentorsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#mentorsCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
        </section>


        <!-- Prize Money Section -->
        <section id="prize" class="price-section">
            <div class="container-fluid">
                <div class="text-center">
                    <h2 class="section-heading">Prize Money</h2>
                </div>
                <div class="text-center">
                    <img
                        src="assets/images/Prizes (1).png"
                        alt="About Us"
                        class="img-fluid rounded shadow-sm" />
                </div>
            </div>
        </section>


        <!-- FAQs Section -->
        <section id="faqs">
            <div class="container-fluid">
                <div class="text-center">
                    <h2 class="section-heading mb-4">FAQs</h2>
                </div>
                <img
                    src="assets/images/FAQs.png"
                    alt=""
                    class="p-4"
                    width="100%"
                    height="auto" />
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseOne"
                                aria-expanded="true"
                                aria-controls="collapseOne">
                                <i class="fas fa-chevron-down accordion-icon"></i>
                                <span>Q. How do we submit our application?</span>
                            </button>
                        </h2>
                        <div
                            id="collapseOne"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <span>
                                    A. Through the online portal -
                                    https://5g6g-hackathon2024.tcoe.in/
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo"
                                aria-expanded="false"
                                aria-controls="collapseTwo">
                                <i class="fas fa-chevron-down accordion-icon"></i>
                                <span>Q. What are the prizes to be won?</span>
                            </button>
                        </h2>
                        <div
                            id="collapseTwo"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <ol>
                                    <li>Winners will be awarded as below</li>
                                    <li>First Prize: INR. 2 Lakhs</li>
                                    <li>Second Prize: INR. 1.5 Lakhs</li>
                                    <li>Third Prize: INR. 1 Lakhs</li>
                                    <li>Consolation Prize: INR. 75,000</li>
                                    <li>Best Idea Award: INR. 50,000</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseThree"
                                aria-expanded="false"
                                aria-controls="collapseThree">
                                <i class="fas fa-chevron-down accordion-icon"></i>
                                <span>Q. How do we submit our application?</span>
                            </button>
                        </h2>
                        <div
                            id="collapseThree"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <span>A. Only Online</span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseFour"
                                aria-expanded="false"
                                aria-controls="collapseFour">
                                <i class="fas fa-chevron-down accordion-icon"></i>
                                <span>Q. General information regarding Grand Finale</span>
                            </button>
                        </h2>
                        <div
                            id="collapseFour"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <span>
                                    A. The event is tentatively scheduled for OCT 15, 2024, and
                                    the venue will be updated to the winners
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseFive"
                                aria-expanded="false"
                                aria-controls="collapseFive">
                                <i class="fas fa-chevron-down accordion-icon"></i>
                                <span>Q. Is TRL Level 3/ POC and above stage of the product
                                    necessary to Apply?</span>
                            </button>
                        </h2>
                        <div
                            id="collapseFive"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingFive"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <span>A. Yes</span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseSix"
                                aria-expanded="false"
                                aria-controls="collapseSix">
                                <i class="fas fa-chevron-down accordion-icon"></i>
                                <span>Q. What type of document should Academic institutions
                                    (Professors students and any combination / team of theirs)
                                    upload in the (Applying as) section of the Application
                                    form?</span>
                            </button>
                        </h2>
                        <div
                            id="collapseSix"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingSix"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <span>
                                    A. They are required to upload a letter regarding their
                                    solution that has been forwarded with the approval /
                                    consent of HoD / Director of that institution.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section id="contact" class="py-5">
            <div class="container-fluid text-center">
                <h2 class="section-heading mb-4">Contact Us</h2>
                <p class="lead mb-5">
                    Have a question? We would love to hear from you. Please reach out
                    to:
                </p>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="contact-card p-4">
                            <h3 class="contact-location">Hyderabad</h3>
                            <p><strong>Srinath Reddy</strong></p>
                            <p>5g6ghack24@tcoe.in</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="contact-card p-4">
                            <h3 class="contact-location">Delhi</h3>
                            <p><strong>Srinath Reddy</strong></p>
                            <p>5g6ghack24@tcoe.in</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="contact-card p-4">
                            <h3 class="contact-location">Bangalore</h3>
                            <p><strong>Srinath Reddy</strong></p>
                            <p>5g6ghack24@tcoe.in</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-4">
            <div class="container-fluid text-center">
                <div
                    class="d-flex justify-content-between align-items-center flex-column flex-md-row">
                    <p class="mb-0">
                        &copy; 2024 Powered by theaischool. All Rights Reserved
                    </p>
                    <div class="social-media-icons mb-2 mb-md-0">
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="footer-links">
                        <a href="#" class="mx-2">Platform Guide</a> |
                        <a href="#" class="mx-2">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        if (window.location.hash === '#authModal') {
            $('#authModal').modal('show');
        }
        if (window.location.hash === '#authModal1') {
            $('#authModal1').modal('show');
        }
    });
</script>