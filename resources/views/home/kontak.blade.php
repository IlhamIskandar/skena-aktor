@extends('layouts.home.app')

@section('content')
<!-- Header Section -->
<section class="contact-header py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="header-title">Get in Touch</h1>
                <p class="header-subtitle">
                    Have questions about our programs? Want to schedule a visit? We'd love to hear from you. Contact us and start your acting journey today.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content Section -->
<section class="contact-content py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Left Column: Send Us a Message -->
            <div class="col-lg-4">
                <div class="message-box">
                    <h3 class="box-title">Send Us a Message</h3>
                    <p class="box-desc">
                        Fill out the form below and we'll get back to you within 24 hours.
                    </p>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Middle Column: Contact Information -->
            <div class="col-lg-4">
                <div class="info-box">
                    <h3 class="box-title">Contact Information</h3>
                    <p class="box-desc">
                        Visit us or reach out through any of the following channels
                    </p>

                    <!-- Location -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFC107" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <strong>Location</strong>
                            <p>Jl. Sari Rupa No. 123<br>Bandung 40126<br>West Java, Indonesia</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFC107" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.19l2.68 1.15c1.32.56 2.78-.1 3.51-1.33.73-1.23.3-2.74-1-3.62l-2.05-1.5c-.35-.26-.73-.42-1.12-.52l-2.5-1.15c-.38-.17-.78-.15-1.12.05l-2.5 1.15c-.38.17-.73.42-1.02.71l-2.2 2.2zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-2.67 0-5.26-.75-7.5-2.05l2.16-2.16c1.23.78 2.68 1.25 4.2 1.25 1.52 0 2.97-.47 4.2-1.25L16.5 16.95c-2.24 1.3-4.83 2.05-7.5 2.05zm0-10c-2.67 0-5.26-.75-7.5-2.05l2.16-2.16c1.23.78 2.68 1.25 4.2 1.25 1.52 0 2.97-.47 4.2-1.25L16.5 6.95c-2.24 1.3-4.83 2.05-7.5 2.05z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <strong>Phone</strong>
                            <p>+62 123 4567 890<br>+62 897 6543 210</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFC107" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4v-6h16v6zm-8-9l-4 4h8l-4-4z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <strong>Email</strong>
                            <p>info@siemaaktor.com<br>registration@siemaaktor.com</p>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFC107" viewBox="0 0 24 24">
                                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <strong>Office Hours</strong>
                            <p>Mon - Fri: 09:00 - 17:00<br>Sat: 10:00 - 14:00<br>Sun: Closed</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Map -->
            <div class="col-lg-4">
                <div class="map-box">

                    <iframe
                        class="google-map-embed"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.5630327787!2d107.57311666458237!3d-6.903444341656885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1730908852331!5m2!1sen!2sid"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
