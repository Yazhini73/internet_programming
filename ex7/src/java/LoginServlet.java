import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("/LoginServlet")
public class LoginServlet extends HttpServlet {

    protected void doPost(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        String username = request.getParameter("username");
        String password = request.getParameter("password");

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // Login validation
        if (username.equals("admin") && password.equals("1234")) {

            // Create session
            HttpSession session = request.getSession();

            // Store username in session
            session.setAttribute("username", username);

            // Visitor count
            Integer count =
                    (Integer) getServletContext()
                    .getAttribute("visitorCount");

            if (count == null) {
                count = 0;
            }

            // Count only once per session
            if (session.getAttribute("visited") == null) {

                count++;

                getServletContext()
                        .setAttribute("visitorCount", count);

                session.setAttribute("visited", true);
            }

            // Welcome page
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Welcome</title>");

            out.println("<style>");

            out.println("body {");
            out.println("font-family: Arial;");
            out.println("background-color: lightgreen;");
            out.println("text-align: center;");
            out.println("margin-top: 80px;");
            out.println("}");

            out.println(".box {");
            out.println("background-color: white;");
            out.println("width: 500px;");
            out.println("margin: auto;");
            out.println("padding: 30px;");
            out.println("border-radius: 10px;");
            out.println("box-shadow: 0 0 10px gray;");
            out.println("}");

            out.println("a {");
            out.println("display: block;");
            out.println("margin: 15px;");
            out.println("padding: 12px;");
            out.println("background-color: #2c3e50;");
            out.println("color: white;");
            out.println("text-decoration: none;");
            out.println("border-radius: 5px;");
            out.println("}");

            out.println("</style>");
            out.println("</head>");

            out.println("<body>");

            out.println("<div class='box'>");

            out.println("<h2>Login Successful</h2>");

            out.println("<h3>Welcome, " + username + "</h3>");

            out.println("<p>");
            out.println("Unique Visitors: "
                    + getServletContext()
                    .getAttribute("visitorCount"));
            out.println("</p>");

            out.println("<h3>Session Tracking Techniques</h3>");

            // Hidden Field
            out.println("<form action='HiddenFieldServlet1' method='post'>");

            out.println("<input type='hidden' ");
            out.println("name='uname' ");
            out.println("value='" + username + "'>");

            out.println("<input type='submit' ");
            out.println("value='Hidden Form Field'>");

            out.println("</form>");

            // URL Rewriting
            out.println("<a href='URLRewriteServlet1?uname="
                    + username + "'>");

            out.println("URL Rewriting");

            out.println("</a>");

            // Visitor Counter
            out.println("<a href='VisitorCounterServlet'>");
            out.println("View Visitor Count");
            out.println("</a>");

            // Logout
            out.println("<a href='LogoutServlet'>");
            out.println("Logout");
            out.println("</a>");

            out.println("</div>");

            out.println("</body>");
            out.println("</html>");

        } else {

            // Invalid login
            out.println("<html>");
            out.println("<body style='text-align:center; "
                    + "font-family:Arial; "
                    + "background-color:lightcoral;'>");

            out.println("<h2>Invalid Username or Password</h2>");

            out.println("<p>Please try again.</p>");

            out.println("<a href='index.html'>Back to Login</a>");

            out.println("</body>");
            out.println("</html>");
        }
    }
}