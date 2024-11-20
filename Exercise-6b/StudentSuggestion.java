package studentSuggestion;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/StudentSuggestion")
public class StudentSuggestion extends HttpServlet {
    
    // Array of student names
    String[] studentNames = { "Shyam", "Praveen", "Vetrivel", "Sarath", "Kishore", "Balaji", "Kamalesh", "Nithish" };

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Get the input from user
        String query = request.getParameter("query");
        
        // Handle case where query is null
        if (query == null || query.isEmpty()) {
            query = "";
        } else {
            query = query.toLowerCase();
        }

        PrintWriter out = response.getWriter();
        response.setContentType("text/html");
        
        // Return matching names
        for (int i = 0; i < studentNames.length; i++) {
            String name = studentNames[i];
            if (name.toLowerCase().startsWith(query.toLowerCase())) {
            	out.println("<div class='suggestion-item'>" + name + "</div>");
            }
        }
    }
}