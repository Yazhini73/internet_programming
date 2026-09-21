import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("/LogoutServlet")
public class LogoutServlet extends HttpServlet {

    protected void doGet(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        HttpSession session = request.getSession(false);

        if (session != null) {
            session.invalidate();
        }

        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        out.println("<html>");
        out.println("<head>");
        out.println("<title>Logout</title>");
        out.println("</head>");

        out.println("<body style='font-family:Arial;"
                + "text-align:center;"
                + "background-color:lightgray;'>");

        out.println("<h2>You have been logged out.</h2>");

        out.println("<a href='index.html'>Login Again</a>");

        out.println("</body>");
        out.println("</html>");
    }
}

