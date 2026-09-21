import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("/VisitorCounterServlet")
public class VisitorCounterServlet extends HttpServlet {

    protected void doGet(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        HttpSession session = request.getSession();

        ServletContext context = getServletContext();

        synchronized (context) {

            Integer count =
                    (Integer) context.getAttribute("visitorCount");

            if (count == null) {
                count = 0;
            }

            if (session.getAttribute("visited") == null) {

                count++;

                context.setAttribute("visitorCount", count);

                session.setAttribute("visited", true);
            }
        }

        Integer count =
                (Integer) context.getAttribute("visitorCount");

        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        out.println("<html>");

        out.println("<head>");
        out.println("<title>Visitor Counter</title>");
        out.println("</head>");

        out.println("<body style='font-family:Arial;"
                + "text-align:center;"
                + "background-color:lightblue;'>");

        out.println("<h2>Unique Visitor Counter</h2>");

        out.println("<h1>" + count + "</h1>");

        out.println("<p>");
        out.println("Each session is counted only once.");
        out.println("</p>");

        out.println("<a href='index.html'>Back to Login</a>");

        out.println("</body>");
        out.println("</html>");
    }
}