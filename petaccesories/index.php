<!DOCTYPE html>
<html lang="en">

<?php include('./templates/head.php')?>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid pe-md-5 ps-md-5">
            <a class="navbar-brand" href="#">Pet Accessories</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.html">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contct Us</a>
                    </li>

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mohammad Haikal
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Account Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/main.jpg" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p>With the many types of pets, having the correct pet supplies for the right pet is essential!</p>
                    <h1>Caring Loving Pets</h1><br>
                    <p>Your First Order?</p>
                    <button class="myCustomBtn">DISCOVER THE COLLECTION</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/pexels-andrew-kota-4083442.jpg" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>FREE SHIPPING ON ALL ORDERS OVER $50!</h1><br>
                    <p>Your First Order?</p>
                    <button class="myCustomBtn">DISCOVER THE COLLECTION</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/Categories/dogs.jpg" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Caring Loving Pets</h1><br>
                    <p>Your First Order?</p>
                    <button class="myCustomBtn">DISCOVER THE COLLECTION</button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel -->

    <!-- Section -->
    <section class="d-flex flex-column flex-md-row justify-content-around p-2 pe-5 ps-5">
        <div class="text-center p-3">
            <img src="./img/icons/icons8-call-58.png" class="" style="width: 50px;" alt="phone">
            <h4>+962790580502</h4>
            <p>Round-the-clock hotline (24/7)</p>
        </div>
        <div class="text-center p-3">
            <img src="./img/icons/icons8-clock-100.png" class="" style="width: 50px;" alt="clock">
            <h4>OPENING HOURS</h4>
            <p>7 days a week from 9:00 am to 7:00 pm</p>
        </div>
        <div class="text-center p-3">
            <img src="./img/icons/icons8-instagram.svg" class="" style="width: 50px;" alt="instagram">
            <h4>@petaccessories</h4>
            <p>Follow us on instagram!</p>
        </div>
    </section>
    <!-- Section -->

    <!-- Section -->
    <section class="d-flex flex-row align-items-center p-5">
        <div class="d-none d-md-flex flex-wrap col-5">
            <img class="animal m-1" src="./img/products/1.jpg" alt="animal">
            <img class="animal m-1" src="./img/products/2.jpg" alt="animal">
            <img class="animal m-1" src="./img/products/3.jpg" alt="animal">
            <img class="animal m-1" src="./img/products/4.jpg" alt="animal">
            <img class="animal m-1" src="./img/products/5.jpg" alt="animal">
            <img class="animal m-1" src="./img/products/6.jpg" alt="animal">
        </div>
        <div class="col-12 col-md-6 flex-md-grow-1">
            <h1>A PET'S FAVORITE PLACE</h1>
            <hr class="col-5 myCustomHr">
            <p>Welcome to Pet Accessories Store, home to some of the world's most renowned international pet brands, we
                take great pride in curating collections of the best designer pet products and luxury pet accessories
                the world has to offer.</p>
        </div>
    </section>
    <!-- Section -->

    <!-- Section -->
    <section class="d-flex flex-column-reverse flex-md-row align-items-center justify-content-between p-5">
        <div class="col-12 col-md-7">
            <p>EVERYTHING YOU NEED FOR YOUR DEAR PET</p>
            <h2>FREE SHIPPING ON ALL ORDERS OVER $50</h2>
            <p>Our promise to pet owners is commitment, experience, and values built through years to build a better
                world for pets. Our Pet Advisors work at their best, to help you match your pet's needs to their breed,
                condition, age, or life stage and get the answers you need.</p>
        </div>
        <div>
            <img width="100%" src="./img/home1.jpg" alt="girl">
        </div>
    </section>
    <!-- Section -->

    <!-- Section -->
    <section class="d-flex flex-column justify-content-center p-5">
        <div class="bg-white d-flex flex-column-reverse flex-md-row justify-content-center align-items-center">
            <div
                class="sec6-content col-12 col-md-6 d-flex flex-column justify-content-center p-3 text-center align-items-center">
                <h1>DOGS</h1>
                <hr class="col-5 myCustomHr">
                <p>Have a new puppy at home? In our store, you can find everything you need for your puppy's new home
                    from puppy food to puppy toys!</p>
                <a href="./store.html" class="myCustomBtn">DISCOVER MORE</a>
            </div>
            <div class="col-12 col-md-6">
                <img width="100%" class="myCustomImg" style="max-height: 400px;" src="./img/Categories/dogs.jpg"
                    alt="dogs">
            </div>
        </div>
        <div class="bg-white d-flex flex-column flex-md-row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <img width="100%" class="myCustomImg" style="max-height: 400px;" src="./img/Categories/cats.jpg"
                    alt="cats">
            </div>
            <div
                class="sec6-content col-12 col-md-6 d-flex flex-column justify-content-center p-3 text-center align-items-center">
                <h1>CATS</h1>
                <hr class="col-5 myCustomHr">
                <p>All you need for your kitten to settle into its new home under one roof: kitten beds and food, kitten
                    treats, kitten milk and toys, cat litter, and litter trays.</p>
                <a href="./store.html" class="myCustomBtn">DISCOVER MORE</a>
            </div>
        </div>
        <div class="bg-white d-flex flex-column-reverse flex-md-row justify-content-center align-items-center">
            <div
                class="sec6-content col-12 col-md-6 d-flex flex-column justify-content-center p-3 text-center align-items-center">
                <h1>BIRDS</h1>
                <hr class="col-5 myCustomHr">
                <p>Toys shouldn't be forgotten in a well-equipped cage; birds are highly intelligent and need activity
                    and variety to stimulate them. Here you'll find the appropriate toys for birds including parakeets,
                    large parakeets, and parrots.</p>
                <a href="./store.html" class="myCustomBtn">DISCOVER MORE</a>
            </div>
            <div class="col-12 col-md-6">
                <img width="100%" class="myCustomImg" style="max-height: 400px;" src="./img/Categories/birds.jpg"
                    alt="birds">
            </div>
        </div>
    </section>
    <!-- Section -->

    <!-- Footer -->
    <footer class="d-flex flex-column flex-md-row  p-5">
        <div class="col-12 col-md-3 p-3">
            <h3>Pet Accessories</h3>
            <p style="text-align: justify;">A store that online sells different kinds of pet accessories and supplies including: food, treats,
                toys, collars, leashes, cat litter, cages, and aquariums.</p>
        </div>
        <div class="col-12 col-md-2 p-3">
            <h3>WEB LINKS</h3>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.html" class="active">Home</a></li>
                <li class="nav-item"><a href="about.html">About</a></li>
                <li class="nav-item"><a href="store.html">Store</a></li>
                <li class="nav-item"><a href="gallery.html">Gallery</a></li>
                <li class="nav-item"><a href="contact.html">Contct Us</a></li>
            </ul>
        </div>
        <div class="col-12 col-md-3 p-3">
            <h3>GET IN TOUCH</h3>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#">Jordan - Amman, Irbid, Zarqa'</a></li>
                <li class="nav-item"><a href="#">+962790580502</a></li>
                <li class="nav-item"><a href="#">@petaccessories</a></li>
            </ul>
        </div>
        <div class="flex-grow-1 p-3">
            <h3>PHOTOS</h3>
            <div class="d-flex flex-wrap">
                <img class="animalSmall m-1" src="./img/products/1.jpg" alt="animal">
                <img class="animalSmall m-1" src="./img/products/2.jpg" alt="animal">
                <img class="animalSmall m-1" src="./img/products/3.jpg" alt="animal">
                <img class="animalSmall m-1" src="./img/products/4.jpg" alt="animal">
                <img class="animalSmall m-1" src="./img/products/5.jpg" alt="animal">
                <img class="animalSmall m-1" src="./img/products/6.jpg" alt="animal">
            </div>
        </div>
    </footer>
    <!-- Footer -->


    <!-- Scripts -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>