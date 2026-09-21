<!DOCTYPE html>
<html>
<head>
    <title>Contact Me</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <h1>Contact Me</h1>

    <nav>
        <a href="index.jsp">Home</a>
        <a href="about.jsp">About</a>
        <a href="academics.jsp">Academics</a>
        <a href="skills.jsp">Skills</a>
        <a href="projects.jsp">Projects</a>
        <a href="internships.jsp">Internships</a>
        <a href="achievements.jsp">Achievements</a>
        <a href="contact.jsp">Contact</a>
    </nav>
</header>

<section class="home">

    <h2>Get In Touch</h2>

    <form action="ContactServlet" method="post" onsubmit="return validateForm()">

        <p>
            <input type="text" id="name" name="name"
                   placeholder="Enter your name">
        </p>

        <p>
            <input type="email" id="email" name="email"
                   placeholder="Enter your email">
        </p>

        <p>
            <input type="text" id="subject" name="subject"
                   placeholder="Enter subject">
        </p>

        <p>
            <textarea id="message" name="message"
                      placeholder="Enter your message"
                      rows="5"></textarea>
        </p>

        <button class="button" type="submit">
            Send Message
        </button>

    </form>

</section>

<script src="js/script.js"></script>

</body>
</html>