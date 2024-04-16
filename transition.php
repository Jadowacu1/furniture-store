<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            height: 200px;
            /* Adjust the height of the slideshow */
            overflow: hidden;
            float: left;
            /* Float the slideshow to the left */
            margin-top: 10px;
        }

        .slide {
            display: none;
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .slide img {
            max-width: 50%;
            height: 100%;
            float: right;
        }

        .slide-content {
            position: absolute;
            left: 10%;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
        }

        .navigation-dots {
            text-align: center;
            margin-top: 20px;
        }

        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            cursor: pointer;
        }

        .dot.active {
            background-color: #fff;
        }

        /* Clear float after slideshow */
        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <div class="slideshow-container">
        <div class="slide" style="background-color: #121e31;">
            <div class="slide-content">
                <h1>Flash Sale</h1>
                <p>Exquisite Bed for Couples..</p>
            </div>
            <img src="1.jpeg" alt="Slide 1">
        </div>
        <div class="slide" style="background-color: chocolate;">
            <div class="slide-content">
                <h1>50% OFF</h1>
                <p>Wonderfull Living Room For Families...</p>
            </div>
            <img src="2.jpeg" alt="Slide 2">
        </div>
        <div class="slide" style="background-color: #7f5a2e;">
            <div class="slide-content">
                <h1>40% OFF</h1>
                <p>Don't miss OUT on this Offer!...</p>
            </div>
            <img src="3.jpeg" alt="Slide 3">
        </div>
        <div class="slide" style="background-color: brown;">
            <div class="slide-content">
                <h1>Office Sofa</h1>
                <p>Number one sofa for ...</p>
            </div>
            <img src="4.jpeg" alt="Slide 4">
        </div>
        <div class="slide" style="background-color: #454a00;">
            <div class="slide-content">
                <h1>Comfort Bed!!</h1>
                <p>Get comfortable in your Sleep!!!</p>
            </div>
            <img src="5.jpeg" alt="Slide 5">
        </div>
        <!-- Navigation dots -->
        <div class="navigation-dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <div class="clear"></div>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');

        function showSlides() {
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dots[i].classList.remove('active');
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].classList.add('active');
            setTimeout(showSlides, 3000); // Change slide every 3 seconds
        }

        showSlides();

        function currentSlide(n) {
            slideIndex = n;
            showSlides();
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide(index + 1);
            });
        });
    </script>
</body>

</html>