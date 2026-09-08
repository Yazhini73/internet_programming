<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Summary</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0eded; padding: 30px; }
        .details-container { 
            width: 600px; margin: 50px auto; background: #ffffff; 
            padding: 25px 30px; border-radius: 8px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.2); 
        } 
        h2 { text-align: center; color: rgb(91,91,94); } 
        table { width: 100%; border-collapse: collapse; margin-top: 15px; } 
        td { padding: 10px; border-bottom: 1px solid #eeeeee; word-break: break-all; } 
        td.label { font-weight: bold; color: #555555; width: 35%; } 
    </style>
</head>
<body>

<% 
    // Retrieve form parameters submitted from the registration form
    String fname      = request.getParameter("fname");
    String lname      = request.getParameter("lname");
    String email      = request.getParameter("email");
    String phone      = request.getParameter("phone");
    String job        = request.getParameter("job");
    String experience = request.getParameter("experience");
    String ccnumber   = request.getParameter("ccnumber");
%>

    <div class="details-container">
        <h2>Registration Successful!</h2>
        <table>
            <tr><td class="label">First Name:</td><td><%= fname %></td></tr>
            <tr><td class="label">Last Name:</td><td><%= lname %></td></tr>
            <tr><td class="label">Email:</td><td><%= email %></td></tr>
            <tr><td class="label">Phone Number:</td><td><%= phone %></td></tr>
            <tr><td class="label">Desired Job:</td><td><%= job %></td></tr>
            <tr><td class="label">Experience:</td><td><%= experience %> Years</td></tr>
            <tr><td class="label">Credit Card Number:</td><td><%= ccnumber %></td></tr>
        </table>
    </div> 

</body>
</html>