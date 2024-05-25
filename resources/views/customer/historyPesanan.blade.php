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
    <link rel="stylesheet" href="../css/styleDashboard.css">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap"
        rel="stylesheet">
    {{-- BOOTSTRAP --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <!--
    - preload images
  -->
    <link rel="preload" as="image" href="./assets/images/hero-banner.png" media="min-width(768px)">
    <link rel="preload" as="image" href="./assets/images/hero-banner-bg.png" media="min-width(768px)">
    <link rel="preload" as="image" href="./assets/images/backgroundcake1.jpg">

    <style>
        /*-----------------------------------*\
  #style.css
\*-----------------------------------*/

        /**
 * copyright 2022 codewithsadee
 */





        /*-----------------------------------*\
  #CUSTOM PROPERTY
\*-----------------------------------*/

        :root {

            /**
   * colors
   */

            --rich-black-fogra-29: hsl(210, 26%, 7%);
            --champagne-pink_20: hsla(23, 61%, 86%, 0.2);
            --independence_30: hsla(245, 17%, 29%, 0.3);
            --gray-x-11-gray: hsl(0, 0%, 73%);
            --champagne-pink: hsl(23, 61%, 86%);
            --spanish-gray: hsl(0, 0%, 60%);
            --sonic-silver: hsl(0, 0%, 47%);
            --deep-saffron: #ff9d2e;
            --dark-orange: hsl(28, 100%, 58%);
            --desert-sand: hsl(23, 49%, 82%);
            --isabelline: hsl(38, 44%, 96%);
            --gainsboro: hsl(0, 0%, 87%);
            --tangerine: hsl(31, 84%, 50%);
            --cinnabar: hsl(3, 90%, 55%);
            --black_95: hsla(0, 0%, 0%, 0.95);
            --cultured: hsl(0, 0%, 93%);
            --white: hsl(0, 0%, 100%);
            --black: hsl(0, 0%, 0%);
            --onyx: hsl(0, 0%, 27%);

            /**
   * typography
   */

            --ff-shadows-into-light: 'Shadows Into Light', cursive;
            --ff-roboto: 'Roboto', sans-serif;
            --ff-rubik: 'Rubik', sans-serif;

            --fs-1: 3.2rem;
            --fs-2: 2.2rem;
            --fs-3: 1.8rem;
            --fs-4: 1.4rem;
            --fs-5: 1.2rem;

            --fw-500: 500;
            --fw-600: 600;
            --fw-700: 700;

            /**
   * spacing
   */

            --section-padding: 60px;

            /**
   * shadow
   */

            --shadow-1: 0 1px 4px hsla(0, 0%, 0%, 0.2);
            --shadow-2: 0 1px 2px hsla(0, 0%, 0%, 0.2);

            /**
   * transition
   */

            --transition-1: 0.25s ease;
            --transition-2: 0.5s ease;

            /**
   * clip path
   */

            --clip-path-1: polygon(0 40%, 100% 0%, 100% 100%, 0 100%);
            --clip-path-2: polygon(0 0%, 100% 0%, 100% 100%, 0 100%);

        }





        /*-----------------------------------*\
  #RESET
\*-----------------------------------*/

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        a,
        img,
        svg,
        span,
        input,
        select,
        button,
        textarea,
        ion-icon {
            display: block;
        }

        img {
            height: auto;
        }

        input,
        select,
        button,
        textarea {
            background: none;
            border: none;
            font: inherit;
        }

        input,
        select,
        textarea {
            width: 100%;
        }

        button {
            cursor: pointer;
        }

        ion-icon {
            pointer-events: none;
        }

        address {
            font-style: normal;
        }

        html {
            font-family: var(--ff-roboto);
            font-size: 10px;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--white);
            color: var(--sonic-silver);
            font-size: 1.6rem;
            line-height: 1.6;
            overflow-x: hidden;
        }

        body.active {
            overflow: hidden;
        }

        :focus-visible {
            outline-offset: 4px;
        }

        ::selection {
            background-color: var(--deep-saffron);
            color: var(--white);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background-color: var(--cultured);
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--deep-saffron);
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: var(--tangerine);
        }


        .container {
            padding-inline: 15px;
        }

        .h1,
        .h2,
        .h3,
        .h4 {
            font-family: var(--ff-rubik);
            color: var(--rich-black-fogra-29);
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .h1,
        .h2 {
            font-size: var(--fs-1);
        }

        .h2,
        .h3,
        .h4 {
            font-weight: var(--fw-600);
        }

        .h3 {
            font-size: var(--fs-2);
        }

        .h4 {
            font-size: var(--fs-3);
        }

        .btn {
            background-color: var(--bg-color, var(--deep-saffron));
            color: var(--white);
            font-family: var(--ff-rubik);
            font-size: var(--fs-4);
            font-weight: var(--fw-500);
            height: var(--height, 45px);
            padding-inline: var(--padding-inline, 35px);
            transition: var(--transition-1);
        }

        .btn-hover {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-hover::after {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 20px;
            width: 1px;
            height: 1px;
            transform: translate(-50%, 51%) scale(var(--scale, 1));
            border-radius: 50%;
            background-color: var(--rich-black-fogra-29);
            z-index: -1;
            transition: var(--transition-2);
        }

        .btn-hover:is(:hover, :focus)::after {
            --scale: 500;
        }

        .section {
            padding-block: var(--section-padding);
        }

        .section.white {
            background-color: var(--isabelline);
        }

        .section-divider {
            position: relative;
        }

        .section-divider::before,
        .section-divider::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15px;
            background-repeat: repeat no-repeat;
            background-position: bottom;
        }

        .section-divider.white::after {
            background-image: url("../images/shape-white.png");
        }

        .section-divider.gray::after {
            background-image: url("../images/shape-grey.png");
        }

        .w-100 {
            width: 100%;
        }

        .has-scrollbar {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            scroll-snap-type: inline mandatory;
            padding-block-end: 40px;
        }

        .has-scrollbar::-webkit-scrollbar {
            height: 12px;
        }

        .has-scrollbar::-webkit-scrollbar-button {
            width: calc(25% - 40px);
        }

        .has-scrollbar::-webkit-scrollbar-track {
            outline: 2px solid var(--deep-saffron);
            border-radius: 50px;
        }

        .has-scrollbar::-webkit-scrollbar-thumb {
            border: 3px solid var(--cultured);
            border-radius: 50px;
        }

        .section-title>.span {
            display: inline-block;
            color: var(--deep-saffron);
        }

        .abs-img {
            position: absolute;
            transform: scale(1);
        }

        .scale-up-anim {
            animation: scaleUp 1s linear infinite alternate;
        }

        @keyframes scaleUp {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.05);
            }
        }

        .section-subtitle {
            color: var(--cinnabar);
            font-family: var(--ff-rubik);
            text-align: center;
            font-weight: var(--fw-500);
        }

        .badge {
            position: absolute;
            background: var(--bg-color, var(--cinnabar));
            color: var(--white);
            font-size: var(--fs-5);
            font-weight: var(--fw-600);
            padding: var(--padding-block, 2px) 15px;
        }

        .rating-wrapper {
            display: flex;
            gap: 5px;
            color: var(--deep-saffron);
        }





        /*-----------------------------------*\
  #HEADER
\*-----------------------------------*/

        /* .navbar, */
        .header-btn-group .btn {
            display: none;
        }

        .header {
            --color: var(--white);
            --btn-color: var(--champagne-pink);

            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding-block: 20px;
            border-block-end: 1px solid var(--champagne-pink_20);
            z-index: 4;
        }

        .header.active {
            --color: var(--rich-black-fogra-29);
            --btn-color: var(--rich-black-fogra-29);

            position: fixed;
            top: -86px;
            background-color: var(--white);
            box-shadow: var(--shadow-1);
            animation: slideIn 0.5s ease-out forwards;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(100%);
            }
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: var(--color);
            font-family: var(--ff-rubik);
            font-size: 2.8rem;
            font-weight: var(--fw-700);
            letter-spacing: -2px;
        }

        .logo .span {
            display: inline-block;
            color: var(--deep-saffron);
        }

        .header-btn-group {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-btn {
            color: var(--btn-color);
            font-size: 20px;
        }

        .search-btn ion-icon {
            --ionicon-stroke-width: 50px;
        }

        .nav-toggle-btn {
            display: grid;
            gap: 4px;
        }

        .line {
            width: 10px;
            height: 3px;
            background-color: var(--btn-color);
            border-radius: 5px;
            transition: var(--transition-1);
        }

        .line.middle {
            width: 20px;
        }

        .line.bottom {
            margin-left: auto;
        }

        .nav-toggle-btn.active .line.top {
            transform: translate(1px, 3px) rotate(45deg);
        }

        .nav-toggle-btn.active .line.middle {
            transform: rotate(-45deg);
        }

        .nav-toggle-btn.active .line.bottom {
            transform: translate(-1px, -3px) rotate(45deg);
        }

        .navbar {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 30px);
            background-color: var(--white);
            padding-inline: 20px;
            box-shadow: var(--shadow-1);
            height: 0;
            overflow: hidden;
            visibility: hidden;
            transition: var(--transition-1);
        }

        .navbar.active {
            height: 236px;
            visibility: visible;
        }

        .navbar-list {
            margin-block: 10px;
        }

        .nav-item:not(:last-child) {
            border-block-end: 1px solid hsla(0, 0%, 0%, 0.04);
        }

        .navbar-link {
            color: var(--rich-black-fogra-29);
            font-size: var(--fs-4);
            font-family: var(--ff-rubik);
            font-weight: var(--fw-500);
            padding: 10px 15px;
            transition: var(--transition-1);
        }

        .navbar-link:is(:hover, :focus) {
            color: var(--dark-orange);
        }




        /*-----------------------------------*\
  #SEARCH BOX
\*-----------------------------------*/

        .search-container {
            position: fixed;
            top: -60%;
            left: 0;
            width: 100%;
            height: 110%;
            background-color: var(--black_95);
            display: flex;
            justify-content: center;
            align-items: center;
            padding-inline: 15px;
            z-index: 5;
            visibility: hidden;
            opacity: 0;
            transition: var(--transition-2);
        }

        .search-container.active {
            visibility: visible;
            opacity: 1;
            transform: translateY(50%);
        }

        .search-box {
            position: relative;
            width: 100%;
            max-width: 500px;
        }

        .search-input {
            color: var(--gainsboro);
            font-size: 3rem;
            padding: 20px 15px;
            padding-inline-end: 70px;
        }

        .search-input::placeholder {
            color: var(--spanish-gray);
        }

        .search-input::-webkit-search-cancel-button {
            display: none;
        }

        .search-submit {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
            color: var(--onyx);
            font-size: 4rem;
            transition: var(--transition-1);
        }

        .search-submit:is(:hover, :focus) {
            color: var(--gainsboro);
        }

        .search-close-btn {
            position: absolute;
            inset: 0;
            z-index: -1;
            cursor: url("../images/close.png"), auto;
        }





        /*-----------------------------------*\
  #HERO
\*-----------------------------------*/

        .hero-banner {
            display: none;
        }

        .hero {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding-block: 145px 60px;
            text-align: center;
        }

        .hero-subtitle {
            color: var(--dark-orange);
            font-family: var(--ff-shadows-into-light);
            font-size: var(--fs-3);
            letter-spacing: 1px;
            margin-block-end: 25px;
        }

        .hero-title {
            color: var(--champagne-pink);
            max-width: 12ch;
            margin-inline: auto;
        }

        .hero-text {
            color: var(--desert-sand);
            margin-block: 15px 30px;
            max-width: 44ch;
            margin-inline: auto;
        }

        .hero .btn {
            margin-inline: auto;
        }

        .hero .btn:is(:hover, :focus) {
            background-color: var(--white);
            color: var(--black);
        }





        /*-----------------------------------*\
  #PROMO
\*-----------------------------------*/

        .promo-card {
            position: relative;
            background-color: var(--white);
            text-align: center;
            padding: 40px 30px;
            box-shadow: var(--shadow-2);
            z-index: 1;
        }

        .promo-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background-color: var(--deep-saffron);
            clip-path: var(--clip-path-1);
            transform: scaleY(0.3);
            transform-origin: bottom;
            z-index: -1;
            transition: var(--transition-1);
        }

        .promo-card:hover::after {
            clip-path: var(--clip-path-2);
            transform: scaleY(1);
        }

        .promo-card .card-icon svg {
            margin-inline: auto;
        }

        .promo-card:hover .card-icon path {
            fill: var(--white);
        }

        .promo-card:hover :is(.card-title, .card-text) {
            color: var(--white);
        }

        .promo-card .card-title {
            margin-block: 15px;
            transition: var(--transition-1);
        }

        .promo-card .card-text {
            margin-block-end: 15px;
            transition: var(--transition-1);
        }

        .promo-card .card-banner {
            max-width: max-content;
            margin-inline: auto;
            aspect-ratio: 1 / 1;
        }

        .promo-item {
            min-width: 100%;
            scroll-snap-align: start;
        }





        /*-----------------------------------*\
  #ABOUT
\*-----------------------------------*/

        .about {
            text-align: center;
        }

        .about-banner {
            position: relative;
            aspect-ratio: 1 / 0.9;
        }

        .about-img {
            max-width: max-content;
            margin-inline: auto;
        }

        .about-banner .abs-img {
            top: 0;
            left: 100px;
        }

        .about .section-title {
            max-width: 15ch;
            margin-block: 40px 10px;
            margin-inline: auto;
        }

        .about-list {
            margin-block: 20px 30px;
        }

        .about-item {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .about-item:not(:last-child) {
            margin-block-end: 10px;
        }

        .about-item ion-icon {
            background-color: var(--deep-saffron);
            color: var(--white);
            font-size: 1.2rem;
            padding: 4px;
            border-radius: 50%;
            --ionicon-stroke-width: 110px;
        }

        .about-item .span {
            color: var(--rich-black-fogra-29);
            font-family: var(--ff-rubik);
            font-weight: var(--fw-500);
        }

        .about .btn {
            margin-inline: auto;
        }





        /*-----------------------------------*\
  #FOOD MENU
\*-----------------------------------*/

        .food-menu {
            background-color: var(--isabelline);
            text-align: center;
        }

        .food-menu .section-title {
            margin-block: 10px 20px;
        }

        .food-menu .section-text {
            max-width: 44ch;
            margin-inline: auto;
            margin-block-end: 30px;
        }

        .fiter-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-block-end: 40px;
        }

        .filter-btn {
            background-color: var(--white);
            color: var(--color, var(--rich-black-fogra-29));
            font-family: var(--ff-rubik);
            font-weight: var(--fw-500);
            padding: 5px 20px;
            border: 1px solid var(--border-color, var(--cultured));
        }

        .filter-btn.active {
            background-color: var(--deep-saffron);
            --color: var(--white);
            --border-color: var(--deep-saffron);
        }

        .food-menu-list {
            display: grid;
            gap: 30px;
        }

        .food-menu-card {
            background-color: var(--white);
            padding: 40px;
            box-shadow: var(--shadow-2);
        }

        .food-menu-card:focus-within {
            outline: 1px auto -webkit-focus-ring-color;
        }

        .food-menu-card .card-banner {
            position: relative;
            padding-block-start: 30px;
            max-width: max-content;
            aspect-ratio: 1 / 1;
            margin-inline: auto;
        }

        .food-menu-card .badge {
            top: 0;
            left: 0;
        }

        .food-menu-btn {
            position: absolute;
            top: calc(50% + 15px);
            left: 50%;
            transform: translate(-50%, 0);
            min-width: max-content;
            --bg-color: var(--cinnabar);
            width: 60%;
            --height: 40px;
            --padding-inline: 20px;
            opacity: 0;
            transition: var(--transition-2);
        }

        .food-menu-btn:is(:hover, :focus) {
            --bg-color: var(--deep-saffron);
        }

        .food-menu-card:is(:hover, :focus-within) .food-menu-btn {
            transform: translate(-50%, -50%);
            opacity: 1;
        }

        .food-menu-card .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-block: 20px 10px;
        }

        .food-menu-card .category {
            font-family: var(--ff-rubik);
            font-weight: var(--fw-500);
        }

        .food-menu-card .rating-wrapper {
            font-size: 1.4rem;
        }

        .food-menu-card .card-title {
            margin-block-end: 10px;
        }

        .food-menu-card .price-wrapper {
            display: flex;
            justify-content: center;
            gap: 5px;
            font-family: var(--ff-rubik);
            font-weight: var(--fw-600);
        }

        .food-menu-card .price-text {
            color: var(--cinnabar);
            text-transform: uppercase;
            padding-inline-end: 5px;
        }

        .food-menu-card .price {
            color: var(--deep-saffron);
        }

        .food-menu-card .del {
            color: var(--gray-x-11-gray);
        }

        .search-input-makanan {
            color: #000000;
            flex: 1;
            padding: 8px;
            border: 1px solid #b8b7b7;
            height: 40px;
            max-width: 400px;
            padding-left: 10px;
            border-radius: 10px;
            margin-right: 10px;
        }

        .search-cont {
            list-style-type: none;
            margin-bottom: 20px;

        }

        .search-cont li {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }


        .search-button {
            padding: 5px 15px;
            background-color: #ff8d29;
            color: white;


            cursor: pointer;
            border-radius: 10px;
        }

        .search-button:hover {
            background-color: #000000;

        }

        /*-----------------------------------*\
  #DELIVERY
\*-----------------------------------*/

        .delivery-content {
            margin-block-end: 40px;
        }

        .delivery .section-title {
            max-width: 17ch;
            line-height: 1.6;
            letter-spacing: -2px;
        }

        .delivery .section-text {
            margin-block: 15px 25px;
        }

        .delivery-banner {
            position: relative;
            aspect-ratio: 1 / 0.86;
        }

        .delivery-img {
            position: absolute;
            top: 0;
            left: 0;
            transform: translateX(-80px);
            transition: var(--transition-2);
        }





        /*-----------------------------------*\
  #TESTIMONIALS
\*-----------------------------------*/

        .testi {
            text-align: center;
        }

        .testi .section-title {
            margin-block: 10px 20px;
        }

        .testi .section-text {
            max-width: 44ch;
            margin-inline: auto;
            margin-block-end: 30px;
        }

        .testi-card {
            background-color: var(--white);
            padding: 40px;
            text-align: left;
            box-shadow: var(--shadow-2);
        }

        .testi-card .profile-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .testi-card .avatar {
            min-width: max-content;
            border-radius: 50%;
            overflow: hidden;
        }

        .testi-card .testi-name {
            margin-block-end: 2px;
        }

        .testi-card .testi-title {
            font-family: var(--ff-rubik);
            font-size: var(--fs-4);
        }

        .testi-card .testi-text {
            margin-block: 20px 15px;
        }

        .testi-item {
            min-width: 100%;
            scroll-snap-align: start;
        }





        /*-----------------------------------*\
  #BANNER
\*-----------------------------------*/

        .banner {
            color: var(--white);
        }

        .banner-list {
            display: grid;
            gap: 10px;
        }

        .banner-lg {
            height: 430px;
        }

        .banner-sm {
            height: 200px;
        }

        .banner-md {
            height: 240px;
        }

        .banner-card {
            position: relative;
            height: 100%;
            box-shadow: var(--shadow-2);
            overflow: hidden;
        }

        .banner-card .banner-img {
            background-color: var(--gainsboro);
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1);
            transition: var(--transition-2);
        }

        .banner-card:is(:hover, :focus-within) .banner-img {
            transform: scale(1.05);
        }

        .banner-item-content {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            right: 20px;
            max-height: calc(100% - 30px);
        }

        .banner-md .banner-item-content {
            left: 50%;
        }

        .banner-subtitle,
        .banner-title {
            font-family: var(--ff-rubik);
            font-weight: var(--fw-600);
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        .banner-lg .banner-subtitle {
            font-size: var(--fs-2);
            margin-block-end: 10px;
        }

        .banner-lg .banner-title {
            font-size: var(--fs-1);
            max-width: 16ch;
        }

        :is(.banner-md, .banner-sm) .banner-title {
            font-size: var(--fs-2);
            max-width: 10ch;
        }

        .banner-card .banner-text {
            margin-block: 10px 15px;
        }

        .banner-card .btn {
            --bg-color: var(--dark-orange);
            --height: 40px;
            --padding-inline: 25px;
        }

        .banner-card .btn:is(:hover, :focus) {
            background-color: var(--rich-black-fogra-29);
        }






        /*-----------------------------------*\
  #FOOTER
\*-----------------------------------*/

        .footer {
            overflow: hidden;
        }

        .footer-top {
            position: relative;
            padding-block: 120px;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: bottom;
            border-block-end: 2px solid var(--independence_30);
        }

        .footer-top::after {
            content: url(../images/delivery-boy.svg);
            position: absolute;
            bottom: -11px;
            left: -160px;
            width: 160px;
            animation: running-cycle 20s linear infinite;
        }

        @keyframes running-cycle {
            0% {
                left: -160px;
            }

            100% {
                left: 100%;
            }
        }

        .footer-top .container {
            display: grid;
            gap: 30px;
        }

        .footer .logo {
            color: var(--rich-black-fogra-29);
            font-size: 3.2rem;
        }

        .footer-text {
            margin-block: 15px 25px;
        }

        .social-list {
            display: flex;
            gap: 5px;
        }

        .social-link {
            background-color: var(--dark-orange);
            color: var(--white);
            font-size: 1.5rem;
            padding: 10px;
            transition: var(--transition-1);
        }

        .social-link:is(:hover, :focus) {
            background-color: var(--rich-black-fogra-29);
        }

        .footer-list-title {
            position: relative;
            max-width: max-content;
            color: var(--rich-black-fogra-29);
            font-family: var(--ff-rubik);
            font-size: var(--fs-3);
            font-weight: var(--fw-600);
            letter-spacing: -1px;
            margin-block-end: 20px;
        }

        .footer-list-title::after {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: calc(100% + 15px);
            background-color: var(--deep-saffron);
            width: 40px;
            height: 4px;
            border-inline-end: 5px solid var(--deep-saffron);
            box-shadow: inset -5px 0 0 var(--white);
        }

        .footer-list>li:not(:last-child) {
            margin-block-end: 15px;
        }

        .footer-list address {
            max-width: 20ch;
        }

        .footer-form {
            background-color: var(--white);
            padding: 30px;
            border: 1px solid var(--cultured);
            box-shadow: var(--shadow-2);
        }

        .input-wrapper {
            display: grid;
            gap: 10px;
            margin-block-end: 10px;
        }

        .input-field {
            color: var(--spanish-gray);
            font-size: var(--fs-4);
            border: 1px solid var(--cultured);
            padding: 8px 12px;
        }

        .input-field::placeholder {
            color: var(--spanish-gray);
        }

        .input-field::-webkit-calendar-picker-indicator {
            opacity: 0.5;
        }

        textarea.input-field {
            min-height: 50px;
            max-height: 150px;
            height: 100px;
            resize: vertical;
            margin-block-end: 10px;
        }

        .footer-form .btn {
            font-size: var(--fs-15);
            --height: 40px;
            --padding-inline: 25px;
        }

        .footer-form .btn:is(:hover, :focus) {
            background-color: var(--rich-black-fogra-29);
        }

        .footer-bottom {
            padding-block: 20px;
            text-align: center;
        }

        .copyright-link {
            display: inline-block;
        }

        .copyright-link:is(:hover, :focus) {
            text-decoration: underline;
        }





        /*-----------------------------------*\
  #BACK TO TOP
\*-----------------------------------*/

        .back-top-btn {
            position: fixed;
            bottom: 10px;
            right: 20px;
            background-color: var(--deep-saffron);
            color: var(--white);
            padding: 15px;
            border-radius: 50%;
            box-shadow: var(--shadow-1);
            z-index: 2;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition-1);
        }

        .back-top-btn.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(-10px);
        }

        .back-top-btn:is(:hover, :focus) {
            background-color: var(--rich-black-fogra-29);
        }





        /*-----------------------------------*\
  #MEDIA QUERIES
\*-----------------------------------*/

        /**
 * responsive for larger than 480px screen
 */

        @media (min-width: 480px) {

            /**
   * HEADER
   */

            .header-btn-group .btn {
                display: block;
                --bg-color: var(--dark-orange);
            }

            .btn-login {
                border-radius: 12px;
            }

        }





        /**
 * responsive for larger than 550px screen
 */

        @media (min-width: 550px) {

            /**
   * REUSED STYLE
   */

            .container {
                max-width: 550px;
                width: 100%;
                margin-inline: auto;
            }

            .has-scrollbar>li {
                min-width: calc(50% - 5px);
            }



            /**
   * HERO
   */

            .hero-title {
                --fs-1: 4.2rem;
            }



            /**
   * FOOTER
   */

            .footer-top .container {
                grid-template-columns: 1fr 1fr;
            }

        }





        /**
 * responsive for larger than 768px screen
 */

        @media (min-width: 768px) {

            /**
   * REUSED STYLE
   */

            .container {
                max-width: 720px;
            }



            /**
   * HERO
   */

            .hero {
                position: relative;
                text-align: left;
                overflow: hidden;
                z-index: 1;
            }

            .hero-content> :is(*, .btn) {
                margin-inline: 0;
            }

            .hero-banner {
                display: block;
                position: absolute;
                top: calc(50% + 86px);
                transform: translateY(-50%);
                right: 50px;
                max-width: 40%;
                aspect-ratio: 1 / 0.9;
            }

            .hero-img {
                position: absolute;
                bottom: 0;
            }

            .hero::after {
                content: "";
                position: absolute;
                right: 0;
                bottom: -2px;
                width: 100%;
                height: 100%;
                background-image: url("../images/hero-bg-shape.png");
                background-repeat: no-repeat;
                background-size: contain;
                background-position: right bottom;
                pointer-events: none;
                z-index: -1;
            }



            /**
   * ABOUT
   */

            .about .container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }

            .about {
                text-align: left;
            }

            .about .section-title {
                margin-block-start: 0;
            }

            .about :is(.section-title, .btn) {
                margin-inline: 0;
            }

            .about-item {
                justify-content: flex-start;
            }



            /**
   * FOOD MENU
   */

            .food-menu-list {
                grid-template-columns: 1fr 1fr;
            }

            .food-menu-card :is(.wrapper, .price-wrapper) {
                justify-content: flex-start;
            }

            .food-menu-card .card-title {
                text-align: left;
            }



            /**
   * CTA
   */

            .cta .container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                align-items: center;
                gap: 30px;
            }

            .cta {
                text-align: left;
            }

            .cta :is(.section-title, .btn) {
                margin-inline: 0;
            }

            .cta-img {
                transform: scale(1.3) translate(90px, 20px);
            }



            /**
   * DELIVERY
   */

            .delivery .container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                align-items: center;
                gap: 50px;
            }



            /**
   * BANNER
   */

            .banner-list {
                grid-template-columns: repeat(4, 1fr);
            }

            .banner-lg {
                grid-column: 1 / 3;
                grid-row: 1 / 3;
            }

            .banner-md {
                grid-column: 3 / 5;
                grid-row: 2 / 3;
                height: 220px;
            }



            /**
   * BLOG
   */

            .blog-list {
                grid-template-columns: 1fr 1fr;
            }

            .blog-card {
                height: 100%;
            }



            /**
   * FOOTER
   */

            .input-wrapper {
                grid-template-columns: 1fr 1fr;
            }

        }





        /**
 * responsive for larger than 992px screen
 */

        @media (min-width: 992px) {

            /**
   * CUSTOM PROPERTY
   */

            :root {

                /**
     * spacing
     */

                --section-padding: 120px;

            }



            /**
   * REUSED STYLE
   */

            .container {
                max-width: 960px;
            }

            .has-scrollbar>li {
                min-width: calc(33.33% - 6.66px);
            }

            .h2 {
                --fs-1: 4.2rem;
            }



            /**
   * HEADER
   */

            .nav-toggle-btn {
                display: none;
            }

            .header .container {
                gap: 20px;
            }

            .navbar,
            .navbar.active {
                all: unset;
                margin-inline-start: auto;
            }

            .navbar-list {
                margin-block: 0;
                display: flex;
                gap: 5px;
            }

            .nav-item:not(:last-child) {
                border-block-end: none;
            }

            .navbar-link {
                --fs-4: 1.5rem;
                color: var(--btn-color);
                letter-spacing: -0.5px;
            }



            /**
   * HERO
   */

            .hero {
                min-height: 660px;
                display: grid;
                align-items: center;
            }

            .hero-subtitle {
                --fs-3: 3.2rem;
            }

            .hero-title {
                --fs-1: 7rem;
                letter-spacing: -2.5px;
            }

            .hero-text {
                font-size: var(--fs-3);
            }

            .hero-banner {
                max-width: 45%;
                top: auto;
                bottom: 0;
                transform: translateY(0);
            }

            .hero-img-bg {
                transform: scale(1.4) translate(20px, -20px);
            }



            /**
   * FOOD MENU
   */

            .food-menu-list {
                grid-template-columns: repeat(3, 1fr);
            }

            .food-menu-card {
                height: 100%;
            }



            /**
   * CTA
   */

            .cta-img {
                transform: scale(1.4) translate(20px, 40px);
            }

            .cta-banner .abs-img {
                left: -50px;
            }

            :is(.cta, .delivery) .section-title {
                line-height: 1.2;
            }



            /**
   * BANNER
   */

            .banner-lg .banner-title {
                --fs-1: 3.6rem;
                letter-spacing: -2px;
            }

            :is(.banner-md, .banner-sm) .banner-title,
            .banner-lg .banner-subtitle {
                --fs-2: 3.2rem;
            }



            /**
   * TESTIMONIALS
   */

            .testi-list {
                padding-block-end: 0;
            }



            /**
   * BLOG
   */

            .blog-list {
                grid-template-columns: repeat(3, 1fr);
            }

            .blog-card .card-title {
                --fs-3: 2.2rem;
            }



            /**
   * FOOTER
   */

            .footer-top .container {
                grid-template-columns: 1fr 1fr 1fr 1.6fr;
            }

            .footer-form {
                margin-block-start: -170px;
            }



            /**
   * BACK TO TOP
   */

            .back-top-btn {
                bottom: 20px;
                right: 30px;
            }

        }





        /**
 * responsive for larger than 1200px screen
 */

        @media (min-width: 1200px) {

            /**
   * REUSED STYLE
   */

            .container {
                max-width: 1200px;
            }



            /**
   * HERO
   */

            .hero {
                min-height: 770px;
            }



            /**
   * PROMO
   */

            .promo .promo-item {
                min-width: calc(25% - 7.5px);
            }



            /**
   * ABOUT
   */

            .about .container {
                gap: 60px;
            }



            /**
   * CTA
   */

            .cta {
                --section-padding: 60px;
            }

            .cta .section-title {
                max-width: 18ch;
            }



            /**
   * BANNER
   */

            .banner-md .banner-item-content {
                left: 55%;
            }


            /**
   * FOOTER
   */

            .footer-top .container {
                grid-template-columns: 1.4fr 1fr 1fr 1.6fr;
            }

        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
            /* Align dropdown to the right */
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .show {
            display: block;
        }

        .header {
            background-color: #414040;
        }

        .container_history {
            margin: 10% auto;
            /* Memberikan margin atas dan bawah 10%, dan margin kiri-kanan otomatis */
            max-width: 1200px;
            /* Atur lebar maksimum agar konten tidak terlalu lebar */
        }

        .container_history .container-history {
            border: 1px solid black;
            border-radius: 15px 15px 0px 0px;
            margin-top: 20px;
        }

        .appbar {
            background-color: #414040;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        .appbar-title {
            margin: 0;
        }

        .container-img {
            border: 1px solid black;
        }

        .container-img img {
            border: 1px solid black;
            margin: 10px 10px;
        }

        .data-history p {
            margin: 0px;
        }

        .input {
            margin-top: 20px;
            width: 500px;
            height: 40px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body id="top">

    <!--
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">
            <h1>
                <a href="#" class="logo"><img src="../assets/images/logo.png" width="170px" alt=""></a>
            </h1>
            <nav class="navbar nav-top" data-navbar>
                <ul class="navbar-list">
                    <li class="nav-item">
                        <a href="#home" class="navbar-link" data-nav-link>Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="navbar-link" data-nav-link>About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#food-menu" class="navbar-link" data-nav-link>Riwayat Pesanan</a>
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
                <img src="../image/pictureProfile.png" alt="" width="50px">
                <div class="dropdown">
                    <button class="dropdown-icon" onclick="toggleDropdown()">
                        <ion-icon name="caret-down-outline"></ion-icon>
                    </button>
                    <div class="dropdown-content" id="dropdownMenu">
                        <a href="{{ route('profil_customer') }}">Profile</a>
                        <a href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
                <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
                    <span class="line top"></span>
                    <span class="line middle"></span>
                    <span class="line bottom"></span>
                </button>
            </div>
        </div>
    </header>

    <section class="container_history" style="margin-top: 10%;">
        <div class="row">
            <div class="col-12">
                <div class="appbar">
                    <h2 class="appbar-title">History Pemesanan</h2>
                </div>
            </div>
        </div>

        {{-- UNTUK SEARCH HISTORY PEMESANAN --}}
        <div class="search_container">
            <form action="{{ route('searchHistory') }}" method="GET">
                <input class="input" type="text" name="search" placeholder="Search">
                <button type="submit"></button> {{-- Tambahkan tombol submit --}}
            </form>
        </div>

        @php
            $grandTotal = 0;
            $prevDate = null; // Tambahkan variabel untuk menyimpan tanggal transaksi sebelumnya
        @endphp

        {{-- Mulai loop transaksi --}}
        @forelse ($transaksis as $transaksi)
            @php
                // Ubah format tanggal untuk memeriksa perbedaan
                $currentDate = $transaksi->tanggal_transaksi;
                $produkTersedia = false; // Inisialisasi variabel untuk menandai apakah ada produk yang tersedia
            @endphp

            {{-- Cek apakah tanggal transaksi berbeda dengan tanggal sebelumnya --}}
            @if ($currentDate != $prevDate)
                {{-- Tutup div sebelumnya jika tanggal transaksi berbeda --}}
                @if ($prevDate != null && $produkTersedia)
                    </div> <!-- Tutup row container-history hanya jika produk tersedia -->
                    {{-- Tampilkan total untuk tanggal transaksi yang berbeda --}}
                    <div class="row pt-3"
                        style="display: flex; justify-content: flex-end; border-radius: 0px 0px 15px 15px; border-top: none;">
                        <div class="col-9">
                            <h1>Total</h1>
                        </div>
                        <div class="col-3 text-center" style="align-content: center;">
                            <h1>Rp. {{ $grandTotal }}</h1> {{-- Menampilkan grandTotal --}}
                            <button class="btn btn-primary"
                                style="width: 100px; height: 30px; margin-top: 10px; margin-bottom: 10px; border-radius: 10px;">Review</button>
                        </div>
                    </div>
                    {{-- Reset grandTotal untuk tanggal transaksi baru --}}
                    @php
                        $grandTotal = 0;
                    @endphp
                @endif

                {{-- Buka div baru untuk tanggal transaksi baru jika ada produk tersedia --}}
                @if ($produkTersedia)
                    <div class="row container-history">
                        {{-- Tampilkan tanggal transaksi --}}
                        <div class="col-12">
                            <h3>{{ $transaksi->tanggal_transaksi }}</h3>
                        </div>
                @endif
            @endif

            {{-- Tampilkan detail transaksi --}}
            @foreach ($transaksi->detailTransaksis as $detailTransaksi)
                @if ($detailTransaksi->produk)
                    @php
                        $produkTersedia = true; // Tandai bahwa ada produk yang tersedia pada transaksi ini
                    @endphp
                    <!-- Tampilkan detail produk -->
                    <div class="col-2" style="align-content: center; justify-content: center; display: flex;">
                        <div style="margin-top: 20px; margin-bottom: 20px; display: inline-block;">
                            <img src="{{ asset('./storage/dukpro/' . $detailTransaksi->produk->image) }}"
                                alt="" width="100px"
                                style="margin-top: 10px; margin-bottom: 10px; border-radius: 10px">
                        </div>
                    </div>
                    <div class="col-7 data-history" style="align-content: center;">
                        <div>
                            <p style="font-size: 20px; font-weight: 600;">
                                {{ $detailTransaksi->produk->nama }}</p>
                            <p style="font-size: 16px">x{{ $detailTransaksi->jumlah_produk }}</p>
                            <p style="margin-top: 20px">Date : {{ $transaksi->tanggal_transaksi }}</p>
                            <p>Address : {{ $transaksi->alamat_pengantaran }}</p>
                        </div>
                    </div>
                    <div class="col-3 text-center" style="align-content: center;">
                        {{-- Tampilkan total harga untuk setiap produk --}}
                        @php
                            $totalHarga = $detailTransaksi->jumlah_produk * $detailTransaksi->produk->harga;
                            $grandTotal += $totalHarga; // Tambahkan total harga ke grandTotal
                        @endphp
                        <p style="font-size: 20px; margin: 0px">Rp. {{ $totalHarga }}</p>
                        <p
                            style="font-size: 20px; color: {{ $transaksi->status_pembayaran === 'Completed' ? 'greenyellow' : 'red' }};">
                            {{ $transaksi->status_pembayaran }}
                        </p>
                    </div>
                @endif
            @endforeach

            {{-- Tetapkan tanggal transaksi saat ini sebagai tanggal transaksi sebelumnya untuk iterasi berikutnya --}}
            @php
                $prevDate = $currentDate;
            @endphp
        @empty
            {{-- Tampilkan pesan jika tidak ada transaksi --}}
            <p>Tidak ada riwayat pemesanan.</p>
        @endforelse

        {{-- Tutup div terakhir jika ada produk tersedia pada transaksi terakhir --}}
        @if ($produkTersedia)
            </div>
        @endif

        {{-- Tampilkan total untuk tanggal transaksi terakhir jika ada produk tersedia --}}
        @if ($produkTersedia)
            <div class="row pt-3"
                style=" display: flex; justify-content: flex-end; border-radius: 0px 0px 15px 15px; border-top: none;">
                <div class="col-9">
                    <h1>Total</h1>
                </div>
                <div class="col-3 text-center" style="align-content: center;">
                    <h1>Rp. {{ $grandTotal }}</h1> {{-- Menampilkan grandTotal --}}
                    <button class="btn btn-primary"
                        style="width: 100px; height: 30px; margin-top: 10px; margin-bottom: 10px; border-radius: 10px;">Review</button>
                </div>
            </div>
        @endif
    </section>

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


    <script>
        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-icon')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
