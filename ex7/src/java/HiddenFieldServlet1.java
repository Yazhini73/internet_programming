import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/HiddenFieldServlet1")
public class HiddenFieldServlet1 extends HttpServlet {

    protected void doPost(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        String username = request.getParameter("uname");

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html>");

        out.println("<head>");
        out.println("<title>Hidden Field</title>");
        out.println("</head>");

        out.println("<body style='font-family:Arial;"
                + "text-align:center;"
                + "background-color:lightyellow;'>");

        out.println("<h2>Hidden Form Field</h2>");

        out.println("<h3>Welcome, " + username + "</h3>");

        out.println("<p>");
        out.println("Username is passed using a hidden form field.");
        out.println("</p>");

        out.println("<form action='HiddenFieldServlet2' method='post'>");

        out.println("<input type='hidden' ");
        out.println("name='hf' ");
        out.println("value='" + username + "'>");

        out.println("<input type='submit' value='Next Page'>");

        out.println("</form>");

        out.println("</body>");
        out.println("</html>");
    }
}