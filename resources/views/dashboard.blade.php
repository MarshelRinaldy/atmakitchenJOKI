<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Supper delicious Burger in town!</title>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="css/styleDashboard.css">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap"
        rel="stylesheet">

    <!--
    - preload images
  -->
    <link rel="preload" as="image" href="./assets/images/hero-banner.png" media="min-width(768px)">
    <link rel="preload" as="image" href="./assets/images/hero-banner-bg.png" media="min-width(768px)">
    <link rel="preload" as="image" href="./assets/images/backgroundcake1.jpg">

</head>

<body id="top">

    <!--
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">
            <h1>
                <a href="#" class="logo"><img src="./assets/images/logo.png" width="170px" alt=""></a>
            </h1>
            <nav class="navbar" data-navbar>
                <ul class="navbar-list">
                    <li class="nav-item">
                        <a href="#home" class="navbar-link" data-nav-link>Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="navbar-link" data-nav-link>About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#food-menu" class="navbar-link" data-nav-link>Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="navbar-link" data-nav-link>Contact Us</a>
                    </li>
                </ul>
            </nav>
            <div class="header-btn-group">
                <button class="search-btn" aria-label="Search" data-search-btn>
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                <button class="btn btn-hover btn-login"
                    onclick="window.location.href='{{ route('login') }}'">Login</button>
                <button class="btn btn-hover btn-login"
                    onclick="window.location.href='{{ route('register_view') }}'">Sign
                    Up</button>
                <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
                    <span class="line top"></span>
                    <span class="line middle"></span>
                    <span class="line bottom"></span>
                </button>
            </div>
        </div>
    </header>


    <!--
    - #SEARCH BOX
  -->

    <div class="search-container" data-search-container>

        <div class="search-box">
            <input type="search" name="search" aria-label="Search here" placeholder="Type keywords here..."
                class="search-input">

            <button class="search-submit" aria-label="Submit search" data-search-submit-btn>
                <ion-icon name="search-outline"></ion-icon>
            </button>
        </div>

        <button class="search-close-btn" aria-label="Cancel search" data-search-close-btn></button>

    </div>



    <main>
        <article>



            <section class="hero" id="home" style="background-image: url('./assets/images/bgcake2.jpg')">
                <div class="container">

                    <div class="hero-content">

                        <p class="hero-subtitle">Savor Every Bite</p>

                        <h2 class="h1 hero-title">with Our Irresistible Cake Creations!</h2>

                        <p class="hero-text">Nourishment encompasses any substance vital for sustaining life and
                            vitality.</p>

                        <button class="btn">Book A Table</button>

                    </div>

                    <figure class="hero-banner">
                        <!-- <img src="./assets/images/hero-banner-bg.png" width="820" height="716" alt="" aria-hidden="true"
              class="w-100 hero-img-bg"> -->

                        <!-- <img src="./assets/images/hero-banner.png" width="700" height="637" loading="lazy" alt="Burger"
              class="w-100 hero-img"> -->
                    </figure>

                </div>
            </section>



            <!--
        - #PROMO
      -->

            <section class="section section-divider white promo">
                <div class="container">

                    <ul class="promo-list has-scrollbar">




                        @for ($i = 0; $i < 5; $i++)
                            <li class="promo-item">
                                <div class="promo-card">

                                    <div class="card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                            fill="none" xmlns:v="https://vecta.io/nano">
                                            <g clip-path="url(#A)" fill="#ff9d2d">
                                                <!-- <path
                        d="M30.057 32.375c-5.536 0-10.04 4.504-10.04 10.04s4.504 10.04 10.04 10.04 10.04-4.504 10.04-10.04-4.504-10.04-10.04-10.04h0zm0 18.322c-4.567 0-8.282-3.715-8.282-8.282s3.715-8.282 8.282-8.282 8.282 3.715 8.282 8.282-3.715 8.282-8.282 8.282zM51.089 19.66h-.069l2.006-9.708c.148-.715.001-1.451-.402-2.018a2.29 2.29 0 0 0-1.582-.957l-3.385-.448a2.37 2.37 0 0 0-.754.022l.03-.252c.086-.732-.125-1.462-.578-2.002-.425-.506-1.018-.806-1.671-.843l-2.506-.143c.082-.712-.109-1.428-.532-1.975a2.39 2.39 0 0 0-1.633-.929L36.522.015a2.42 2.42 0 0 0-1.806.541 2.77 2.77 0 0 0-.993 1.879l-.318 3.293a2.49 2.49 0 0 0-.285-.351 2.4 2.4 0 0 0-1.728-.736h-3.467a2.37 2.37 0 0 0-1.285.379l-.249-2.586a2.77 2.77 0 0 0-.993-1.879 2.42 2.42 0 0 0-1.806-.541L20.1.407a2.39 2.39 0 0 0-1.633.929c-.423.547-.614 1.263-.532 1.975l-2.506.143c-.652.037-1.246.336-1.671.843-.454.54-.664 1.27-.578 2.002l.03.253a2.37 2.37 0 0 0-.754-.023l-3.385.448a2.29 2.29 0 0 0-1.582.957c-.403.567-.55 1.303-.402 2.018l2.006 9.708h-.069a1.99 1.99 0 0 0-1.965 2.332l6.267 36.353A1.99 1.99 0 0 0 15.292 60h29.53a1.99 1.99 0 0 0 1.965-1.655l6.267-36.353a1.99 1.99 0 0 0-1.965-2.332h0zM46.648 8.735c.167-.311.481-.504.78-.463l3.385.448c.196.026.314.141.379.233.121.171.163.406.114.644l-2.08 10.063h-1.285l.855-6.758a2.44 2.44 0 0 0-.535-1.872 2.28 2.28 0 0 0-1.652-.821l-.136-.007.173-1.467zm-1.199 3.175l1.072.055c.2.011.325.111.394.194.115.137.164.323.139.523l-.884 6.979h-4.106l.475-2.775a2.35 2.35 0 0 0-.32-1.641l.209-2.71a.83.83 0 0 1 .366-.627c.12-.079.261-.122.407-.114l2.248.115h.001zm-4.364-6.898h.035 0l3.465.197a.59.59 0 0 1 .425.218c.143.171.208.414.178.667l-.27 2.295-.203 1.723-1.426-.073c-1.337-.069-2.509.99-2.615 2.36l-.134 1.741-.822-.129.564-8.13c.033-.482.399-.872.803-.869h0zm-.28 11.577l-.541 3.161a1.99 1.99 0 0 0-1.268 1.197 9.56 9.56 0 0 1-3.458 4.419l-.516.335 1.413-9.801c.023-.163.109-.307.242-.405s.295-.138.458-.112l1.499.236 1.663.262a.61.61 0 0 1 .402.248c.096.134.134.297.106.46h0zm-7.294 6.349l1.962-20.334c.027-.275.154-.523.351-.683.106-.086.281-.184.503-.159l3.493.391a.64.64 0 0 1 .437.257c.15.194.213.46.174.73l-.031.211-.043.015-.055.019-.163.062-.041.018a2.48 2.48 0 0 0-.301.159l-.026.016-.176.123-.105.083-.019.016-.146.135-.035.036-.071.076-.074.087-.066.083-.048.065-.06.087-.064.103-.037.065-.063.12-.027.059-.055.126-.021.052-.056.162-.012.041-.041.152-.008.033-.034.181-.006.042-.021.192-.553 7.977-.566-.089a2.35 2.35 0 0 0-2.714 2.002l-1.209 8.388.025-1.099zM27.458 6.605c.091-.094.247-.206.469-.206h3.467c.221 0 .378.113.47.207a.91.91 0 0 1 .246.656l-.346 15.202-.343-6.567a2.67 2.67 0 0 0-.807-1.788c-.502-.485-1.151-.733-1.829-.697l-1.411.075-.03-1.154-.13-5.074c-.006-.251.082-.489.243-.654zm1.42 8.562c.248-.011.429.123.514.206.164.158.261.377.273.616l.579 11.097-.188.003a9.52 9.52 0 0 1-4.229-.982L24.83 16.2c-.024-.239.043-.47.183-.634.08-.093.22-.207.432-.218l3.433-.181zM19.859 2.41a.64.64 0 0 1 .438-.257l3.492-.391c.223-.025.396.073.503.159a1 1 0 0 1 .35.683l.946 9.805.03 1.171-.265.014c-.651.035-1.245.329-1.674.829a2.61 2.61 0 0 0-.598 1.954l.483 4.796-1.09-2.613-.888-12.8-.021-.191-.006-.042-.034-.181-.007-.031-.041-.157-.011-.037-.058-.166-.017-.044-.061-.141-.012-.027-.078-.149-.027-.048-.087-.139-.026-.037-.078-.107-.033-.043-.103-.121-.037-.039-.095-.095-.029-.029-.123-.107-.039-.031-.134-.1-.017-.011-.136-.086-.029-.017-.156-.083-.018-.009-.168-.073-.182-.062-.037-.216c-.039-.27.024-.536.174-.73zm-4.754 3.017a.59.59 0 0 1 .425-.217l3.467-.198h.002c.425-.012.801.379.834.869l.528 7.616-.436-1.046a2.67 2.67 0 0 0-1.362-1.412 2.59 2.59 0 0 0-.231-.091l-.24-.069c-.007-.001-.015-.004-.022-.005a2.42 2.42 0 0 0-.223-.039l-.028-.004-.22-.016c-.011 0-.021-.001-.031-.001s-.025-.001-.037-.001l-.116.005-.099.005-.148.02-.093.014-.16.039-.076.019-.232.083-1.052.44-.159-1.349-.47-3.995c-.029-.253.036-.496.179-.667zm-.991 8.519l.52-.218.523-.218h.001l2.128-.89a.7.7 0 0 1 .553.02.92.92 0 0 1 .465.488l4.377 10.488a9.55 9.55 0 0 1-1.561-2.67c-.3-.781-1.031-1.286-1.864-1.286h-3.199l-2.236-4.705c-.103-.217-.118-.457-.041-.659a.65.65 0 0 1 .073-.14c.055-.08.138-.159.26-.211zM8.81 9.596c-.049-.239-.008-.473.113-.644.065-.092.184-.206.38-.232l3.385-.448c.297-.039.612.152.78.463l.186 1.578.215 1.83-.433.181a2.35 2.35 0 0 0-1.297 1.344c-.248.649-.214 1.393.095 2.041l1.877 3.951h-3.222L8.81 9.596zm42.512 12.098l-2.776 16.102h-5.748a.88.88 0 0 0-.879.879.88.88 0 0 0 .879.879h5.445l-.914 5.302h-4.415a.88.88 0 0 0-.879.879.88.88 0 0 0 .879.879h4.112l-1.971 11.433c-.02.113-.118.196-.233.196h-29.53c-.115 0-.213-.082-.233-.196l-1.971-11.433H17.2a.88.88 0 0 0 .879-.879.88.88 0 0 0-.879-.879h-4.415l-.914-5.302h5.472a.88.88 0 0 0 .879-.879.88.88 0 0 0-.879-.879h-5.775L8.793 21.694c-.016-.09.02-.154.052-.192a.23.23 0 0 1 .181-.084h10.23a.24.24 0 0 1 .223.158 11.31 11.31 0 0 0 4.091 5.229c1.908 1.336 4.152 2.042 6.488 2.042l.364-.007.173-.007.152-.009a11.41 11.41 0 0 0 1.582-.206 11.25 11.25 0 0 0 4.218-1.813 11.31 11.31 0 0 0 4.091-5.229.24.24 0 0 1 .222-.158h10.23a.23.23 0 0 1 .232.277h0z" />
                    </g> -->
                                                <defs>
                                                    <clipPath id="A">
                                                        <path fill="#fff" d="M0 0h60v60H0z" />
                                                    </clipPath>
                                                </defs>
                                        </svg>
                                    </div>

                                    <h3 class="h3 card-title">Choco Milk Cake</h3>

                                    <p class="card-text">
                                        is a delightful dessert crafted to offer a blend of rich chocolate and creamy
                                        milk flavors, providing a delightful treat for anyone with a sweet tooth
                                    </p>

                                    <img src="image/tiramisuCake.png" width="300" height="300" loading="lazy"
                                        alt="French Fry" class="w-100 card-banner">

                                </div>
                            </li>
                        @endfor

                    </ul>

                </div>
            </section>


            <!--
        - #ABOUT
      -->

            <section class="section section-divider gray about" id="about">
                <div class="container">

                    <div class="about-banner">
                        <img src="image/tiramisuCake.png" width="559" height="550" loading="lazy"
                            alt="Burger with Drinks" class="w-100 about-img">

                        {{-- <img src="./assets/images/sale-shape-red.png" width="216" height="226"
                            alt="get up to 50% off now" class="abs-img scale-up-anim"> --}}
                    </div>

                    <div class="about-content">

                        <h2 class="h2 section-title">
                            Choco Milk, Cake, and Best Cake
                            <span class="span">in Atma!</span>
                        </h2>

                        <p class="section-text">
                            Choco Milk Cake also became popular among those seeking a comforting treat, offering a
                            delightful blend of chocolate and creamy milk flavors. Many households crafted their own
                            versions of this dessert, while some bakeries specialized in its creation.
                        </p>

                        <ul class="about-list">

                            <li class="about-item">
                                <ion-icon name="checkmark-outline"></ion-icon>

                                <span class="span">Delicious</span>
                            </li>

                            <li class="about-item">
                                <ion-icon name="checkmark-outline"></ion-icon>

                                <span class="span">Spacific Family And Kids Zone</span>
                            </li>

                            <li class="about-item">
                                <ion-icon name="checkmark-outline"></ion-icon>

                                <span class="span">Music & Other Facilities</span>
                            </li>

                            <li class="about-item">
                                <ion-icon name="checkmark-outline"></ion-icon>

                                <span class="span">Fastest Food Home Delivery</span>
                            </li>

                        </ul>

                        <button class="btn btn-hover">Order Now</button>

                    </div>

                </div>
            </section>

            <!--
        - #FOOD MENU
      -->

            <section class="section food-menu" id="food-menu">
                <div class="container">

                    <p class="section-subtitle">Popular</p>

                    <h2 class="h2 section-title">
                        Our Delicious <span class="span">Cakes</span>
                    </h2>

                    <p class="section-text">
                        Cake is a delicious treat enjoyed by many, providing both sweetness and often a delightful
                        combination of flavors and textures to satisfy one's cravings.
                    </p>

                    <ul class="fiter-list">

                        <li>
                            <button class="filter-btn  active">All</button>
                        </li>

                        <li>
                            <button class="filter-btn">Creamy</button>
                        </li>

                        <li>
                            <button class="filter-btn">Fresh</button>
                        </li>

                        <li>
                            <button class="filter-btn">Souce</button>
                        </li>

                        <li>
                            <button class="filter-btn">Drinks</button>
                        </li>

                    </ul>

                    <ul class="search-cont">
                        <li>
                            <input type="text" placeholder="Search" class="search-input-makanan">
                            <button type="button" class="search-button">Search</button>
                        </li>
                    </ul>

                    <ul class="food-menu-list">
                       @foreach ($produk as $item)
                       <li>
                        <div class="food-menu-card">

                            <div class="card-banner">
                                <img src="{{ asset('./storage/dukpro/' . $item->image) }}" style="width: 300px;" loading="lazy"
                                    alt="cake" class="w-100">
                                <div class="badge">-15%</div>
                                <button class="btn food-menu-btn">Order Now</button>
                            </div>

                            <div class="wrapper">
                                <p class="category">Cake</p>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>
                            </div>

                            <h3 class="h3 card-title">{{ $item['nama']}}</h3>

                            <div class="price-wrapper">

                                <p class="price-text">Price:</p>

                                <data class="price">Rp. {{ $item['harga']}}</data>



                            </div>

                        </div>
                    </li>
                       @endforeach
                    </ul>
                </div>
            </section>


            <!--
        - #CTA
      -->

            <!-- <section class="section section-divider white cta" style="background-image: url('./assets/images/hero-bg.jpg')">
        <div class="container">

          <div class="cta-content">

            <h2 class="h2 section-title">
              The AtmaKitchen Have Excellent Of
              <span class="span">Quality ChocoCake!</span>
            </h2>

            <p class="section-text">
              The restaurants in Hangzhou also catered to many northern Chinese who had fled south from Kaifeng during
              the Jurchen
              invasion of the 1120s, while it is also known that many restaurants were run by families.
            </p>

            <button class="btn btn-hover">Order Now</button>
          </div>

          <figure class="cta-banner">
            <img src="./assets/images/strawberrycake.png" width="700" height="637" loading="lazy" alt="Burger"
              class="w-100 cta-img">

            <img src="./assets/images/sale-shape.png" width="216" height="226" loading="lazy"
              alt="get up to 50% off now" class="abs-img scale-up-anim">
          </figure>

        </div>
      </section> -->





            <!--
        - #DELIVERY
      -->

            <section class="section section-divider gray delivery">
                <div class="container">

                    <div class="delivery-content">

                        <h2 class="h2 section-title">
                            A Moments Of Delivered On <span class="span">Right Time</span> & Place
                        </h2>

                        <p class="section-text">
                            AtmaKitchen also provided delivery services for many northern Chinese who had fled south
                            from Kaifeng during the Jurchen invasion of the 1120s, while it is also known that many
                            restaurants were run by families.
                        </p>

                        <button class="btn btn-hover">Order Now</button>
                    </div>

                    <figure class="delivery-banner">
                        <img src="./assets/images/delivery-banner-bg.png" width="700" height="602"
                            loading="lazy" alt="clouds" class="w-100">

                        <img src="./assets/images/delivery-boy.svg" width="1000" height="880" loading="lazy"
                            alt="delivery boy" class="w-100 delivery-img" data-delivery-boy>
                    </figure>

                </div>
            </section>


            <!--
        - #BANNER
      -->

            <section class="section section-divider gray banner">
                <div class="container">
                    <ul class="banner-list">
                        <li class="banner-item banner-lg">
                            <div class="banner-card">
                                <img src="image/banner-5.jpeg" width="550" height="450" loading="lazy"
                                    alt="Discount For Delicious Tasty Burgers!" class="banner-img">
                                <div class="banner-item-content">
                                    <p class="banner-subtitle">50% Off Now!</p>
                                    <h3 class="banner-title">Discount For Delicious Tasty Cakes!</h3>
                                    <p class="banner-text">Sale off 50% only this week</p>
                                    <button class="btn">Order Now</button>
                                </div>
                            </div>
                        </li>
                        <li class="banner-item banner-sm">
                            <div class="banner-card">
                                <img src="image/banner-1.jpg" width="550" height="465" loading="lazy"
                                    alt="Delicious Pizza" class="banner-img">
                                <div class="banner-item-content">
                                    <h3 class="banner-title">Delicious Cake</h3>
                                    <p class="banner-text">50% off Now</p>
                                    <button class="btn">Order Now</button>
                                </div>
                            </div>
                        </li>
                        <li class="banner-item banner-sm">
                            <div class="banner-card">
                                <img src="image/lastbanner.jpg" width="550" height="465" loading="lazy"
                                    alt="American Burgers" class="banner-img">
                                <div class="banner-item-content">
                                    <h3 class="banner-title">American Cake</h3>
                                    <p class="banner-text">50% off Now</p>
                                    <button class="btn">Order Now</button>
                                </div>
                            </div>
                        </li>
                        <li class="banner-item banner-md">
                            <div class="banner-card">
                                <img src="image/banner-2.jpg" width="550" height="220" loading="lazy"
                                    alt="Tasty Buzzed Pizza" class="banner-img">
                                <div class="banner-item-content">
                                    <h3 class="banner-title">Tasty Buzzed Cake</h3>
                                    <p class="banner-text">Sale off 50% only this week</p>
                                    <button class="btn">Order Now</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <!--
        - #TESTIMONIALS
      -->
            <section class="section section-divider white testi">
                <div class="container">

                    <p class="section-subtitle">Testimonials</p>

                    <h2 class="h2 section-title">
                        Our Customers <span class="span">Reviews</span>
                    </h2>

                    <p class="section-text">
                        Food is any substance consumed to provide nutritional
                        support for an organism.
                    </p>

                    <ul class="testi-list has-scrollbar">

                        <li class="testi-item">
                            <div class="testi-card">

                                <div class="profile-wrapper">

                                    <figure class="avatar">
                                        <img src="./assets/images/avatar-1.jpg" width="80" height="80"
                                            loading="lazy" alt="Robert William">
                                    </figure>

                                    <div>
                                        <h3 class="h4 testi-name">Robert William</h3>

                                        <p class="testi-title">CEO Kingfisher</p>
                                    </div>

                                </div>

                                <blockquote class="testi-text">
                                    "I would be lost without restaurant. I would like to personally thank you for your
                                    outstanding
                                    product."
                                </blockquote>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                            </div>
                        </li>

                        <li class="testi-item">
                            <div class="testi-card">

                                <div class="profile-wrapper">

                                    <figure class="avatar">
                                        <img src="./assets/images/avatar-2.jpg" width="80" height="80"
                                            loading="lazy" alt="Thomas Josef">
                                    </figure>

                                    <div>
                                        <h3 class="h4 testi-name">Thomas Josef</h3>

                                        <p class="testi-title">CEO Getforce</p>
                                    </div>

                                </div>

                                <blockquote class="testi-text">
                                    "I would be lost without restaurant. I would like to personally thank you for your
                                    outstanding
                                    product."
                                </blockquote>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                            </div>
                        </li>

                        <li class="testi-item">
                            <div class="testi-card">

                                <div class="profile-wrapper">

                                    <figure class="avatar">
                                        <img src="./assets/images/avatar-3.jpg" width="80" height="80"
                                            loading="lazy" alt="Charles Richard">
                                    </figure>

                                    <div>
                                        <h3 class="h4 testi-name">Charles Richard</h3>

                                        <p class="testi-title">CEO Angela</p>
                                    </div>

                                </div>

                                <blockquote class="testi-text">
                                    "I would be lost without restaurant. I would like to personally thank you for your
                                    outstanding
                                    product."
                                </blockquote>

                                <div class="rating-wrapper">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>








        </article>
    </main>


    <!--
    - #FOOTER
  -->

    <footer class="footer">

        <div class="footer-top" style="background-image: url('./assets/images/footer-illustration.png')">
            <div class="container">

                <div class="footer-brand">

                    <a href="" class="logo">Atma Kitchen<span class="span">.</span></a>

                    <p class="footer-text">
                        Financial experts support or help you to to find out which way you can raise your funds more.
                    </p>

                    <ul class="social-list">

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-pinterest"></ion-icon>
                            </a>
                        </li>

                    </ul>

                </div>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Contact Info</p>
                    </li>

                    <li>
                        <p class="footer-list-item">+1 (062) 109-9222</p>
                    </li>

                    <li>
                        <p class="footer-list-item">Info@YourGmail24.com</p>
                    </li>

                    <li>
                        <address class="footer-list-item">153 Williamson Plaza, Maggieberg, MT 09514</address>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Opening Hours</p>
                    </li>

                    <li>
                        <p class="footer-list-item">Monday-Friday: 08:00-22:00</p>
                    </li>

                    <li>
                        <p class="footer-list-item">Tuesday 4PM: Till Mid Night</p>
                    </li>

                    <li>
                        <p class="footer-list-item">Saturday: 10:00-16:00</p>
                    </li>

                </ul>
                <!--
        <form action="" class="footer-form">

          <p class="footer-list-title">Book a Table</p>

          <div class="input-wrapper">

            <input type="text" name="full_name" required placeholder="Your Name" aria-label="Your Name"
              class="input-field">

            <input type="email" name="email_address" required placeholder="Email" aria-label="Email"
              class="input-field">

          </div>

          <div class="input-wrapper">

            <select name="total_person" aria-label="Total person" class="input-field">
              <option value="person">Person</option>
              <option value="2 person">2 Person</option>
              <option value="3 person">3 Person</option>
              <option value="4 person">4 Person</option>
              <option value="5 person">5 Person</option>
            </select>

            <input type="date" name="booking_date" aria-label="Reservation date" class="input-field">

          </div>

          <textarea name="message" required placeholder="Message" aria-label="Message" class="input-field"></textarea>

          <button type="submit" class="btn">Book a Table</button>

        </form> -->

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p class="copyright-text">
                    &copy; 2022 <a href="#" class="copyright-link">codewithsadee</a> All Rights Reserved.
                </p>
            </div>
        </div>

    </footer>




    <!--
    - #BACK TO TOP
  -->

    <a href="#top" class="back-top-btn" aria-label="Back to top" data-back-top-btn>
        <ion-icon name="chevron-up"></ion-icon>
    </a>


    <!--
    - custom js link
  -->
    <script src="./assets/js/script.js" defer></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
