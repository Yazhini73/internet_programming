import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/URLRewriteServlet2")
public class URLRewriteServlet2 extends HttpServlet {

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String uname = request.getParameter("uname");

        out.println("<html>");
        out.println("<head><title>URL Rewriting Result</title></head>");
        out.println("<body style='font-family:Arial; text-align:center; padding:50px;'>");

        out.println("<h1>URL Rewriting Successful!</h1>");
        out.println("<h2>Welcome, " + uname + "</h2>");
        out.println("<p>Username was passed through the URL.</p>");
        out.println("<p>URL Rewriting session tracking completed successfully.</p>");

        out.println("</body>");
        out.println("</html>");
    }
}