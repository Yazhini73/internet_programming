import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/HiddenFieldServlet2")
public class HiddenFieldServlet2 extends HttpServlet {

    protected void doPost(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        String username = request.getParameter("hf");

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html>");

        out.println("<head>");
        out.println("<title>Hidden Field Result</title>");
        out.println("</head>");

        out.println("<body style='font-family:Arial;"
                + "text-align:center;"
                + "background-color:lightgreen;'>");

        out.println("<h2>Hello, " + username + "</h2>");

        out.println("<p>");
        out.println("Username successfully received through");
        out.println(" Hidden Form Field.");
        out.println("</p>");

        out.println("<br>");

        out.println("<a href='index.html'>Back to Login</a>");

        out.println("</body>");
        out.println("</html>");
    }
}