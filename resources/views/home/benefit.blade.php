@extends('layouts.home.app')

@section('content')
<!-- Header Section -->
<section class="benefit-header py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="header-title">Benefit</h1>
                <p class="subtitle">
                    Discover the advantages of joining Gema Actor – Bandung’s premier acting community. From expert instructors to career opportunities, we provide everything you need to succeed as an actor.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Main Benefits Section -->
<section class="main-benefits py-5">
    <div class="container">
        <div class="row justify-content-center g-4">
            <!-- Expert Instructors -->
            <div class="col-md-4">
                <div class="benefit-card yellow">
                    <h2 class="benefit-title">Expert Instructors</h2>
                    <p class="benefit-desc">
                        Learn from industry professionals with over 10 years of experience in theatre, film, and television. Our instructors bring real-world expertise and personalized mentorship to every class.
                    </p>
                </div>
            </div>

            <!-- Supportive Community -->
            <div class="col-md-4">
                <div class="benefit-card yellow">
                    <h2 class="benefit-title">Supportive Community</h2>
                    <p class="benefit-desc">
                        Join a vibrant network of passionate actors and creatives. Collaborate, share experiences, and build lifelong friendships while you enhance your skills in a welcoming environment.
                    </p>
                </div>
            </div>

            <!-- Career Development -->
            <div class="col-md-4">
                <div class="benefit-card yellow">
                    <h2 class="benefit-title">Career Development</h2>
                    <p class="benefit-desc">
                        Access exclusive networking events, audition opportunities, and portfolio-building workshops. We help you build a professional resume, land auditions, and pursue performance opportunities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="more-benefits">
    <div class="container">

        <div class="benefits-container">

            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">

                    <h2 class="more-title">
                        More <span class="text-yellow">Benefits</span>
                    </h2>

                    <p class="more-subtitle">
                        Experience comprehensive training with facilities, support, and opportunities that set you up for success
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="benefit-box">
                        <h3 class="box-title">Comprehensive Curriculum</h3>
                        <p class="box-desc">
                            Master both traditional and contemporary acting techniques through structured programs...
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-box">
                        <h3 class="box-title">Personalized Training</h3>
                        <p class="box-desc">
                            Small class sizes ensure individual attention and tailored feedback for every student.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-box">
                        <h3 class="box-title">Flexible Schedules</h3>
                        <p class="box-desc">
                            Choose from morning, evening, and weekend classes to fit your lifestyle.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-box">
                        <h3 class="box-title">Performance Opportunities</h3>
                        <p class="box-desc">
                            Showcase your skills in regular student performances and public productions.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-box">
                        <h3 class="box-title">Industry Recognition</h3>
                        <p class="box-desc">
                            Earn certificates recognized by theater companies and production houses.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="benefit-box">
                        <h3 class="box-title">State-of-the-Art Facilities</h3>
                        <p class="box-desc">
                            Train in professional studios equipped with lighting, sound, and staging equipment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Impact Section -->
<section class="our-impact py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="impact-title">Our Impact</h2>
                <p class="impact-subtitle">
                    See the real results our students achieve
                </p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Placeholder for impact cards -->
            <div class="col-md-4">
                <div class="impact-card">
                    <div class="impact-placeholder">
                        <span>📸</span>
                    </div>
                    <p class="impact-caption">Student Success Story 1</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="impact-card">
                    <div class="impact-placeholder">
                        <span>📸</span>
                    </div>
                    <p class="impact-caption">Student Success Story 2</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="impact-card">
                    <div class="impact-placeholder">
                        <span>📸</span>
                    </div>
                    <p class="impact-caption">Student Success Story 3</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
