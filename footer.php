<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Footer Styles */
    .site-footer {
        background-color: rgba(51, 51, 51, 0.8);
        /* Adjust the alpha value (0.8) to change transparency */
        color: #fff;
        padding: 40px 0;
        text-align: center;
    }

    .site-footer .containere {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .footer-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        /* Center align content */
    }

    .footer-logo img {
        width: 120px;
    }

    .footer-navigation ul,
    .footer-social ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        /* Remove default margin */
    }

    .footer-navigation ul li,
    .footer-social ul li {
        display: inline;
        margin-right: 20px;
    }

    .footer-navigation ul li a,
    .footer-social ul li a {
        color: #fff;
        text-decoration: none;
        border-bottom: 1px solid transparent;
        /* Add transparent border bottom */
        transition: border-color 0.3s ease;
        /* Add transition effect */
    }

    .footer-navigation ul li a:hover,
    .footer-social ul li a:hover {
        border-color: #fff;
        /* Change border color on hover */
    }

    .footer-info {
        margin-top: 20px;
        /* Add margin to separate from social icons */
    }

    .footer-info p {
        margin: 5px 0;
    }

    /* Social Icons */
    .fa-facebook-f,
    .fa-twitter,
    .fa-instagram,
    .fa-pinterest {
        color: #fff;
        font-size: 20px;
        transition: color 0.3s ease;
    }

    .fa-facebook-f:hover,
    .fa-twitter:hover,
    .fa-instagram:hover,
    .fa-pinterest:hover {
        color: #ffd700;
        /* Change to your preferred hover color */
    }
</style>
<footer class="site-footer">
    <div class="containere">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="./images/logo.png" alt="Shop Logo">
            </div>
            <div class="footer-navigation">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-info">
            <p>&copy; <?php echo date("Y"); ?> Your Online Shop. All Rights Reserved.</p>
            <p>Designed by Group VI</p>
        </div>
    </div>
</footer>