package processform;

import java.io.IOException;
import java.io.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class ProcessForm
 */
@WebServlet("/ProcessForm")

public class ProcessForm extends HttpServlet{
	public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException{
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		
		String name = request.getParameter("name");
		int roll_number = Integer.parseInt(request.getParameter("rollno"));
		String gender = request.getParameter("gender");
		String year = request.getParameter("year");
		String dept = request.getParameter("dept");
		String sec = request.getParameter("sec");
		Long mobile_no = Long.parseLong(request.getParameter("mobileno"));
		String emailId = request.getParameter("emailid");
		String address = request.getParameter("address");
		String city = request.getParameter("city");
		String country = request.getParameter("country");
		int pincode = Integer.parseInt(request.getParameter("pincode"));
		
		
		out.println(
				"<p>Name : "+ name + "</p>"+
				"<p>Roll No : "+ roll_number + "</p>"+
		        "<p>Gender : "+ gender + "</p>"+
		        "<p>Year : "+ year + "</p>"+
		        "<p>Department : "+ dept + "</p>"+
		        "<p>Section : "+ sec + "</p>"+
		        "<p>Mobile Number : "+ mobile_no + "</p>"+
		        "<p>Email ID : "+ emailId + "</p>"+
		        "<p>Address : "+ address + "</p>"+
		        "<p>City : "+ city + "</p>"+
		        "<p>Country : "+ country + "</p>"+
		        "<p>Pincode : "+ pincode + "</p>"
		        );
	}
}
