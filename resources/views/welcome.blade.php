@extends('layouts.app')
@section('title', 'My-Portfolio')

@section('content')

    <div id="default-carousel" class="relative w-screen" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[400px] sm:h-[500px] md:h-[600px] overflow-hidden bg-black">
            <!-- Item 1 -->
            <div id="carousel-item-1" class="duration-2000 ease-in-out" data-carousel-item>
                {{-- <img src="{{ asset('image/carousel3.gif') }}" --}}
                <img src="{{ asset('image/Developer.jpeg') }}"
                    class="absolute block w-full h-full object-cover object-[40%_30%] mx-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/50"></div>

                <!-- Text content -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4">Hi, I'm Parul Nag</h1>
                        <p class="text-lg md:text-2xl mb-6">Web Developer (Laravel & Tailwind) | WordPress Developer
                            Enthusiast</p>
                        <a href="#projects"
                            class="bg-white text-black font-semibold px-6 py-3 rounded-lg hover:bg-gray-200">
                            View My Work
                        </a>
                    </div>
                </div>

            </div>
            <!-- Item 2 -->
            <div id="carousel-item-2" class="duration-2000 ease-in-out" data-carousel-item>
                <img src="{{ asset('image/Developer2.jpeg') }}"
                    class="absolute block w-full h-full object-cover object-[50%_60%] mx-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40"></div>

                <!-- Text content -->
                <div
                    class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4 md:px-10">
                    <h2 class="text-white text-3xl md:text-5xl font-bold mb-4">
                        Specialized in Laravel, Tailwind CSS & WordPress
                    </h2>
                    <p class="text-white text-lg md:text-xl mb-6">
                        I Build Fast, Responsive, and User-Friendly Websites
                        <br class="hidden md:block"> Crafting Clean Code and Beautiful Interfaces
                    </p>
                    <a href="#skills"
                        class="bg-white text-black font-semibold px-6 py-3 rounded-lg hover:bg-gray-200 transition">
                        Explore My Skills
                    </a>
                </div>

            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button id="carousel-indicator-1" type="button" class="w-3 h-3 rounded-full" aria-current="true"
                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button id="carousel-indicator-2" type="button" class="w-3 h-3 rounded-full" aria-current="false"
                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                {{-- <button id="carousel-indicator-3" type="button" class="w-3 h-3 rounded-full" aria-current="false"
                    aria-label="Slide 3" data-carousel-slide-to="2"></button> --}}
            </div>
            <!-- Slider controls -->
            <button id="data-carousel-prev" type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button id="data-carousel-next" type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

    @section('script')
        <script type="module">
            import {
                Carousel
            } from 'flowbite';
            const carouselElement = document.getElementById('default-carousel');

            const items = [{
                    position: 0,
                    el: document.getElementById('carousel-item-1'),
                },
                {
                    position: 1,
                    el: document.getElementById('carousel-item-2'),
                },

            ];

            // options with default values
            const options = {
                defaultPosition: 1,
                interval: 5000,

                indicators: {
                    activeClasses: 'bg-white dark:bg-gray-800',
                    inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
                    items: [{
                            position: 0,
                            el: document.getElementById('carousel-indicator-1'),
                        },
                        {
                            position: 1,
                            el: document.getElementById('carousel-indicator-2'),
                        },

                    ],
                },

                // callback functions
                onNext: () => {
                    console.log('next slider item is shown');
                },
                onPrev: () => {
                    console.log('previous slider item is shown');
                },
                onChange: () => {
                    console.log('new slider item has been shown');
                },
            };

            // instance options object
            const instanceOptions = {
                id: 'default-carousel',
                override: true
            };

            // Initialize the Carousel instance from Flowbite
            const carousel = new Carousel(carouselElement, items, options, instanceOptions);

            // Use the Flowbite carousel instance methods
            document.getElementById('data-carousel-prev').addEventListener('click', () => {
                carousel.prev();
            });

            document.getElementById('data-carousel-next').addEventListener('click', () => {
                carousel.next();
            });
        </script>
    @endsection

    <section id="about" class="py-10 px-5">
        <h1 class="text-3xl font-bold text-center text-sky-600 mb-4">About</h1>
        <hr class="mb-10">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8 md:gap-12">
            <div class=" flex-shrink-0 relative w-48 h-48 md:w-60 md:h-60 lg:-mt-6">
                <img src="{{ asset('image/parul.jpg') }}"
                    class="rounded-full h-40 w-40 md:w-52 md:h-52 md:mt-5 lg:mb-4 border-4 border-white shadow-lg hover:scale-105 hover:shadow-xl transition duration-500"
                    alt="Parul Nag">
            </div>
            <div class="text-justify text-base mr-6 lg:mt-6 leading-relaxed">
                <p class="mb-4">I am a Master's student in Computer Applications with a strong passion for web
                    development. I enjoy working with both frontend and backend technologies, creating dynamic and
                    interactive web applications. My skill set includes HTML, CSS, Tailwind CSS, JavaScript, PHP,
                    Laravel, Canva, Figma and SharePoint. I am continuously expanding my expertise in modern web
                    technologies.</p>
                <p>In addition to web development, I have a deep interest in programming and problem-solving, with
                    knowledge in C, Java, and Python. I love building efficient and logical programs that enhance
                    functionality and user experience.</p>
            </div>
        </div>
        <div class="mt-8 mr-6 text-justify leading-relaxed">
            <h2 class="text-xl font-semibold mb-3 text-cyan-700">
                Aspiring Full Stack Developer | WordPress Developer
            </h2>
            <p>
                I have recently completed my Master's in Computer Applications and am now seeking opportunities in the
                field of web development. During my academic and internship journey at Yasham Development Center, I
                gained practical experience in building real-world web applications using modern technologies. I am
                passionate about turning ideas into interactive, user-friendly web solutions. With a strong foundation
                in both frontend and backend development, I am eager to contribute to impactful projects and grow as a
                full stack developer.
            </p>
            <div class="mt-6">
                <a href="/assets/ParulNag_Resume.pdf" target="_blank"
                    class="bg-cyan-200 text-black px-4 py-3 rounded-lg hover:bg-green-300 transition">
                    📄 Download Resume
                </a>
            </div>
        </div>
    </section>

    <section id="education" class="px-5 py-10 bg-gray-50">
        <h1 class="text-3xl font-bold text-center text-sky-600 mb-4">Education</h1>
        <hr class="mb-10">

        <div class="space-y-6">
            <!-- Master's -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold">Master of Computer Applications (MCA)</h3>
                <p class="text-gray-600">ITM University, Raipur | 2023 – 2025</p>
                
            </div>

            <!-- Bachelor's -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold">Bachelor of Computer Applications (BCA)</h3>
                <p class="text-gray-600">Nagarjuna Govt. P.G College of Science, Raipur | 2020 – 2023</p>
                
            </div>
        </div>
    </section>


    <section id="skills" class="py-10 px-5 ">
        <h2 class="text-3xl font-bold text-center text-sky-600 mb-4">Skills</h2>
        <hr class="mb-10">

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 max-w-6xl mx-auto">

            <!-- Frontend Card -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Frontend</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">HTML</span>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">CSS</span>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Tailwind CSS</span>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">JavaScript</span>
                    {{-- <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Figma</span> --}}
                </div>
            </div>

            <!-- Backend Card -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-green-600 mb-4">Backend</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">PHP(Basics)</span>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Laravel</span>
                    {{-- <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">SharePoint</span> --}}
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">MySQL</span>
                </div>
            </div>

            <!-- Programming Languages Card -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-purple-600 mb-4">Programming Languages</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">C</span>
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">Java</span>
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">Python</span>
                </div>
            </div>

            <!-- CMS Card -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-pink-600 mb-4">CMS</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-purple-100 text-pink-800 px-3 py-1 rounded-full text-sm">WordPress</span>

                </div>
            </div>

            <!-- Tools Card -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-yellow-600 mb-4">Tools & Platforms</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">VS Code</span>
                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Figma</span>
                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Canva</span>
                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">SharePoint</span>
                </div>
            </div>

        </div>
    </section>

    <section id="experience" class="py-10 px-5 bg-gray-50">
        <h2 class="text-3xl font-bold text-center text-sky-600 mb-4">Work Experience</h2>
        <hr class="mb-10">

        <div class="max-w-4xl mx-auto space-y-6">
            <div class="bg-white shadow-md rounded-xl p-6 border-l-4 border-blue-500">
                <h3 class="text-xl font-semibold">Web Development Intern</h3>
                <p class="text-sm text-gray-500">Yasham Software Services Pvt. Ltd. | Feb 2025 – May 2025</p>
                <ul class="list-disc list-inside mt-2 text-justify text-gray-700 leading-relaxed">
                    <li>Contributed to the design of the Kisan Sat mobile application and admin dashboard using Canva, ensuring a clean, intuitive user interface aligned with project goals.</li>
                    <li>Designed and developed the landing page of the official Kisan Sat website using Laravel and Tailwind CSS, ensuring responsive layout and clean UI.</li>
                    <li>Worked on various WordPress-based websites, customizing themes and optimizing page layouts for performance and user experience.</li>
                    <li>Contributed to the frontend development of company projects using HTML, CSS, and JavaScript.</li>
                    <li>Worked on Designing using Canva and Figma for various company projects.</li>
                    <li>Gained exposure to SharePoint to organize, manage, and share internal data and resources across teams.</li>
                    <li>Collaborated closely with developers and designers to implement real-world web solutions aligned with client requirements.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="projects" class="py-10 px-5">
        <h2 class="text-3xl font-bold text-center text-sky-700 mb-4">Projects</h2>
        <hr class="mb-10">

        <div x-data="{ category: 'All' }">
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                <button @click="category = 'All'"
                    :class="category === 'All' ? 'bg-pink-600 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-1 rounded-full border hover:bg-pink-100 transition">All</button>
                <button @click="category = 'Web'"
                    :class="category === 'Web' ? 'bg-pink-600 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-1 rounded-full border hover:bg-pink-100 transition">Web Development</button>
                <button @click="category = 'AI/ML'"
                    :class="category === 'AI/ML' ? 'bg-pink-600 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-1 rounded-full border hover:bg-pink-100 transition">AI/ML</button>
                <button @click="category = 'WordPress'"
                    :class="category === 'WordPress' ? 'bg-pink-600 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-1 rounded-full border hover:bg-pink-100 transition">WordPress</button>
            </div>

            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto">

                <!-- Project Card -->
                <div x-show="category === 'All'"
                    class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('image/HMS_homepage.png') }}" alt="Hotel Management System"
                        class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold mb-2">Hotel Management System</h3>
                        <p class="text-sm text-gray-600 mb-3">Built using VB.NET for managing hotel room bookings,
                            reservations, and reports.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">VB.NET</span>
                        </div>
                        <!-- Optional Links -->
                        <!-- <a href="#" class="text-blue-600 text-sm font-medium hover:underline">View Project</a> -->
                    </div>
                </div>

                <!-- Plant Disease Detection -->
                <div x-show="category === 'All' || category === 'AI/ML'"
                    class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('image/ai_mlProject2.png') }}" alt="Plant Disease Detection"
                        class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold mb-2">Plant Disease Detection</h3>
                        <p class="text-sm text-gray-600 mb-3">An AI/ML-based web tool that identifies plant diseases
                            from
                            leaf images and suggests treatments.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">React</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">TensorFlow</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Flask</span>
                        </div>
                    </div>
                </div>

                <!-- Tic Tac Toe Game -->
                <div x-show="category === 'All' || category === 'Web'"
                    class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('image/tic-tac-toe.png') }}" alt="Tic Tac Toe"
                        class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold mb-2">Tic Tac Toe Game</h3>
                        <p class="text-sm text-gray-600 mb-3">A simple interactive Tic Tac Toe game using basic web
                            technologies.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">HTML</span>
                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">CSS</span>
                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">JavaScript</span>
                        </div>
                    </div>
                </div>

                <!-- Kids Competition Website -->
                <div x-show="category === 'All' || category === 'WordPress'"
                    class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('image/KidsCompetition.png') }}" alt="Kids Competition"
                        class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold mb-2">Kids Competition Website</h3>
                        <p class="text-sm text-gray-600 mb-3">A creative WordPress website where children can
                            participate
                            in various online competitions.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded">WordPress</span>
                        </div>
                    </div>
                </div>

                <!-- KisanSAT Website -->
                <div x-show="category === 'All' || category === 'Web'"
                    class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition">
                    <img src="{{ asset('image/kisansat.png') }}" alt="KisanSAT Website"
                        class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold mb-2">KisanSAT Website</h3>
                        <p class="text-sm text-gray-600 mb-3">Landing page for a smart agriculture app built using
                            Laravel
                            and Tailwind CSS.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Laravel</span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Tailwind CSS</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="contact" class="py-10 px-5 bg-gray-50">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Contact Me</h2>
        <hr class="mb-10">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
                Have a question, collaboration idea, or project proposal? Let's connect!
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                <!-- Contact Info -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Email</h3>
                        <a href="mailto:nagparul1@gmail.com" class="text-blue-600 hover:underline">
                            nagparul1@gmail.com
                        </a>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">LinkedIn</h3>
                        <a href="https://www.linkedin.com/in/parul-nag-524252262/" target="_blank"
                            class="text-blue-600 hover:underline">
                            www.linkedin.com/in/parul-nag-524252262/
                        </a>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">GitHub</h3>
                        <a href="https://github.com/Parul-Nag" target="_blank" class="text-blue-600 hover:underline">
                            https://github.com/Parul-Nag
                        </a>
                    </div>
                </div>

                <!-- Contact Form -->
                <form action="{{ url('contact') }}" method="POST"
                    class="bg-white shadow-lg rounded-lg p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" required
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" rows="4" required
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>



@endsection
