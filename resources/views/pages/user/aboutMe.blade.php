<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CV</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
            header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
              
        }
        header img {
            width: 150px;
            border-radius: 50%;
            border: 3px solid #fff;
            position: absolute;
        }  

        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #333;
        }

        header p {
            margin: 5px 0;
            color: #666;
        }

        section {
            margin-bottom: 20px;
        }

        section h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #333;
        }

        .job, .education {
            margin-bottom: 20px;
        }

        .job h3, .education h3 {
            margin: 0;
            color: #444;
        }

        .job p, .education p {
            font-style: italic;
            margin: 0 0 10px;
            color: #666;
        }

        ul {
            padding-left: 20px;
            color: #444;
        }

        ul li {
            margin-bottom: 10px;
        }

        .skills ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .skills ul li {
            background: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 5px;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #ccc;
        }

        footer p {
            margin: 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="{{URL('/images/cv^picrture-modified.png')}}" alt="Your Name">
            <h1>Mohamed Kaanoun</h1>
            <p>Web Developer</p>
            <p>Email: john.doe@example.com | Phone: (123) 456-7890</p>
        </header>
        <section>
            <h2>Summary</h2>
            <p>Experienced web developer with a strong background in developing award-winning applications for a diverse clientele. Proficient in HTML, CSS, JavaScript, and modern frameworks.</p>
        </section>
        <section>
            <h2>Experience</h2>
            <div class="job">
                <h3>Senior Web Developer</h3>
                <p>ABC Company | Jan 2020 - Present</p>
                <ul>
                    <li>Developed and maintained the company website using HTML, CSS, and JavaScript.</li>
                    <li>Collaborated with designers to create user-friendly interfaces.</li>
                    <li>Optimized website performance, reducing load times by 20%.</li>
                </ul>
            </div>
            <div class="job">
                <h3>Web Developer</h3>
                <p>XYZ Solutions | May 2016 - Dec 2019</p>
                <ul>
                    <li>Built and maintained web applications for various clients.</li>
                    <li>Implemented responsive design to ensure compatibility across devices.</li>
                    <li>Worked with backend developers to integrate APIs.</li>
                </ul>
            </div>
        </section>
        <section>
            <h2>Education</h2>
            <div class="education">
                <h3>Bachelor of Science in Computer Science</h3>
                <p>University of Settat, 2016</p>
            </div>
        </section>
        <section class="skills">
            <h2>Skills</h2>
            <ul>
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript</li>
                <li>React</li>
                <li>Node.js</li>
                <li>Express</li>
                <li>Git</li>
                <li>GitHub</li>
                <li>Spring Boot</li>
            </ul>
        </section>
        <footer>
            <p>&copy; 2024 Mohamed Kaanoun. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>


</x-layout>